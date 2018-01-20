<?php
/**
 * Created by PhpStorm.
 * User: sanaulla
 * Date: 1/18/18
 * Time: 1:59 PM
 */

namespace App\classes;
use App\classes\DbConfig;


class BlogInfo
{
    private $blog;
    private $allBlog;
    private $dbConfig;



    public function __construct()
    {
        $this->dbConfig = DbConfig::getConnection();
        $this->allBlog = array();
    }


    /**
     * @param mixed $blog
     */
    public function setBlog($blog)
    {
        $this->blog = $blog;
    }

    public function allBlog(){
        $sql = "SELECT b.*,c.category_name FROM blogs AS b,categories AS c WHERE b.category_id = c.id";
        $queryResult = DbConfig::getQueryResult($sql);
        if($queryResult){
            while ($blog = mysqli_fetch_assoc($queryResult)){
                array_push($this->allBlog, $blog);
            }
//            $this->blogs = $allBlog;
            return $this->allBlog;
        }else{
            die('Problem '.mysqli_error($this->dbConfig));
        }
    }

    public function addBlog($blog)
    {
        $this->blog = $blog;
        $categoryId = $blog->getCategoryId();
        $blogTitle = $blog->getBlogTitle();
        $blogShortDesc = $blog->getShortDescription();
        $blogLongDesc = $blog->getLongDescription();
        $blogImage = $blog->getBlogImage();
        $publicationStatus = $blog->getPublicationStatus();

        $sql = "INSERT INTO blogs(category_id,blog_title,short_description,long_description,blog_image,publication_status) VALUES('$categoryId','$blogTitle','$blogShortDesc','$blogLongDesc','$blogImage','$publicationStatus')";
        $queryResult = DbConfig::getQueryResult($sql);
        if($queryResult){
            $message = 'Successfully create a new Blog';
            return $message;
        }else{
            die('Problem'.mysqli_error($this->dbConfig));
        }
    }

    public  function getBlogById($id){
        $sql = "SELECT * FROM blogs WHERE id='$id'";
        $queryResult = DbConfig::getQueryResult($sql);
        if($queryResult){
            while ($newBlog = mysqli_fetch_assoc($queryResult)){
                $blog = new Blog();
                $blog->setId($newBlog['id']);
                $blog->setCategoryId($newBlog['category_id']);
                $blog->setBlogTitle($newBlog['blog_title']);
                $blog->setShortDescription($newBlog['short_description']);
                $blog->setLongDescription($newBlog['long_description']);
                $blog->setBlogImage($newBlog['blog_image']);
                $blog->setPublicationStatus($newBlog['publication_status']);
                $this->setBlog($blog);
            }
            return $this->blog;
        }else{
            die('Problem'.mysqli_error($this->dbConfig));
        }
    }

    public function updateBlogInfo($updateBlog,$file){
//        $blogImage = BlogInfo::checkFile($file);
        $this->blog->setCategoryId($updateBlog['category_id']);
        $this->blog->setBlogTitle($updateBlog['blog_title']);
        $this->blog->setShortDescription($updateBlog['short_description']);
        $this->blog->setLongDescription($updateBlog['long_description']);
        if($file[blog_image][name]){
            $blogImage = Blog::checkFile($file,$this->blog->getBlogImage());
            $this->blog->setBlogImage($blogImage);
        }
        $this->blog->setPublicationStatus($updateBlog['publication_status']);

        $id = $this->blog->getId();
        $categoryId = $this->blog->getCategoryId();
        $blogTitle = $this->blog->getBlogTitle();
        $blogShortDesc = $this->blog->getShortDescription();
        $blogLongDesc = $this->blog->getLongDescription();
        $blogImage = $this->blog->getBlogImage();
        $publicationStatus = $this->blog->getPublicationStatus();
        $sql = "UPDATE blogs
                SET
                category_id= '$categoryId',
                blog_title= '$blogTitle',
                short_description='$blogShortDesc',
                long_description='$blogLongDesc',
                blog_image='$blogImage',
                publication_status='$publicationStatus'
                WHERE id='$id'";
        $queryResult = DbConfig::getQueryResult($sql);
        if($queryResult){
            $message = 'Updated Successfully';
//            return $message;
            header('Location: manage-blog.php?message='.$message);
        }else{
            die('Problem'.mysqli_error($this->dbConfig));
        }
    }

    public function deleteBlogInfoById($id){
        $blog_image = "SELECT blog_image FROM blogs WHERE id='$id'";
        $sql = "DELETE FROM blogs WHERE id='$id'";
        $imageQueryResult = mysqli_fetch_assoc(DbConfig::getQueryResult($blog_image))[blog_image];
//        return $imageQueryResult;
        $queryResult = DbConfig::getQueryResult($sql);
        if($queryResult){
            unlink($imageQueryResult);
            $message = 'Deleted Successfully';
            header('Location: manage-blog.php?message='.$message);
        }else{
            die('Problem'.mysqli_error($this->dbConfig));
        }
    }




}