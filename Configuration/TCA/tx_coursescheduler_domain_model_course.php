<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:course_scheduler/Resources/Private/Language/locallang_db.xlf:tx_coursescheduler_domain_model_course',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title,teaser,description,notes,access_conditions,files, category',
        'iconfile' => 'EXT:course_scheduler/Resources/Public/Icons/tx_coursescheduler_domain_model_course.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, teaser, description, notes, start_time, end_time, start_date, end_date, category, access_conditions, participation_conditions, image, files, location, tag',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, teaser, description, notes, start_time, end_time, start_date, end_date, category, access_conditions, participation_conditions, image, files, location, tag, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_coursescheduler_domain_model_course',
                'foreign_table_where' => 'AND {#tx_coursescheduler_domain_model_course}.{#pid}=###CURRENT_PID### AND {#tx_coursescheduler_domain_model_course}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:course_scheduler/Resources/Private/Language/locallang_db.xlf:tx_coursescheduler_domain_model_course.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'teaser' => [
            'exclude' => true,
            'label' => 'LLL:EXT:course_scheduler/Resources/Private/Language/locallang_db.xlf:tx_coursescheduler_domain_model_course.teaser',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],

        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:course_scheduler/Resources/Private/Language/locallang_db.xlf:tx_coursescheduler_domain_model_course.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],

        ],
        'notes' => [
            'exclude' => true,
            'label' => 'LLL:EXT:course_scheduler/Resources/Private/Language/locallang_db.xlf:tx_coursescheduler_domain_model_course.notes',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],

        ],
        'start_time' => [
            'exclude' => true,
            'label' => 'LLL:EXT:course_scheduler/Resources/Private/Language/locallang_db.xlf:tx_coursescheduler_domain_model_course.start_time',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 4,
                'eval' => 'time,required',
                'default' => time()
            ]
        ],
        'end_time' => [
            'exclude' => true,
            'label' => 'LLL:EXT:course_scheduler/Resources/Private/Language/locallang_db.xlf:tx_coursescheduler_domain_model_course.end_time',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 4,
                'eval' => 'time,required',
                'default' => time()
            ]
        ],
        'start_date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:course_scheduler/Resources/Private/Language/locallang_db.xlf:tx_coursescheduler_domain_model_course.start_date',
            'config' => [
                'dbType' => 'date',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date',
                'default' => null,
            ],
        ],
        'end_date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:course_scheduler/Resources/Private/Language/locallang_db.xlf:tx_coursescheduler_domain_model_course.end_date',
            'config' => [
                'dbType' => 'date',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date',
                'default' => null,
            ],
        ],
        'access_conditions' => [
            'exclude' => true,
            'label' => 'LLL:EXT:course_scheduler/Resources/Private/Language/locallang_db.xlf:tx_coursescheduler_domain_model_course.access_conditions',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'participation_conditions' => [
            'exclude' => true,
            'label' => 'LLL:EXT:course_scheduler/Resources/Private/Language/locallang_db.xlf:tx_coursescheduler_domain_model_course.participation_conditions',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'image' => [
            'exclude' => true,
            'label' => 'LLL:EXT:course_scheduler/Resources/Private/Language/locallang_db.xlf:tx_coursescheduler_domain_model_course.image',
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
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ]
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'image',
                        'tablenames' => 'tx_coursescheduler_domain_model_course',
                        'table_local' => 'sys_file',
                    ],
                    'maxitems' => 1
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),

        ],
        'files' => [
            'exclude' => true,
            'label' => 'LLL:EXT:course_scheduler/Resources/Private/Language/locallang_db.xlf:tx_coursescheduler_domain_model_course.files',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'location' => [
            'exclude' => false,
            'label' => 'LLL:EXT:course_scheduler/Resources/Private/Language/locallang_db.xlf:tx_coursescheduler_domain_model_course.location',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_coursescheduler_domain_model_location',
                'MM' => 'tx_coursescheduler_course_location_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],

        ],
        'tag' => [
            'exclude' => false,
            'label' => 'LLL:EXT:course_scheduler/Resources/Private/Language/locallang_db.xlf:tx_coursescheduler_domain_model_course.tag',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_coursescheduler_domain_model_tag',
                'MM' => 'tx_coursescheduler_course_tag_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],

        ],

    ],
];
