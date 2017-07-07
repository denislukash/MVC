<?php

namespace Application\Controller;

use Application\Model\DbTable;
use Core\Application;
use Core\View\ViewAbstract;

/**
 * Class controllerUsers
 *
 * @package app\controller
 */
class UsersController extends application\Controller
{
    /**
     * Action all displayed all users from database
     *
     * @return ViewAbstract inheritor in depend of wanted type of view
     */
    public function allAction()
    {
        $model = new DbTable\TableUsers();
        $this->_view->allUsers = $model->getAllUsers();

        return $this->_view;
    }

    /**
     * Action sort displayed all users sorted by last name
     *
     * @return ViewAbstract inheritor in depend of wanted type of view
     */
    public function sortAction()
    {
        $model = new DbTable\TableUsers();
        $this->_view->sort = $model->getSorted('last_name');

        return $this->_view;
    }
}