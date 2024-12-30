<?php
    include('connect.php');
    class data
    {
        public function select_nn()
        {
            global $conn;
            $sql="select * from ninom";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function select_nn_id($id)
        {
            global $conn;
            $sql="select * from Product where id_nn='$id'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        function insert_table($name,$email,$phone,$mess)
        {
                global $conn;
                $sql="insert into ninom (name, email , phone, mess) 
                                values ('$name','$email','$phone','$mess')";
                $run=mysqli_query($conn,$sql);
                return $run; 
        }
        public function login($user, $pass)
        {
            global $conn;
            $sql = " select * from user where username='$user' and password='$pass'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function select_user($user)
        {
            global $conn;
            $sql = "SELECT * FROM user WHERE username='$user'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        public function register($name, $pass, $add, $ava, $gen, $hob, $email)
        {
            global $conn;
            $sql = "INSERT INTO user (username, password, address, avatar, gender, hobby, email) 
                    VALUES ('$name', '$pass', '$add', '$ava', '$gen', '$hob', '$email')";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        public function select_pro()
        {
            global $conn;
            $sql =" select * from product";
            $run = mysqli_query($conn,$sql);
            return $run;

        }

        public function select_pro_id($id)
        {
            global $conn;
            $sql ="SELECT * FROM product WHERE id_pro='$id'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }
        public function select_top3()
        {
            global $conn;
            $sql = "SELECT * FROM `product` ORDER BY id_pro DESC LIMIT 3";
            $run = mysqli_query($conn,$sql);
            return $run;
        }
        public function insert_order($id_pro, $username, $quantity, $total)
    {
        global $conn;
        $sql = "INSERT INTO orders (id_pro, username, quantity, total)
                VALUES ('$id_pro', '$username', '$quantity', '$total')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    
        public function update_number($number, $id_pro)
        {
            global $conn;
            $sql = "UPDATE product SET number = $number WHERE id_pro = '$id_pro'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }

        public function select_order($username)
        {
            global $conn;
            $sql = " SELECT product.name,product.picture,product.category,product.price,order_pro.quantity, order_pro.total
                        FROM product
                        JOIN order_pro ON product.id_pro = order_pro.id_pro
                        WHERE order_pro.username = '$username';";
            $run = mysqli_query($conn,$sql);
            return $run;
        }
        public function addtocart($id_pro, $id_user, $quantity)
        {
            global $conn;
            $sql = "INSERT INTO order_pro (id_pro, id_user, quantity) VALUES ('$id_pro', '$id_user', '$quantity')";
            $run = mysqli_query($conn,$sql);
            return $run;
        }
        public function select_Cart($username){
            global $conn;
            $sql = "SELECT * FROM cart WHERE username='$username'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        public function insert_Cart($user,$id_pro,$name,$price,$pic,$num,$total){
            global $conn;
            $sql = "INSERT INTO cart(username,id_pro,name,price,picture,number_or,total) 
                    VALUES ('$user','$id_pro','$name','$price','$pic', '$num', '$total')";
            $run = mysqli_query($conn, $sql);
            echo $sql;
            return $run;
        }
        public function delete_Cart($id_pro,$user){
            global $conn;
            $sql = "DELETE FROM cart WHERE id_pro = '$id_pro' and username='$user'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }
        public function delete_All_Cart(){
            global $conn;
            $sql = "DELETE FROM cart";
            $run = mysqli_query($conn,$sql);
            return $run;
        }
        public function get_cart_item($id){
            global $conn;
            $sql = "SELECT * FROM cart where id_pro='$id'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        public function update_cart($id_pro, $newQuantity,$total,$user){
            global $conn;
            $sql="update cart set  total='$total',number_or ='$newQuantity' where id_pro='$id_pro'  and username='$user'";
            $run=mysqli_query($conn,$sql);
            echo $sql;
            return $run;
        }
        public function update_cart_item($id_pro, $newQuantity,$total,$user){
            global $conn;
            $sql="update cart set  total='$total',number_or ='$newQuantity' where id_pro='$id_pro'  and username='$user'";
            $run=mysqli_query($conn,$sql);
            
            return $run;
        }
        public function update_pro($sl,$id){
            global $conn;
            $sql="update product set number ='$sl' where id_pro='$id'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function insert_Order_Detail($id_order,$id_pro,$name,$quantity,$total,$mes){
            global $conn;
            $sql = "insert into order_detail(id_order,id_pro,name_pro,quantity,total,mes) 
                values('$id_order','$id_pro','$name','$quantity','$total','$mes')";
            $run=mysqli_query($conn,$sql);
                    echo $sql;
            return $run;
        }
        public function insert_Orderr($username,$phone,$add,$total,$status){
            global $conn;
            $sql = "insert into order_pro(username,phone,address,total,status_order) 
                values('$username','$phone','$add','$total','$status')";
            $run=mysqli_query($conn,$sql);
            $lastInsertId = mysqli_insert_id($conn);
            
            return $lastInsertId;
        }
        
    }
    ?>