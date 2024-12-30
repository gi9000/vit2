<?php
include ('connect.php');
class data_user
{   
    
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
    public function login($user, $pass)
    {
        global $conn;
        $sql = " select * from user where username='$user' and password='$pass'";
        $run=mysqli_query($conn,$sql);
        return $run;
    }
}
class data
{   
    function delete_contact($id)
    {
        global $conn;
        $sql="delete from ninom where id_nn='$id'";
        $run=mysqli_query($conn, $sql);
        return $run;
    }
    public function select_nn() 
    {
        global $conn;
        $sql = "SELECT * FROM ninom";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_product($name,$number,$pic,$cate,$date,$price,$des)
    {
        global $conn;
        $sql = "INSERT INTO product(name, number, picture, category, date, price, des)
                            values('$name','$number','$pic','$cate','$date','$price','$des')";
        $run=mysqli_query($conn,$sql);
        return $run;
    }
    public function insert_cate($name,$des)
    {
        global $conn;
        $sql = " INSERT INTO category(name,des)
                            values ('$name','$des')";
        $run=mysqli_query($conn,$sql);
        return $run;

    }
    public function update_contact_id($name, $email,$phone,$mess,$id)
    {
        global $conn;
        $sql="update ninom set Name='$name',
                                Email='$email',
                                Phone='$phone',
                                Mess='$mess'
                                where id_nn='$id'";
        $run=mysqli_query($conn, $sql); 
        return $run;
    }
    function select_contact_id($id)
    {
        global $conn;
        $sql="select * from ninom where id_nn='$id'";
        $run=mysqli_query($conn, $sql);
        return $run;
    }
    public function select_cat(){
        global $conn;
        $sql = "select * from category";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function select_cat_id($id){
        global $conn;
        $sql = "select * from category where id_cate='$id'";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function update_cat($id,$name,$des){
        global $conn;
        $sql = "UPDATE category set name='$name' ,des ='$des' WHERE id_cate='$id'";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    function delete_category($id)
    {
        global $conn;
        $sql="delete from category where id_cate='$id'";
        $run=mysqli_query($conn, $sql);
        return $run;
    }

    public function select_product(){
        global $conn;
        $sql = "select * from product";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function select_product_id($id){
        global $conn;
        $sql = "select * from product where id_pro='$id'";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    function delete_product($id)
    {
        global $conn;
        $sql="delete from product where id_pro='$id'";
        $run=mysqli_query($conn, $sql);
        return $run;
    }
    public function update_product($id,$name,$number,$picture,$category,$date,$price,$des){
         global $conn;
        $sql="update product set name='$name', number='$number', picture='$picture', category='$category', date='$date', price='$price', des='$des' where id_pro='$id'";
        $run=mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_order($id,$user,$num,$tatol,$status){
        global $conn;
        $sql = "INSERT INTO order_pro(id_pro,username,number_order,tatol,status_order) 
                VALUES ('$id', '$user', '$num', '$tatol', '$status')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_order(){
        global $conn;
        $sql = "SELECT * FROM order_pro";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
     public function select_order_id($id){
        global $conn;
        $sql = "SELECT * FROM order_pro where id_order='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_order($id){
        global $conn;
        $sql = "DELETE FROM order_pro WHERE id_order ='$id'";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function update_order($id,$id_pro,$username,$number,$tatol,$status){
         global $conn;
        $sql="update order_pro set id_pro='$id_pro', username='$username', number_order='$number', tatol='$tatol',status_order=' $status' where id_order='$id'";
        $run=mysqli_query($conn, $sql);
        return $run;
    }
    public function update_number($id,$number){
        global $conn;
        $sql = "UPDATE product set number ='$number' WHERE id_pro='$id'";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
}
?>
