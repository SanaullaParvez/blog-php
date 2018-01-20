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
    private $allPublishedBlog;
    private $publishedBlog;

    public function getAllPublishedBlogInfo(){
        $sql = "SELECT * FROM blogs WHERE publication_status=1";
        $queryResult = DbConfig::getQueryResult($sql);
        if($queryResult){
            $allPublishedBlog = [];
            while ($blog = mysqli_fetch_assoc($queryResult)){
                array_push($allPublishedBlog, $blog);
            }
            $this->allPublishedBlog = $allPublishedBlog;
            return $this->allPublishedBlog;
        }else{
            die('Problem '.mysqli_error($this->dbConfig));
        }
    }

    public function getPublishedBlogInfo($id){
        $sql = "SELECT b.*,c.category_name FROM blogs b,categories c WHERE b.publication_status=1 AND b.id='$id' AND c.id = b.category_id";
        $queryResult = DbConfig::getQueryResult($sql);
        if($queryResult){
            while ($blog = mysqli_fetch_assoc($queryResult)){
                $this->publishedBlog = $blog;
            }
            return $this->publishedBlog;
        }else{
            die('Problem '.mysqli_error($this->dbConfig));
        }
    }

}