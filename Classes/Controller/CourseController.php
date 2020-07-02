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
     * @param \Rintisch\CourseScheduler\Domain\Repository\CourseRepository $courseRepository
     */
    public function injectCourseRepository(\Rintisch\CourseScheduler\Domain\Repository\CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $courses = $this->courseRepository->findAll();
        $this->view->assign('courses', $courses);
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
