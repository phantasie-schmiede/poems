<?php
declare(strict_types=1);

namespace PSB\PsbPoems\Domain\Model;

/*
 * This file is part of PSB Poems.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use PSB\PsbFoundation\Attribute\TCA\ColumnType\Input;
use PSB\PsbFoundation\Attribute\TCA\Ctrl;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class Category
 *
 * @package PSB\PsbPoems\Domain\Model
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
