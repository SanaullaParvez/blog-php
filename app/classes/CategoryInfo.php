<?php
/**
 * Created by PhpStorm.
 * User: sanaulla
 * Date: 1/18/18
 * Time: 9:25 PM
 */

namespace App\classes;
use App\classes\DbConfig;
use App\classes\Category;


class CategoryInfo
{
    private $category;
    private $categories;
    private $dbConfig;



    public function __construct()
    {
        $this->dbConfig = DbConfig::getConnection();
    }


    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function allCategories(){
        $sql = "SELECT * FROM categories";
        $queryResult = DbConfig::getQueryResult($sql);
        if($queryResult){
            $allCategory = [];
            while ($category = mysqli_fetch_assoc($queryResult)){
                array_push($allCategory, $category);
            }
            $this->categories = $allCategory;
            return $this->categories;
        }else{
            die('Problem '.mysqli_error($this->dbConfig));
        }
    }

    public function addCategory($category)
    {
        $categoryName = $category->getCategoryName();
        $categoryDescription = $category->getCategoryDescription();
        $publicationStatus = $category->getPublicationStatus();

        $sql = "INSERT INTO categories(category_name,category_description,publication_status) VALUES('$categoryName','$categoryDescription','$publicationStatus')";
        $queryResult = DbConfig::getQueryResult($sql);
        if($queryResult){
            $message = 'Successfully create a new Category';
            return $message;
        }else{
            die('Problem'.mysqli_error($this->dbConfig));
        }
    }

    public  function getCategoryById($id){
        $sql = "SELECT * FROM categories WHERE id='$id'";
        $queryResult = DbConfig::getQueryResult($sql);
        if($queryResult){
            while ($newCategory = mysqli_fetch_assoc($queryResult)){
                $category = new Category();
                $category->setId($newCategory[id]);
                $category->setCategoryName($newCategory[category_name]);
                $category->setCategoryDescription($newCategory[category_description]);
                $category->setPublicationStatus($newCategory[publication_status]);
                $this->setCategory($category);
            }
            return $this->category;
        }else{
            die('Problem'.mysqli_error($this->dbConfig));
        }
    }

    public function updateCategoryInfo($updateCategory){
        $this->category->setCategoryName($updateCategory['category_name']);
        $this->category->setCategoryDescription($updateCategory['category_description']);
        $this->category->setPublicationStatus($updateCategory['publication_status']);

        $id = $this->category->getId();
        $categoryName = $this->category->getCategoryName();
        $categoryDescription = $this->category->getCategoryDescription();
        $publicationStatus = $this->category->getPublicationStatus();
        $sql = "UPDATE categories
                SET category_name = '$categoryName', category_description = '$categoryDescription', publication_status='$publicationStatus'
                WHERE id='$id'";
        $queryResult = DbConfig::getQueryResult($sql);
        if($queryResult){
            $message = 'Updated Successfully';
//            return $message;
            header('Location: manage-category.php?message='.$message);
        }else{
            die('Problem'.mysqli_error($this->dbConfig));
        }
    }

    public function deleteCategoryInfoById($id){
        $sql = "DELETE FROM categories WHERE id='$id'";
        $queryResult = DbConfig::getQueryResult($sql);
        if($queryResult){
            $message = 'Deleted Successfully';
            header('Location: manage-category.php?message='.$message);
        }else{
            die('Problem'.mysqli_error($this->dbConfig));
        }
    }

}