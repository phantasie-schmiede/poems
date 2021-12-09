<?php
declare(strict_types=1);

namespace PSB\PsbPoems\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014-2019 Daniel Ablass <dn@phantasie-schmiede.de>, PSbits
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use PSB\PsbFoundation\Annotation\Tca;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class Poem
 * @package                      PSB\PsbPoems\Domain\Model
 * @Tca\Ctrl(label="title", searchFields="title, text")
 */
class Poem extends AbstractEntity
{
    /**
     * @var ObjectStorage<Author>
     * @Tca\Mm(linkedModel=Author::class, mm="tx_psbpoems_poem_author_mm")
     */
    protected $authors;

    /**
     * @var ObjectStorage<Category>
     * @Tca\Mm(linkedModel=Category::class, mm="tx_psbpoems_poem_category_mm")
     */
    protected $categories;

    /**
     * @var ObjectStorage<Language>
     * @Tca\Mm(linkedModel=Language::class, mm="tx_psbpoems_poem_language_mm")
     */
    protected $languages;

    /**
     * @var string
     * @TCA\Text()
     */
    protected $text = '';

    /**
     * @var string
     * @TCA\Input()
     */
    protected $title = '';

    public function __construct()
    {
        $this->authors = new ObjectStorage();
        $this->categories = new ObjectStorage();
        $this->languages = new ObjectStorage();
    }

    /**
     * @return ObjectStorage
     */
    public function getAuthors(): ObjectStorage
    {
        return $this->authors;
    }

    /**
     * @param ObjectStorage $authors
     */
    public function setAuthors(ObjectStorage $authors): void
    {
        $this->authors = $authors;
    }

    /**
     * @return ObjectStorage
     */
    public function getCategories(): ObjectStorage
    {
        return $this->categories;
    }

    /**
     * @param ObjectStorage $categories
     */
    public function setCategories(ObjectStorage $categories): void
    {
        $this->categories = $categories;
    }

    /**
     * @return ObjectStorage
     */
    public function getLanguages(): ObjectStorage
    {
        return $this->languages;
    }

    /**
     * @param ObjectStorage $languages
     */
    public function setLanguages(ObjectStorage $languages): void
    {
        $this->languages = $languages;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}
