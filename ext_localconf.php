<?php

use TYPO3\CMS\Core\Utility\GeneralUtility;

defined('TYPO3_MODE') or die();

call_user_func(function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'CourseScheduler',
        'Courses',
        [
            \Rintisch\CourseScheduler\Controller\CourseController::class => 'list'
        ]
    );
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'CourseScheduler',
        'Locations',
        [
            \Rintisch\CourseScheduler\Controller\LocationController::class => 'list'
        ]
    );
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'CourseScheduler',
        'SingleCourse',
        [
            \Rintisch\CourseScheduler\Controller\CourseController::class => 'detail'
        ]
    );

    /**
     * Override existing object classes
     */
    GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\Container\Container::class)
        ->registerImplementation(\DERHANSEN\SfEventMgt\Domain\Model\Location::class, \Rintisch\CourseScheduler\Domain\Model\Location::class);

    GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\Container\Container::class)
        ->registerImplementation(\DERHANSEN\SfEventMgt\Domain\Repository\LocationRepository::class, \Rintisch\CourseScheduler\Domain\Repository\LocationRepository::class);

    //register hooks
    // event safe hook
    $GLOBALS ['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass']['course_scheduler'] = 'Rintisch\\CourseScheduler\\Hooks\\EventSafeHook';

});
