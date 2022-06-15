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
#adbox .body {
    width: 1100px;
    margin: 0 auto 0;
}
.img{
	width:120px;
	height:100px;
}
#sidebar {
	margin: 0;
    float: left;
    width: 270px;
	height:270px;
    padding: 20px 20px 0 10px;
}
#adbox .footer {
    height: 60px;
    width: 1100px;
    margin: 0 auto;
    position: relative;
}
#adbox {
    background-color: #ffffff;
    height: 540px;
    padding: 30px 0 0;
}
#adbox .body {
    width: 1100px;
    margin: 0 auto 0;
    background-color: #e9f1f4;
}
#adbox div.footer ul {
    /* background-color: #dcdcdc; */
    display: inline-block;
    width: 1100px;
    list-style: none;
    margin: 0 auto;
    border-radius: 3px;
    padding: 0;
    position: absolute;
    bottom: -80px;
}
#adbox div.footer ul li {
	margin:1px;
    float: left;
    width: 324px;
    padding: 20px 20px 18px;
}
#footer{
	color:white;
    line-height: 20px;
    width: 940px;
    margin: 0 auto;
    padding: 30px 10px;
}
#adbox .details {
    color: #2f2f2f;
    height: 320px;
    width: 350px;
    padding: 40px 20px 40px 10px;
}
#adbox div.images {
    margin: 30px 0;
    float: right;
    display: inline-block;
    height: 330px;
    width: 710px;
    overflow: hidden;
}
#header {
    width: 1100px;
    margin: 18px auto;
    padding: 40px 0;
    position: relative;
}

	</style>
</head>

<body>
	<div id="header">
		<a href="trang1.php" id="logo"><img src="images/logo1.jpg" alt="LOGO" /></a>
		<div id="navigation">
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
					<li><img src="img/<?php echo $user_avata?>" width="40px" height="40px" style="border-radius:50%;padding-right:0px;"></li>
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
	<div id="adbox">
		<div class="body">
			<div class="images">
				<?php 
				$header=$get_data->post_hd();
				foreach($header as $hd){

				
				?>
				<img src="img_hd/<?php echo $hd['file1'] ?>" alt="Img" height="280" width="450px" class="preview" />
				<img src="img_hd/<?php echo $hd['file2'] ?>" height="140" width="250px" />
				<img src="img_hd/<?php echo $hd['file3'] ?>"height="140" width="250px" class="last" />
			</div>
			<div class="details">
				<p>
					<span>
						<?php echo $hd['name_header'] ?>
					</span>
					<?php echo $hd['content'] ?>
				</p>
				<?php
									}
				?>
			</div>
		</div>
		<div class="footer">
			<ul>
			<?php
				$top=$get_data->post_blog3();
				foreach($top as $blog){?>
				<li class="selected">

					<a href="fullblog.php?content=<?php echo $blog['id_blog'];?>" ><img src="img_blog/<?php echo $blog['image'];?>" class="img"/></a>
					<p style="color:black">
					<?php echo $blog['Name_blog']; ?>
					</p>
				</li>
				
				<?php
				}
				?>
			</ul>
		</div>
	</div> <!-- /#adbox -->
	<div id="contents">
		<div class="body">
			<div id="sidebar">
				<h3>Blog</h3>
				<ul>
				<?php
				$top=$get_data->post_blog3();
				foreach($top as $blog){?>
					<li>
						<a href="fullblog.php?content=<?php echo $blog['id_blog'];?>" style="text-decoration: none; color:white"><?php echo $blog['Name_blog']; ?></a>
						<span><?php echo $blog['Date_blog'];?><a href="blog.php">8</a></span>
					</li>
					<?php
				}
				?>
				</ul>
			</div>
		</div>
	</div> <!-- /#contents -->
	<div id="footer">
		<ul class="contacts">
			<h3>Thông tin liên hệ</h3>
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