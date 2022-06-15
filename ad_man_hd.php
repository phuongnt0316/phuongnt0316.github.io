<!DOCTYPE html>
<?php 
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
		table {
 		 font-family: arial, sans-serif;
 		 border-collapse: collapse;
 		 width: 100%;
}

		td, th {
  		border: 1px solid #dddddd;
  		text-align: left;
  		padding: 8px;
  		color:black;
  
}  
.f{
    width: 150px;
    height: 100px;
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
				<li><a href="ad_man_hd.php" class="selected">Header</a></li>
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
        <form method="POST">
        <div id="">
				<h1>HEADER BLOG</h1><h4> <a href="ad_header.php" class="icon">Thêm mới</a></h4>
				<table>
					<tr>
						<td>NAME BLOG</td>
                        <td>CONTENT</td>
						<td>FILE1</td>
						<td>FILE2</td>
                        <td>FILE3</td>
						<td colspan="3">OPTION</td>
					</tr>
					<?php
					$select_hd=$get_data->select_hd();
                    foreach($select_hd as $se_hd){
                    ?>
					<tr>
                        <td><?php echo $se_hd['name_header']?></td>
						<td style="text-align:justify"><?php echo $se_hd['content']?></td>
						<td><img src="img_hd/<?php echo $se_hd['file1']?>" class="f"/></td>
						<td><img src="img_hd/<?php echo $se_hd['file2']?>" class="f"/></td>
						<td><img src="img_hd/<?php echo $se_hd['file3']?>" class="f"/></td>
						<td><a href="ad_hd_update.php?update_blog=<?php echo $se_hd['id_header']?>" class="icon"><i class='bx bxs-edit-alt' ></i></a></td>
                        <td><a href="ad_hd_delete.php?delete=<?php echo $se_hd['id_header']?>" onclick="return (confirm('Are you sure dalete?'))" class="icon"><i class='bx bxs-trash'></i></a></td>
                        <td><input type="radio" id="html" name="check_hd" value="<?php echo $se_hd['id_header'] ?>" <?php if($se_hd['check_hd']==1) echo 'checked';?>></td>
					</tr>
					<?php
                    
                }?>	
				</table>
                <input type="submit" name="sbm_update" value="Thay đổi bài viết chủ đề" class="btn1">
                </div>
                </form>
                <?php
                if(isset($_POST['sbm_update'])){
                 $update0=$get_data->update_hd0();
                 if($update0){
                     $update1=$get_data->update_hd1($_POST['check_hd']);
                     if($update1){
                        echo"<script> alert('Đã cập nhật blog header')</script>";  
                     }
                     else{
                        echo"<script> alert('Không thành công')</script>";
                     }
                 }
                 else{
                    echo"<script> alert('Không thành công')</script>";
                 }   
                }
            }
                ?>
                </div>
                
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