<?php
session_start();
require "connection.php";
 
if(isset($_SESSION["u"])){
  $total = 0;
                $subtotal = 0;
                $shipping = 0;
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | eBook</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center bg-body">
                <h1 class="fw-bold">Cart</h1>
            </div>
            <div class="col-12 bg-body">
            <section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">
                <?php
                $pro_rs =    Database::search("SELECT * FROM `cart` WHERE  `user_email`='".$_SESSION["u"]["email"]."'");
                $pro_num = $pro_rs->num_rows;
                
                if($pro_num == 0){
                    ?>
                    <!-- no -->
              <div class="col-lg-9 d-flex justify-content-center align-items-center ">
                <h1>NO Cart Product Yet!!!</h1>
              </div>
              <!-- no -->
              <div class="col-lg-3">

                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Cart summery</h5>
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                        class="img-fluid rounded-3" style="width: 45px;" alt="">
                    </div>

                    <p class="small mb-2">Cart summery</p>
                    

                      <div class="form-outline form-white mb-4">
                       
                      </div>

                      <div class="form-outline form-white mb-4">
                       
                      </div>

                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                           
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            
                          </div>
                        </div>
                      </div>

                 

                    <hr class="my-4">

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Subtotal</p>
                      <p class="mb-2">$0.00</p>
                    </div>

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Shipping</p>
                      <p class="mb-2">$0.00</p>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Total(Incl. taxes)</p>
                      <p class="mb-2">$0.00</p>
                    </div>

                    <button type="button" class="btn btn-info btn-block btn-lg">
                      <div class="d-flex justify-content-between">
                        <span>$0.00</span>
                        <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                      </div>
                    </button>

                  </div>
                </div>

              </div>


                    <?php
                }else{
                    ?>
                    
                <div class="col-lg-9 ">
                <h5 class="mb-3"><a href="index.php" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Shopping cart</p>
                    <p class="mb-0">You have <?php echo $pro_num;?> items in your cart</p>
                  </div>
                  
                </div>
                <?php
                                  

                for($x = 0; $x<$pro_num; $x++){
                    $pro_data = $pro_rs->fetch_assoc();

                   
                    ?>


<div class="col-12 card mb-3">
                  <div class="card-body">
                    <div class="col-12">
                        <div class="row">
                        <div class="col-lg-2 col-6">
                          
                          <img
                            src="<?php echo $imag_data["code"]?>"
                            class="img-fluid rounded-3" alt="Shopping item" style="width: 90px;">
                        </div>
                        <?php 
                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$pro_data["product_id"]."'");
                        $product_data =  $product_rs->fetch_assoc();
                         
                        $total = $total + ($product_data["price"]);
                        $imag_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='".$product_data["id"]."'"); 
                        $imag_data = $imag_rs->fetch_assoc();

                        $address_rs = Database::search("SELECT * FROM `country` INNER JOIN `province` ON 
                                        country.id=province.country_id INNER JOIN `distric` ON province.id=distric.province_id INNER JOIN `city` ON
                                        distric.id = city.distric_id INNER JOIN `address_has_user` ON address_has_user.city_id = city.id  WHERE 
                                        `user_email`='" .$_SESSION["u"]["email"]. "'");

                        $address_data = $address_rs->fetch_assoc();
                         
                        $ship = 0;

                        if ($address_data["country_name"] == 1) {
                          $ship = $product_data["dilivery_free_Srilanka"];
                          $shipping = $shipping + $ship;
                      } else {
                          $ship = $product_data["dilivery_free_other_country"];
                          $shipping = $shipping + $ship;
                      }

                      
                        
                        ?>
                        <div class="col-lg-3 col-6">
                          <p class="fs-lg-0 fs-5"><?php echo $product_data["bookname"] ?></p>
                          <h6 class="fw-normal  mb-0">2 Book Avalable</h6>
                        </div>
                      
                      <div class="col-lg-6 ">
                       
                        <div class="row">
                        <div class="col-5" >
                          <h5 class="mb-0 ">$<?php echo $product_data["price"] ?></h5>
                        </div>
                       <div class="col-lg-6 col-12 text-center">
                       <a href="#!" ><i class="bi bi-trash i1" onclick="cartremove(<?php echo $pro_data['id'];?>)"></i></a>&nbsp;&nbsp;
                        <button class="btn btn-success" style="height: 35px;">buy Now</button>
                       </div>
                        </div>
                          
                        
                     
                      </div>
                    </div>
                    </div>
                
                </div>

                </div>

                <?php

                }
                
                ?>

                
                

               

                

              </div>
             
              
              <div class="col-lg-3">

                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Cart summery</h5>
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                        class="img-fluid rounded-3" style="width: 45px;" alt="">
                    </div>

                    <p class="small mb-2">Cart summery</p>
                    

                      <div class="form-outline form-white mb-4">
                       
                      </div>

                      <div class="form-outline form-white mb-4">
                       
                      </div>

                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                           
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            
                          </div>
                        </div>
                      </div>

                 

                    <hr class="my-4">

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Subtotal</p>
                      <p class="mb-2">$<?php echo ($total)?></p>
                    </div>

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Shipping</p>
                      <p class="mb-2">$<?php echo ($shipping)?></p>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Total(Incl. taxes)</p>
                      <p class="mb-2">$<?php echo ($shipping + $total); ?>.00</p>
                    </div>

                    <button type="button" class="btn btn-info btn-block btn-lg">
                      <div class="d-flex justify-content-between">
                        <span>$<?php echo ($shipping + $total); ?>.00</span>
                        <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                      </div>
                    </button>

                  </div>
                </div>

          <?php
                }
                ?>

              

              </div>

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
<script src="bootstrap.bundle.js"></script>
    
</body>
</html>
  <?php
}else{
  echo("Please Loging First");
  ?>

  <?php
}
?>




