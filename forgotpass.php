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
		div#cont>input[type=text]:focus,input[type=file]:focus,select:focus {
  background-color: #ddd;
  outline: none;
}
div#cont>input[type=text]{
  width: 1010px;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
.btn3 {
	background-color: #0c2635;
	color: #fdfdfd;
	display: inline-block;
	font-size: 14px;
	font-weight: bold;
	text-align: center;
	text-decoration: none;
	text-shadow: -3px 0 3px #053131;
	text-transform: uppercase;
	background-position: 0 -108px;
	font: 22px/49px Georgia, "Times New Roman", Times, serif;
	height: 49px;
	width: 222px;
}
.btn3:hover {
	background-position: -232px -108px;
}

	</style>
</head>

<body>
	<div id="header">
		<a href="trang1.php" id="logo"><img src="images/logo1.jpg" alt="LOGO" /></a>
		<div id="navigation" class="menu">
		<ul>
		<li class="first selected"><a href="trang1.php">Trang chủ</a></li>
				<li><a href="about.php">Về chúng tôi</a></li>
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
		<form method="post">
			<div class="container" id="cont">
			<!-- <a href="user_infor.php?update=<?php// echo $id_regt?>" class="icon"><input type="submit" value="Update Information" class="btn1"></i></a><br><br> -->
            
				<h1>Forgot password</h1>
							<label>Nhập địa chỉ gmail của bạn.</label>
							<input type="text" name="txt_email" placeholder="Your Email"  >					
							<input type="submit" name="sbm" value="Search" class="btn3">
                            <a href="login.php">
                            <input type="button" name="btn_cancel" value="Cancel" class="btn3">
                            </a>		
		
		</div>
		</form>
<?php
if(isset($_POST["sbm"])){
    if(empty($_POST["txt_email"])){    echo("<script>alert('Không được để trống');</script>");}
    else{
    $check=$get_data->check_email($_POST["txt_email"]);
//$email=$get_data->in_mail($_POST["txtuser"]);

if ($check==1)
{	$pass=$get_data->get_pass($_POST["txt_email"]);
    $name=$get_data->get_name($_POST["txt_email"]);
	$username='phuong16397@gmail.com';
	$password='Pphuong16';
	$address=$_POST["txt_email"];
	$subject='FORGOT PASSWORD!!';
	$body='Dear, '.$name[0].' Mật khẩu của bạn là: '.$pass[0];
	$altbody='Thanks ';
	$sendMail=$get_data->sendMail($username,$password,$address,$subject,$body,$altbody);
	if($sendMail==1){
		echo("<script>alert('Kiểm tra mail để nhận mật khẩu');</script>");
		header("location:login.php");
	}
	else{
		echo("<script>alert('Đã xảy ra lỗi!');</script>");	}
}
else
echo("<script>alert('Email chưa được đăng ký');</script>");
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