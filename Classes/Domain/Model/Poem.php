<?php
declare(strict_types=1);

namespace PSBits\Poems\Domain\Model;

/*
 * This file is part of PSBits Poems.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use PSBits\Foundation\Attribute\TCA\ColumnType\Input;
use PSBits\Foundation\Attribute\TCA\ColumnType\Select;
use PSBits\Foundation\Attribute\TCA\ColumnType\Text;
use PSBits\Foundation\Attribute\TCA\Ctrl;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class Poem
 *
 * @package PSBits\Poems\Domain\Model
 */
#[Ctrl(label: 'title', searchFields: [
    'text',
    'title',
])]
class Poem extends AbstractEntity
{
    /**
     * @var ObjectStorage<Author>
     */
    #[Select(linkedModel: Author::class, mm: 'tx_poems_poem_author_mm')]
    protected ObjectStorage $authors;

    /**
     * @var ObjectStorage<Category>
     */
    #[Select(linkedModel: Category::class, mm: 'tx_poems_poem_category_mm')]
    protected ObjectStorage $categories;

    /**
     * @var ObjectStorage<Language>
     */
    #[Select(linkedModel: Language::class, mm: 'tx_poems_poem_language_mm')]
    protected ObjectStorage $languages;

    #[Text]
    protected string $text = '';

    #[Input]
    protected string $title = '';

    public function __construct()
    {
        $this->initializeObject();
    }

    /**
     * @return ObjectStorage<Author>
     */
    public function getAuthors(): ObjectStorage
    {
        return $this->authors;
    }

    /**
     * @return ObjectStorage<Category>
     */
    public function getCategories(): ObjectStorage
    {
        return $this->categories;
    }

    /**
     * @return ObjectStorage<Language>
     */
    public function getLanguages(): ObjectStorage
    {
        return $this->languages;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    public function initializeObject(): void
    {
        $this->authors = new ObjectStorage();
        $this->categories = new ObjectStorage();
        $this->languages = new ObjectStorage();
    }

    /**
     * @param ObjectStorage<Author> $authors
     */
    public function setAuthors(ObjectStorage $authors): void
    {
        $this->authors = $authors;
    }

    /**
     * @param ObjectStorage<Category> $categories
     */
    public function setCategories(ObjectStorage $categories): void
    {
        $this->categories = $categories;
    }

    /**
     * @param ObjectStorage<Language> $languages
     */
    public function setLanguages(ObjectStorage $languages): void
    {
        $this->languages = $languages;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}
