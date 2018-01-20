<?php
/**
 * Created by PhpStorm.
 * User: sanaulla
 * Date: 1/18/18
 * Time: 9:24 PM
 */

namespace App\classes;


class Category
{
    private $id;
    private $category_name;
    private $category_description;
    private $publication_status;

    /**
     * Blog constructor.
     * @param $category_name
     * @param $category_description
     * @param $publication_status
     */
    public function __construct()
    {
    }

//    public function __construct1($category_name, $category_description, $publication_status)
//    {
//        $this->category_name = $category_name;
//        $this->category_description = $category_description;
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
     * @param mixed $category_name
     */
    public function setCategoryName($category_name)
    {
        $this->category_name = $category_name;
    }

    /**
     * @param mixed $category_description
     */
    public function setCategoryDescription($category_description)
    {
        $this->category_description = $category_description;
    }

    /**
     * @param mixed $publication_status
     */
    public function setPublicationStatus($publication_status)
    {
        $this->publication_status = $publication_status;
    }


    /**
     * @return mixed
     */
    public function getCategoryName()
    {
        return $this->category_name;
    }

    /**
     * @return mixed
     */
    public function getCategoryDescription()
    {
        return $this->category_description;
    }

    /**
     * @return mixed
     */
    public function getPublicationStatus()
    {
        return $this->publication_status;
    }




}