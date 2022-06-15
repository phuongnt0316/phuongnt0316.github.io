<?php
include('control.php');
$get_data=new data();
$delete=$get_data->delete_id($_GET['delete']);
if($delete){
    header("location: ad_man_add.php");
}
else{
    echo "<script> alert 'Not delete'</script>";
}
?>