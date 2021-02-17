<?php

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace Rintisch\CourseScheduler\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithContentArgumentAndRenderStatic;

/**
 * Formats a integer as time
 *
 */
class TimeViewHelper extends AbstractViewHelper
{
    use CompileWithContentArgumentAndRenderStatic;

    /**
     * Needed as child node's output can return a DateTime object which can't be escaped
     *
     * @var bool
     */
    protected $escapeChildren = false;

    /**
     * Initialize arguments
     */
    public function initializeArguments()
    {
        $this->registerArgument('time', 'int', 'Either an object implementing DateTimeInterface or a string that is accepted by DateTime constructor');
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     *
     * @return string
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext)
    {
        $time = $renderChildrenClosure();
        if ($time === null) {
            return '';
        }

        if ($time === '') {
            $time = 'now';
        }

        $hours = floor($time / 3600);
        $minutes = floor(($time % 3600) / 60);
        return sprintf('%02d:%02d', $hours, $minutes);
    }
}
