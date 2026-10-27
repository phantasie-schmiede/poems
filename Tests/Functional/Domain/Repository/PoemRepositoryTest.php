<?php

declare(strict_types=1);

/*
 * This file is part of PSBits Poems.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSBits\Poems\Tests\Functional\Domain\Repository;

use PHPUnit\Framework\Attributes\Test;
use PSBits\Poems\Domain\Model\Poem;
use PSBits\Poems\Domain\Repository\PoemRepository;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

use function count;

/**
 * Class PoemRepositoryTest
 *
 * @package PSBits\Poems\Tests\Functional\Domain\Repository
 */
class PoemRepositoryTest extends FunctionalTestCase
{
    protected array $testExtensionsToLoad = [
        'typo3conf/ext/psbits/foundation',
        'typo3conf/ext/psbits/poems',
    ];

    #[Test]
    public function thePoemOfTheDayStartsWithTheNewestPoem(): void
    {
        $this->insertPoems();

        $poem = $this->getRepository()->getPoemOfTheDay(0);

        self::assertInstanceOf(Poem::class, $poem);
        self::assertSame(3, $poem->getUid());
        self::assertSame('Newest', $poem->getTitle());
    }

    #[Test]
    public function theOffsetSelectsPoemsInDescendingDateOrder(): void
    {
        $this->insertPoems();

        self::assertSame(2, $this->getRepository()->getPoemOfTheDay(1)->getUid());
        self::assertSame(1, $this->getRepository()->getPoemOfTheDay(2)->getUid());
    }

    #[Test]
    public function anOffsetBeyondTheLastPoemYieldsNull(): void
    {
        $this->insertPoems();

        self::assertNull($this->getRepository()->getPoemOfTheDay(3));
    }

    #[Test]
    public function anEmptyRepositoryYieldsNoPoemOfTheDay(): void
    {
        self::assertNull($this->getRepository()->getPoemOfTheDay(0));
        self::assertSame(0, $this->getRepository()->countAll());
    }

    private function getRepository(): PoemRepository
    {
        return GeneralUtility::makeInstance(PoemRepository::class);
    }

    private function insertPoems(): void
    {
        $connection = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getConnectionForTable('tx_poems_domain_model_poem');

        $poems = [
            [1, 1000, 'Oldest'],
            [2, 2000, 'Middle'],
            [3, 3000, 'Newest'],
        ];

        foreach ($poems as [$uid, $crdate, $title]) {
            $connection->insert('tx_poems_domain_model_poem', [
                'uid'       => $uid,
                'pid'       => 0,
                'crdate'    => $crdate,
                'text'      => $title . ' text',
                'title'     => $title,
                'deleted'   => 0,
                'hidden'    => 0,
                'starttime' => 0,
                'endtime'   => 0,
            ]);
        }

        self::assertSame(3, count($this->getRepository()->findAll()));
    }
}
