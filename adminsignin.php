<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Loging</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="https://use.fontawesome.com/releases/v5.7.2/css/all.css" href="style.css">
    <link rel="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" href="style.css">
    
</head>
<body style="background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6 100%);">
    <div class="container-fluid">
        <div class="row">
           <div class="col-lg-6 col-10 justify-content-center mt-5 offset-lg-3 offset-1">
               <div class="row ">
               <div class="wrapper ">
        <div class="logo">
            <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt="">
        </div>
        <div class="text-center mt-4 name fs-3">
            eBook
        </div>
        
            
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="text" id="email" placeholder="Admin Email">
            </div>
            <div class="col-lg-6 col-12 offset-lg-3">
            <button class="btn btn-danger mt-3 " onclick="code();">Sent veryfication Code</button>
            </div>
            
            <div class="form-field d-flex align-items-center mt-5">
                <span class="fas fa-key"></span>
                <input type="text"  id="code" placeholder="Verify code">
            </div>
            <button class="btn btn-primary mt-3" onclick="login();">Login</button>
        
        
    </div>
               </div>

           </div>
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    
</body>
</html>