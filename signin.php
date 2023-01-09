<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign-in</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row ">
        <section class="vh-100 d-block mb-5" style="background-color: white; " id="s1">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="resource/si2.jpg"
                                     alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100%;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    

                                         <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">eBook</span>
                                        </div>

                                         <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                                         <div class="col-12" id="al1"></div>
                                         <?php

                            $email = "";
                            $password = "";

                            if (isset($_COOKIE["email"])) {
                                $email = $_COOKIE["email"];
                            }

                            if (isset($_COOKIE["password"])) {
                                $password = $_COOKIE["password"];
                            }

                            ?>

                                        <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example17">Email address</label>
                                            <input type="email" id="se" class="form-control form-control-lg" value="<?php echo $email;?>" />
                                            
                                        </div>

                                        <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example27">Password</label>
                                            <input type="password" id="sp" class="form-control form-control-lg" value="<?php echo $password;?>" />
                                            
                                        </div>
                                        <div class="col-12">
                                            <input type="checkbox"  id="ch">&nbsp;&nbsp;<span>Remember Me</span>
                                        </div>

                                        <div class="col-5 offset-lg-4 offset-3 pt-1 mb-4 d-grid mt-3">
                                            <button class="btn btn-primary btn-lg btn-block fw-bold" type="button" onclick="signin();">Login</button>
                                        </div>

                                        <a class="small text-muted" href="#!" onclick="frogotpassword();">Forgot password?</a>
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#" onclick="sing();"
                                        style="color: #393f81;">Register here</a></p>
                                        <div class="col-11">
                                          <button class="btn btn-dark fw-bold text-white" onclick="admin();">Admin Sign-In</button>
                                        </div>
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
                                  

                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->

            <div class="modal" tabindex="-1" id="forgotPasswordModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Reset Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                                <div class="col-6">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="npi"/>
                                        <button class="btn btn-outline-secondary" type="button" id="npb" onclick="showPassword1();"><i id="e1" class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Re-type Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="rnp"/>
                                        <button class="btn btn-outline-secondary" type="button" id="rnpb" onclick="showPassword2();"><i id="e2" class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input type="text" class="form-control" id="vc"/>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="resetpw();">Reset Password</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal -->
        </section>
        
        </div>
        <section class="vh-100 gradient-custom d-none" id="s2">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5"><b> eBook</b> Registration Form</h3>
            <div class="col-12 mb-4" id="al"></div>
            <form>
           

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="firstname" class="form-control form-control-lg" placeholder="First Name" required/>
                    
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="lastname" class="form-control form-control-lg" placeholder="Last Name" required/>
                   
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline datepicker w-100">
                    <input type="text" class="form-control form-control-lg" id="mobile" placeholder="Mobile number" required/>
                    
                  </div>

                </div>
                <div class="col-md-6 mb-5">

                  <h6 class="mb-2 pb-1">Gender: </h6>

                  <div class="form-outline datepicker w-100 d-grid">
                   <select name="" id="gender" class="form-select">
                    <option value="1">Male</option>
                    <option value="2">Feale</option>
                   </select>
                    
                  </div>

                  

                </div>
              </div>

              <div class="row">
                <div class="col-md-12 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="email" id="email" class="form-control form-control-lg" placeholder="Email" required/>
                    
                  </div>

                </div>
                
              </div>

              <div class="row">
              <div class="col-md-6 mb-4">

                <div class="form-outline">
                    <input type="password" id="password" class="form-control form-control-lg" placeholder="Password" required/>
  
                </div>

                </div>
                <div class="col-md-6 mb-4">

                    <div class="form-outline">
                        <input type="password" id="repassword" class="form-control form-control-lg" placeholder="Retype Password" required/>
 
                    </div>

                </div>
                

              <div class="col-12 mt-4 pt-2">
                <div class="row">
                    <div class="col-lg-6 col-12 d-grid">
                        <button class="btn btn-primary fw-bold" onclick="signUp();">Sign-Up</button>
                    </div>
                    <div class="col-lg-6 col-12 d-grid">
                    <button class="btn btn-success fw-bold" onclick="sing();">I have Account</button>
                    </div>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    </div>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>
</html>