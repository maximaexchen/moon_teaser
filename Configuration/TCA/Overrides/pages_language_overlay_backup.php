<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

// Configure new field:
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
    )
    // In this example, we assume that the custom checkbox is only used in the original language. So, no need to configure it here.
);

// Add new field to translated pages:
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages_language_overlay', $fields);

// Make fields visible in the TCEforms:
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages_language_overlay', // Table name
    '--div--;LLL:EXT:moon_teaser/Resources/Private/Language/locallang_db.xlf:pages.tx_moonteaser_title;;;;1-1-1,tx_moonteaser_title,tx_moonteaser_sub_title,tx_moonteaser_description,tx_moonteaser_image,tx_moonteaser_css_class,tx_moonteaser_icon,tx_moonteaser_hidden,tx_moonteaser_content', // Field list to add
    '', // List of specific types to add the field list to. (If empty, all type entries are affected)
    '' // Insert fields before (default) or after one, or replace a field
);

// Add the new palette:
$GLOBALS['TCA']['pages_language_overlay']['palettes']['tx_moonteaser'] = array(
    'showitem' => 'tx_moonteaser_title,tx_moonteaser_subtitle'
);