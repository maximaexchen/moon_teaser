<?php
namespace Moon\MoonTeaser\Domain\Repository;

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
 *
 *
 * @package MoonTeaser
 *
 */
class PagesRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    protected $defaultOrderings = array("sorting"=> \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING);

    /**
     * @param string $pids
     * @param string $uids
     *
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findPages($pids="",$uids="")
    {

        $query = $this->createQuery();

        if ($uids!="")
        {
            $uidArray = GeneralUtility::intExplode(",",$uids);

            $query->matching(
                $query->logicalAnd(
                    $query->in('uid', $uidArray),
                    $query->equals('teaserHidden', 0),
                    $query->logicalNot($query->equals('doktype', 199))
                )
            );
        }
        elseif ($pids!="")
        {
            $pidArray= GeneralUtility::intExplode(",",$pids);
            $query->matching(
                $query->logicalAnd(
                    $query->in('pid', $pidArray),
                    $query->equals('teaserHidden', 0),
                    $query->logicalNot($query->equals('doktype', 199))
                )
            );
        }


        $query->getQuerySettings()->setRespectStoragePage(false);
        $pages = $query->execute(false);

        // Fallback auf Titel und UNtertitel des Menüpunktes
        foreach ($pages as $key=>$page)
        {
            if (!$page->getTeaserTitle())
            {
                $page->setTeaserTitle($page->getTitle());
            }
            if (!$page->getTeaserSubTitle())
            {
                $page->setTeaserSubTitle($page->getSubTitle());
            }
        }


        // Sortiert die Einträge nach der Reihenfolge aus der Flexform

        if ($uids!="")
        {
            $pagesSorted=array();
            foreach ($uidArray as $uid)
            {
                foreach ($pages as $key=>$page)
                {
                    if ($uid == $page->getUid())
                    {
                        $pagesSorted[] = $page;
                    }
                }
            }
            $pages=$pagesSorted;
        }

        return $pages;
    }
}
?>