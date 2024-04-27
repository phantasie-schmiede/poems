<?php
declare(strict_types=1);

namespace PSB\PsbPoems\Domain\Repository;

/*
 * This file is part of PSB Poems.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use PSB\PsbPoems\Domain\Model\Poem;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class PoemRepository
 *
 * @package PSB\PsbPoems\Domain\Repository
 */
class PoemRepository extends Repository
{
    protected $defaultOrderings = [
        'crdate' => QueryInterface::ORDER_DESCENDING,
    ];

    public function getPoemOfTheDay(int $offset): ?Poem
    {
        $query = $this->createQuery()
            ->setLimit(1)
            ->setOffset($offset);

        return $query->execute()
            ->getFirst();
    }
}
