<?php
namespace Rintisch\CourseScheduler\Controller;

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
 * CourseController
 */
class CourseController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * courseRepository
     *
     * @var \Rintisch\CourseScheduler\Domain\Repository\CourseRepository
     */
    protected $courseRepository = null;

    /**
     * @var \Rintisch\CourseScheduler\Service\TimetableService
     */
    protected $timetableService = null;

    /**
     * @param \Rintisch\CourseScheduler\Domain\Repository\CourseRepository $courseRepository
     */
    public function injectCourseRepository(\Rintisch\CourseScheduler\Domain\Repository\CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    /**
     * @param \Rintisch\CourseScheduler\Service\TimetableService $timetableService
     */
    public function injectTimetableService(\Rintisch\CourseScheduler\Service\TimetableService $timetableService)
    {
        $this->timetableService = $timetableService;
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $courses = $this->courseRepository->findAll();
        $coursesInWeekFormat = $this->timetableService->getTimetableArray($courses, $this->settings);
        $this->view->assign('courses', $coursesInWeekFormat);
    }

    /**
     * action show
     *
     * @param \Rintisch\CourseScheduler\Domain\Model\Course $course
     * @return void
     */
    public function showAction(\Rintisch\CourseScheduler\Domain\Model\Course $course)
    {
        $this->view->assign('course', $course);
    }
}
