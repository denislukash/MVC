<?php

namespace Core;

/**
 * Class Route
 *
 * @package core
 */
class Route
{

    /**
     * Name of default controller
     *
     * @var string
     */
    protected $_defaultController = null;

    /**
     * Name of default action
     *
     * @var string
     */
    protected $_defaultAction = null;

    /**
     * Route constructor, set default controller and action
     *
     * @param array $default default controller and action names
     */
    public function __construct($default)
    {
        $this->_defaultController = $default['controller'];
        $this->_defaultAction = $default['action'];
    }

    /**
     * Split url for get action, controller and parameters names
     *
     * @return Request data about request
     */
    public function getRequest()
    {
        $controller = $this->_defaultController;
        $action = $this->_defaultAction;
        $param = [];

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[1])) {
            $controller = $routes[1];
        }

        if (!empty($routes[2])) {
            $action = $routes[2];
        }

        foreach ($routes as $index => $value) {
            if ($index > 2) {
                array_unshift($param, $value);
            }
        }

        return new Request([
            'controller' => $controller,
            'action' => $action,
            'params' => $param
        ]);
    }
}