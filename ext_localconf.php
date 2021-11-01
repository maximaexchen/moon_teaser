<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Moon.MoonTeaser',
    'Pi1',
    array(
        'Teaser' => 'list',
    ),
    // non-cacheable actions
    array(

    )
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:moon_teaser/Configuration/TypoScript/TSconfig/Page.ts" >'
);

if (TYPO3_MODE === 'BE') {
    $icons = [
        /*'ext-news-tag' => 'news_domain_model_tag.svg',
        'ext-news-link' => 'news_domain_model_link.svg'*/
        'ext-moonteaser-wizard-icon' => 'user_plugin_teaser.svg'
    ];
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    foreach ($icons as $identifier => $path) {
        $iconRegistry->registerIcon(
            $identifier,
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:moon_teaser/Resources/Public/Icons/' . $path]
        );
    }
}