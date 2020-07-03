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
    protected $courseStartTime = 0;

    /**
     * Clock time when the course ends
     *
     * @var int
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $courseEndTime = 0;

    /**
     * Date when the course starts
     *
     * @var \DateTime
     */
    protected $courseStartDate = null;

    /**
     * Date when the course ends
     *
     * @var \DateTime
     */
    protected $courseEndDate = null;

    /**
     * Activity category of course
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $activityCategory = null;


    /**
     * Level category of course
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $levelCategory = null;


    /**
     * Access category of course
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $accessCategory = null;

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
        $this->accessCategory = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->activityCategory = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->levelCategory = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the courseStartTime
     *
     * @return int $courseStartTime
     */
    public function getCourseStartTime()
    {
        return $this->courseStartTime;
    }

    /**
     * Sets the courseStartTime
     *
     * @param int $courseStartTime
     * @return void
     */
    public function setCourseStartTime(int $courseStartTime)
    {
        $this->courseStartTime = $courseStartTime;
    }

    /**
     * Returns the courseEndTime
     *
     * @return int $courseEndTime
     */
    public function getCourseEndTime()
    {
        return $this->courseEndTime;
    }

    /**
     * Sets the courseEndTime
     *
     * @param int $courseEndTime
     * @return void
     */
    public function setCourseEndTime(int $courseEndTime)
    {
        $this->courseEndTime = $courseEndTime;
    }

    /**
     * Returns the courseStartDate
     *
     * @return \DateTime $courseStartDate
     */
    public function getCourseStartDate()
    {
        return $this->courseStartDate;
    }

    /**
     * Sets the courseStartDate
     *
     * @param \DateTime $courseStartDate
     * @return void
     */
    public function setCourseStartDate(\DateTime $courseStartDate)
    {
        $this->courseStartDate = $courseStartDate;
    }

    /**
     * Returns the courseEndDate
     *
     * @return \DateTime $courseEndDate
     */
    public function getCourseEndDate()
    {
        return $this->courseEndDate;
    }

    /**
     * Sets the courseEndDate
     *
     * @param \DateTime $courseEndDate
     * @return void
     */
    public function setCourseEndDate(\DateTime $courseEndDate)
    {
        $this->courseEndDate = $courseEndDate;
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
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $activityCategory
     */
    public function addActivityCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $activityCategory)
    {
        $this->activityCategory->attach($activityCategory);
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $activityCategoryToRemove
     */
    public function removeActivityCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $activityCategoryToRemove)
    {
        $this->activityCategory->detach($activityCategoryToRemove);
    }

    /**
     * Returns the activity category
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getActivityCategory()
    {
        return $this->activityCategory;
    }

    /**
     * Sets the activity category
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $activityCategory Category
     *
     * @return void
     */
    public function setActivityCategory(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $activityCategory)
    {
        $this->activityCategory = $activityCategory;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $levelCategory
     */
    public function addLevelCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $levelCategory)
    {
        $this->levelCategory->attach($levelCategory);
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $levelCategoryToRemove
     */
    public function removeLevelCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $levelCategoryToRemove)
    {
        $this->levelCategory->detach($levelCategoryToRemove);
    }

    /**
     * Returns the activity category
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getLevelCategory()
    {
        return $this->levelCategory;
    }

    /**
     * Sets the activity category
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $levelCategory Category
     *
     * @return void
     */
    public function setLevelCategory(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $levelCategory)
    {
        $this->levelCategory = $levelCategory;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $accessCategory
     */
    public function addAccessCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $accessCategory)
    {
        $this->accessCategory->attach($accessCategory);
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $accessCategoryToRemove
     */
    public function removeAccessCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $accessCategoryToRemove)
    {
        $this->accessCategory->detach($accessCategoryToRemove);
    }

    /**
     * Returns the activity category
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getAccessCategory()
    {
        return $this->accessCategory;
    }

    /**
     * Sets the activity category
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $accessCategory Category
     *
     * @return void
     */
    public function setAccessCategory(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $accessCategory)
    {
        $this->accessCategory = $accessCategory;
    }
}
