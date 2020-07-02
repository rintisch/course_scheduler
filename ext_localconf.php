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
});
