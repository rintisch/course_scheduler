<?php

namespace Rintisch\CourseScheduler\ViewHelpers;

use Rintisch\CourseScheduler\Domain\Model\Course;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class TimetableViewHelper extends AbstractViewHelper
{

    public function initializeArguments()
    {
        $this->registerArgument('courses', 'object', 'The courses for the time table', true);
        $this->registerArgument('target', 'string', 'Name for variable', true);
    }

    public function render()
    {
        /** @var Course $courses */
        $courses = $this->arguments['courses'];
        $target = $this->arguments['target'];

        // Seconds from midnight to midday ( = 12 * 60 * 60)
        $middayTime = 43200;
        $weekPriorToMidday = [
            'mon' => [],
            'tue' => [],
            'wed' => [],
            'thu' => [],
            'fri' => [],
            'sat' => [],
            'sun' => [],
        ];
        $weekAfterMidday = $weekPriorToMidday;

        /** @var Course $course */
        foreach ($courses as $course) {
            if ($course->getCourseStartTime() < $middayTime) {
                $this->findDayOfWeek($weekPriorToMidday, $course);
            } else {
                $this->findDayOfWeek($weekAfterMidday, $course);
            }
        }

        $weekAfterMidday = array_map(array($this, 'sortSingleDay'), $weekAfterMidday);
        //sort course within a day ascending for start time

        $this->templateVariableContainer->add(
            $target,
            [
                'weekPriorToMidday' => $weekPriorToMidday,
                'weekAfterMidday' => $weekAfterMidday
            ]
        );
        $output = $this->renderChildren();
        return $output;
    }

    protected function findDayOfWeek(array &$week, Course $course)
    {
        $dayOfWeek = strtolower(date('D', $course->getCourseStartDate()->getTimestamp()));
        $week[$dayOfWeek][] = $course;
    }

    protected function sortSingleDay(array $singleDay)
    {
        usort($singleDay, array($this, 'sortEventsAscending'));
        return $singleDay;
    }

    protected function sortEventsAscending(Course $a, Course $b)
    {
        $startOfA = $a->getCourseStartTime();
        $startOfB = $b->getCourseStartTime();

        if ($startOfA == $startOfB) {
            return 0;
        }
        return ($startOfA < $startOfB) ? -1 : 1;
    }
}
