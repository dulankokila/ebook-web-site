<?php
session_start();
require "connection.php";

if(empty($_GET["c"])){
    echo("Please enter the code");
}
else {
$code = $_GET["c"];

$co_rs = Database::search("SELECT * FROM `admin` WHERE `verification_code`='".$code."'");
$co_num = $co_rs->num_rows;

if($co_num == 1){
    $co_data  = $co_rs->fetch_assoc();

    $_SESSION["au"] = $co_data;

    echo("sucess");
}

}

?>