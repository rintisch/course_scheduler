<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_coursescheduler_domain_model_course', 'EXT:course_scheduler/Resources/Private/Language/locallang_csh_tx_coursescheduler_domain_model_course.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_coursescheduler_domain_model_course');

    }
);
