<?php

declare(strict_types=1);

/*
 * This file is part of PSBits Poems.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSBits\Poems\Domain\Repository;

use PSBits\Poems\Domain\Model\Category;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class CategoryRepository
 *
 * @extends Repository<Category>
 * @package PSBits\Poems\Domain\Repository
 */
class CategoryRepository extends Repository
{
    protected $defaultOrderings = [
        'name' => QueryInterface::ORDER_ASCENDING,
    ];
}
