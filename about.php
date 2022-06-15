<!DOCTYPE html>
<?php 
session_start();
include("control.php");
$get_data=new data();
if(!empty($_SESSION["email"])){
$select_info=$get_data->get_register($_SESSION["email"],$_SESSION["pass"]);
foreach($select_info as $select){
	$name_login=$select["Fullname"];
	$user_avata=$select["file"];
	$id_regt=$select["id_regt"];
	$_SESSION["Fullname"]=$name_login;
	$_SESSION["file"]=$user_avata;
}
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
	<style>
	#sidebar {
    float: left;
    width: 270px;
    margin: 0;
    padding: 42px 20px 0 10px;
	}
	</style>
</head>

<body>
	<div id="header">
		<a href="trang1.php" id="logo"><img src="images/logo1.jpg" alt="LOGO" /></a>
		<div id="navigation">
			<ul>
				<li><a href="trang1.php">Trang chủ</a></li>
				<li class="selected"><a href="about.php">Về chúng tôi</a></li>
				<li><a href="travel.php">Du lịch</a></li>
				<li><a href="culinary.php">Ẩm thực</a></li>
				<li><a href="blog.php">Blog</a></li>
				<?php
				if(empty($_SESSION["email"])){
				?>
				<li><a href="contact.php">Nhận thông tin</a></li>
				<li><a href="login.php">Đăng nhập</a></li>
				<li><a href="register.php">Đăng ký</a></li>
				<?php
				}
				else{?>
					<li><img src="img/<?php echo $user_avata?>" width="40px" height="40px" style="border-radius:50%;padding-right:0px;">
					</li>
					<li><a href="user_login.php" class="name" style="padding-left: 0px;margin-left:0px;"><?php echo $name_login;?></a></li>
					<li><a href="logout.php">Thoát</a></li>	
				<?php
				}
				?>
			</ul>
		</div>
		<div id="search">
		<form action="" method="POST">
				<input type="text" value="Search" class="txtfield" name="txt_search">
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
			<h3>Chia sẻ trải nghiệm của mọi người</h3>
			<p>
			Đây là blog miễn phí chia sẻ những thông tin du lịch hữu ích cho bạn. Việt Nam là một quốc gia tiềm tàng về thiên nhiên, ẩm thực, cơ sở hạ tầng rất phong phú. Vì thế mình muốn chia sẻ cho các bạn những kinh nghiệm du lịch của mình. Để hy vọng bạn sẽ có một trải nghiệm tốt nhất tại nơi mà bạn sắp đến.
			</p>

			<h3>Địa điểm hay</h3>
			<img src="images/anh1.jpg" height="500" width="900px"/>

			<h3>Món ăn ngon</h3>
			<div class="images">
				<img src="images/banhmi.jpg" alt="Img" height="200" width="300px" class="preview" />
				<img src="images/banhxeo.jpg" alt="Img" height="200" width="300px" />
				<img src="images/che.jpg" alt="Img" height="200" width="300px" class="last" />
			</div>
		</div>
	</div> <!-- /#contents -->
	<div id="footer">
		<ul class="contacts">
			<h3>Contact Us</h3>
			<li><span>Email</span><p>: company@email.com</p></li>
			<li><span>Address</span><p>: 189 Cầu Giấy, Hà Nội</p></li>
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