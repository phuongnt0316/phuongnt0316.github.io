<!DOCTYPE html>
<?php 
ob_start();
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
</head>

<body>
	<div id="header">
		<a href="admin_login.php" id="logo"><img src="images/logo1.jpg" alt="LOGO" /></a>
		<div id="navigation">
			<ul>
				<li class="first"><a href="admin_login.php">Home</a></li>
				<li><a href="ad_man_blog.php">Blog</a></li>
				<li class="selected"><a href="ad_man_user.php">User</a></li>
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
			<div id="contacts">
            <h1>User  <a href="register.php" class="icon"><i class='bx bx-user-plus' ></i></a></h1>
				<table>
					<tr>
						<td>ID</td>
						<td>USER</td>
						<td>NAME BLOG</td>
                        <td>DATE</td>
						<td>SORT BLOG</td>
						<td>LONG BLOG</td>
						<td colspan="3">OPTION</td>
					</tr>
					<?php
					$select_blog=$get_data->select_user_blog($_GET['user_id']);
                    foreach($select_blog as $se_blog){
                    ?>
					<tr>
						<td><?php echo $se_blog['id_blog']?></td>
                        <td><?php echo $se_blog['id_regt']?></td>
						<td><?php echo $se_blog['Name_blog']?></td>
						<td><?php echo $se_blog['Date_blog']?></td>
						<td><?php echo $se_blog['S_blog']?></td>
						<td><?php echo $se_blog['L_blog']?></td>	
						<td><a href="admin_blog_update.php?update_blog=<?php echo $se_blog['id_blog']?>" class="icon"><i class='bx bxs-edit-alt' ></i></a>
                        <td><a href="admin_blog_delete.php?delete=<?php echo $se_blog['id_blog']?>" onclick="return (confirm('Are you sure dalete?'))" class="icon"><i class='bx bxs-trash'></i></a></td>
						<?php if($se_blog['check_blog']==0){
							echo "<td><a href='post.php?post=".$se_blog['id_blog']."' class='post'><input type='submit' class='btn1' value='POST'></a></td>";
						}
							
						else
						echo "<td><a href='unpost.php?unpost=".$se_blog['id_blog']."' class='unpost'><input type='submit' class='btn1' value='UNPOST'></a></td>";
						
					}
					
					?>
                    </td>

					</tr>
					<?php
                    }?>	
				</table>
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