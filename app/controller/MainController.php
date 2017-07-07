<?php

namespace Application\Controller;

use Application\Model\MainModel;
use Core\Application;
use Core\View\ViewAbstract;

/**
 * Class controllerMain
 *
 * @package app\controller
 */
class MainController extends Application\Controller
{
    /**
     * Default action index displayed all users and companies in which they working
     *
     * @return ViewAbstract inheritor in depend of wanted type of view
     */
    public function indexAction()
    {
        $model = new MainModel();
        $this->_view->usersAndComp = $model->getData();

        return $this->_view;
    }
}
