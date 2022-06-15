<!DOCTYPE html>
<?php 
session_start();
include("control.php");
$get_data=new data();
$select_info=$get_data->get_register($_SESSION["email"],$_SESSION["pass"]);
foreach($select_info as $select){
	$name_login=$select["Fullname"];
	$user_avata=$select["file"];
	$id_regt=$select["id_regt"];
	$_SESSION["Fullname"]=$name_login;
	$_SESSION["file"]=$user_avata;
}?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Business Solutions</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />	
	<!--[if lte IE 7]>
		<link rel="stylesheet" href="css/ie.css" type="text/css" charset="utf-8" />	
	<![endif]-->
	<style>
#cont {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
div#cont>input[type=text],input[type=file],textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

div#cont>input[type=text]:focus,input[type=file]:focus,select:focus {
  background-color: #ddd;
  outline: none;
}
div#cont>select{
	width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.btn3 {
  background-color: #0c2635;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn3:hover {
  opacity: 1;
}

/* Add a blue text color to links */
div#cont>a {
  color: dodgerblue;
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
				<li><a href="ad_man_hd.php">Header</a></li>
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
			<div id="menu">
		</div>
		<form enctype="multipart/form-data" method="POST">
        <div class="container" id="cont">
        <h1>Add BlogHeader</h1>
				    		<label>Tên blog</label>
							<input type="text" name="txt_nameblog" placeholder="Name blog"  >
							<label>Nội dung</label>
							<textarea name="txt_nd" placeholder="Sort blog" rows="4"></textarea>
							<label>Hình ảnh 1</label>
							<input type="file" class="file" name="txtFile1"/>
                            <label>Hình ảnh 2</label>
							<input type="file" class="file" name="txtFile2"/>
                            <label>Hình ảnh 3</label>
							<input type="file" class="file" name="txtFile3"/>
							<input type="submit" name="txt_submit" value="Send Now" class="btn3">
        </div>
		</form>
				<?php
				 //goi den class
				if(isset($_POST['txt_submit'])){
					if(empty($_POST["txt_nameblog"])||empty($_POST["txt_nd"])) echo "<script>alert('Not null')</script>";
					else{
						move_uploaded_file($_FILES['txtFile1']['tmp_name'],"img_hd/". $_FILES['txtFile1']['name']);
                        move_uploaded_file($_FILES['txtFile2']['tmp_name'],"img_hd/". $_FILES['txtFile2']['name']);
                        move_uploaded_file($_FILES['txtFile3']['tmp_name'],"img_hd/". $_FILES['txtFile3']['name']);
                        $check_hd=0;
				        $insert=$get_data->insert_hd($_POST['txt_nameblog'],$_POST['txt_nd'],$_FILES['txtFile1']['name'],$_FILES['txtFile2']['name'],$_FILES['txtFile3']['name'],$check_hd);
				if($insert) echo"<script>alert('Blog  has been sent')</script>";
				else echo"<script> alert('Blog has not  been sent')</script>";
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