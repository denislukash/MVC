<?php

namespace Core\Application;

use Core\View\ViewAbstract;

/**
 * Basic class controller
 *
 * @package core
 */
class Controller
{
    /**
     * Class view for render page
     *
     * @var ViewAbstract
     */
    protected $_view;

    /**
     * Controller constructor.
     *
     * @param ViewAbstract $view
     */
    public function __construct($view)
    {
        $this->_view = $view;
    }
}