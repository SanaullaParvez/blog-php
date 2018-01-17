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

    public function adminLoginCheck($user){
        $email = $user['email'];
        $password = md5($user['password']);
//        $email = 'admin';
//        $password = md5('123456');
//        return $user;
        $connection = $this->dbConfig->getConnection();
//        $connection = DbConfig::dbConnection();
        $sql = "SELECT * FROM blog_php.users Where email='$email' AND password='$password';";
        if(mysqli_query($connection, $sql)){
            $queryResult = mysqli_query($connection, $sql);
            $user = mysqli_fetch_assoc($queryResult);
            if($user){
                $message = '';
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                header('Location: dashboard.php');

            }else{
                $message = 'Please, Input Valid email & Password';
                return $message;
            }
        }else{
            die('Query Problem'.mysqli_error($connection));
        }

    }
    public function adminLogout(){
        unset($_SESSION['id']);
        header('Location: index.php');
    }

}