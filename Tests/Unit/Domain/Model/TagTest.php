<?php
namespace Rintisch\CourseScheduler\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Gerald Rintisch <gerald.rintisch@posteo.de>
 */
class TagTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Rintisch\CourseScheduler\Domain\Model\Tag
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Rintisch\CourseScheduler\Domain\Model\Tag();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
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
}
