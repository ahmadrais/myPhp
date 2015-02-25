<?php
# @desc how to using all the zend framework 1 class
# @ahmadrais.mail@gmail.com February 25th 2015


set_include_path(implode(PATH_SEPARATOR, array(
    realpath("library"), get_include_path()
)));

require_once "Zend/Loader/Autoloader.php";

$autoloader = Zend_Loader_Autoloader::getInstance();

$config = new Zend_Config_Ini(
    realpath(dirname(__FILE__) . '/application/configs/application.ini'),
    (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production')
);
$db = Zend_Db::factory($config->resources->db);

Zend_Registry::set('config', $config);
Zend_Db_Table::setDefaultAdapter($db);

# Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/application'));

# Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

$autoloader = $application->getAutoloader();
$autoloader->registerNamespace('WhatYouWant');

Zend_Registry::set('application', $application);
