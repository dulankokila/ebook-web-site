<?php
session_start();
require "connection.php";

if($_SESSION["au"]){
 $cat =    $_POST["c"];
 $bname =    $_POST["b"];
 $price =    $_POST["p"];
 $qty =   $_POST["q"];
 $wname =     $_POST["w"];
 $deliverysri =    $_POST["dcs"];
 $deliveryother =     $_POST["dcoc"];
 $lan =    $_POST["l"];
 $dis =    $_POST["dis"];



 if($cat == 0){
    echo("Please Select the cetegory");
 }
 else if(empty($bname)){
    echo("Please enter the book name");
 }
 else if(empty($price)){
    echo("Please enter the Price");
 }
 else if(empty($qty)){
    echo("Please enter the Quentity");
 }
 else if(empty($wname)){
    echo("Please enter the Writter name");
 }
 else if(empty($deliverysri)){
    echo("Please enter the Delivery cost");
 }
 else if(empty($deliveryother)){
    echo("Please enter the Delivery cost");
 }
 else if(empty($lan)){
    echo("Please Select the language");
 }
 else if(empty($dis)){
    echo("Please enter the book discription");
 }
 else{

    date_default_timezone_set('Asia/Colombo');
    $date = date('Y-m-d h:i:s');

    $status = 1;
    Database::iud("INSERT INTO `product`(`catagory_id`,`bookname`,`price`,`qty`,`writter`,`dilivery_free_Srilanka`,`dilivery_free_other_country`,`language_id`,`discribtion`,`status_id`,`datetime_add`)
    VALUES('".$cat."','".$bname."','".$price."','".$qty."','".$wname."','".$deliverysri."','".$deliveryother."','".$lan."','".$dis."','".$status."','".$date."')");



    $product_id = Database::$connection->insert_id;

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

$u ="resource//"."_".uniqid().$bname;




move_uploaded_file($_FILES["e1"]["tmp_name"],$u);

Database::iud("INSERT INTO `image`(`code`,`product_id`) VALUES ('".$u."','".$product_id."')");
echo("sucess");

}





}else{
   echo("please select the image");
   
}
 }


 


    



}else{
    echo("You Not a Admin");
}

?>