<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

// Configure new fields:
$fields = array(
    'tx_moonteaser_title' => array(
        'exclude' => 0,
        'label' => 'LLL:EXT:moon_teaser/Resources/Private/Language/locallang_db.xlf:pages.tx_moonteaser_title',
        'placeholder' => 'TITLE',
        'config' => array(
            'type' => 'input',
            'placeholder' => '__row|title',
            'mode' => 'useOrOverridePlaceholder',
            'size' => '30',
            'eval' => 'trim'
        )
    ),
    'tx_moonteaser_sub_title' => array(
        'exclude' => 0,
        'label' => 'LLL:EXT:moon_teaser/Resources/Private/Language/locallang_db.xlf:pages.tx_moonteaser_sub_title',
        'config' => array(
            'type' => 'text',
            'placeholder' => '__row|subheader',
            'mode' => 'useOrOverridePlaceholder',
            'cols' => '30',
            'rows' => '2',
            'eval' => 'trim'
        )
    ),
    'tx_moonteaser_description' => array(
        'exclude' => 0,
        'label' => 'LLL:EXT:moon_teaser/Resources/Private/Language/locallang_db.xlf:pages.tx_moonteaser_description',
        'config' => array(
            'type' => 'text',
            'mode' => 'useOrOverridePlaceholder',
            'cols' => '20',
            'rows' => '2',
            'eval' => 'trim'
        ),
        'defaultExtras' => 'richtext[]'
    ),
    'tx_moonteaser_css_class' => array(
        'exclude' => 1,
        'label'   => 'Bereichsfarbe',
        'config' => array(
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items'=>array(
                array('Standard','standard'),
                array('Ort der Begegnung','ort-der-begegnung'),
                array('Events','events'),
                array('Wohnen','wohnen'),
                array('Für Kinder','fuer-kinder'),
                array('Das Hofeben','das-hofleben'),
                array('Termine','termine'),
            ),
            'size' => 1,
            'minitems' => 0,
            'maxitems' => 1,
        )
    ),
    /*'tx_moonteaser_image' => array(
        'exclude' => 0,
        'label' => 'LLL:EXT:moon_teaser/Resources/Private/Language/locallang_db.xlf:pages.tx_moonteaser_image',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'tx_moonteaser_image',
            array(
                'maxitems' => 1,
                'appearance' => array(
                    'fileUploadAllowed' => FALSE,
                ),
                'behaviour' =>  array(
                    'allowLanguageSynchronization' => TRUE,
                ),
            ),
            $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
        ),
    ),*/
    'tx_moonteaser_image' => [
        'exclude' => true,
        'label' => 'LLL:EXT:moon_teaser/Resources/Private/Language/locallang_db.xlf:pages.tx_moonteaser_image',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'tx_moonteaser_image',
            [
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
                'appearance' => [
                    'createNewRelationLinkTitle' => 'ADD',
                    'showPossibleLocalizationRecords' => true,
                    'showRemovedLocalizationRecords' => true,
                    'showAllLocalizationLink' => true,
                    'showSynchronizationLink' => true
                ],
                'foreign_match_fields' => [
                    'fieldname' => 'tx_moonteaser_image',
                    'tablenames' => 'pages',
                    'table_local' => 'sys_file',
                ],
            ],
            $GLOBALS['TYPO3_CONF_VARS']['SYS']['mediafile_ext']
        )
    ],
    'tx_moonteaser_icon' => array(
        'exclude' => 0,
        'label' => 'LLL:EXT:moon_teaser/Resources/Private/Language/locallang_db.xlf:pages.tx_moonteaser_icon',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'tx_moonteaser_icon',
            array(
                'maxitems' => 1,
                'appearance' => array(
                    'useSortable' => TRUE,
                    'fileUploadAllowed' => FALSE,
                    'headerThumbnail' => array(
                        'field' => 'uid_local',
                        'width' => '45',
                        'height' => '45',
                    ),
                ),
            ),
            $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
        ),
    ),
    'tx_moonteaser_hidden' => array(
        'exclude' => 0,
        'label'   => 'Ausgeblendet / Versteckt',
        'config'  => array(
            'type'    => 'check',
            'default' => '0'
        )
    ),
    'tx_moonteaser_content' => array(
        'exclude' => 0,
        'label'   => 'Enthält Inhaltselement',
        'config' => array(
            'type' => 'group',
            'internal_type' => 'db',
            'allowed' => 'tt_content',
            'size' => 1,
            'minitems' => 0,
            'maxitems' => 1,
        )
    ),
);

// Add new fields to pages
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $fields);


// Make fields visible in the TCEforms:
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages', // Table name
    '--div--;LLL:EXT:moon_teaser/Resources/Private/Language/locallang_db.xlf:pages.palette_title;;;;1-1-1,tx_moonteaser_title,tx_moonteaser_sub_title,tx_moonteaser_description,tx_moonteaser_css_class,tx_moonteaser_image,tx_moonteaser_icon,tx_moonteaser_hidden,tx_moonteaser_content', // Field list to add
    '', // List of specific types to add the field list to. (If empty, all type entries are affected)
    '' // Insert fields before (default) or after one, or replace a field
);

// Add the new palette:
$GLOBALS['TCA']['pages']['palettes']['tx_moonteaser'] = array(
    'showitem' => 'tx_moonteaser_title,tx_moonteaser_sub_title,tx_moonteaser_description,tx_moonteaser_css_class,tx_moonteaser_image,tx_moonteaser_icon,tx_moonteaser_hidden,tx_moonteaser_content'
);

$rootLineFields = &$GLOBALS["TYPO3_CONF_VARS"]["FE"]["addRootLineFields"];
if (trim($rootLineFields) != "") $rootLineFields .= ',';
$rootLineFields .= 'tx_moonteaser_css_class, tx_moonteaser_image';

$GLOBALS['TYPO3_CONF_VARS']['FE']['pageOverlayFields'] .= ',tx_moonteaser_image ';
$GLOBALS['TCA']['pages']['columns']['tx_moonteaser_image']['l10n_mode'] = 'exclude';
