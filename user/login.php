<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>PHPJabbers.com | Free Computer Store Website Template</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
				<header id="header" class="alt">
					<a href="index.php" class="logo"><strong>MTB Computer Store</strong> <span>Website</span></a>
					<nav>
						<a href="#menu">Menu</a>
					</nav>
				</header>

				<!-- Menu -->
				<nav id="menu">
					<ul class="links">
		                <li> <a href="index.php">Home </a> </li>

		                <li> <a href="jobs.php">Jobs</a> </li>

		                <li> <a href="blog.php">Blog</a> </li>

		                <li class="active"> <a href="about-us.php">About Us</a> </li>

		                <li><a href="team.php">Team</a></li>

		                <li><a href="testimonials.php">Testimonials</a></li>
		                
		                <li><a href="terms.php">Terms</a></li>

		                <li><a href="contact.php">Contact Us</a></li>
            		</ul>
				</nav>

				<!-- Main -->
					<div id="main" class="alt">

						<!-- One -->
							<section id="one">
								<div class="inner">
									<header class="major">
										<h1>Login</h1>
									</header>
                                    <div class="row ">
                                        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">   
                                                    <div class="panel-body">
                                                        <form role="form" method="post">
                                                                <div class="form-group input-group">
                                
                                                                    <input type="text" class="form-control" placeholder="Your Username " name="txtuser" />
                                                                </div>
                                                                                                    <div class="form-group input-group">
                                                                    <input type="password" class="form-control"  placeholder="Your Password" name="txtpass" />
                                                                </div>
                                                            <div class="form-group">
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" /> Remember me
                                                                    </label>
                                                                    <span class="pull-right">
                                                                        <a href="index.html" >Forget password ? </a> 
                                                                    </span>
                                                                </div>
                                                            
                                                            <button type="submit" name="txtsub">Login Now</button>
                                                            <hr />
                                                            Not register ? <a href="contact.php" >click here </a> or go to <a href="index123.php">Home</a> 
                                                            </form>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 px-0">
                                            </div>
                                            </div>
								</div>
							</section>
					</div>
                    <?php
					include('control.php');
					$get_data=new data();
					if(isset($_POST['txtsub']))
					{
						if(empty($_POST['txtuser']) || empty($_POST['txtpass'])) {
							echo"<script>alert ('Bạn chưa nhập đủ dữ liệu') </script>";
						} else {
							$login=$get_data->login($_POST['txtuser'], $_POST['txtpass']);
							if(mysqli_num_rows($login)==1) {
								$_SESSION['user']=$_POST['txtuser'];
								echo "<script>alert('Login thành công'); window.location='index.php'</script>";
							} else {
								echo "<script>alert('Login không thành công')</script>";
							}   
						}
					}
					?>
				<!-- Footer -->
				<footer id="footer">
					<div class="inner">
						<ul class="icons">
							<li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
						</ul>
						<ul class="copyright">
							<li>Copyright © 2020 Company Name - Template by:</li>
							<li> <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></li>
						</ul>
					</div>
				</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script>
				// Hàm để hiển thị cảnh báo và chuyển hướng
				function showAlertAndRedirect(message, url) {
					alert(message); // Hiển thị cảnh báo
					window.location.href = url; // Chuyển hướng đến URL được chỉ định
				}

				// Kiểm tra điều kiện và gọi hàm showAlertAndRedirect nếu cần
				function checkForm() {
					// Lấy giá trị từ các trường input
					var username = document.getElementById("txtuser").value;
					var password = document.getElementById("txtpass").value;

					// Kiểm tra xem các trường có được điền đầy đủ không
					if (username.trim() === "" || password.trim() === "") {
						showAlertAndRedirect("Bạn chưa nhập đủ dữ liệu", "login.php");
						return false; // Ngăn form submit
					}

					return true; // Cho phép form submit
				}
			</script>		
	</body>
</html>