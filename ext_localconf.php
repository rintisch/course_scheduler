<?php

defined('TYPO3_MODE') or die();


call_user_func(function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Rintisch.course_scheduler',
        'Courses',
        [
            'Course' => 'list, detail'
        ]
    );
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Rintisch.course_scheduler',
        'SingleCourse',
        [
            'Course' => 'detail'
        ]
    );

    //register hooks
    // event safe hook
    $GLOBALS ['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][$_EXTKEY] = 'Rintisch\\CourseScheduler\\Hooks\\EventSafeHook';
});
