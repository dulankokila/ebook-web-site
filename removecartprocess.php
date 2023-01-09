<?php

session_start();
 
require "connection.php";

if(isset($_SESSION["u"])){

    $id = $_GET["id"];

    $email = $_SESSION["u"]["email"];

    $Cart_rs = Database::search("SELECT * FROM `cart` WHERE `id`= '".$id."' AND `user_email`= '".$email."'");

    $Cart_num =  $Cart_rs->num_rows;

    if($Cart_num == 1){
        Database::iud("DELETE  FROM `cart` WHERE `id`= '".$id."' AND `user_email`= '".$email."'");
        echo("Sucess");
    }

}else{
    echo("Sign in First");
}


?>