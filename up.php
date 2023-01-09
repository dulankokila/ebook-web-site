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
    <title>Update Book</title>
    <link rel="stylesheet" href="bootstrap.css">
    
</head>
<body class="bg-dark text-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-5">
                <h1 class="fw-bold text-white text-center">Update product</h1>
            </div>
            <div class="col-12 mt-5">
                <div class="row">
                    <div class="col-lg-5 col-12 offset-lg-1 ">
                        <div class="col-12">
                            <h4 class="fw-bold">Select Book Category</h4>
                        </div>
                        <div class="col-12 d-grid">
                            <?php
                            $cat_rs = Database::search("SELECT * FROM `catagory` WHERE `id`='".$_SESSION["p"]["id"]."'");
                            $cat_data =    $cat_rs->fetch_assoc();
                            
                            ?>
                            <select  id="category" class="form-select" disabled>
                            <option value="0"><?php echo  $cat_data["name"]?></option>
                                
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-5  col-12 ">
                        <div class="col-12">
                            <h4 class="fw-bold">Book name</h4>
                        </div>
                        <div class=" col-12 d-grid">
                            <input type="text" class="form-control" id="bookname" value="<?php echo  $_SESSION["p"]["bookname"]?>" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="col-12">
                            <h4 class="fw-bold">Price</h4>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="price" value="<?php echo  $_SESSION["p"]["price"]?>">
                                <span class="input-group-text">.00</span>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-12 ">
                        <div class="col-12">
                            <h4 class="fw-bold">Quentity</h4>
                        </div>
                        <div class="col-12">
                            <input type="number" min="1"  class="form-control" id="qty" value="<?php echo  $_SESSION["p"]["qty"]?>">
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 ">
                        <div class="col-12">
                            <h4 class="fw-bold">Writter name</h4>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="wrname" value="<?php echo  $_SESSION["p"]["writter"]?> " disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="col-12">
                            <h4 class="fw-bold">Delivery cost Srilanka</h4>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="dcs" value="<?php echo  $_SESSION["p"]["dilivery_free_Srilanka"]?>">
                                <span class="input-group-text">.00</span>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-12 ">
                        <div class="col-12">
                            <h4 class="fw-bold">Delivery cost Other Country </h4>
                        </div>
                        <div class="col-12">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="scoc" value="<?php echo  $_SESSION["p"]["dilivery_free_other_country"]?>">
                                <span class="input-group-text">.00</span>
                            </div>

                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 ">
                        <div class="col-12">
                            <h4 class="fw-bold">Language</h4>
                        </div>
                        <div class="col-12">
                        <select  id="language" class="form-select" disabled>
                            <?php
                        $lan_rs = Database::search("SELECT * FROM `language` WHERE `id`='".$_SESSION["p"]["id"]."'");
                            $lan_data =    $lan_rs->fetch_assoc();
                            ?>
                                <option value="0"><?php echo $lan_data["name"];?></option>
                               
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold text-center" style="font-size: 20px;">Add Product Images</label>
                                        </div>
                                        <div class="offset-lg-3 col-12 col-lg-6">
                                            <div class="row">
                                                <div class="col-6 offset-3 border border-primary rounded">
                                                <?php
                        $img_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='".$_SESSION["p"]["id"]."'");
                            $img_data =    $img_rs->fetch_assoc();
                            ?>
                                                    <img src="<?php echo $img_data["code"]?>" class="img-fluid" style="height: 300px; width: 100%;" id="i0" />
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">

                                            <input type="file" class="d-none" id="imageuploader" />
                                            <label for="imageuploader" class="col-12 btn btn-primary" onclick="changeProductImage();">Upload Images</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Book Description</label>
                                        </div>
                                        <div class="col-12">
                                            <textarea cols="30" rows="15" class="form-control" id="dis" ><?php echo $_SESSION["p"]["discribtion"]?></textarea>
                                        </div>
                                    </div>
                                </div>
            <div class="col-12 mt-5">
                                <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
                                    <button class="btn btn-success" onclick="upbook();">Update Book</button>
                                </div>
            
               
        </div>
    </div>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    
</body>
</html>