<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */
defined('TYPO3_MODE') or die();

(static function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        \PSB\PsbPoems\Data\ExtensionInformation::VENDOR_NAME.'.'.\PSB\PsbPoems\Data\ExtensionInformation::EXTENSION_KEY,
        'poems',
        [
            \PSB\PsbPoems\Controller\PoemController::CONTROLLER_NAME => 'list',
        ]
    );
})();
