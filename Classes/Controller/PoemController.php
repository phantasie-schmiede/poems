<?php
declare(strict_types=1);

namespace PSB\PsbPoems\Controller;

/*
 * This file is part of PSB Poems.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use PSB\PsbFoundation\Attribute\PluginAction;
use PSB\PsbPoems\Domain\Repository\AuthorRepository;
use PSB\PsbPoems\Domain\Repository\CategoryRepository;
use PSB\PsbPoems\Domain\Repository\LanguageRepository;
use PSB\PsbPoems\Domain\Repository\PoemRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class PoemController
 *
 * @package PSB\PsbPoems\Controller
 */
class PoemController extends ActionController
{
    public function __construct(
        protected readonly AuthorRepository   $authorRepository,
        protected readonly CategoryRepository $categoryRepository,
        protected readonly LanguageRepository $languageRepository,
        protected readonly PoemRepository     $poemRepository,
    ) {
    }

    #[PluginAction(default: true, uncached: true)]
    public function listAction(): ResponseInterface
    {
        $authors = $this->authorRepository->findAll();
        $categories = $this->categoryRepository->findAll();
        $languages = $this->languageRepository->findAll();
        $poems = $this->poemRepository->findAll()->toArray();

        shuffle($poems);

        $this->view->assignMultiple([
            'authors'    => $authors,
            'categories' => $categories,
            'languages'  => $languages,
            'poems'      => $poems,
        ]);

        return $this->htmlResponse();
    }
}
