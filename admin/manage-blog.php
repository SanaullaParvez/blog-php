<?php
include 'includes/header.php';
?>
<?php
use App\classes\BlogInfo;
$message = (isset($_GET['message']))? $_GET['message'] : '';
$blogInfo = new BlogInfo();
$allBlog = $blogInfo->allBlog();
//echo '<pre>';
//print_r($allCategories);
if(isset($_GET['delete'])){
    $id = $_GET['id'];
    $message = $blogInfo->deleteBlogInfoById($id);
    print_r($message);
}
?>

    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-sm-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center text-info"><?php echo $message;?></h4><br/>
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">SL NO</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Blog Title</th>
                                <th scope="col">Publication Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            foreach ($allBlog as $blog):
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i;?></th>
                                    <td><?php echo $blog["category_name"];?></td>
                                    <td><?php echo $blog["blog_title"];?></td>
                                    <td><?php echo $blog["publication_status"] == 1 ? 'Published': 'Unpublished'; ?></td>
                                    <td>
                                        <a href="view-blog.php?<?php echo 'id='.$blog["id"];?>">View</a>||
                                        <a href="edit-blog.php?<?php echo 'id='.$blog["id"];?>">EDIT</a>||
                                        <a href="?delete=true&<?php echo 'id='.$blog["id"];?>" onclick="return confirm('Are You Sure ?')">Delete</a>
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