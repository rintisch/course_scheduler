<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'course_scheduler',
    'Courses',
    'Course scheduler'
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'course_scheduler',
    'Locations',
    'Show locations of courses'
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'course_scheduler',
    'SingleCourse',
    'Detail view of a single course'
);

// Add flexforms
$pluginSignatureList = 'coursescheduler_courses';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignatureList] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignatureList,
    // Flexform configuration schema file
    'FILE:EXT:course_scheduler/Configuration/FlexForms/List.xml'
);

$pluginSignatureDetail = 'coursescheduler_singlecourse';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignatureDetail] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignatureDetail,
    // Flexform configuration schema file
    'FILE:EXT:course_scheduler/Configuration/FlexForms/Detail.xml'
);
