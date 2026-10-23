<?php

declare(strict_types=1);

/*
 * This file is part of PSBits Poems.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSBits\Poems\Data;

use PSBits\Foundation\Data\AbstractExtensionInformation;
use PSBits\Foundation\Data\PluginConfiguration;
use PSBits\Poems\Controller\PoemController;
use PSBits\Poems\Controller\Widget\PoemOfTheDayController;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class ExtensionInformation
 *
 * @package PSBits\Poems\Data
 */
class ExtensionInformation extends AbstractExtensionInformation
{
    public function __construct()
    {
        parent::__construct();
        $this->addPlugin(
            GeneralUtility::makeInstance(
                PluginConfiguration::class,
                controllers: [
                    PoemOfTheDayController::class,
                ],
                name       : 'PoemOfTheDay',
            )
        );
        $this->addPlugin(
            GeneralUtility::makeInstance(
                PluginConfiguration::class,
                controllers: [
                    PoemController::class,
                ],
                name       : 'Poems',
            )
        );
    }
}
