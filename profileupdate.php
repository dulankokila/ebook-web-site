<?php
session_start();
require "connection.php";
$email = $_SESSION["u"]["email"];


$country = $_POST["country"];
$province = $_POST["province"];
$distric = $_POST["distric"];
$city = $_POST["city"];
$lane_1 = $_POST["lane_1"];
$lane_2 = $_POST["lane_2"];
$code = $_POST["code"];
if (isset($_FILES["e1"])) {
    $image = $_FILES["e1"];

    $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
    $file_ex = $image["type"];

    if (!in_array($file_ex, $allowed_image_extentions)) {
        echo ("Please select a valid image.");
    } else {

        $new_file_extention;

        if ($file_ex == "image/jpg") {
            $new_file_extention = ".jpg";
        } else if ($file_ex == "image/jpeg") {
            $new_file_extention = ".jpeg";
        } else if ($file_ex == "image/png") {
            $new_file_extention = ".png";
        } else if ($file_ex == "image/svg+xml") {
            $new_file_extention = ".svg";
        }

        $file_name = "resource/user_profile/" . $_SESSION["u"]["fname"] . "_" . uniqid() . $new_file_extention;

        move_uploaded_file($image["tmp_name"], $file_name);

        $image_rs = Database::search("SELECT * FROM `profile_img` WHERE 
        `user_email`='" .$email. "'");
        $image_num = $image_rs->num_rows;

        if ($image_num == 1) {

            Database::iud("UPDATE `profile_img` SET `code`='" . $file_name . "' WHERE 
            `user_email`='" .$email. "'");
        } else {

            Database::iud("INSERT INTO `profile_img` (`code`,`user_email`) VALUES 
            ('" .$file_name. "','" .$email. "')");
        }
    }
}





$address_rs = Database::search("SELECT * FROM `address_has_user` WHERE 
            `user_email`='" . $email . "'");
    $address_num = $address_rs->num_rows;
    $address_data = $address_rs->fetch_assoc();

    if( $address_num == 0){
        Database::iud("INSERT INTO `address_has_user`(`city_id`,`lane_1`,`lane_2`,`postal_code`,`user_email`) VALUES('".$city."','".$lane_1."',
        '".$lane_2."','".$code."','".$email."')");
    }
    else if($address_num == 1){
        Database::iud("UPDATE `address_has_user` SET `lane_1`='".$lane_1."',
                `lane_2`='" .$lane_2. "',
                `city_id`='" .$city. "',
                `postal_code`='" .$code. "' WHERE `user_email`='" .$email. "'");
    }
    echo("sucess");









?>