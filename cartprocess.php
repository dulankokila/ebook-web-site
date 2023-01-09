<?php
session_start();
require "connection.php";

if(isset($_SESSION["u"])){

    $pid = $_GET["id"];
$pro_rs =    Database::search("SELECT * FROM `cart` WHERE `product_id`='".$pid."' AND `user_email`='".$_SESSION["u"]["email"]."'");
$pro_num = $pro_rs->num_rows;

if($pro_num == 0){

    Database::iud("INSERT INTO `cart`(`product_id`,`user_email`) VALUES ('".$pid."','".$_SESSION["u"]["email"]."')");
  echo("1");

}else{
    echo("This item alredy Add to cart ");
}

}else{

    echo("Pleaseloging First");
}

?>