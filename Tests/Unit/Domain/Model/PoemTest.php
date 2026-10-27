<?php

declare(strict_types=1);

/*
 * This file is part of PSBits Poems.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSBits\Poems\Tests\Unit\Domain\Model;

use PHPUnit\Framework\Attributes\Test;
use PSBits\Poems\Domain\Model\Author;
use PSBits\Poems\Domain\Model\Category;
use PSBits\Poems\Domain\Model\Language;
use PSBits\Poems\Domain\Model\Poem;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Class PoemTest
 *
 * @package PSBits\Poems\Tests\Unit\Domain\Model
 */
class PoemTest extends UnitTestCase
{
    #[Test]
    public function theConstructorInitializesEmptyRelationStorages(): void
    {
        $poem = new Poem();

        self::assertInstanceOf(ObjectStorage::class, $poem->getAuthors());
        self::assertInstanceOf(ObjectStorage::class, $poem->getCategories());
        self::assertInstanceOf(ObjectStorage::class, $poem->getLanguages());
        self::assertCount(0, $poem->getAuthors());
        self::assertCount(0, $poem->getCategories());
        self::assertCount(0, $poem->getLanguages());
    }

    #[Test]
    public function theRelationStoragesAreNotSharedBetweenInstances(): void
    {
        $first = new Poem();
        $second = new Poem();

        $author  = new Author();
        $author->setName('Rilke');
        $storage = new ObjectStorage();
        $storage->attach($author);
        $first->setAuthors($storage);

        self::assertSame($storage, $first->getAuthors());
        self::assertCount(0, $second->getAuthors());
    }

    #[Test]
    public function theSettersReplaceTheRelationStorages(): void
    {
        $poem = new Poem();

        $category = new Category();
        $category->setName('Love');
        $categories = new ObjectStorage();
        $categories->attach($category);
        $poem->setCategories($categories);

        $language = new Language();
        $language->setName('German');
        $languages = new ObjectStorage();
        $languages->attach($language);
        $poem->setLanguages($languages);

        self::assertSame('Love', $poem->getCategories()->toArray()[0]->getName());
        self::assertSame('German', $poem->getLanguages()->toArray()[0]->getName());
    }
}
