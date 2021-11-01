<?php
defined('TYPO3_MODE') or die();


/**
 * Add custom svg Icons
 */
if (TYPO3_MODE === 'BE') {
    $icons = [
        'ext-moonteaser-wizard-icon' => 'plugin_wizard.svg'
    ];
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    foreach ($icons as $identifier => $path) {
        $iconRegistry->registerIcon(
            $identifier,
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:moon_distribution/Resources/Public/Icons/' . $path]
        );
    }
}

/***************
 * Plugin
 */

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'moon_teaser',
    'Pi1',
    'Seiten Teaser'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['moonteaser_pi1'] = 'recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['moonteaser_pi1'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('moonteaser_pi1',
    'FILE:EXT:moon_teaser/Configuration/FlexForms/flexform_teaser.xml');

// TypoScript
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('moon_teaser', 'Configuration/TypoScript', 'Content Teaser');