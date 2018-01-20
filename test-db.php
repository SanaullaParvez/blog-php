<?php

//echo 'sss';
//$con = mysqli_connect("localhost","admin","D@cker","blog-php");
//if (mysqli_connect_errno())
//{
//    echo "Failed to connect to MySQL: " . mysqli_connect_error();
//}
//echo '<pre>';
//print_r($con);
//phpinfo();
    echo '<pre>';
    print_r($_POST);
    print_r($_FILES);
echo $fileName = $_FILES[my_image][name];
echo PHP_EOL;
//echo $fileType = $_FILES[my_image][type].PHP_EOL;
//echo $_FILES[my_image][tmp_name].PHP_EOL;
//echo $_FILES[my_image][error].PHP_EOL;
echo $fileSize = $_FILES[my_image][size];
$directory = 'assets/images/';
$fileURL = $directory.$fileName;
echo $fileType = pathinfo($_FILES[my_image][name],PATHINFO_EXTENSION);
$check = getimagesize($_FILES[my_image][tmp_name]);
print_r($check);
    if($check){
        if(file_exists($fileURL)){
            die('File already exists');
        }else{
            if($fileSize > 5000){
                die('Large file exception');
            }else{
                if($fileType != 'jpg' && $fileType != 'png'){
                    die('File type error');
                }else{
                    move_uploaded_file($_FILES[my_image][tmp_name],$fileURL);
                    echo 'Success';
                }
            }
        }
    }else{
        die('Please, select an images');
    }
?>

<html>
<body>
<form action="" method="post" enctype="multipart/form-data">

    <input type="file" name="my_image" id=""/>
    <input type="submit" name="btn" value="Submit" />
</form>

</body>
</html>
