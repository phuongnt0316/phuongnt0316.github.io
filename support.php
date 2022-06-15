<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
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
		<a href="trang1.php" id="logo"><img src="images/logo1.jpg" alt="LOGO" /></a>
		<div id="navigation">
			<ul>
				<li class="first"><a href="trang1.php">Home</a></li>
				<li><a href="about.php">About us</a></li>
				<li><a href="services.php">Services</a></li>
				<li><a href="solutions.php">Solutions</a></li>
				<li class="selected"><a href="support.php">Support</a></li>
				<li><a href="blog.php">Blog</a></li>
				<li><a href="contact.php">Contact</a></li>
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
			<div id="support">
				<span>Looking for more templates? Just browse through all our <a href="http://www.freewebsitetemplates.com/">Free Website	Templates</a> and find what you&acute;re looking for.</span>
				<p>
					But if you don&acute;t find any
					website template you can use, you can try our <a href="http://www.freewebsitetemplates.com/freewebdesign/">Free Web Design</a> service and tell us all about it. Maybe you&acute;re looking for something different,
					something special. And we love the challenge of doing something	different and something special.
				</p>
				<ul>
					<li>
						<img src="images/globe2.jpg" alt="SupportImg" />
						<p>
							<b>Nulla ut metus nulla. Proin vulputate tristique feugiat</b>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut turpis vitae purus cursus malesuada at sed lacus. Integer pretium luctus felis, a dictum dui malesuada in. Praesent nunc erat, mollis 
							sed varius id, blandit ut nisi. Aliquam in ipsum purus, in dignissim turpis. Nullam a adipiscing felis.
						</p>
					</li>
					<li>
						<img src="images/tools2.jpg" alt="SupportImg" />
						<p>
							<b>Please feel free to remove some or all the text and links of this page and replace it with your own About content.</b>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut turpis vitae purus cursus malesuada at sed lacus. Integer pretium luctus felis, a dictum dui malesuada in. Praesent nunc erat, mollis 
							sed varius id, blandit ut nisi. Aliquam in ipsum purus, in dignissim turpis.
						</p>
					</li>
					<li>
						<img src="images/check2.jpg" alt="SupportImg" />
						<p>
							<b>Nulla ut metus nulla. Proin vulputate tristique feugiat</b>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut turpis vitae purus cursus malesuada at sed lacus. Integer pretium luctus felis, a dictum dui malesuada in. Praesent nunc erat, mollis 
							sed varius id, blandit ut nisi. Aliquam in ipsum purus, in dignissim turpis.
						</p>
					</li>
					<li>
						<img src="images/graph2.jpg" alt="SupportImg" />
						<p>
							<b>This website template has been designed by <a href="http://www.freewebsitetemplates.com/">Free Website Templates</a> for you, for free.</b>
							You can remove any link to our website from this website template, you're free to use this website template without linking back to us.
							If you're having problems editing this website template, then don't hesitate to ask for help on the <a href="http://www.freewebsitetemplates.com/forum/">Forum</a>.
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