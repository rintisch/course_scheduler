<?php
defined('TYPO3_MODE') or die();

//Add an extra categories selection field to courses table
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'course_scheduler',
    'tx_coursescheduler_domain_model_course',
    'category',
    [
        'label' => 'Category',
        'exclude' => false
    ]
);
