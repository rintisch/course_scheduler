<?php

namespace Rintisch\CourseScheduler\Domain\Repository;


use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

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
 * The repository for Locations
 */
class LocationRepository extends \DERHANSEN\SfEventMgt\Domain\Repository\LocationRepository
{
    public function findWithCurrentOrComingHapping()
    {

        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_sfeventmgt_domain_model_location');
        $activeLocations = $queryBuilder
            ->select('tx_sfeventmgt_domain_model_location.uid', 'tx_sfeventmgt_domain_model_location.title', 'tx_sfeventmgt_domain_model_location.address', 'tx_sfeventmgt_domain_model_location.zip', 'tx_sfeventmgt_domain_model_location.city', 'tx_sfeventmgt_domain_model_location.longitude', 'tx_sfeventmgt_domain_model_location.latitude')
            ->from('tx_sfeventmgt_domain_model_location')
            ->join(
                'tx_sfeventmgt_domain_model_location',
                'tx_coursescheduler_domain_model_course',
                'course',
                $queryBuilder->expr()->eq('course.location', $queryBuilder->quoteIdentifier('tx_sfeventmgt_domain_model_location.uid'))
            )
            ->groupBy('tx_sfeventmgt_domain_model_location.uid')
            ->execute()
            ->fetchAllAssociative();

        return $activeLocations;
    }
}
