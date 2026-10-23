<?php

declare(strict_types=1);

/*
 * This file is part of PSBits Poems.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSBits\Poems\Tests\Unit\Data;

use PHPUnit\Framework\TestCase;
use PSBits\Foundation\Data\PluginConfiguration;
use PSBits\Poems\Controller\PoemController;
use PSBits\Poems\Controller\Widget\PoemOfTheDayController;
use PSBits\Poems\Data\ExtensionInformation;

final class ExtensionInformationTest extends TestCase
{
    public function testRegistersThePoemsPlugins(): void
    {
        $extensionInformation = new ExtensionInformation();

        self::assertSame([], $extensionInformation->getMainModules());

        $plugins = $extensionInformation->getPlugins();

        self::assertCount(2, $plugins);
        self::assertContainsOnlyInstancesOf(PluginConfiguration::class, $plugins);

        $poemOfTheDay = $plugins[0];
        self::assertSame('PoemOfTheDay', $poemOfTheDay->getName());
        self::assertSame([PoemOfTheDayController::class], $poemOfTheDay->getControllers());

        $poems = $plugins[1];
        self::assertSame('Poems', $poems->getName());
        self::assertSame([PoemController::class], $poems->getControllers());
    }
}
