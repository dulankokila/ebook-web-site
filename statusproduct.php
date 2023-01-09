<?php
session_start();
require "connection.php";

$x = $_POST["x"];
$id = $_POST["id"];



if(isset($_SESSION["au"])){
    

    if($x == 2){
        Database::iud("UPDATE `product` SET `status_id`='".$x."' WHERE `id`='".$id."'");
        echo("deactive");
    }
    else if($x == 1){
        Database::iud("UPDATE `product` SET `status_id`='".$x."' WHERE `id`='".$id."'");
        echo("active");
    }

}else{
    echo("Admin Only");
}


?>