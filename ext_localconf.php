<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */
defined('TYPO3_MODE') or die();

(static function () {
    $extensionInformation = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\PSB\PsbPoems\Data\ExtensionInformation::class);
    $registrationService = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\PSB\PsbFoundation\Service\Configuration\RegistrationService::class);
    $registrationService->configurePlugins($extensionInformation);
    \PSB\PsbFoundation\Utility\TypoScript\TypoScriptUtility::addDefaultTypoScriptForPluginsAndModules($extensionInformation);
})();
