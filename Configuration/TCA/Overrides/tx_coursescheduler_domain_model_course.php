<?php
defined('TYPO3_MODE') or die();


$ll = 'LLL:EXT:course_scheduler/Resources/Private/Language/locallang_db.xlf:';

//Add extra categories selection field to courses table
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'Activity category',
    'tx_coursescheduler_domain_model_course',
    'activity_category',
    [
        'label' =>  $ll . 'category.activity_category',
        'exclude' => false
    ]
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'Level Category',
    'tx_coursescheduler_domain_model_course',
    'level_category',
    [
        'label' =>  $ll . 'category.level_category',
        'exclude' => false
    ]
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'Access category',
    'tx_coursescheduler_domain_model_course',
    'access_category',
    [
        'label' =>  $ll . 'category.access_category',
        'exclude' => false
    ]
);
