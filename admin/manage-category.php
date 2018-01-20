<?php include 'includes/header.php';  ?>

<?php
use App\classes\CategoryInfo;
$message = (isset($_GET['message']))? $_GET['message'] : '';
$categoryInfo = new CategoryInfo();
$allCategories = $categoryInfo->allCategories();
//echo '<pre>';
//print_r($allCategories);
if(isset($_GET['delete'])){
    $id = $_GET['id'];
    $categoryInfo->deleteCategoryInfoById($id);
}
?>
    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-sm-10 mx-auto">
                <div class="card">
                    <h4 class="text-center font-weight-bold text-success"><?php echo $message;?></h4>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">SL No</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Description</th>
                                <th scope="col">Publication Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            foreach ($allCategories as $category):
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i;?></th>
                                    <td><?php echo $category["category_name"];?></td>
                                    <td><?php echo $category["category_description"];?></td>
                                    <td><?php echo $category["publication_status"];?></td>
                                    <td>
                                        <a href="edit-category.php?<?php echo 'id='.$category["id"];?>">EDIT</a>
                                        <a href="?delete=true&<?php echo 'id='.$category["id"];?>" onclick="return confirm('Are You Sure ?')">Delete</a>
                                    </td>
                                </tr>
                            <?php
                                $i++;
                                endforeach;
                            ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
include 'includes/footer.php';
?>