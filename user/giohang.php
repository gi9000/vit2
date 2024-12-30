<?php
session_start();

include("control.php");
$get_Data = new data();

if(isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $quantity = $_POST['quantity'];

    $product = array(
        'id_pro' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'picture' => $product_image,
        'quantity' => $quantity
    );

    if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        $found = false;
        foreach($_SESSION['cart'] as $key => $item) {
            if($item['id_pro'] === $product_id) {
                $_SESSION['cart'][$key]['quantity'] = $quantity;
                $found = true;
                break;
            }
        }
        if(!$found) {
            $_SESSION['cart'][] = $product;
        }
    } else {
        $_SESSION['cart'] = array($product);
    }

    header("Location: giohang.php");
    exit();
}

// Xử lý xóa sản phẩm khỏi giỏ hàng và cơ sở dữ liệu
if(isset($_POST['delete_item'])) {
    $product_id = $_POST['delete_item'];
    // Loại bỏ sản phẩm khỏi giỏ hàng
    if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        foreach($_SESSION['cart'] as $key => $item) {
            if($item['id_pro'] === $product_id) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
    }
    // Loại bỏ sản phẩm khỏi cơ sở dữ liệu
    $deleted = $get_Data->delete_Cart($product_id, $_SESSION['user']);
    if($deleted) {
        // Nếu xóa thành công, chuyển hướng trang lại đến trang giỏ hàng
        header("Location: giohang.php");
        exit();
    } else {
        // Xử lý lỗi nếu có
        echo "Đã xảy ra lỗi khi xóa sản phẩm khỏi giỏ hàng.";
    }
}
$totalPrice = 0;

if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $key => $item) {
        if(isset($item['quantity']) && isset($item['total'])) {
            $totalPrice += $item['total'];
        }
    }
}

$_SESSION['total_price'] = $totalPrice;
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Giỏ hàng</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/gioHang.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    <style>
        .carousel-inner img {
            width: 100%;
            height: 500px;
        }
    </style>
</head>
<body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Header -->
        <header id="header" class="alt">
            <a href="index.php" class="logo"><strong> MTB Computer Store</strong> <span>Website</span></a>
            <nav>
                <?php
                if(!empty($_SESSION['user'])) {
                    echo "<a href='logout.php' class='nav-link'>Logout : : <span style='color: Blue;'>".$_SESSION['user']."</span></a>";
                } else {
                    echo "<a class='nav-link' href='login.php'>Login</a>";
                }
                ?>
                <a href="giohang.php" class="bi bi-bag-check-fill"></a>
                <a href="#menu">Menu</a>
            </nav>
        </header>
        <!-- Menu -->
        <nav id="menu">
            <ul class="links">
                <li class="active"> <a href="index.php">Home </a> </li>
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Product</a>
                    <ul class="dropdown-menu">
                        <li> <a href="products.php">PC Component</a> </li>
                        <li><a href="gaminggear.php">Gaming Gear</a></li>
                    </ul>
                </li>
                <li> <a href="checkout.php">Checkout</a> </li>
                <li><a href="contact.php">Contact Us</a></li>
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
                    <ul class="dropdown-menu">
                        <li> <a href="about-us.php">About Us</a> </li>
                        <li><a href="team.php">Team</a></li>
                        <li> <a href="blog.php">Blog</a> </li>
                        <li><a href="testimonials.php">Testimonials</a></li>
                        <li><a href="terms.php">Terms</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
                
        <!-- Content -->
        <section class="h-100 h-custom">
        <div class="container py-5">
        <h2 class="mb-4">Giỏ hàng của bạn</h2>
        <div class="row">
            <div class="col-md-8">
                <div class="cart-items">
                    <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                        <?php foreach($_SESSION['cart'] as $key => $item): ?>
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="images/<?php echo $item['picture']; ?>" class="img-fluid" alt="<?php echo $item['name']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <h4><?php echo $item['name']; ?></h4>
                                        <p><?php 
                                        $price = $item['price']; 
                                        $formatted_price = number_format($price, 0, ',', '.'); 
                                        echo $formatted_price . '.000 VND';
                                        ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" class="form-control" name="quantity[<?php echo $item['id_pro']; ?>]" value="<?php echo $item['quantity']; ?>">
                                        <form action="" method="POST"> 
                                            <button type="submit" class="btn btn-sm btn-danger mt-2" name="delete_item" value="<?php echo $item['id_pro']; ?>">Xóa</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Giỏ hàng của bạn đang trống.</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cart-summary">
                    <h4>Tổng giá:</h4>
                    <h3><?php echo number_format($totalPrice, 0, ',', '.') ?>.000 VNĐ</h3>
                    <a href="checkout.php" class="btn btn-primary btn-block mt-3">Thanh toán</a>
                    <a href="index.php" class="btn btn-light btn-block mt-3">Quay lại mua hàng</a>
                </div>
            </div>
        </div>
    </div>
        </section>

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
    <script src="assets/js/giohang.js"></script>
</body>
</html>
