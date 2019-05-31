<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */
defined('TYPO3_MODE') or die();

call_user_func(
    static function ($extensionKey) {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            $extensionKey,
            'poems',
            'LLL:EXT:'.$extensionKey.'/Resources/Private/Language/Backend/Configuration/TCA/Overrides/tt_content.xlf:plugin.poems.title'
        );
    },
    \PSB\PsbPoems\Data\ExtensionInformation::EXTENSION_KEY
);
