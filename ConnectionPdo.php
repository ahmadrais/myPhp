<?php

/*
# class ini untuk handle connection ke database
# @ahmadrais.mail@gmail.com Oct 24th 2014
#*/

class ConnectionPdo
{

    protected $_dbUsername;
    protected $_dbPassword;
    protected $_dbHost;
    protected $_dbName;
    protected $_dbh;

    public function __construct($dbHost, $dbName, $dbUsername, $dbPassword)
    {
        $this->_dbUsername = $dbUsername;
        $this->_dbPassword = $dbPassword;
        $this->_dbHost     = $dbHost;
        $this->_dbName     = $dbName;
    }

    public function connect()
    {
        if (!$this->_dbh) {
            try
            {
                $this->_dbh = new PDO("mysql:host=$this->_dbHost;dbname=$this->_dbName", $this->_dbUsername, $this->_dbPassword);
            }
            catch (PDOException $e)
            {
                $this->_dbh = null;
            }
        }
        return $this->_dbh;
    }

    public function closeConnection()
    {
        $this->_dbh = null;
    }
}

/**********************
* example
*  define('HOST', 'localhost'); #host database
*  define('DBNAME', 'test'); #database name
*  define('DBUSERNAME', 'root'); #username to access database
*  define('DBPASSWORD', 'test'); #password to access database
*
*  $db = new ConnectionPdo(HOST, DBNAME, DBUSERNAME, DBPASSWORD);
*
*  #connect
*  $connection = $db->connect();
*
*  #end connection
*  $db->closeConnection();
*
****************/
