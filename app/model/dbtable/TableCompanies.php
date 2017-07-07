<?php

namespace Application\Model\DbTable;

use Core\Db\Sql\Table;

/**
 * Class TableCompanies
 *
 * @package model\dbtable
 */
class TableCompanies extends Table
{
    /**
     * Table name
     *
     * @var string
     */
    protected $_tableName = 'companies';

    /**
     * Method for get all companies data from database
     *
     * @return array
     */
    public function getAllCompanies()
    {
        return $this->fetchAll(null, 'id');
    }
}