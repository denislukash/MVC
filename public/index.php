<?php
require_once '../library/core/autoloader/namespace/NamespaceAutoload.php';
$config = require '../app/config.php';

use Core\Db\Adapter\Pdo;
use Core\Db\Sql;

$dir = str_replace('public', '', __DIR__);

$namespaceLoader = new Core\Autoload\NamespaceAutoload();
$namespaceLoader->addNamespace('\\Core', $dir . 'library/core');
$namespaceLoader->addNamespace('\\Application', $dir . 'app');
$namespaceLoader->register();

$defaultAdapter = new Pdo\MySQLAdapter($config['dbConfig']);
Core\Registry::set('defaultAdapter', $defaultAdapter);
$select = new Sql\Select();
Core\Registry::set('select', $select);

$application = new Core\Application($config['application']);

$application->startAction();

