<?php include 'includes/header.php'; ?>

<?php
use App\classes\Category;
use App\classes\CategoryInfo;
$message = '';
if(isset($_POST['btn'])){
    $categoryName = $_POST['category_name'];
    $categoryDescription = $_POST['category_description'];
    $publicationStatus = $_POST['publication_status'];
//    $category = new Category($categoryName,$categoryDescription,$publicationStatus);
    $category = new Category();
    $category->setCategoryName($categoryName);
    $category->setCategoryDescription($categoryDescription);
    $category->setPublicationStatus($publicationStatus);
    $categoryInfo = new CategoryInfo();
    $message = $categoryInfo->addCategory($category);
//    print_r($category);
}

?>




    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-sm-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4><?php echo $message;?></h4><br/>
                        <form action="" method="post">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="category_name" class="form-control" id="inputEmail3" placeholder="Category Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Category Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="category_description" id="category_description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Publication Status</label>
                                <div class="col-sm-9">
                                    <input type="radio" name="publication_status" value="1"> Published
                                    <input type="radio" name="publication_status" value="0"> Unpublished
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" name="btn" class="btn btn-primary btn-block">Save Category Info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include 'includes/footer.php';
?>