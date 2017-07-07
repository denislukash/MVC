<?php

namespace Core;

/**
 * Class Application
 *
 * @package core
 */
class Application
{
    /**
     * Routing class
     *
     * @var Route
     */
    protected $_route = null;

    /**
     * Data about request
     *
     * @var Request
     */
    protected $_request = null;

    /**
     * Path to view template
     *
     * @var string
     */
    protected $_viewTemplate = null;

    /**
     * Path to 404 error template
     *
     * @var string
     */
    protected $_notFoundTemplate = null;

    /**
     * Names controller and action for 404 error
     *
     * @var array
     */
    protected $_notFoundController = null;

    /**
     * Application constructor created exemplar of rout class
     *
     * @param array $param options for application
     */
    public function __construct($param)
    {
        $this->_route = new Route($param['defaultController']);
        $this->_viewTemplate = $param['templatePath']['default'];
        $this->_notFoundController = $param['notFoundController'];
        $this->_notFoundTemplate = $param['templatePath']['notFound'];
    }

    /**
     * When class application get all request data - start to processing that data,
     * created exemplars of wanted controller, get view and render page, if controller
     * or action doesn't exist, created exemplar of controller404 and displayed 404 page
     */
    public function startAction()
    {
        $this->_request = $this->_route->getRequest();

        $controllerName = $this->_request->param['controller'];
        $action = $this->_request->param['action'] . 'Action';
        $param = $this->_request->param['params'];

        $contentTemplate = "app/views/{$controllerName}/" . str_replace('Action', '', $action) . ".phtml";

        $controllerName[0] = strtoupper($controllerName[0]);
        $controllerName = 'Application\Controller\\' . $controllerName . 'Controller';

        $viewName = "Core\View\Html";
        $view = new $viewName($this->_viewTemplate, $contentTemplate);

        $controller = new $controllerName($view);

        if (empty($param)) {
            $dataView = $controller->$action();
        } else {
            $dataView = $controller->$action($param);
        }

        echo $dataView->render();
    }
}