<?php

session_start();
require "connection.php";

if(isset($_SESSION["au"])){
    $price = $_POST["p"];
    $qty = $_POST["q"];
    $dcs  = $_POST["ds"];
    $dcoc = $_POST["do"];
$id =     $_SESSION["p"]["id"];


if(isset($_FILES["e1"])){
    $i1 = $_FILES["e1"];
 
 $extension = array("image/jpg","image/png","image/jpeg","image/svg+xml");
 
 $name = $i1["type"];
 $x = $i1["tmp_name"];
 // echo("$name");
 
 if(!in_array($name ,$extension)){
 
    echo("Invlide image");
 
 
 
 }else{
   
     $name;
 if($name =="image/jpg" ){
    $name ==".jpg" ;
 }
 else if($name =="image/png" ){
    $name ==".png" ;
 }
 else if($name =="image/jpeg" ){
    $name ==".jpeg" ;
 }
 else if($name =="image/svg+xml" ){
    $name ==".svg" ;
 }
 
 $u ="resource//"."_".uniqid();
 
 
 
 
 move_uploaded_file($_FILES["e1"]["tmp_name"],$u);
 
 Database::iud("UPDATE`image` SET `code`='".$u."' WHERE `product_id`='".$id."'");

 Database::iud("UPDATE `product` SET `price`='".$price."',`qty`='".$qty."',`dilivery_free_Srilanka`='".$dcs."',`dilivery_free_other_country`='".$dcoc."'
WHERE `id`='".$id."'");
echo("secess");


 
 }
 
    

  
}
    
}
else{
    echo("pisas");
}



?>