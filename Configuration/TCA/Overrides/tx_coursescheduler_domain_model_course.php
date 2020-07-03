<?php
defined('TYPO3_MODE') or die();

//Add extra categories selection field to courses table
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'Activity category',
    'tx_coursescheduler_domain_model_course',
    'activity_category',
    [
        'label' => 'Activity',
        'exclude' => false
    ]
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'Level Category',
    'tx_coursescheduler_domain_model_course',
    'level_category',
    [
        'label' => 'Level',
        'exclude' => false
    ]
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'Access category',
    'tx_coursescheduler_domain_model_course',
    'access_category',
    [
        'label' => 'Access',
        'exclude' => false
    ]
);
