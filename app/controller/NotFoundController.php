<?php

namespace Application\Controller;

use Core\Application;
use Core\View\ViewAbstract;

/**
 * Class 404Controller
 *
 * @package app\controller
 */
class NotFoundController extends application\Controller
{
    /**
     * Default action
     *
     * @return ViewAbstract inheritor in depend of wanted type of view
     */
    public function indexAction()
    {
        return $this->_view;
    }
}