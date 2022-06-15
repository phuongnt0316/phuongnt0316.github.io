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
	$id_regt=$select["id_regt"];
	$_SESSION["Fullname"]=$name_login;
	$_SESSION["file"]=$user_avata;
}
$select_blog=$get_data->select_user_blog($id_regt);
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Business Solutions</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />	
	<!--[if lte IE 7]>
		<link rel="stylesheet" href="css/ie.css" type="text/css" charset="utf-8" />	
	<![endif]-->
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
		.imgblog{
			width: 200px;
		}  
	</style>
</head>

<body>
	<div id="header">
		<a href="trang1.php" id="logo"><img src="images/logo1.jpg" alt="LOGO" /></a>
		<div id="navigation" class="menu">
			<ul>
			<li class="first"><a href="trang1.php">Trang chủ</a></li>
			<li><a href="about.php">Về chúng tôi</a></li>
			<li><a href="travel.php">Du lịch</a></li>
				<li><a href="culinary.php">Ẩm thực</a></li>
			<li><a href="blog.php">Blog</a></li>
			<li><img src="img/<?php echo $user_avata?>" width="40px" height="40px" style="border-radius:50%;padding-right:0px;">
			</li>
			<li><a href="user_login.php" class="name" style="padding-left: 0px;margin-left:0px;"><?php echo $name_login;?></a></li>
			<li><a href="logout.php">Thoát</a></li>
			</ul>
		</div>
		<div id="search">
		<form action="" method="POST">
				<input type="text" placeholder="Nhập từ khóa..." class="txtfield" name="txt_search">
				<input type="submit" value="" class="button" name="btn_search">
			</form>
			<?php
			if(isset($_POST["btn_search"])){
				?>
				<script>
				location.href = "search.php?search=<?php echo $_POST['txt_search'];?>";
				</script>
			<?php
			}
			?>
		</div>
	</div> <!-- /#header -->
	<div id="contents">
		<div class="background">
			<div id="menu">
			<!-- <a href="user_infor.php?update=<?php// echo $id_regt?>" class="icon"><input type="submit" value="Update Information" class="btn1"></i></a><br><br> -->
				<ul>
				<li><a href="user_changepass.php">Thay đổi mật khẩu</a></li>
					<li><a href="user_infor.php?update=<?php echo $id_regt ?>">Thông tin cá nhân</a></li>
					<li><a href="add_blog.php">Đăng bài</a></li>
					<li><a href="user_blog_history.php">Lịch sử bài viết</a></li>
				</ul>
			<div id="">
            <h1>History blog</h1>
				<table>
					<tr>
						<!-- <td>ID BLOG</td> -->
                        <td>NAME BLOG</td>
						<td>DATE</td>
						<td>SORT BLOG</td>
						<td>LONG BLOG</td>
						<td>IMAGE</td>
					</tr>
                    <?php
                    foreach($select_blog as $se_blog){
                    ?>
					<tr>
						<!-- <td><?php //echo $se_blog['id_blog']?></td> -->
						<td style="text-align:justify; width:80px"><?php echo $se_blog['Name_blog']?></td>
						<td style="text-align:justify; width:90px;"><?php echo $se_blog['Date_blog']?></td>
						<td style="text-align:justify;"><?php echo $se_blog['S_blog']?></td>
						<td style="text-align:justify;"><?php echo $se_blog['L_blog']?></td>
						<td><img src="img_blog/<?php echo $se_blog['image']?>" class="imgblog"></td>
					</tr>
					
					<?php
					}
				}
					?>
						
				</table>
                <a href=admin_user.php><input type="button" name="sbm" value="Back" class="btn3" ></a>

            </div>
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
			<p><b>Nhận thông tin </b>
				Đăng ký nhận thông báo qua email để không bỏ lỡ bài viết mới nhất.
			</p>
			<form action="" method="post">
				<input type="text" placeholder="Tên" class="txtfield"  name="txt_name"/>
				<input type="text" placeholder="Email" class="txtfield"  name="txt_email"/>
				<input type="submit" value="" class="button" name="btnsub" />
			</form>
			<?php
			if(isset($_POST['btnsub'])){
			 $check=$get_data->check_contact($_POST['txt_email']);
			 if($check>0){
				echo"<script> alert('Email này đã đăng ký')</script>";	
			 }		
			 else{
				$get_contact=$get_data->contact($_POST['txt_name'],$_POST['txt_email']);
				if($get_contact){
						$username='phuong16397@gmail.com';
						$password='Pphuong16';
						$address=$_POST['txt_email'];
						$subject='BLOG TRAVEl ';
						$body='Dear '.$_POST['txt_name'].', bạn đã đăng ký nhận thông tin tại trang  BLOG TRAVEL ';
						$altbody='Thanks ';
						$sendMail=$get_data->sendMail($username,$password,$address,$subject,$body,$altbody);
						if($sendMail==1){
						?> <script>
						location.href = 'contact_success.php';
						</script>
						<?php
					}  
						
						else
						echo"<script> alert('Không thành công')</script>";
						  
					}	
				
				else{
					echo"<script> alert('Lỗi!')</script>";
				}
			}
			}
			?>	
		</div>
		<span class="footnote">&copy; Copyright &copy; 2011. All rights reserved</span>
	</div> <!-- /#footer -->
</body>
</html>