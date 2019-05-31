<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */
defined('TYPO3_MODE') or die();

call_user_func(
    static function ($extensionKey) {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'PSB.'.$extensionKey,
            'poems',
            [
                'Poem' => 'list',
            ]
        );
    },
    'psb_poems'
);
