<?php

defined('TYPO3_MODE') or die();


call_user_func(static function ($packageKey) {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Rintisch.' . $packageKey,
        'Courses',
        [
            'Course' => 'list, detail'
        ]
    );
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Rintisch.' . $packageKey,
        'SingleCourse',
        [
            'Course' => 'detail'
        ]
    );

    //register hooks
    // event safe hook
    $GLOBALS ['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][$packageKey] = 'Rintisch\\CourseScheduler\\Hooks\\EventSafeHook';
}, 'course_scheduler');
