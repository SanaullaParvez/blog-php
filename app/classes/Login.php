<?php
/**
 * Created by PhpStorm.
 * User: sanaulla
 * Date: 1/15/18
 * Time: 12:35 PM
 */

namespace App\classes;

use App\classes\DbConfig;

class Login
{
    private $dbConfig;

    public function __construct()
    {
        $this->dbConfig = new DbConfig();
    }

    public function adminLoginCheck($data){
        $email = $data['email'];
        $password = $data['passowrd'];
        $connection = $this->dbConfig->getConnection();
//        $connection = DbConfig::dbConnection();
        $sql = "SELECT * FROM blog_php.users Where id=1;";
        if(mysqli_query($connection, $sql)){
            $queryResult = mysqli_query($connection, $sql);
            $user = mysqli_fetch_assoc($queryResult);
            return $user;
        }else{
            die('Query Problem'.mysqli_error($connection));
        }

    }

}