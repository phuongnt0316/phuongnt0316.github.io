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
		<div id="navigation" class="menu">
			<ul>
			<li class="first"><a href="admin_login.php">Home</a></li>
			<li><a href="about.php">About us</a></li>
			<li><a href="travel.php">Du lịch</a></li>
			<li><a href="culinary.php">Ẩm thực</a></li>
			<li><a href="blog.php">Blog</a></li>
			<li><img src="img/<?php echo $user_avata?>" width="40px" height="40px" style="border-radius:50%;padding-right:0px;">
			</li>
			<li><a class="name" style="padding-left: 0px;margin-left:0px;"><?php echo $name_login;?></a>
		</li>
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
			<!-- <a href="user_infor.php?update=<?php// echo $id_regt?>" class="icon"><input type="submit" value="Update Information" class="btn1"></i></a><br><br> -->
				<ul>
                <li><a href="user_changepass.php">Thay đổi mật khẩu</a></li>
					<li><a href="user_infor.php?update=<?php echo $id_regt ?>">Thông tin cá nhân</a></li>
					<li><a href="add_blog.php">Đăng bài</a></li>
					<li><a href="user_blog_history.php">Lịch sử bài viết</a></li>
				</ul>
				
		</div>
		<form enctype="multipart/form-data" method="POST">
        <div class="container" id="cont">
        <h1>Add Blog</h1>
	
					
							<label>Chủ đề</label>
							<select name="txt_sub" class="inputs" >
                                <?php
							$sub=$get_data->select_subject();
							foreach($sub as $se){
							?>
                            <option value="<?php echo $se['id_sub'] ?>"><?php echo $se['Name_sub'] ?></option>

							<?php }?>
                         </select>
						
							<label>Tên blog</label>
							<input type="text" name="txt_nameblog" placeholder="Name blog"  >
						
							<label>Địa điểm</label>
							<select name="txt_add" class="inputs" >
							<?php 
							$se_add=$get_data->select_add();
							foreach($se_add as $add_blog){
							?>
                            <option value="<?php echo $add_blog['id_add'] ?>"><?php echo $add_blog['name_add'] ?></option>

							<?php }?>
                         </select>	
						
							<label>Rút gọn</label>
							<textarea name="txt_sort" placeholder="Sort blog" rows="4"></textarea>
							<label>Đầy đủ</label>
                            <textarea name="txt_long" placeholder="Long blog" rows="4"></textarea>
						
							<label>Hình ảnh minh họa</label>
							<input type="file" class="file" name="txtFile"/>
						
						
							<input type="submit" name="txt_submit" value="Send Now" class="btn3">
						
                        <!-- <li>
							<label>Date blog</label>
							<input type="date" name="txt_dateblog"  placeholder="Date blog">
						</li> -->
        </div>
		</form>
				<?php
				 //goi den class
				if(isset($_POST['txt_submit'])){
					if(empty($_POST["txt_nameblog"])||empty($_POST["txt_sort"])||empty($_POST["txt_long"])) echo "<script>alert('Not null')</script>";
					else{
						move_uploaded_file($_FILES['txtFile']['tmp_name'],"img_blog/". $_FILES['txtFile']['name']);
                        $check_blog=0;
				        $insert=$get_data->add_blog($id_regt,$_POST['txt_sub'],$_POST['txt_nameblog'],$_POST['txt_add'],$_POST["txt_sort"],$_POST["txt_long"],$_FILES['txtFile']['name'],$check_blog);
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