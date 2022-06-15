<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />
    <link rel="stylesheet" href="css/login.css" type="text/css" charset="utf-8" />
    <style>
        
        </style>	
</head>
<body>
    <body>
        <div id="header">
            <a href="trang1.php" id="logo"><img src="images/logo1.jpg" alt="LOGO" /></a>
            <div id="navigation">
                <ul>
                    <li class="first"><a href="trang1.php">Trang chủ</a></li>
                    <li><a href="about.php">Về chúng tôi</a></li>
                    <li><a href="travel.php">Du lịch</a></li>
				    <li><a href="culinary.php">Ẩm thực</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="contact.php">Nhận thông tin</a></li>
                    <li class="selected"><a href="login.php">Đăng nhập</a></li>
                    <li><a href="register.php">Đăng ký</a></li>
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
            <h4>
                Bạn đã đăng ký thành công, mời <a href="login.php">đăng nhập</a>
            </h4>

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