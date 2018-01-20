<?php include 'includes/header.php'; ?>

<?php
use App\classes\Category;
use App\classes\CategoryInfo;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $categoryInfo = new CategoryInfo();
    $category = $categoryInfo->getCategoryById($id);
//    echo '<pre>';
//    print_r($category);
}
$message = '';
if(isset($_POST['btn'])){
    $message = $categoryInfo->updateCategoryInfo($_POST);
    print_r($message);
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
                                    <input type="text" name="category_name" class="form-control" id="inputEmail3" placeholder="Category Name" value="<?php echo $category->getCategoryName();?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Category Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="category_description" id="category_description"><?php echo $category->getCategoryDescription();?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Publication Status</label>
                                <div class="col-sm-9">
                                    <input type="radio" id="publication_status_published" name="publication_status" value="1"> Published
                                    <input type="radio" id="publication_status_unpublished" name="publication_status" value="0"> Unpublished
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
<script>
    var publication_status  = "<?php echo $category->getPublicationStatus();?>"
    if(publication_status == 1){
        $('#publication_status_published').prop('checked', true);
    }else{
        $('#publication_status_unpublished').prop('checked', true);
    }
</script>
