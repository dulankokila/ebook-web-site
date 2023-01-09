<?php
require "connection.php";
$pw = $_POST["p"];
$rpw = $_POST["rp"];
$c = $_POST["c"];
$e = $_POST["e"];


 if(isset($e)){
    if(empty($pw)){
        echo("Please enter password");
    }
    else if(strlen($pw)>20 ){
        echo("Invlide Password");
      }
      else if(strlen($pw)<5 ){
          echo("Invlide Password");
      
        }
      else  if(empty($rpw)){
            echo("Please enter retypepassword");
        }
      else  if($pw != $rpw){
            echo("retype password no match");
        }
      else  if(empty($c)){
            echo("Please enter Verifycation_code");
        }

    $user_rs =     Database::search("SELECT * FROM `user` WHERE `email`='".$e."'");
    $user_num =  $user_rs->num_rows;
    // echo( $user_num);

    if( $user_num == 1){
        $user_data = $user_rs->fetch_assoc();

        if($user_data["verification_code"] == $c){
           Database::iud("UPDATE `user` SET `password`='".$pw."' WHERE `email`='".$user_data["email"]."'" );
           echo("Password update Sucessful");
        }else{
            echo("verification_code is Not equal");
        }
    
       


    }else{
        echo("Something Went Wrong !!");
    }

 }else{
    echo("Pleas enter the Email");
 }


    
    
?>