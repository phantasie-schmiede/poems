<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */
defined('TYPO3_MODE') || die('Access denied.');

return call_user_func(
    static function () {
        return \PSB\PsbFoundation\Utilities\ObjectUtility::get(\PSB\PsbFoundation\Services\Configuration\TcaService::class,
            \PSB\PsbPoems\Domain\Model\Author::class)->buildFromDocComment()->getConfiguration();
    }
);
