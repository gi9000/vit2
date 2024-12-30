<?php
session_start();

if(isset($_GET['index'])) {
    $index = $_GET['index'];
    if(isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Đặt lại chỉ mục của mảng
    }
}

// Chuyển hướng người dùng trở lại trang giỏ hàng
header("Location: giohang.php");
exit();
?>