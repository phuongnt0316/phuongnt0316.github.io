<!DOCTYPE html>
<?php
include('control.php');
$get_data=new data();
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
		.contact {
  background-color: #0c2635;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 1050px;
  opacity: 0.9;
}

.contact:hover {
  opacity: 1;
}
/* Full-width input fields */
div#cont>input[type=text] {
  width: 1010px;
  padding: 16px 20px;
  margin: 8px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

div#cont>input[type=text]:focus{
  background-color: #ddd;
  outline: none;
}

	</style>
</head>

<body>
	<div id="header">
		<a href="trang1.php" id="logo"><img src="images/logo1.jpg" alt="LOGO" /></a>
		<div id="navigation">
			<ul>
				<li class="first"><a href="trang1.php">Home</a></li>
				<li><a href="about.php">Về chúng tôi</a></li>
				<li><a href="travel.php">Du lịch</a></li>
				<li><a href="culinary.php">Ẩm thực</a></li>
				<li><a href="blog.php">Blog</a></li>
				<li class="selected"><a href="contact.php">Contact</a></li>
				<li ><a href="login.php">Đăng nhập</a></li>
				<li ><a href="register.php">Đăng ký</a></li>
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
			<div id="cont">
			<h1>Điền vào mẫu sau để nhận thông tin </h1>
			
			<label for="fname"><b>Họ tên</b></label>
    		<input type="text" placeholder="Nhập họ tên" name="txtfullname" id="fname" required>
   			<label for="email"><b>Email</b></label>
   			<input type="text" placeholder="Nhập Email" name="txtemail" id="email" required>
			<input type="submit" class="contact" name="btn_contact" value="Nhận đăng ký">
			
			</div>
			</form>
			<?php
			if(isset($_POST['btn_contact'])){
			 $check=$get_data->check_contact($_POST['txtemail']);
			 if($check>0){
				echo"<script> alert('Email này đã đăng ký')</script>";	
			 }		
			 else{
				$get_contact=$get_data->contact($_POST['txtfullname'],$_POST['txtemail']);
				if($get_contact){
					echo"<script> alert('Đăng ký thành công, chúng tôi đã gửi thông báo về mail của bạn')</script>";	
				}
				else{
					echo"<script> alert('Lỗi!')</script>";
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