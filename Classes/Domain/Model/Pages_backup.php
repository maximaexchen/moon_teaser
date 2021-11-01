<?php
namespace Moon\MoonTeaser\Domain\Model;
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

class Pages extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * uid
     * @var int
     * @validate NotEmpty
     */
    protected $uid;

    /**
     * pid
     * @var int
     * @validate NotEmpty
     */
    protected $pid;

    /**
     * url
     * @var string
     *
     */
    protected $url;

    /**
     * doktype
     * @var int
     * @validate NotEmpty
     */
    protected $doktype;

    /**
     * mountPid
     * @var int
     * @validate NotEmpty
     */
    protected $mountPid;

    /**
     * sorting
     * @var int
     * @validate NotEmpty
     */
    protected $sorting;

    /**
     * title
     * @var string
     *
     */
    protected $title;

    /**
     * subtitle
     * @var string
     *
     */
    protected $subtitle;

    /**
     * teaserTitle
     * @var string
     *
     */
    protected $teaserTitle;

    /**
     * teaserSubTitle
     * @var string
     *
     */
    protected $teaserSubTitle;

    /**
     * teaserDescription
     * @var string
     *
     */
    protected $teaserDescription;

    /**
     * teaserImage
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $teaserImage;

    /**
     * teaserIcon
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $teaserIcon = NULL;

    /**
     * teaserHidden
     * @var int
     */
    protected $teaserHidden;

    /**
     * txGridelementsContainer
     * @var int
     */
    protected $txGridelementsContainer;

    /**
     * teaserContent
     * @var int
     */
    protected $teaserContent;

    /**
     * teaserContentRendered
     * @var string
     *
     */
    protected $teaserContentRendered;

    /**
     * teaserCssClass
     * @var string
     *
     */
    protected $teaserCssClass;

    /**
     * Returns the pid
     *
     * @return int $pid
     */
    public function getPid() {
        return $this->pid;
    }

    /**
     * Returns the teaserHidden
     *
     * @return int $teaserHidden
     */
    public function getTeaserHidden() {
        return $this->teaserHidden;
    }

    /**
     * Returns the txGridelementsContainer
     *
     * @return int $txGridelementsContainer
     */
    public function getTxGridelementsContainer() {
        return $this->txGridelementsContainer;
    }

    /**
     * Returns the teaserContent
     *
     * @return int $teaserContent
     */
    public function getTeaserContent() {
        return $this->teaserContent;
    }

    /**
     * Returns the teaserContentRendered
     *
     * @return string $teaserContentRendered
     */
    public function getTeaserContentRendered() {
        return $this->teaserContentRendered;
    }

    /**
     * Returns the sorting
     *
     * @return int $sorting
     */
    public function getSorting() {
        return $this->sorting;
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($teaserTitle) {
        $this->title = $title;
    }

    /**
     * Returns the subtitle
     *
     * @return string $subtitle
     */
    public function getSubtitle() {
        return $this->subtitle;
    }

    /**
     * Sets the subtitle
     *
     * @param string $subtitle
     * @return void
     */
    public function setSubtitle($subtitle) {
        $this->subtitle = $subtitle;
    }

    /**
     * Returns the teaserDescription
     *
     * @return string $teaserDescription
     */
    public function getTeaserDescription() {
        return $this->teaserDescription;
    }

    /**
     * Sets the teaserDescription
     *
     * @param string $teaserDescription
     * @return void
     */
    public function setTeaserDescription($teaserDescription) {
        $this->teaserDescription = $teaserDescription;
    }

    /**
     * Returns the teaserTitle
     *
     * @return string $teaserTitle
     */
    public function getTeaserTitle() {
        return $this->teaserTitle;
    }

    /**
     * Sets the teaserTitle
     *
     * @param string $teaserTitle
     * @return void
     */
    public function setTeaserTitle($teaserTitle) {
        $this->teaserTitle = $teaserTitle;
    }

    /**
     * Returns the teaserSubTitle
     *
     * @return string $teaserSubTitle
     */
    public function getTeaserSubTitle() {
        return $this->teaserSubTitle;
    }

    /**
     * Sets the teaserSubTitle
     *
     * @param string $teaserSubTitle
     * @return void
     */
    public function setTeaserSubTitle($teaserSubTitle) {
        $this->teaserSubTitle = $teaserSubTitle;
    }

    /**
     * Sets the teaserContentRendered
     *
     * @param string $teaserContentRendered
     * @return void
     */
    public function setTeaserContentRendered($teaserContentRendered) {
        $this->teaserContentRendered = $teaserContentRendered;
    }


    /**
     * Returns teaserImage
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $postpictures
     */
    public function getTeaserImage() {
        return $this->teaserImage;
    }

    /**
     * Sets the teaserImage
     *
     * @param string $teaserImage
     * @return void
     */
    public function setTeaserImage($teaserImage) {
        $this->teaserImage = $teaserImage;
    }

    /**
     * Returns the teaserIcon
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $teaserIcon
     */
    public function getTeaserIcon() {
        return $this->teaserIcon;
    }

    /**
     * Returns the teaserCssClass
     *
     * @return string $teaserCssClass
     */
    public function getTeaserCssClass() {
        return $this->teaserCssClass;
    }

    /**
     * Returns the url
     *
     * @return string url
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * Returns the doktype
     *
     * @return int doktype
     */
    public function getDoktype() {
        return $this->doktype;
    }

    /**
     * Returns the mountPid
     *
     * @return int mountPid
     */
    public function getMountPid() {
        return $this->mountPid;
    }
}
?>