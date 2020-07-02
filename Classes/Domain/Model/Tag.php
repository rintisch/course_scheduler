<?php
namespace Rintisch\CourseScheduler\Domain\Model;


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
 * Tag
 */
class Tag extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * Title of tag
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $title = '';

    /**
     * Notes of tag
     * 
     * @var string
     */
    protected $notes = '';

    /**
     * Returns the title
     * 
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     * 
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the notes
     * 
     * @return string $notes
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Sets the notes
     * 
     * @param string $notes
     * @return void
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }
}
