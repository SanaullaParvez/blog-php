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
    private static $dbConfig = null;

    /**
     * @return \mysqli
     */
    public static function getConnection()
    {
        if (self::$dbConfig === null){
            self::$dbConfig = new self();
        }
        return self::$dbConfig->connection;
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
        return $this->connection;
    }

    public static function getQueryResult($sql){
        $queryResult = mysqli_query(self::getConnection(),$sql);
        return $queryResult;
    }

//    public function dbConnection(){
//        $link = mysqli_connect('localhost','admin','D@cker','blog_php');
//        return $link;
//    }

}