<?php
require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
 $email = $_GET["e"];
 
 if(empty($email)){
    echo("Please enter Email");
 }
 else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo("Invalid email format");
  }
 else{
    

 $admin_rs =   Database::search("SELECT * FROM `admin` WHERE `email`='".$email."'");
 $admin_num =  $admin_rs->num_rows;

 if($admin_num == 1){

    $fc = uniqid();

    Database::iud("UPDATE `admin` SET `verification_code`='".$fc."' WHERE `email`='".$email."'");

    $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'dulankokilabandara@gmail.com';
            $mail->Password = 'bmlvksbcaiufdubi';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('dulankokilabandara.com', 'verification_code');
            $mail->addReplyTo('dulankokilabandara.com', 'verification_code');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'eBook admin Verification Code';
            $bodyContent = '<h1 style="color:green">Your Verification code is '.$fc.'</h1>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Verification code sending failed';
            } else {
                echo 'Email send Checked The inbox';
            }

    }

 else{
    echo("Email Invliade");
 }


 }

?>