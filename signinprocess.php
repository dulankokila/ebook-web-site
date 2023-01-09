<?php
session_start();
require "connection.php";
$password = $_POST["p"];
$email = $_POST["e"];
$chcked = $_POST["c"];

 if(empty($email)){
    echo("Please enter the Email");
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo("Invalid email format");
  }
  else if(empty($password)){
    echo("Please enter password");
}
else if(strlen($password)>20 ){
  echo("Invlide Password");
}
else if(strlen($password)<5 ){
    echo("Invlide Password");

  }

  else{
    $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND `password`='".$password."'");
    $user_num =  $user_rs->num_rows;

    if($user_num == 1){
        echo("sucess");
        $user_Data = $user_rs->fetch_assoc();
        $_SESSION["u"]  =  $user_Data;

        if($chcked == "true"){
            setcookie("email", $email, time() + (60 * 60 * 24 * 365));
            setcookie("password", $password, time() + (60 * 60 * 24 * 365));
        }else{
            setcookie("email", "", -1);
            setcookie("password", "", -1);
        }
    }
    else{
        echo("Invlide Email Or Password");
    }
  }

?>