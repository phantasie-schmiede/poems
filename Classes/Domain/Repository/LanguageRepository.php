<?php
declare(strict_types=1);

namespace PSBits\Poems\Domain\Repository;

/*
 * This file is part of PSBits Poems.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use PSBits\Poems\Domain\Model\Language;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class LanguageRepository
 *
 * @extends Repository<Language>
 * @package PSBits\Poems\Domain\Repository
 */
class LanguageRepository extends Repository
{
    protected $defaultOrderings = [
        'name' => QueryInterface::ORDER_ASCENDING,
    ];
}
