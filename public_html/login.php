<?php
ob_start();
$email = $_POST['Email'];
$password = $_POST['Password'];

// $email = '2fnamhoang@gmail.com';
// $password = '123';

//TAO KET NOI DEN DATABASE
require_once("config.php");
$connect = new mysqli(HOSTNAME, USERNAME,PASSWORD,DATABASE ); 
//KIEM TRA KET NOI
if($connect->connect_error){
    echo('Fail to connect to SQL: ').$connect->connect_error;
    exit();
}
$connect-> set_charset('utf8');

//THUC HIEN TRUY VAN VAO DATABASE DE LAY DU LIEU:
$query = "SELECT * FROM account WHERE email ='".$email."' AND password = '".$password."' ";
$result = mysqli_query($connect, $query);
$data = array();
while ($row = mysqli_fetch_array($result,1)) {
    $data[] = $row;
}
var_dump($data);
//DONG KET NOI
$connect->close();

//KIEM TRA KET QUA VA THUC HIEN LOGIN
if ($data != NULL && count($data)>0) {
    header('location: home.php');
}
else{
    $message = "Mật khẩu sai hoặc bị bỏ trống";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header('location: saipass.php');
}
ob_end_flush();
