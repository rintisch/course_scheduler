<?php
namespace Rintisch\CourseScheduler\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Gerald Rintisch <gerald.rintisch@posteo.de>
 */
class CourseTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Rintisch\CourseScheduler\Domain\Model\Course
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Rintisch\CourseScheduler\Domain\Model\Course();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTeaserReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTeaser()
        );
    }

    /**
     * @test
     */
    public function setTeaserForStringSetsTeaser()
    {
        $this->subject->setTeaser('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'teaser',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNotesReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNotes()
        );
    }

    /**
     * @test
     */
    public function setNotesForStringSetsNotes()
    {
        $this->subject->setNotes('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'notes',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCourseStartTimeReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getCourseStartTime()
        );
    }

    /**
     * @test
     */
    public function setCourseStartTimeForIntSetsCourseStartTime()
    {
        $this->subject->setCourseStartTime(12);

        self::assertAttributeEquals(
            12,
            'courseStartTime',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCourseEndTimeReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getCourseEndTime()
        );
    }

    /**
     * @test
     */
    public function setCourseEndTimeForIntSetsCourseEndTime()
    {
        $this->subject->setCourseEndTime(12);

        self::assertAttributeEquals(
            12,
            'courseEndTime',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCourseStartDateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getCourseStartDate()
        );
    }

    /**
     * @test
     */
    public function setCourseStartDateForDateTimeSetsCourseStartDate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setCourseStartDate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'courseStartDate',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCourseEndDateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getCourseEndDate()
        );
    }

    /**
     * @test
     */
    public function setCourseEndDateForDateTimeSetsCourseEndDate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setCourseEndDate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'courseEndDate',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCategoryReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getCategory()
        );
    }

    /**
     * @test
     */
    public function setCategoryForIntSetsCategory()
    {
        $this->subject->setCategory(12);

        self::assertAttributeEquals(
            12,
            'category',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAccessConditionsReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAccessConditions()
        );
    }

    /**
     * @test
     */
    public function setAccessConditionsForStringSetsAccessConditions()
    {
        $this->subject->setAccessConditions('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'accessConditions',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getParticipationConditionsReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getParticipationConditions()
        );
    }

    /**
     * @test
     */
    public function setParticipationConditionsForIntSetsParticipationConditions()
    {
        $this->subject->setParticipationConditions(12);

        self::assertAttributeEquals(
            12,
            'participationConditions',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getImageReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getImage()
        );
    }

    /**
     * @test
     */
    public function setImageForFileReferenceSetsImage()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImage($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'image',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFilesReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getFiles()
        );
    }

    /**
     * @test
     */
    public function setFilesForStringSetsFiles()
    {
        $this->subject->setFiles('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'files',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getLocationReturnsInitialValueForLocation()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getLocation()
        );
    }

    /**
     * @test
     */
    public function setLocationForObjectStorageContainingLocationSetsLocation()
    {
        $location = new \Rintisch\CourseScheduler\Domain\Model\Location();
        $objectStorageHoldingExactlyOneLocation = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneLocation->attach($location);
        $this->subject->setLocation($objectStorageHoldingExactlyOneLocation);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneLocation,
            'location',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addLocationToObjectStorageHoldingLocation()
    {
        $location = new \Rintisch\CourseScheduler\Domain\Model\Location();
        $locationObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $locationObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($location));
        $this->inject($this->subject, 'location', $locationObjectStorageMock);

        $this->subject->addLocation($location);
    }

    /**
     * @test
     */
    public function removeLocationFromObjectStorageHoldingLocation()
    {
        $location = new \Rintisch\CourseScheduler\Domain\Model\Location();
        $locationObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $locationObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($location));
        $this->inject($this->subject, 'location', $locationObjectStorageMock);

        $this->subject->removeLocation($location);
    }

    /**
     * @test
     */
    public function getTagReturnsInitialValueForTag()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getTag()
        );
    }

    /**
     * @test
     */
    public function setTagForObjectStorageContainingTagSetsTag()
    {
        $tag = new \Rintisch\CourseScheduler\Domain\Model\Tag();
        $objectStorageHoldingExactlyOneTag = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneTag->attach($tag);
        $this->subject->setTag($objectStorageHoldingExactlyOneTag);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneTag,
            'tag',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addTagToObjectStorageHoldingTag()
    {
        $tag = new \Rintisch\CourseScheduler\Domain\Model\Tag();
        $tagObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $tagObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($tag));
        $this->inject($this->subject, 'tag', $tagObjectStorageMock);

        $this->subject->addTag($tag);
    }

    /**
     * @test
     */
    public function removeTagFromObjectStorageHoldingTag()
    {
        $tag = new \Rintisch\CourseScheduler\Domain\Model\Tag();
        $tagObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $tagObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($tag));
        $this->inject($this->subject, 'tag', $tagObjectStorageMock);

        $this->subject->removeTag($tag);
    }
}
