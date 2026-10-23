<?php

declare(strict_types=1);

/*
 * This file is part of PSBits Poems.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSBits\Poems\Domain\Model;

use PSBits\Foundation\Attribute\TCA\ColumnType\Input;
use PSBits\Foundation\Attribute\TCA\Ctrl;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class Category
 *
 * @package PSBits\Poems\Domain\Model
 */
#[Ctrl(label: 'name', searchFields: ['name'])]
class Category extends AbstractEntity
{
    #[Input]
    protected string $name = '';

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
