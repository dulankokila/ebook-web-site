<?php
session_start();
require "connection.php";


if(isset($_SESSION["au"])){
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update & manage Book</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="text-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-4 text-center">
                <h1 class="fw-bold">Update & manage Book</h1>
            </div>
        </div>
        
        <div class="col-12 mt-4">
            <div class="row">
                <div class="col-lg-6 col-9 offset-lg-2 offset-0 d-grid">
                    <input type="text" class="form-control" placeholder="Search book.." id="input">
                </div>
                <div class="col-2 d-grid ">
                    <button class="btn btn-warning fw-bold" onclick="search();">Search</button>
                </div>
            </div>
        </div>
        <div class="col-12" id="vive"></div>

        </div>

        <div class="col-12 mt-5" >
            <div class="row text-dark">
            <?php

if (isset($_GET["page"])) {
    $pageno = $_GET["page"];
} else {
    $pageno = 1;
}

$product_rs = Database::search("SELECT * FROM `product` ");
$product_num = $product_rs->num_rows;

$results_per_page = 9;
$number_of_pages = ceil($product_num / $results_per_page);

$page_results = ($pageno - 1) * $results_per_page;
$selected_rs = Database::search("SELECT * FROM `product` 
LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

$selected_num = $selected_rs->num_rows;

for ($x = 0; $x < $selected_num; $x++) {
    $selected_data = $selected_rs->fetch_assoc();

?>

    <!-- card -->
    <div class="col-lg-4 col-12" id="viwe">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <?php
                            $img_rs = Database::search("SELECT * FROm `image` WHERE `product_id`='".$selected_data["id"]."'");
                            $img_data = $img_rs->fetch_assoc();
                            ?>
                            <div class="col-md-4">
                                <img src="<?php echo $img_data["code"]; ?>" class="img-fluid rounded-start" alt="..." style="height: 250px; width: 250px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                <h5 class="card-title"><?php echo $selected_data["bookname"]?></h5>
                                <span class="card-text"><b>Price :</b>$<?php echo $selected_data["price"]?></span><br>
                                <span  class="card-text"><b>10 </b>Item sold </span ><br>
                                <span class="card-text"><b>Quentity :</b> <?php echo $selected_data["qty"]?></span><br>
                                <span class="card-text"><?php echo $selected_data["writter"]?></span><br>
                                <div class="form-check form-switch">
                                    <?php
                                    $status_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$selected_data["id"]."'");
                                    $status_data  = $status_rs->fetch_assoc();

                                    if($status_data["status_id"] == 1){
                                        ?>
                                        
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" onclick="status(<?php echo $selected_data['id']?>);" checked >
                                            <label class="form-check-label" for="flexSwitchCheckChecked" id="a">Active for selling</label>
                                        
                                        <?php
                                    }elseif($status_data["status_id"] == 2){
                                        ?>
                                         <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" onclick="status(<?php echo $selected_data['id']?>);" >
                                            <label class="form-check-label" for="flexSwitchCheckChecked" id="a">Deactive for selling</label>
                                        
                                        <?php
                                    }
                                    ?>

                                       
                                </div>


                                
                               
                                </div>
                                <div class="col-12 mb-3 p-2">
                                    <div class="row">
                                        <div class="col-6 d-grid">
                                              <button class="btn btn-primary fw-bold" onclick="up(<?php echo $selected_data['id']?>)">Update</button>
                                        </div>
                                        <div class="col-6 d-grid">
                                               <button class="btn btn-danger fw-bold" onclick="bdelete(<?php echo $selected_data['id']?>);">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <!-- card -->

<?php

}

?>


</div>
</div>

<div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
<nav aria-label="Page navigation example">
<ul class="pagination pagination-lg justify-content-center">
    <li class="page-item">
        <a class="page-link" href="<?php if ($pageno <= 1) {
                                        echo "#";
                                    } else {
                                        echo "?page=" . ($pageno - 1);
                                    } ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
    </li>
    <?php

    for ($x = 1; $x <= $number_of_pages; $x++) {
        if ($x == $pageno) {

    ?>
            <li class="page-item active">
                <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
            </li>
        <?php

        } else {
        ?>
            <li class="page-item">
                <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
            </li>
    <?php
        }
    }

    ?>

    <li class="page-item">
        <a class="page-link" href="<?php if ($pageno >= $number_of_pages) {
                                        echo "#";
                                    } else {
                                        echo "?page=" . ($pageno + 1);
                                    } ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
    </li>
</ul>
</nav>
</div>

</div>
</div>
<!-- product -->
                
               
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
    echo("Some thng Went a Wrong");
}
?>







