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
    <title>My Profile |eBook</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
</head>
<body class="bg-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="row">
                      <div class="col-lg-4 col-12 ">
                        <div class="col-12 ">
                            <div class="col-12 rounded text-center ">
                                <?php
                            $img_rs =     Database::search("SELECT * FROM `profile_img` WHERE `user_email`='".$_SESSION["u"]["email"]."'");
                            $img_num = $img_rs->num_rows;
                            $img_data = $img_rs->fetch_assoc();
                            if($img_num == 1){
                                ?>
                              <img src="<?php echo($img_data["code"]);?>" alt="" class="rounded-circle" round style="height: 150px; width: 150px;" id="q">
                                <?php
                            }else{
                                ?>
                                <img src="resource/user_profile/user.png" alt="" class="rounded-circle" round style="height: 150px; width: 150px;" id="q">
                                <?php
                            }
                                ?>

                                  
                            </div>
                            <div class="col-12 text-center">
                            <input type="file" class="d-none" id="profileimg" accept="image/*" />
                                        <label for="profileimg" class="btn btn-primary mt-5" onclick="changeImage();">Update Profile Image</label>

                            </div>
                        </div>
                      </div>
                      <div class="col-lg-8 col-12 card mt-lg-0 mt-5 mb-5">
                        <div class="col-12 text-center mt-lg-0 mt-3">
                            <h1 class="fw-bold">My Profile</h1>
                        </div>
                        <?php
                        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='".$_SESSION["u"]["email"]."'");
                        $user_num = $user_rs->num_rows;
                        $user_data = $user_rs->fetch_assoc();
                        ?>
                        <div class="col-12 mt-5">
                            <div class="row">
                            <div class="col-lg-6 col-12">
                            <input type="text" class="form-control" value="<?php echo $user_data["fname"]?>" readonly>
                            </div>
                            <div class="col-lg-6 col-12 mt-lg-0 mt-4">
                            <input type="text" class="form-control" value="<?php echo $user_data["lname"]?>" readonly>
                            </div>
                            </div>
                        </div>
                        <div class="col-12 ">
                            <input type="text" class="form-control mt-4" value="<?php echo $user_data["email"]?>" readonly>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="row">
                            <div class="col-lg-6 col-12">
                            <input type="text" class="form-control" value="<?php echo $user_data["mobile"]?>" readonly>
                            </div>
                            <div class="col-lg-6 col-12 mt-lg-0 mt-4">
                            <input type="text" class="form-control" value="<?php echo $user_data["password"]?>" readonly>
                            </div>
                            </div>
                        </div>

                        <?php
                        $address_rs = Database::search("SELECT * FROM `address_has_user` INNER JOIN `city` ON city.id = address_has_user.city_id INNER JOIN `distric` ON
                        city.distric_id= distric.id  INNER JOIN `province` ON distric.province_id=province.id INNER JOIN `country` ON province.country_id=country.id 
                        WHERE `user_email`='".$_SESSION["u"]["email"]."' ");

                        $address_data = $address_rs->fetch_assoc();
                       
                       
                        ?>
                        <div class="col-12 mt-4">
                            <div class="row">
                            <div class="col-lg-6 col-12">
                               <select  id="country" class="form-control">
                                
                                <option value="">Select Country</option>
                                <?php
                             $country_rs =    Database::search("SELECT * FROM `country`");
                             $country_num = $country_rs->num_rows;
                             for($x=0; $x<$country_num; $x++){
                                $country_data = $country_rs->fetch_assoc();
                                ?>
                                
                                <option value="<?php echo $country_data["id"]; ?>" <?php
                                                                                                            if (!empty($address_data["country_id"])) {

                                                                                                                if ($country_data["id"] == $address_data["country_id"]) {
                                                                                                            ?>selected<?php
                                                                                                                    }
                                                                                                                }

                                                                                                                        ?>><?php echo $country_data["country_name"]; ?></option>
                                <?php
                             }
                                ?>
                               </select>
                           
                            </div>
                            <div class="col-lg-6 col-12 mt-lg-0 mt-4">
                            <select  id="province" class="form-control">
                                
                                <option value="">Select Province</option>
                                <?php
                             $province_rs =    Database::search("SELECT * FROM `province`");
                             $province_num = $province_rs->num_rows;
                             for($x=0; $x<$province_num; $x++){
                                $province_data = $province_rs->fetch_assoc();
                                ?>
                                
                                <option value="<?php echo $province_data["id"]; ?>" <?php
                                                                                                            if (!empty($address_data["province_id"])) {

                                                                                                                if ($province_data["id"] == $address_data["province_id"]) {
                                                                                                            ?>selected<?php
                                                                                                                    }
                                                                                                                }

                                                                                                                        ?>><?php echo $province_data["name"]; ?></option>
                                <?php
                             }
                                ?>
                               </select>
                            </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="row">
                            <div class="col-lg-6 col-12">
                            <select  id="distric" class="form-control">
                                
                                <option value="">Select Distric</option>
                                <?php
                             $distric_rs =    Database::search("SELECT * FROM `distric`");
                             $distric_num = $distric_rs->num_rows;
                             for($x=0; $x<$distric_num; $x++){
                                $distric_data = $distric_rs->fetch_assoc();
                                ?>
                                
                                <option value="<?php echo $distric_data["id"]; ?>" <?php
                                                                                                            if (!empty($address_data["distric_id"])) {

                                                                                                                if ($distric_data["id"] == $address_data["distric_id"]) {
                                                                                                            ?>selected<?php
                                                                                                                    }
                                                                                                                }

                                                                                                                        ?>><?php echo $distric_data["name"]; ?></option>
                                <?php
                             }
                                ?>
                               </select>
                            
                            </div>
                            <div class="col-lg-6 col-12 mt-lg-0 mt-4">
                            <select  id="city" class="form-control">
                                
                                <option value="">Select City</option>
                                <?php
                             $city_rs =    Database::search("SELECT * FROM `city`");
                             $city_num = $city_rs->num_rows;
                             for($x=0; $x<$city_num; $x++){
                                $city_data = $city_rs->fetch_assoc();
                                ?>
                                
                                <option value="<?php echo $city_data["id"]; ?>" <?php
                                                                                                            if (!empty($address_data["city_id"])) {

                                                                                                                if ($city_data["id"] == $address_data["city_id"]) {
                                                                                                            ?>selected<?php
                                                                                                                    }
                                                                                                                }

                                                                                                                        ?>><?php echo $city_data["name"]; ?></option>
                                <?php
                             }
                                ?>
                               </select>
                            
                            </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4 mb-4">
                            <div class="row">
                            <div class="col-lg-6 col-12">
                            <?php
                                 if(isset($address_data["lane_1"])){
                                    ?>
                                    
                                    <input type="text" class="form-control" value="<?php echo $address_data["lane_1"]?>" id="lane_1">
                                    <?php
                                }else{
                                    ?>
                                    <input type="text" class="form-control"  placeholder="Lane_1" id="lane_1">
                                    <?php
                                }
                                
                                ?>
                           
                            </div>
                            <div class="col-lg-6 col-12 mt-lg-0 mt-4">
                            <?php
                                 if(isset($address_data["lane_2"])){
                                    ?>
                                    
                                    <input type="text" class="form-control" value="<?php echo $address_data["lane_2"]?>" id="lane_2">
                                    <?php
                                }else{
                                    ?>
                                    <input type="text" class="form-control"  placeholder="Lane_2" id ="lane_2">
                                    <?php
                                }
                                
                                ?>
                            
                            </div>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                        <?php
                                 if(isset($address_data["postal_code"])){
                                    ?>
                                    
                                    <input type="text" class="form-control" value="<?php echo $address_data["postal_code"]?>" id="code">
                                    <?php
                                }else{
                                    ?>
                                    <input type="text" class="form-control"  placeholder="postal_code" id="code">
                                    <?php
                                }
                                
                                ?>
                            
                        </div>
                      </div>
                </div>
            </div>
           
        </div>
        <div class="col-lg-4 col-12 offset-2 offset-lg-7 text-center mt-2 ">
            <button class="ms-5 mt d-grid btn btn-primary text-center" onclick="save();">Save and Uplode</button>
            </div>
    </div>
    <script src="script.js"></script>
    
</body>
</html>

    <?php

}else{
    echo("Please Login First");
}

?>


