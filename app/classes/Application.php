<?php
/**
 * Created by PhpStorm.
 * User: Extra Classs
 * Date: 1/17/2018
 * Time: 9:16 PM
 */

namespace App\classes;


class Application
{
    public function getAllPublishedBlogInfo(){
        $sql = "SELECT * FROM blogs WHERE publication_status=1";
    }

}