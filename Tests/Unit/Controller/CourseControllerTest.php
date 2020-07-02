<?php
namespace Rintisch\CourseScheduler\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Gerald Rintisch <gerald.rintisch@posteo.de>
 */
class CourseControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Rintisch\CourseScheduler\Controller\CourseController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Rintisch\CourseScheduler\Controller\CourseController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllCoursesFromRepositoryAndAssignsThemToView()
    {

        $allCourses = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $courseRepository = $this->getMockBuilder(\Rintisch\CourseScheduler\Domain\Repository\CourseRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $courseRepository->expects(self::once())->method('findAll')->will(self::returnValue($allCourses));
        $this->inject($this->subject, 'courseRepository', $courseRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('courses', $allCourses);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenCourseToView()
    {
        $course = new \Rintisch\CourseScheduler\Domain\Model\Course();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('course', $course);

        $this->subject->showAction($course);
    }
}
