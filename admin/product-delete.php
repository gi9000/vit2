<?php
    include('control.php');
    $get_data=new data();
    $delete=$get_data->delete_order($_GET['del']); //Gọi function tương ứng với tham số là giá trị truyền trang
    if($delete) echo"<script>alert('Xóa thành công');
    window.location= 'order_select.php'</script>";
    else echo "not delete";
?>