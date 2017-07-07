<?php

namespace Application\Model;

use Core;

/**
 * Class MainModel
 * @package model
 */
class MainModel
{
    /**
     * Method for get data from database for default controller
     *
     * @return array
     */
    public function getData()
    {
        $select = core\Registry::get('select');
        $adapter = core\Registry::get('defaultAdapter');

        if (!$adapter->isConnected()) {
            $adapter->connect();
        }

        $select->from('users', ['first_name', 'last_name', 'city'])
            ->join(['c' => 'companies', 'users.company_id = c.id'], ['name']);
        $data = $adapter->fetchAll($select->getRequest());

        return $data;
    }
}