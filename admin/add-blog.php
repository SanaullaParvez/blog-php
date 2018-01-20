<?php
include 'includes/header.php';
?>
<?php
use App\classes\Blog;
use App\classes\BlogInfo;
use App\classes\CategoryInfo;
$message = (isset($_GET['message']))? $_GET['message'] : '';
$categoryInfo = new CategoryInfo();
$allCategories = $categoryInfo->allCategories();

if(isset($_POST['btn'])){
    $categoryId = $_POST['category_id'];
    $blogTitle = $_POST['blog_title'];
    $shortDescription = $_POST['short_description'];
    $longDescription = $_POST['long_description'];
    $publicationStatus = $_POST['publication_status'];
    $blogImage = Blog::checkFile($_FILES) ;

//    echo '<pre>';
//    print_r($blog);
//    print_r($_FILES);
//    $blog = new Blog($categoryId,$blogTitle,$shortDescription,$longDescription,$blogImage,$publicationStatus);
    $blog = new Blog();
    $blog->setCategoryId($categoryId);
    $blog->setBlogTitle($blogTitle);
    $blog->setShortDescription($shortDescription);
    $blog->setLongDescription($longDescription);
    $blog->setBlogImage($blogImage);
    $blog->setPublicationStatus($publicationStatus);
    $blogInfo = new BlogInfo();
//    print_r($blogImage);
//    print_r($blog);
    $message = $blogInfo->addBlog($blog);
}

?>
    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-sm-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center text-info"><?php echo $message;?></h4><br/>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Blog Name</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="category_id">
<!--                                        <option value="">--- Select Category Name ---</option>-->
                                        <?php foreach ($allCategories as $category): ?>
                                            <option value="<?php echo $category["id"];?>"><?php echo $category["category_name"];?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="blog_title" class="form-control" id="inputEmail3" placeholder="Category Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Short Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="short_description" id="short_description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Long Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control textarea" name="long_description" id="long_description" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="file" name="blog_image" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Publication Status</label>
                                <div class="col-sm-9">
                                    <input type="radio" name="publication_status" value="1" checked> Published
                                    <input type="radio" name="publication_status" value="0"> Unpublished
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" name="btn" class="btn btn-primary btn-block">Save Blog Info</button>
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