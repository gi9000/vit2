<?php
session_start();
if(isset($_SESSION['user'])){
  $username = $_SESSION['user'];
}
else echo "<script>alert('Ban can dang nhap der thuc hien thao tac nay');
          window.location = ('login.php')</script>";
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
<div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Creative Tim
                </a>
            </div>
            <ul class="nav">
                <li>
                <a href="productselect.php"><i class="fa fa-desktop"></i>Product
                </a>
                    </a>
                </li>
                <li>
                    <a href="category-select.php">
                        <i class="pe-7s-note2"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li>
                    <a href="contact-select.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Contact</p>
                    </a>
                </li>
                <li>
                    <a href="order-select.php">
                    <i class="pe-7s-cart"></i>
                        <p>Order</p>
                    </a>
                </li>
                <li>
                    <a href="Report-select.php">
                        <i class="pe-7s-display2"></i>
                        <p>Report</p>
                    </a>
                </li>
                
            </ul>
    	</div>
    </div>

    <div class="main-panel">
    <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Product Update</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-lg hidden-md"></b>
									<p class="hidden-lg hidden-md">
										5 Notifications
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                    <?php echo "Hello  " . $username; ?>
                    
                    <small><?php if($username):?>
                    <a href="logout.php">Logout</a>
                    <?php endif ?></small>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
        <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name Product</label>
                                            <input class="form-control" type="text" name="txtname">
                                            <p class="help-block">Help text here.</p>
                                        </div>
                                 <div class="form-group">
                                            <label>Number Product</label>
                                            <input class="form-control" type="number" name="txtnum">
                                            <p class="help-block">Help text here.</p>                                    
                                        <div class="form-group">
                                            <label>Picture Product</label>
                                            <input class="form-control" type="file" name="txtpic">
                                            <p class="help-block">Help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Category Product</label>
                                            <select class="form-control" name="txtselect">
                                                <?php include('control.php');
                                                $get_data = new data();
                                                $select_cat = $get_data->select_cat();
                                                foreach($select_cat as $cat) {?>
                                                <option value="<?php echo $cat['name'] ?>"><?php echo $cat['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div><div class="form-group">
                                            <label>Date Product</label>
                                            <input class="form-control" type="date" name="txtdate">
                                            <p class="help-block">Help text here.</p>
                                        </div><div class="form-group">
                                            <label>Price Product</label>
                                            <input class="form-control" type="number" name="txtprice">
                                            <p class="help-block">Help text here.</p>
                                        </div>
                                        </div>
                                            <div class="form-group">
                                            <label>Description Product</label>
                                            <textarea class="form-control" rows="3" name=" txtdes"></textarea>
                                        </div>
                                 
                                        <button type="submit"name="txtsub" class="btn btn-info">Send Message </button>

                                    </form>
        </div>
        <?php
        if(isset($_POST['txtsub'])) {            
            $insert = $get_data->insert_product(
                                            $_POST['txtname'],
                                            $_POST['txtnum'],
                                            $_FILES['txtpic']['name'],
                                            $_POST['txtselect'],
                                            $_POST['txtdate'], 
                                            $_POST['txtprice'],
                                            $_POST['txtdes']
            );
        
            if($insert) {
                move_uploaded_file($_FILES['txtpic']['tmp_name'], 'upload/' . $_FILES['txtpic']['name']);
                echo "<script>alert('San pham da them thanh cong')</script>";
            } else {
                echo "<script>alert('Da them that bai')</script>";
            }
        }                   
        ?>                                            

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>
