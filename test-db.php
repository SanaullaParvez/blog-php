<?php

echo 'sss';

$con = mysqli_connect("localhost","admin","D@cker","blog-php");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
echo '<pre>';
print_r($con);
//phpinfo();
?>