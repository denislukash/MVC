<?php

namespace Core\View;

/**
 * Class view for render html pages
 *
 * @package core
 */
class Html extends ViewAbstract
{
    /**
     * File path for template
     *
     * @var string
     */
    public $templatePath = null;

    /**
     * File path for content
     *
     * @var string
     */
    public $contentPath = null;

    /**
     * Html constructor.
     *
     * @param $templatePath
     * @param $contentPath
     */
    public function __construct($templatePath, $contentPath)
    {
        $this->templatePath = $templatePath;
        $this->contentPath = $contentPath;
    }

    /**
     * Generate wanted html page
     */
    public function render()
    {
        return include '/home/intern/PhpstormProjects/day21_MVC/' . $this->templatePath;
    }
}