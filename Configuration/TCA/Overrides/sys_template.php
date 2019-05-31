<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */
defined('TYPO3_MODE') or die();

(static function () {
    \PSB\PsbFoundation\Utilities\TypoScriptUtility::registerTypoScript(\PSB\PsbPoems\Data\ExtensionInformation::EXTENSION_KEY);
})();
