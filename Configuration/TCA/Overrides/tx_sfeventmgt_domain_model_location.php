<?php

defined('TYPO3_MODE') or die();

$fields = [
    'abbreviation' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:course_scheduler/Resources/Private/Language/locallang_db.xlf:tx_sfeventmgt_domain_model_location.abbreviation',
        'config' => [
            'type' => 'input',
            'size' => 30,
            'eval' => 'trim'
        ],
    ],
    'auto_geocode'=> [
        'exclude' => 1,
        'label' => 'LLL:EXT:course_scheduler/Resources/Private/Language/locallang_db.xlf:tx_sfeventmgt_domain_model_location.autoGeocode',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'items' => [
                '0' => [
                    '0' => '',
                    '1' => '',
                    'labelChecked' => 'Enabled',
                    'labelUnchecked' => 'Disabled',
                ],
            ],
            'default' => '1',
        ],
    ],
    'image' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:course_scheduler/Resources/Private/Language/locallang_db.xlf:tx_sfeventmgt_domain_model_location.image',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'image',
            [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                ],
                'foreign_types' => [
                    '0' => [
                        'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                        'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                    ],
                ],
                'foreign_match_fields' => [
                    'fieldname' => 'image',
                    'tablenames' => 'tx_coursescheduler_domain_model_location',
                    'table_local' => 'sys_file',
                ],
                'maxitems' => 1
            ],
            $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
        ),
    ]
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_sfeventmgt_domain_model_location', $fields);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_sfeventmgt_domain_model_location',
    'abbreviation',
    '',
    'after:title'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_sfeventmgt_domain_model_location',
    'image',
    '',
    'after:description'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_sfeventmgt_domain_model_location',
    'auto_geocode',
    '',
    'before:latitude'
);
