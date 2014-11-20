<?php

/*
# class ini untuk handle connection ke database
# @ahmadrais.mail@gmail.com Oct 24th 2014
#*/

class ConnectionPDO
{

    protected $_dbUsername;
    protected $_dbPassword;
    protected $_dbHost;
    protected $_dbName;

    public function __construct($dbHost, $dbName, $dbUsername, $dbPassword)
    {
        $this->_dbUsername = $dbUsername;
        $this->_dbPassword = $dbPassword;
        $this->_dbHost     = $dbHost;
        $this->_dbName     = $dbName;
    }

    public function connect()
    {
        try
        {
            $dbh = new PDO("mysql:host=$this->_dbHost;dbname=$this->_dbName", $this->_dbUsername, $this->_dbPassword);
        }
        catch (PDOException $e)
        {
            $dbh = false;
        }
        return $dbh;
    }
}

/**********************
* example
*  define('HOST', 'localhost'); #host database
*  define('DBNAME', 'test'); #database name
*  define('DBUSERNAME', 'root'); #username to access database
*  define('DBPASSWORD', 'test'); #password to access database
*
*  $db = new ConnectionPDO(HOST, DBNAME, DBUSERNAME, DBPASSWORD);
*
*  #connect
*  $connection = $db->connect();
*
*  #end connection
*
*  $connection = null;
*
****************/
