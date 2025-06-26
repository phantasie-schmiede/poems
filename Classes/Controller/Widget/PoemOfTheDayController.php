<?php
declare(strict_types=1);

namespace PSBits\Poems\Controller\Widget;

/*
 * This file is part of PSBits Poems.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use DateTime;
use PSBits\Foundation\Attribute\PluginAction;
use PSBits\Poems\Domain\Model\Poem;
use PSBits\Poems\Domain\Repository\PoemRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class PoemController
 *
 * @package PSBits\Poems\Controller\Widget
 */
class PoemOfTheDayController extends ActionController
{
    public function __construct(
        protected readonly PoemRepository $poemRepository,
    ) {
    }

    #[PluginAction(default: true)]
    public function showAction(): ResponseInterface
    {
        $this->view->assign('poem', $this->getPoemOfTheDay());

        return $this->htmlResponse();
    }

    /**
     * Get number of days since 2024-01-01.
     */
    private function getNumberOfDays(): int
    {
        $now = new DateTime();
        $base = new DateTime('2024-01-01');
        $diff = $now->diff($base);

        return (int)$diff->format('%a');
    }

    private function getPoemOfTheDay(): ?Poem
    {
        $numberOfPoems = $this->poemRepository->countAll();

        if (0 === $numberOfPoems) {
            return null;
        }

        $offset = $this->getNumberOfDays() % $numberOfPoems;

        return $this->poemRepository->getPoemOfTheDay($offset);
    }
}
