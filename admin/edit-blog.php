<?php include 'includes/header.php'; ?>

<?php
use App\classes\Blog;
use App\classes\BlogInfo;
use App\classes\CategoryInfo;
$message = (isset($_GET['message']))? $_GET['message'] : '';
$categoryInfo = new CategoryInfo();
$allCategories = $categoryInfo->allCategories();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $blogInfo = new BlogInfo();
    $blog = $blogInfo->getBlogById($id);
    if($blog->getPublicationStatus()){
        $published = 'checked';
        $unpublished = '';
    }else{
        $published = '';
        $unpublished = 'checked';
    }
//    echo '<pre>';
//    print_r($blog);
}
$message = '';
if(isset($_POST['btn'])){
    $message = $blogInfo->updateBlogInfo($_POST,$_FILES);
    print_r($message);
}

?>
    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-sm-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4><?php echo $message;?></h4><br/>
                        <form action="" method="post" enctype="multipart/form-data" name="editBlogForm">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Blog Name</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="category_id" name="category_id">
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
                                    <input type="text" name="blog_title" class="form-control" id="inputEmail3" placeholder="Category Name" value="<?php echo $blog->getBlogTitle();?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Short Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="short_description" id="short_description"><?php echo $blog->getShortDescription();?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Long Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control textarea" name="long_description" id="long_description" rows="10"><?php echo $blog->getLongDescription();?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="file" name="blog_image" accept="image/*"/>
                                    <img src="<?php echo $blog->getBlogImage() ?>" alt="Image" height="80" width="100"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Publication Status</label>
                                <div class="col-sm-9">
                                    <input type="radio" name="publication_status" value="1" <?php echo $published;?> /> Published
                                    <input type="radio" name="publication_status" value="0" <?php echo $unpublished;?>/> Unpublished
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

<script !src="">
    document.forms['editBlogForm'].elements['category_id'].value = '<?php echo $blog->getCategoryId();?>';
    $('#category_id').select()
</script>

<?php
include 'includes/footer.php';
?>

