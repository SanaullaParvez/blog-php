<?php
/**
 * Created by PhpStorm.
 * User: sanaulla
 * Date: 1/17/18
 * Time: 12:36 PM
 */

namespace App\classes;


class Database
{
    private $hostName;
    private $userName;
    private $password;
    private $dbName;

    public function __construct()
    {
        $this->hostName = 'localhost';
        $this->userName = 'root';
        $this->password = '';
        $this->dbName = 'blog72';
    }

    /**
     * @return string
     */
    public function getHostName()
    {
        return $this->hostName;
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getDbName()
    {
        return $this->dbName;
    }




}