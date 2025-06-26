<?php
declare(strict_types=1);

namespace PSBits\Poems\Controller;

/*
 * This file is part of PSBits Poems.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use PSBits\Foundation\Attribute\PluginAction;
use PSBits\Poems\Domain\Repository\AuthorRepository;
use PSBits\Poems\Domain\Repository\CategoryRepository;
use PSBits\Poems\Domain\Repository\LanguageRepository;
use PSBits\Poems\Domain\Repository\PoemRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class PoemController
 *
 * @package PSBits\Poems\Controller
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
