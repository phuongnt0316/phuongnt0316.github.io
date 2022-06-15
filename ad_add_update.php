<!DOCTYPE html>
<?php 
ob_start();
session_start();
include("control.php");
$get_data=new data();
if(empty($_SESSION["email"])){
    header('location:login.php');
}
else{
$select_info=$get_data->get_register($_SESSION["email"],$_SESSION["pass"]);
foreach($select_info as $select){
	$name_login=$select["Fullname"];
	$user_avata=$select["file"];
}
$select_id=$get_data->select_id($_GET['update_add']);
foreach($select_id as $ad){
    $id=$ad['id_add'];
    $name=$ad['name_add'];
}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Business Solutions</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />	
	<!--[if lte IE 7]>
		<link rel="stylesheet" href="css/ie.css" type="text/css" charset="utf-8" />	
	<![endif]-->
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://kit.fontawesome.com/a6248806d8.js" crossorigin="anonymous"></script>
	<style>
        #cont {
        box-sizing: border-box;
        }

        /* Add padding to containers */
        .container {
        padding: 16px;
        background-color: white;
        }
        .name{
            width: 1010px;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;

        }
        /* Full-width input fields */
        div#cont>input[type=text]{
        width: 1010px;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
        }

        div#cont>input[type=text]:focus {
        background-color: #ddd;
        outline: none;
        }
        .btn1{
        background-color: #0c2635;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 505px;
        opacity: 0.9;
        }

        .btn1:hover {
        opacity: 1;
}
	</style>
</head>

<body>
	<div id="header">
		<a href="admin_login.php" id="logo"><img src="images/logo1.jpg" alt="LOGO" /></a>
		<div id="navigation">
			<ul>
				<li class="first"><a href="admin_login.php">Home</a></li>
				<li><a href="ad_man_blog.php">Blog</a></li>
				<li><a href="ad_man_user.php">User</a></li>
				<li><a href="ad_contact.php">Contact</a></li>
				<li><a href="ad_man_add.php">Địa điểm</a></li>
				<li><a href="ad_man_hd.php">Add Header</a></li>
				<li><a href=""><img src="img/<?php echo $user_avata?>" width="40px" height="40px" style="border-radius:50%;"></a></li>
				<li><a href="logout.php">Log Out</a></li>
			</ul>
		</div>
		<div id="search">
        <form action="" method="POST">
				<input type="text" placeholder="Search" class="txtfield" name="txt_search">
				<input type="submit" value="" class="button" name="btn_search">
			</form>
			<?php
			if(isset($_POST["btn_search"])){
				?>
				<script>
				location.href = "ad_search_blog.php?search=<?php echo $_POST['txt_search'];?>";
				</script>
			<?php
			}
			?>
		</div>
	</div> <!-- /#header -->
	<div id="contents">
    <div class="background">
    <form enctype="multipart/form-data" method="POST">
    <div class="container" id="cont">
    <h1>Cập nhật tên địa điểm</h1>
	<label"><b>ID</b></label>
    <input type="text"  name="txtid" value="<?php echo $id;?>" class="name" disabled>
    <label><b>Tên</b></label>
    <input type="text"  name="txtname" value="<?php echo $name; ?>" class="name">
    <input type="submit" name="sbm_update" value="Cập nhật" class="btn1">
    </div>
    </form>
    </div>
   
    <?php
    if(isset($_POST['sbm_update'])){
        $update=$get_data->update_id($id,$_POST['txtname']);
        if($update){
            echo"<script> alert('Đã cập nhật')</script>";?>
            <script>
				location.href = "ad_man_add.php";
				</script>
                <?php
        }
        else{
            echo"<script> alert('Không thành công')</script>";
        }
    }
        }
    ?>
                
	</div> <!-- /#contents -->
	<div id="footer">
		<ul class="contacts">
			<h3>Contact Us</h3>
			<li><span>Email</span><p>: company@email.com</p></li>
			<li><span>Address</span><p>: 189 Lorem Ipsum Pellentesque, Mauris Etiam ut velit odio Proin id nisi enim 0000</p></li>
			<li><span>Phone</span><p>: 117-683-9187-000</p></li>
		</ul>
		<ul id="connect">
			<h3>Get Updated</h3>
			<li><a href="blog.php">Blog</a></li>
			<li><a href="http://facebook.com/freewebsitetemplates" target="_blank">Facebook</a></li>
			<li><a href="http://twitter.com/fwtemplates" target="_blank">Twitter</a></li>
		</ul>
		<div id="newsletter">
			<p><b>Sign-up for Newsletter</b>
				In sollicitudin vulputate metus, sed commodo diam elementum nec. Sed et risus sed magna convallis adipiscing.
			</p>
			<form action="" method="">
				<input type="text" value="Name" class="txtfield" onblur="javascript:if(this.value==''){this.value=this.defaultValue;}" onfocus="javascript:if(this.value==this.defaultValue){this.value='';}" />
				<input type="text" value="Enter Email Address" class="txtfield" onblur="javascript:if(this.value==''){this.value=this.defaultValue;}" onfocus="javascript:if(this.value==this.defaultValue){this.value='';}" />
				<input type="submit" value="" class="button" />
			</form>
		</div>
		<span class="footnote">&copy; Copyright &copy; 2011. All rights reserved</span>
	</div> <!-- /#footer -->
</body>
</html>