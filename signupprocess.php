<?php

// echo("ok");
require  "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$mobile = $_POST["m"];
$email = $_POST["e"];
$password = $_POST["p"];
$repassword = $_POST["rp"];
$gender = $_POST["g"];

if(empty($fname)){
    echo("Please enter the First-Name");
}
else if(strlen($fname)>50){
  echo("Invlide First-Name");
}
else if(empty($lname)){
    echo("Please enter the Last-Name");
}
else if(strlen($lname)>50){
  echo("Invlide  Last-Name");
}
else if(empty($mobile)){
    echo("Please enter the mobile_number");
}
else if(strlen($mobile)>10){
  echo("Invlide Mobile number");
}
else if(!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/",$mobile)){
    echo ("Invalid Mobile Number !!!");
}
else if(empty($email)){
    echo("Please enter the Email");
}
else if(strlen($mobile)>100){
  echo("Invlide Email");
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo("Invalid email format");
  }
  else if(empty($password)){
    echo("Please enter password");
}
else if(strlen($password)>20 && strlen($password)<5){
  echo("Invlide Password");
}
else if(empty($repassword)){
    echo("Please enter retype-password");
}
else if($password != $repassword){
    echo("Psaaword No Match");
}
else{
    $user_rs =    Database::search("SELECT * FROM `user` WHERE `email`='".$email."' OR `mobile`='".$mobile."'");
   
    $user_num = $user_rs->num_rows;
    if( $user_num == 0){
        date_default_timezone_set('Asia/Colombo');
        $date = date('Y-m-d h:i:s');
    
        // echo($date);
        Database::iud("INSERT INTO `user`(`email`,`fname`,`lname`,`password`,`mobile`,`join_date`,`status`,`gender_id`) VALUES
        ('".$email."','".$fname."','".$lname."','".$password."','".$mobile."','".$date."','1','".$gender."')");
    
        echo("Sucess");
   
    }else{
       echo("User with the same Email or Mobile already exists.");
    }















   
   






}


?>