<?php
namespace Rintisch\CourseScheduler\Domain\Model;


/***
 *
 * This file is part of the "Weekly Course Scheduler" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 Gerald Rintisch <gerald.rintisch@posteo.de>, Rintisch
 *
 ***/
/**
 * A single course
 */
class Course extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * Title of course
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $title = '';

    /**
     * Describes course in short
     *
     * @var string
     */
    protected $teaser = '';

    /**
     * Long description of course
     *
     * @var string
     */
    protected $description = '';

    /**
     * Additional notes
     *
     * @var string
     */
    protected $notes = '';

    /**
     * Clock time when the course starts
     *
     * @var int
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $startTime = 0;

    /**
     * Clock time when the course ends
     *
     * @var int
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $endTime = 0;

    /**
     * Date when the course starts
     *
     * @var \DateTime
     */
    protected $startDate = null;

    /**
     * Date when the course ends
     *
     * @var \DateTime
     */
    protected $endDate = null;

    /**
     * Category of event
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $category = null;

    /**
     * Conditions which must be fulfilled by participants personally
     *
     * @var string
     */
    protected $accessConditions = '';

    /**
     * Terms and conditions which must be fulfilled
     *
     * @var int
     */
    protected $participationConditions = 0;

    /**
     * Image of course
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;

    /**
     * Files of course
     *
     * @var string
     */
    protected $files = '';

    /**
     * location
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Rintisch\CourseScheduler\Domain\Model\Location>
     */
    protected $location = null;

    /**
     * tag
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Rintisch\CourseScheduler\Domain\Model\Tag>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $tag = null;

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
        $this->location = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->tag = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->category = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the teaser
     *
     * @return string $teaser
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * Sets the teaser
     *
     * @param string $teaser
     * @return void
     */
    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the notes
     *
     * @return string $notes
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Sets the notes
     *
     * @param string $notes
     * @return void
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * Returns the startTime
     *
     * @return int $startTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Sets the startTime
     *
     * @param int $startTime
     * @return void
     */
    public function setStartTime(int $startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * Returns the endTime
     *
     * @return int $endTime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Sets the endTime
     *
     * @param int $endTime
     * @return void
     */
    public function setEndTime(int $endTime)
    {
        $this->endTime = $endTime;
    }

    /**
     * Returns the startDate
     *
     * @return \DateTime $startDate
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Sets the startDate
     *
     * @param \DateTime $startDate
     * @return void
     */
    public function setStartDate(\DateTime $startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * Returns the endDate
     *
     * @return \DateTime $endDate
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Sets the endDate
     *
     * @param \DateTime $endDate
     * @return void
     */
    public function setEndDate(\DateTime $endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * Returns the accessConditions
     *
     * @return string $accessConditions
     */
    public function getAccessConditions()
    {
        return $this->accessConditions;
    }

    /**
     * Sets the accessConditions
     *
     * @param string $accessConditions
     * @return void
     */
    public function setAccessConditions($accessConditions)
    {
        $this->accessConditions = $accessConditions;
    }

    /**
     * Returns the participationConditions
     *
     * @return int $participationConditions
     */
    public function getParticipationConditions()
    {
        return $this->participationConditions;
    }

    /**
     * Sets the participationConditions
     *
     * @param int $participationConditions
     * @return void
     */
    public function setParticipationConditions($participationConditions)
    {
        $this->participationConditions = $participationConditions;
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Returns the files
     *
     * @return string $files
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * Sets the files
     *
     * @param string $files
     * @return void
     */
    public function setFiles($files)
    {
        $this->files = $files;
    }

    /**
     * Adds a Location
     *
     * @param \Rintisch\CourseScheduler\Domain\Model\Location $location
     * @return void
     */
    public function addLocation(\Rintisch\CourseScheduler\Domain\Model\Location $location)
    {
        $this->location->attach($location);
    }

    /**
     * Removes a Location
     *
     * @param \Rintisch\CourseScheduler\Domain\Model\Location $locationToRemove The Location to be removed
     * @return void
     */
    public function removeLocation(\Rintisch\CourseScheduler\Domain\Model\Location $locationToRemove)
    {
        $this->location->detach($locationToRemove);
    }

    /**
     * Returns the location
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Rintisch\CourseScheduler\Domain\Model\Location> $location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Sets the location
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Rintisch\CourseScheduler\Domain\Model\Location> $location
     * @return void
     */
    public function setLocation(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $location)
    {
        $this->location = $location;
    }

    /**
     * Adds a Tag
     *
     * @param \Rintisch\CourseScheduler\Domain\Model\Tag $tag
     * @return void
     */
    public function addTag(\Rintisch\CourseScheduler\Domain\Model\Tag $tag)
    {
        $this->tag->attach($tag);
    }

    /**
     * Removes a Tag
     *
     * @param \Rintisch\CourseScheduler\Domain\Model\Tag $tagToRemove The Tag to be removed
     * @return void
     */
    public function removeTag(\Rintisch\CourseScheduler\Domain\Model\Tag $tagToRemove)
    {
        $this->tag->detach($tagToRemove);
    }

    /**
     * Returns the tag
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Rintisch\CourseScheduler\Domain\Model\Tag> $tag
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Sets the tag
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Rintisch\CourseScheduler\Domain\Model\Tag> $tag
     * @return void
     */
    public function setTag(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $tag)
    {
        $this->tag = $tag;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $category
     */
    public function addCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $category)
    {
        $this->category->attach($category);
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $categoryToRemove
     */
    public function removeCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $categoryToRemove)
    {
        $this->category->detach($categoryToRemove);
    }

    /**
     * Returns the category
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets the category
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $category Category
     *
     * @return void
     */
    public function setCategory(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $category)
    {
        $this->category = $category;
    }
}
