<?php
ob_start();
include('control.php');
$get_data=new data();
$post=$get_data->post($_GET['post']);
if($post){
    echo"<script> alert('Post')</script>";
}
    else
{
echo"<script> alert('Khong thanh cong')</script>";
}

header('location:ad_man_blog.php');
?>