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
 * LocationController
 */
class LocationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $locations = $this->locationRepository->findAll();
        $this->view->assign('locations', $locations);
    }

    /**
     * action show
     * 
     * @param \Rintisch\CourseScheduler\Domain\Model\Location $location
     * @return void
     */
    public function showAction(\Rintisch\CourseScheduler\Domain\Model\Location $location)
    {
        $this->view->assign('location', $location);
    }
}
