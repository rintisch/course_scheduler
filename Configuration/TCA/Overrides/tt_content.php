<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'course_scheduler',
    'Courses',
    'Course scheduler and details'
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'course_scheduler',
    'Locations',
    'Show locations of courses'
);

$pluginSignature = 'coursescheduler_courses';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    // Flexform configuration schema file
    'FILE:EXT:course_scheduler/Configuration/FlexForms/List.xml'
);
