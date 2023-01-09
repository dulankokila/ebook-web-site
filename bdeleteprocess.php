<?php
session_start();
require "connection.php";

if(isset($_SESSION["au"])){
    $id = $_GET["id"];
    

    $p_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$id."'");
    $p_num =  $p_rs->num_rows;

   

    if($p_num == 1){

        $img_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='".$id."'");
        $img_num = $img_rs->num_rows;
        

        if($img_num == 1){
            Database::iud("DELETE  FROM `image` WHERE  `product_id`='".$id."'");
        }
        Database::iud("DELETE  FROM `product` WHERE  `id`='".$id."'");

        echo("sucess");

    }else{
        echo("Something went wrong");
    }
}else{
    echo("admin only");
}


?>