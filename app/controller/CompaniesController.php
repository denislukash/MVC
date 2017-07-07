<?php

namespace Application\Controller;

use Application\Model\DbTable\TableCompanies;
use Core\Application;
use Core\View\ViewAbstract;

/**
 * Class CompaniesController
 *
 * @package app\controller
 */
class CompaniesController extends Application\Controller
{
    /**
     * Action all displayed all companies from database
     *
     * @return ViewAbstract inheritor in depend of wanted type of view
     */
    function allAction()
    {
        $model = new TableCompanies();
        $this->_view->allCompanies = $model->getAllCompanies();

        return $this->_view;
    }
}