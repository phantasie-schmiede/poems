<?php
declare(strict_types=1);

namespace PSB\PsbPoems\Data;

use PSB\PsbFoundation\Data\AbstractExtensionInformation;
use PSB\PsbFoundation\Data\PluginConfiguration;
use PSB\PsbPoems\Controller\PoemController;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/*
 * This file is part of PSB Poems.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

/**
 * Class ExtensionInformation
 *
 * @package PSB\PsbPoems\Data
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
                    PoemController::class,
                ],
                name       : 'Poems',
            )
        );
    }
}
