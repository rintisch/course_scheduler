<?php
namespace Rintisch\CourseScheduler\Domain\Model;

use TYPO3\CMS\Extbase\Annotation as Extbase;

/**
 * Location
 *
 */
class Location extends \DERHANSEN\SfEventMgt\Domain\Model\Location
{
    /**
     * Abbreviation of location name
     * @var string
     */
    protected string $abbreviation = '';

    /**
     * Image of location
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @Extbase\ORM\Lazy
     */
    protected $image;

    /**
     * Geocode location automatically when saving
     * @var bool
     */
    protected bool $autoGeocode = true;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->image = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * @return string
     */
    public function getAbbreviation(): string
    {
        return $this->abbreviation;
    }

    /**
     * @param string $abbreviation
     */
    public function setAbbreviation(string $abbreviation): void
    {
        $this->abbreviation = $abbreviation;
    }
    /**
     * Adds an image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image Image
     */
    public function addImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image->attach($image);
    }

    /**
     * Removes an image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $imageToRemove Image
     */
    public function removeImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $imageToRemove)
    {
        $this->image->detach($imageToRemove);
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $image Image
     */
    public function setImage(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $image)
    {
        $this->image = $image;
    }

    /**
     * @return bool
     */
    public function isAutoGeocode(): bool
    {
        return $this->autoGeocode;
    }

    /**
     * @param bool $autoGeocode
     */
    public function setAutoGeocode(bool $autoGeocode): void
    {
        $this->autoGeocode = $autoGeocode;
    }
}
