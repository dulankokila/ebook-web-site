<?php
session_start();
require "connection.php";
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

    <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">


  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  
  <link href="assets/css/variables.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: ZenBlog - v1.2.1
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
  ======================================================== -->


    
</head>
<body>
    <div class="container-fluid">
        <div class="row">
        <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <div class="col-2">
        <?php
        if(isset($_SESSION["u"])){
          ?>
          
        
        <div class="col-12">
        <span class="fw-bold fs-6 h1 " style="cursor: pointer;" onclick="window.location = 'signin.php'" >Sign-Out & admin </span>| &nbsp;
       
       <span class="fw-bold fs-6 text-black-50"><?php echo($_SESSION["u"]["fname"]);?>| Welcome</span>
        </div>

          <?php

        }else{
          ?>
          <span class="fw-bold fs-6 text-black-50" style="cursor: pointer;" onclick="window.location = 'signin.php'">Sign-in & admin </span>
        <span class="fw-bold fs-6 text-black-50">  </span>
          <?php
        }
        ?>
        
      </div>
      

      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>eBook</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="cart.php">cart</a></li>
          <li><a href="watchlist.php">WatchList</a></li>
          <li class="dropdown"><a href="profile.php"><span> Profile</span> </a>
            
      </nav><!-- .navbar -->

     
       
       
        <a href="#" class="js-search-open"><span class=""></span></a>
       

        <!-- ======= Search Form ======= -->
        <div class="col-lg-2 col-9">
          
            <div class="row">
              <div class="col-6 col-lg-9">
                <input type="text" placeholder="Search" class="form-control" id="pissu">
              </div>
              <div class="col-3 col-lg-3">
                <button class="btn btn-warning js-search-close" onclick="pissa();">Search</button>
              </div>
            
            
            </div>
          
        </div><!-- End Search Form -->

    



  </header><!-- End Header -->
        </div>
    </div>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
 

  <!-- Template Main JS File -->
 
  <script src="script.js"></script>

</body>
</html>