<?php
declare(strict_types=1);

namespace PSB\PsbPoems\Controller\Widget;

/*
 * This file is part of PSB Poems.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use DateTime;
use PSB\PsbFoundation\Attribute\PluginAction;
use PSB\PsbPoems\Domain\Model\Poem;
use PSB\PsbPoems\Domain\Repository\PoemRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use function count;

/**
 * Class PoemController
 *
 * @package PSB\PsbPoems\Controller\Widget
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

        return (int)$diff->format('%a'); // 735330 days
    }

    private function getPoemOfTheDay(): ?Poem
    {
        $poems = $this->poemRepository->findAll()
            ->toArray();
        $count = count($poems);

        if (0 === $count) {
            return null;
        }

        $index = $this->getNumberOfDays() % count($poems);

        return $poems[$index];
    }
}
