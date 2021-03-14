<?php

namespace Rintisch\CourseScheduler\Service;

/*
 * This file is part of the Extension "course_scheduler" for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use Rintisch\CourseScheduler\Domain\Model\Course;

class TimetableService
{


    /**
     * Seconds from midnight to midday ( = 12 * 60 * 60)
     * @var int
     */
    private $middayTime = 43200;

    /**
     * Array of a week, each day contains an array
     *
     * @var array[]
     */
    private $week = [
        'mon' => [],
        'tue' => [],
        'wed' => [],
        'thu' => [],
        'fri' => [],
        'sat' => [],
        'sun' => [],
    ];


    /**
     * Reorganise coures as array with structure
     * [
     *  'weekPriorToMidday' =>
     *      [
     *          'mon' => [..],
     *          'tue' => [..],
     *          ...
     *      ]
     * 'weekAfterMidday' =>
     *      [
     *          <see above>
     *      ]
     * ]
     * @param $courses
     * @param array $settings
     * @return mixed
     */
    public function getTimetableArray($courses, $settings)
    {
        $weekPriorToMidday = $this->week;
        $weekAfterMidday = $this->week;

        $now = new \DateTime('now');

        /** @var Course $course */
        foreach ($courses as $course) {
            if($course->getCourseEndDate() < $now){
                continue;
            }
            if ($course->getCourseStartTime() < $this->middayTime) {
                $this->findDayOfWeek($weekPriorToMidday, $course);
            } else {
                $this->findDayOfWeek($weekAfterMidday, $course);
            }
        }

        //remove days if set
        $daysToRemoveIfEmpty = explode(',', $settings['timetable']['daysToRemoveIfEmpty']);

        // remove
        foreach($daysToRemoveIfEmpty as $daysToRemoveIfEmpty) {
            if(empty($weekPriorToMidday[$daysToRemoveIfEmpty])){
            unset($weekPriorToMidday[$daysToRemoveIfEmpty]);
            }

            if(empty($weekAfterMidday[$daysToRemoveIfEmpty])) {
                unset($weekAfterMidday[$daysToRemoveIfEmpty]);
            }
        }

        //sort course within a day ascending for start time
        $weekPriorToMidday = array_map(array($this, 'sortSingleDay'), $weekPriorToMidday);
        $weekAfterMidday = array_map(array($this, 'sortSingleDay'), $weekAfterMidday);

        $coursesPriorToMidday = 0;
        array_walk_recursive($weekPriorToMidday, function($value, $key) use (&$coursesPriorToMidday){
            $coursesPriorToMidday ++;
        }, $coursesPriorToMidday);

        $coursesAfterMidday = 0;
        array_walk_recursive($weekAfterMidday, function($value, $key) use (&$coursesAfterMidday){
            $coursesAfterMidday ++;
        }, $coursesAfterMidday);

        return [
            'coursesPriorToMidday' => $coursesPriorToMidday,
            'coursesAfterMidday' => $coursesAfterMidday,
            'weekPriorToMidday' => $weekPriorToMidday,
            'weekAfterMidday' => $weekAfterMidday
        ];
    }

    /**
     * Get the day of course (e.g. 'mon', 'tue', ...)
     *
     * @param array $week
     * @param Course $course
     */
    protected function findDayOfWeek(array &$week, Course $course)
    {
        $dayOfWeek = strtolower(date('D', $course->getCourseStartDate()->getTimestamp()));
        $week[$dayOfWeek][] = $course;
    }

    /**
     * Callback to sort courses of a day
     *
     * @param array $singleDay
     * @return array
     */
    protected function sortSingleDay(array $singleDay): array
    {
        usort($singleDay, array($this, 'sortCoursesAscending'));
        return $singleDay;
    }

    /**
     * Callback to sort to courses ascending considering their start time
     *
     * @param Course $a
     * @param Course $b
     * @return int
     */
    protected function sortCoursesAscending(Course $a, Course $b): int
    {
        $startOfA = $a->getCourseStartTime();
        $startOfB = $b->getCourseStartTime();

        if ($startOfA === $startOfB) {
            return 0;
        }
        return ($startOfA < $startOfB) ? -1 : 1;
    }
}
