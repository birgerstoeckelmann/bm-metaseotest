<?php

if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

# ---------------------------------------------------------------------------
# New product page type
call_user_func(

    function ($extKey, $table) {

        $extRelPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($extKey);
        $customPageIcon = $extRelPath . 'Resources/Public/Icons/Product.png';
        $productPageDoktype = 91;

        // Add new page type as possible select item:
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
            $table,
            'doktype',
            [
                'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang.xlf:product_page_type',
                $productPageDoktype,
                $customPageIcon
            ],
            '1',
            'after'
        );

        // Add icon for new page type:
        \TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule(
            $GLOBALS['TCA']['pages'],
            [
                'ctrl' => [
                    'typeicon_classes' => [
                        $productPageDoktype => 'apps-pagetree-productpage',
                    ],
                ],
            ]
        );
    },
    'bm_metaseotest',
    'pages'
);