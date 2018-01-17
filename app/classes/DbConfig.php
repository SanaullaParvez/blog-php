<?php
/**
 * Created by PhpStorm.
 * User: sanaulla
 * Date: 1/15/18
 * Time: 2:24 PM
 */

namespace App\classes;


class DbConfig extends Database
{

    private $connection;

    /**
     * @return \mysqli
     */
    public function getConnection()
    {
        return $this->connection;
    }

    public function __construct()
    {
        parent::__construct();
        if(!isset($this->connection)){
            $this->connection = mysqli_connect($this->getHostName(),$this->getUserName(),$this->getPassword(),$this->getDbName());
            if(!$this->connection){
                echo 'Cannot connect to Database Server';
                exit;
            }
        }
    }

//    public function dbConnection(){
//        $link = mysqli_connect('localhost','admin','D@cker','blog_php');
//        return $link;
//    }

}