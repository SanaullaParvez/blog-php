<?php
/**
 * Created by PhpStorm.
 * User: sanaulla
 * Date: 1/18/18
 * Time: 12:49 PM
 */

namespace App\classes;


class Blog
{
    private $id;
    private $category_id;
    private $blog_title;
    private $short_description;
    private $long_description;
    private $blog_image;
    private $publication_status;

    /**
     * Blog constructor.
     * @param $category_id
     * @param $blog_title
     * @param $short_description
     * @param $long_description
     * @param $blog_image
     * @param $publication_status
     */
//    public function __construct($category_id, $blog_title, $short_description, $long_description, $blog_image, $publication_status)
//    {
//        $this->category_id = $category_id;
//        $this->blog_title = $blog_title;
//        $this->short_description = $short_description;
//        $this->long_description = $long_description;
//        $this->blog_image = $blog_image;
//        $this->publication_status = $publication_status;
//    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * @return mixed
     */
    public function getBlogTitle()
    {
        return $this->blog_title;
    }

    /**
     * @param mixed $blog_title
     */
    public function setBlogTitle($blog_title)
    {
        $this->blog_title = $blog_title;
    }

    /**
     * @return mixed
     */
    public function getShortDescription()
    {
        return $this->short_description;
    }

    /**
     * @param mixed $short_description
     */
    public function setShortDescription($short_description)
    {
        $this->short_description = $short_description;
    }

    /**
     * @return mixed
     */
    public function getLongDescription()
    {
        return $this->long_description;
    }

    /**
     * @param mixed $long_description
     */
    public function setLongDescription($long_description)
    {
        $this->long_description = $long_description;
    }

    /**
     * @return mixed
     */
    public function getBlogImage()
    {
        return $this->blog_image;
    }

    /**
     * @param mixed $blog_image
     */
    public function setBlogImage($blog_image)
    {
//        if (is_array($blog_image)) {                            //new Image
//            $this->blog_image = self::checkFile($blog_image);
//        } else {                                                //Old Image
            $this->blog_image = $blog_image;
//        }
    }


    public static function checkFile($file,$old_file=NULL)
    {
        $fileName = $file['blog_image']['name'];
        $fileSize = $file['blog_image']['size'];
        $directory = '../assets/images/';
        $fileURL = $directory . $fileName;
        $fileType = pathinfo($file['blog_image']['name'], PATHINFO_EXTENSION);
        $check = getimagesize($file['blog_image']['tmp_name']);
//    print_r($check);
        if ($check) {
            if (file_exists($fileURL)) {
                die('File already exists' . $fileURL);
            } else {
                if ($fileSize > 50000) {
                    die('Large file exception');
                } else {
                    if ($fileType != 'jpg' && $fileType != 'png') {
                        die('File type error');
                    } else {
                        if($old_file)
                            unlink($old_file);
                        move_uploaded_file($file['blog_image']['tmp_name'], $fileURL);
                        return $fileURL;
                    }
                }
            }
        }
    }

    /**
     * @return mixed
     */
    public function getPublicationStatus()
    {
        return $this->publication_status;
    }

    /**
     * @param mixed $publication_status
     */
    public function setPublicationStatus($publication_status)
    {
        $this->publication_status = $publication_status;
    }


}