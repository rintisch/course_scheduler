<?php

/*
 * This file was part of the Extension "sf_event_mgt" for TYPO3 CMS and is adapted here.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Rintisch\CourseScheduler\ViewHelpers;

use Rintisch\CourseScheduler\PageTitle\CoursePageTitleProvider;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

/**
 * ViewHelper to render the page title and indexed search title
 */
class TitleViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;

    /**
     * Initialize arguments
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('courseTitle', 'String', 'The course title');
        $this->registerArgument('locationCity', 'String', 'The name of the city');
        $this->registerArgument('locationName', 'String', 'The name of the location');
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     */
    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        $courseTitle = $arguments['courseTitle'] ?? '';
        $location = $arguments['locationName'] ?? '';
        $location .= $arguments['locationCity'] ? ', ' . $arguments['locationCity'] : '';

        if ($courseTitle !== '') {
            $title = $courseTitle;
            $title .= $location ? ' (' . $location . ')' : '';

            GeneralUtility::makeInstance(CoursePageTitleProvider::class)->setTitle($title);
        }
    }
}
