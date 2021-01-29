<?php
namespace Rintisch\CourseScheduler\Hooks;

use TYPO3\CMS\Core\DataHandling\DataHandler;
use Geocoder\Provider\Nominatim\Nominatim;
use Geocoder\Query\GeocodeQuery;
use Http\Adapter\Guzzle6\Client;

class EventSafeHook {
     /**
     * Fieldnames that trigger geo decode.
     *
     * @var array
     */
    protected $fieldsTriggerUpdate = ['address', 'city', 'country', 'zip'];

    /**
     * Hook to add latitude and longitude to locations.
     *
     * @param string $action The action to perform, e.g. 'update'.
     * @param string $table The table affected by action, e.g. 'fe_users'.
     * @param int $uid The uid of the record affected by action.
     * @param array $modifiedFields The modified fields of the record.
     * @param object $pObj Object of page(?)
     *
     * @return void
     */
    public function processDatamap_postProcessFieldArray($action, $table, $uid, array &$modifiedFields, DataHandler &$pObj) {

        if ($this->hasToGeocode($table, $action, $modifiedFields, $pObj)) {
            $this->geocode($modifiedFields, $pObj);
        }
    }

    /**
     * geocode event address
     *
     * @param array $modifiedFields The modified fields of the record.
     * @param object $pObj Object of page
     *
     *  @return void
     */
    protected function geocode(&$modifiedFields, $pObj) {

        $userAgent = "rintisch-courseScheduler";
        $httpClient = new Client();
        $provider = new Nominatim::withOpenStreetMapServer($httpClient, $userAgent);
        $geocoder = new StatefulGeocoder($provider, 'en');

        $completeAddress =  $this->getAddress($modifiedFields, $pObj);//$this->getAddress($modifiedFields, $uid);

        try {
            $result = $geocoder->geocodeQuery(GeocodeQuery::create($completeAddress));
        }
        catch (\Exception $exception) {
            var_dump($exception->getMessage());
        }

        if(sizeof($result) > 0) {
            $modifiedFields['latitude'] = \round($result->first()->getCoordinates()->getLatitude(), 6);
            $modifiedFields['longitude'] = \round($result->first()->getCoordinates()->getLongitude(), 6);
        }
    }

    /**
     * Check whether to fetch geo information or not.
     *
     * NOTE: Currently allwayd for fe_users, doesn't check the type at the moment.
     *
     * @param string $table
     * @param string $action
     * @param array $modifiedFields
     * @param object $pObj Object of page
     *
     * @return bool
     */
    protected function hasToGeocode(string $table, string $action, array $modifiedFields, $pObj): bool
    {
        // Do not process if foreign table, unintended action,
        // or fields were changed explicitly.
        if ($table !=='tx_sfeventmgt_domain_model_location' || $action !== 'update') {
            return false;
        }

        // Only process if one of the fields was updated, containing new information.
        foreach (array_keys($modifiedFields) as $modifiedFieldName) {
            if (in_array($modifiedFieldName, $this->fieldsTriggerUpdate)) {
                return true;
            }
        }
        // If fields were empty we will geocode
        return $pObj->checkValueCurrentRecord['latitude'] <= 0 && $pObj->checkValueCurrentRecord['longitude'] <= 0;
    }

    /**
     * Get address of the given record.
     *
     * Merges information from database with modified ones.
     *
     * @param array $modifiedFields The modified fields of the record.
     * @param object $pObj
     *
     * @return string
     */
    protected function getAddress(array $modifiedFields, $pObj): string
    {
        // get current address fields (modified values are here not included)
        $addressFields = [
            'address' => $pObj->checkValue_currentRecord['address'],
            'zip' => $pObj->checkValue_currentRecord['zip'],
            'city' => $pObj->checkValue_currentRecord['city'],
            'country' => $pObj->checkValue_currentRecord['country']
        ];

        // add values that were modified by user
        foreach (array_keys($modifiedFields) as $modifiedFieldName) {
            if (in_array($modifiedFieldName, $this->fieldsTriggerUpdate)) {
                $addressFields[$modifiedFieldName] = $modifiedFields[$modifiedFieldName];
            }
        }

        return $addressFields['address'] . ' ' . $addressFields['zip'] . ' ' . $addressFields['city'] . ' ' . $addressFields['country'];
    }
}

