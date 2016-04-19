<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

# ---------------------------------------------------------------------------
# Add static typoscript template files
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript',
    'BM Metaseo Test');

# ---------------------------------------------------------------------------
# New product page type
call_user_func(

    function ($extKey) {

        $productPageDoktype = 91;

        // Add new page type:
        $GLOBALS['PAGES_TYPES'][$productPageDoktype] = [
            'type' => 'web',
            'allowedTables' => '*',
        ];

        // Provide icon for page tree, list view, ... :
        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class)
            ->registerIcon(
                'apps-pagetree-productpage',
                TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
                [
                    'source' => 'EXT:' . $extKey . '/Resources/Public/Icons/Product.png'
                ]
            );

        // Allow backend users to drag and drop the new page type:
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
            'options.pageTree.doktypesToShowInNewPageDragArea := addToList(' . $productPageDoktype . ')'
        );
    },
    'bm_metaseotest'
);

