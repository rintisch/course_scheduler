<?php
namespace Rintisch\CourseScheduler\Controller;

/***
 *
 * This file is part of the "Weekly Course Scheduler" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 Gerald Rintisch <gerald.rintisch@posteo.de>, Rintisch
 *
 ***/
/**
 * LocationController
 */
class LocationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * locationRepository
     *
     * @var \DERHANSEN\SfEventMgt\Domain\Repository\LocationRepository
     */
    protected $locationRepository = null;


    /**
     * @param \DERHANSEN\SfEventMgt\Domain\Repository\LocationRepository $locationRepository
     */
    public function injectLocationRepository(\DERHANSEN\SfEventMgt\Domain\Repository\LocationRepository $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $locations = $this->locationRepository->findWithCurrentOrComingHapping();

        $this->view->assign('locations', $locations);
    }
}
