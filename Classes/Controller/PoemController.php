<?php
namespace PS\PsPoems\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Daniel Ablass <dn@phantasie-schmiede.de>
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
class PoemController extends ActionController
{

    /**
     * @var \PS\PsPoems\Domain\Repository\PoemRepository
     * @inject
     */
    protected $poemRepository;

    /**
     * @var \PS\PsPoems\Domain\Repository\AuthorRepository
     * @inject
     */
    protected $authorRepository;

    /**
     * @var \PS\PsPoems\Domain\Repository\CategoryRepository
     * @inject
     */
    protected $categoryRepository;

    /**
     * @var \PS\PsPoems\Domain\Repository\LanguageRepository
     * @inject
     */
    protected $languageRepository;


    public function listAction()
    {
        $poems = $this->poemRepository->findAll();
        $authors = $this->authorRepository->findAll();
        $categories = $this->categoryRepository->findAll();
        $languages = $this->languageRepository->findAll();

        $this->view->assignMultiple(array(
            'poems'      => $poems,
            'authors'    => $authors,
            'categories' => $categories,
            'languages'  => $languages,
        ));
    }

}