<!DOCTYPE html>
<?php 
ob_start();
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
		li{
			list-style:none;
		}
		.img{
			display: block; margin-left: auto; margin-right: auto;
			width: 500px;
			height:350px;
		}
	
	</style>
</head>

<body>
<div id="header">
		<a href="trang1.php" id="logo"><img src="images/logo1.jpg" alt="LOGO" /></a>
		<div id="navigation">
			<ul>
				<li><a href="trang1.php">Trang chủ</a></li>
				<li><a href="about.php">Về chúng tôi</a></li>
				<li><a href="travel.php">Du lịch</a></li>
				<li><a href="culinary.php">Ẩm thực</a></li>
				<li class="selected"><a href="blog.php" >Blog</a></li>
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
				<input type="text" placeholder="Search" class="txtfield" name="txt_search">
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
			<div id="blogs">
				<div class="sidebar">
					<div class="posts">
						<h3>Bài viết gần đây</h3>
						<ul>
							<?php
							$blog=$get_data->post_blog5();
							foreach($blog as $blog5){
							?>
								<li><a href="fullblog.php?content=<?php echo $blog5['id_blog'];?>"><?php echo $blog5['Name_blog'] ?></a></li>
							<?php	
							}
							?>
						</ul>
					</div>
					<div class="archives">
						<h3>Địa điểm</h3>
						<ul>
							<?php
							$addr=$get_data->select_add();
							foreach($addr as $dd){
							?>
							<li><a href="blog_dd.php?id_add=<?php echo $dd['id_add'];?>"><?php echo $dd['name_add'] ?></a></li>
						<?php
							}
						?>
						</ul>
					</div>
				</div>
				<div class="section" id="blog">
				<?php
				if(!empty($_GET['id_add'])){
                    $id_add=$_GET['id_add'];
					$select_add=$get_data->blog_dd($id_add);
                    if(mysqli_fetch_array($select_add)==0){?>
                       <h2> Không có dữ liệu. Mời bạn xem <a href="blog.php">những bài viết khác</a></h2>
					<?php
                    }
                    else{
					foreach($select_add as $blog_dd){					
					?>
					<li>
						<div>
						<h4><?php echo $blog_dd['Name_blog'];?></h4>
						<p  id="time"><?php echo $blog_dd['Date_blog'];?>|<?php echo $blog_dd['Fullname']?></p>
						</div>
						<img src="img_blog/<?php echo $blog_dd['image'];?>" alt="" class="img">
						<p>
							<?php echo $blog_dd['S_blog']; ?>
						</p>
						<a href="fullblog.php?content=<?php echo $blog_dd['id_blog'];?>" class="more">Đọc tiếp&gt;&gt;</a>
					</li>
					<?php
					}
                }
                }
					?>
				</div>
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