<?php
ob_start();
include('control.php');
$get_data=new data();
$unpost=$get_data->unpost($_GET['unpost']);
if($unpost){
    echo"<script> alert('Unpost')</script>";
}
   else
{
echo"<script> alert('Khong thanh cong')</script>";
}
header('location:ad_man_blog.php');
?>