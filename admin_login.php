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
				<li class="selected"><a href="admin_login.php">Home</a></li>
				<li><a href="ad_man_blog.php">Blog</a></li>
				<li><a href="ad_man_user.php">User</a></li>
				<li><a href="ad_contact.php">Contact</a></li>
				<li><a href="ad_man_add.php">Subject</a></li>
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
		}
			?>
		</div>
	</div> <!-- /#header -->
	<div id="contents">
		<div class="background">
			<div id="contacts">
				<p>
					This website template has been designed by <a href="http://www.freewebsitetemplates.com/">Free Website Templates</a> for you, for free. You can replace all this text with your own text.
					You can remove any link to our website from this website template, you're free to use this website template without linking back to us.
					If you're having problems editing this website template, then don't hesitate to ask for help on the <a href="http://www.freewebsitetemplates.com/forum/">Forum</a>.
				</p>
				<ul>
					<li>
						<p>
							<b>SUSPENDISSE POTENTI SUSPENDISSE</b>
							1234 Proin sodales, felis at interdum porta 321 Consectetur, XY 12345 <br/>
							Tel: + 457-380-1654 000 <br/>
							Toll Free: + 257-301-9417 000 <br/>
							Email: emailus@companyemail.com
						</p>
					</li>
					<li>
						<p>
							<b>FUSCE FERMENTUM DIGNISSIM</b>
							1234 Proin sodales, felis at interdum porta 321 Consectetur, XY 12345 <br/>
							Tel: + 457-380-1654 000 <br/>
							Toll Free: + 257-301-9417 000 <br/>
							Email: emailus@companyemail.com
						</p>
					</li>
					<li>
						<p>
							<b>FUSCE FERMENTUM DIGNISSIM</b>
							1234 Proin sodales, felis at interdum porta 321 Consectetur, XY 12345 <br/>
							Tel: + 457-380-1654 000 <br/>
							Toll Free: + 257-301-9417 000 <br/>
							Email: emailus@companyemail.com
						</p>
					</li>
					<li>
						<p>
							<b>This website template has been designed by <a href="http://www.freewebsitetemplates.com/">Free Website Templates</a> for you, for free. XY 12345</b>
							Tel: + 457-380-1654 000 <br/>
							Toll Free: + 257-301-9417 000 <br/>
							Email: emailus@companyemail.com
						</p>
					</li>
				</ul>
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