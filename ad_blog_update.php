<!DOCTYPE html>
<?php
ob_start(); 
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
}
$select_blog=$get_data->select_blog_id($_GET['update_blog']);
foreach($select_blog as $s){
    $name_blog=$s['Name_blog'];
	$id_add=$s['id_add'];
    $id_sub=$s['id_sub'];
    $l_blog=$s['L_blog'];
    $s_blog=$s['S_blog'];
    $file=$s['image'];
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

/* Full-width input fields */
div#cont>input[type=text],input[type=file],textarea,select {
  width: 1010px;
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
.btn1{
  background-color: #0c2635;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn1:hover {
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
			<div id="menu">
				
		</div>
        <div class="container" id="cont">
		<form enctype="multipart/form-data" method="POST">
        <h1>Update Blog</h1>
							<label>Chủ đề</label>
							<select name="txt_sub" style="width: 100%;
  														padding: 15px;
														margin: 5px 0 22px 0;
														display: inline-block;
														border: none;
														background: #f1f1f1;">
                                <?php
							$sub=$get_data->select_subject();
							foreach($sub as $se){
							?>
                            <option value="<?php echo $se['id_sub']; ?>"<?php if($id_sub==$se['id_sub']) echo 'selected'; ?> ><?php echo $se['Name_sub'] ?></option>

							<?php }?>
                         	</select>
							<label>Tên blog</label>
							<input type="text" name="txt_nameblog" value="<?php echo $name_blog ?>" style="  width: 1010px;
																											padding: 15px;
																											margin: 5px 0 22px 0;
																											display: inline-block;
																											border: none;
																											background: #f1f1f1;" >
							<label>Địa điểm</label>
							<select name="txt_add" style="width: 100%;
															padding: 15px;
															margin: 5px 0 22px 0;
															display: inline-block;
															border: none;
															background: #f1f1f1;" >
							<?php 
							$se_add=$get_data->select_add();
							foreach($se_add as $add_blog){
							?>
                            <option value="<?php echo $add_blog['id_add'] ?>"<?php if($add_blog['id_add']==$id_add) echo 'selected'; ?>><?php echo $add_blog['name_add'] ?></option>

							<?php }?>
                         </select>
							<label>Rút gọn</label>
                            <textarea name="txt_sort"  rows="4"><?php echo $s_blog; ?></textarea>
							<label>Đầy đủ</label>
                            <textarea name="txt_long"  rows="4"><?php echo $l_blog; ?></textarea>
                        <h1> Old File</h1>
	                    <img src="img_blog/<?php echo $file;?>" alt="" class="imageChange">
							<label>Hình ảnh minh họa</label>
							<input type="file" class="file" name="txtFile"/>
							<input type="submit" name="sbm" value="Cập nhật" class="btn3">
							</div>
				</form>
				<?php
	    if(isset($_POST["sbm"]))
    {
			if (empty($_FILES['txtFile']['name'])){
				$_FILES['txtFile']['name']=$file;
			}
			
            	move_uploaded_file($_FILES['txtFile']['tmp_name'],"img_blog/".$_FILES['txtFile']['name']);
	            $update=$get_data->update_blog($_GET['update_blog'],$_POST['txt_sub'],$_POST['txt_nameblog'],$_POST['txt_add'],$_POST["txt_sort"],$_POST["txt_long"],$_FILES['txtFile']['name']);
            	if($update)
            	{?>
				<script>
				location.href = 'ad_man_blog.php';
				</script>
				<?php
            	}
            	else{
                	echo"<script> alert('Không thành công')</script>";
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