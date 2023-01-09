<?php
session_start();
require "connection.php";

if(isset($_SESSION["au"])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap User Management Data Table</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="bootstrap.css">



</head>
<body>
<div class="container-fluid">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row bg-primary" style="height: 100px;">
                    <div class="col-sm-5 ">
                        <h2 >User <b>Management</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <a href="signin.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
                        						
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Name</th>						
                        <th>Join date</th>
                        
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    if (isset($_GET["page"])) {
                        $pageno = $_GET["page"];
                    } else {
                        $pageno = 1;
                    }
                    
                    $product_rs = Database::search("SELECT * FROM `user` ");
                    $product_num = $product_rs->num_rows;
                    
                    $results_per_page = 10;
                    $number_of_pages = ceil($product_num / $results_per_page);
                    
                    $page_results = ($pageno - 1) * $results_per_page;
                    $selected_rs = Database::search("SELECT * FROM `user` 
                    LIMIT " . $results_per_page . " OFFSET " . $page_results . "");
                    
                    $selected_num = $selected_rs->num_rows;
                    
                    for ($x = 0; $x < $selected_num; $x++) {
                        $selected_data = $selected_rs->fetch_assoc();
                    
                    ?>
                    
                    
                    <tr>
                        <td><?php echo $selected_data["email"]?></td>
                        <td><a href="#"><img src="resource/addproductimg.svg" class="avatar" alt="Avatar"><?php echo $selected_data["fname"]." ".$selected_data["lname"]?></a></td>
                        <td><?php echo $selected_data["join_date"]?></td>    
                        <?php
                        if($selected_data["status"] == 1){
                            ?>
                            <td><span class="status text-success">&bull;</span> Active</td>
                            
                            <?php
                        }else if($selected_data["status"] == 2){
                            ?>
                                                    <td><span class="status text-danger">&bull;</span> Suspended</td>
                            
                            <?php
                        }
                        ?>                    
                       
                        

                        
                        <td>
                           <div class="row d-grid">
                            <?php
                             if($selected_data["status"] == 1){
                                ?>
                                 <button class="btn btn-danger" onclick="userblock(<?php echo $selected_data['email']?>);">Block</button>
                                
                                <?php
                            }else if($selected_data["status"] == 2){
                                ?>
                                                        
                                                        <button class="btn btn-success mt-1" onclick="userunblock(<?php echo $selected_data['email']?>);">Unblock</button>
                                <?php
                            }
                            ?>                    
                            
                            
                          
                           
                           </div>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    
                </tbody>
            </table>
            <div class="col-12">
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
    </div>
</div>   
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
 
<script src="bootstrap.bundle.js"></script>
<script src="script.js"></script> 
</body>
</html>
                    

<?php
}else{
    echo("Admin only");
}
?>



