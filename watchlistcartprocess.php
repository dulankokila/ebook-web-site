<?php
session_start();
require "connection.php";

if(isset($_SESSION["u"])){

 $pid =    $_GET["id"];
 $email = $_SESSION["u"]["email"];

$cart_rs =  Database::search("SELECT * FROM `cart` WHERE `product_id`='".$pid."' AND `user_email`='".$email."'");
$cart_num = $cart_rs->num_rows;
if($cart_num == 0){
Database::iud("INSERT INTO `cart`(`product_id`,`user_email`) VALUES ('".$pid."','".$email."')");
echo("sucess");
}else{
    echo("This book alredy in cart");
}

}else{
    echo("Please loging First");
}




?>