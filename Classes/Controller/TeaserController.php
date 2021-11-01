<?php
namespace Moon\MoonTeaser\Controller;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * TeaserController
 */
class TeaserController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * pagesRepository
     *
     * @var \Moon\MoonTeaser\Domain\Repository\PagesRepository
     * @inject
     */
    protected $pagesRepository = NULL;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        // Source
        $pages = array();

        // Nachfolgende Seiten
        if ($this->settings['source'] == "sub_pages")
        {
            // Wenn keine Seiten ausgewählt wurden, dann werden die nachfolgenden Seiten dargestellt
            $parent = $this->settings['pages'];

            if ($parent == "")
            {
                $parent = $GLOBALS['TSFE']->id;
            }

            $pages = $this->pagesRepository->findPages($parent);
        }

        // Ausgewählte Seiten
        if ($this->settings['source'] == "selected_pages" && $this->settings['pages'] != "") {
            $pages = $this->pagesRepository->findPages("", $this->settings['pages']);

        }

        /**
         * @var mixed $key
         * @var  $page
         */

        foreach ($pages as $key=>$page)
        {
            // bei einem Einsteigspunkt holt sich das System bei Bedarf die passenden Pendants
            if ($page->getMountPid()>0)
            {
                $origin=$this->pagesRepository->findPages("",$page->getMountPid());

                if (!$page->getTeaserImage()) $page->setTeaserImage($origin[0]->getTeaserImage());
                if (!$page->getTeaserTitle()) $page->setTeaserTitle($origin[0]->getTeaserTitle());
                if (!$page->getTeaserSubTitle()) $page->setTeaserSubTitle($origin[0]->getTeaserSubTitle());
                if (!$page->getTeaserDescription()) $page->setTeaserDescription($origin[0]->getTeaserDescription());
                if (!$page->getTitle()) $page->setTitle($origin[0]->getTitle());
                if (!$page->getSubTitle()) $page->setSubTitle($origin[0]->getSubTitle());
            }
        }

        $this->view->assign('active', $GLOBALS['TSFE']->id);
        $this->view->assign('pages', $pages);
        $this->view->assign('pageTitle', $GLOBALS['TSFE']->page['title']);
    }
}