<?php 
session_start();
require "connection.php";
if(isset($_SESSION["u"])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch-list | eBook</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center bg-body">
                <h1 class="fw-bold">Watch-List</h1>
            </div>
            <div class="col-12 bg-body">
                <div class="h-100 h-custom" style="background-color: #eee;">
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body p-4">

                                        <div class="row">
                <?php
             $watch_rs =    Database::search("SELECT * FROM `watch_list` WHERE `user_email`= '".$_SESSION["u"]["email"]."'");
             $watch_num = $watch_rs->num_rows;
             
             if($watch_num  == 0){
                ?>
                       <!-- no -->
                                        <div class="col-lg-12  d-flex justify-content-center align-items-center ">
                                            <h1>NO Cart Product Yet!!!</h1>
                                        </div>
              <!-- no -->
                <?php
             }else{
                for($x=0; $x<$watch_num; $x++){
                    $watch_data = $watch_rs->fetch_assoc();

                $product_rs =     Database::search("SELECT * FROM `product` WHERE `id`= '".$watch_data["product_id"]."'");
                $product_data = $product_rs->fetch_assoc();

                $img_rs = Database::search("SELECT * FROM `image` WHERE `product_id`= '".$watch_data["product_id"]."'");
                $img_data = $img_rs->fetch_assoc();

                    ?>
                     <div class="col-lg-12 d-flex justify-content-center align-items-center ">

<div class="col-12 card mb-3">
    <div class="card-body">
      <div class="col-12">
          <div class="row">
          <div class="col-lg-2 col-6">
            
            <img
              src="<?php echo $img_data["code"]?>"
              class="img-fluid rounded-3" alt="Shopping item" style="width: 90px;">
          </div>
         
          <div class="col-lg-3 col-6">
            <p class="fs-lg-0 fs-5"><?php echo$product_data["bookname"]  ?></p>
            <h6 class="fw-normal  mb-0"><?php echo$product_data["qty"]  ?> Book Avalable</h6>
          </div>
        
        <div class="col-lg-6 ">
         
          <div class="row">
          <div class="col-2" >
            <h5 class="mb-0 ">$<?php echo $product_data["price"] ?></h5>
          </div>
         <div class="col-lg-6  text-center">
         <a href="#!"  onclick="removewatchlist(<?php echo  $watch_data['id'];?>)"><i class="bi bi-trash i1 ms-2" ></i></a>&nbsp;&nbsp;
          <button class="btn btn-success ms-5" style="height: 35px;">buy Now</button>
          <button class="btn btn-danger ms-1" style="height: 35px;" onclick="addwatchlistcart(<?php echo $watch_data['product_id'] ?>);">Add to cart</button>
         </div>
          </div>
            
          
       
        </div>
      </div>
      </div>
  
  </div>

  </div>

 
  
  

 

  

</div>
  
</div>
<script src="script.js"></script>

<?php
                }
                ?>
                

                <?php
             }
                ?>
               
                  
             
              


                    
<?php
}else{
    echo("Loging First");
}
?>



