<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */
defined('TYPO3_MODE') or die();

call_user_func(
    static function ($extensionKey) {
        \PSB\PsbFoundation\Utilities\TypoScriptUtility::registerTypoScript($extensionKey);
    },
    'psb_poems'
);
