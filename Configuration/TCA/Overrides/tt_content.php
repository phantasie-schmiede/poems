<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */
defined('TYPO3_MODE') or die();

(static function () {
    $extensionInformation = \PSB\PsbFoundation\Utilities\ObjectUtility::get(\PSB\PsbPoems\Data\ExtensionInformation::class);
    \PSB\PsbFoundation\Utilities\Backend\RegistrationUtility::registerPlugins($extensionInformation);
})();
