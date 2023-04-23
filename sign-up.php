<?php
session_start();
 
?>

<?php 
    include "header.php";
?>

<!-- Start: Navbar Section 
==================================================-->
<div class="header_section ">
    <div class="container">
        <div class="row">
            <nav>
                <a href="index.php" class="navbar-brand primary-color"> <img src="img/logo.png" alt=""> </a>

            </nav>
        </div>
    </div>
</div>
<!-- End: Navbar Section 
==================================================-->


<!-- Start: Signup Section 
==================================================-->
<div class="signup_wrapper">
    <div class="container ">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-sm-12 col-lg-7 col-md-6">
                <div class="login-graphics heartbeat">
                    <img src="img/login.png" alt="">
                </div>
            </div>
            <div class="col-sm-12 col-lg-5 col-md-6">
                <div class="card">
                    <div class="card-body p-5 rounded-20">

                        <h4 class="text-center m-b-20">Sign Up</h4>

                        <?php
                          if(isset($_POST['submit'])){
                            //Database Connection
                            include "admin/inc/connection.php";
                            $fname = mysqli_real_escape_string($connection,$_POST['fname']); 
                            $user = mysqli_real_escape_string($connection,$_POST['user']);
                            $password = mysqli_real_escape_string($connection,md5($_POST['password']));
                            $email = mysqli_real_escape_string($connection,$_POST['email']); 

                            $query = "SELECT username FROM user WHERE username='$user'";
                            $result = mysqli_query($connection, $query) or die("Query Faild");

                            $count = mysqli_num_rows($result);
                            if($count > 0){
                                echo "User Name Already Exists";
                            }else{
                                $query1 = "INSERT INTO user (name,username,password,email) 
                                VALUE ('$fname','$user','$password','$email')";
                                $result1 = mysqli_query($connection, $query1) or die("Query Faild..");

                                if($result1==true){
                                    header("location: sign-in.php");
                                }
                            }
                          }
                        ?>

                        <form action="" method="POST" autocomplete="off">
                            <div class="row">
                                <div class="form-group col-md-12 mb-4">
                                    <input type="name" name="fname" class="form-control input-lg" id="name"
                                        placeholder="Full Name">
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <input type="email" name="email" class="form-control input-lg" id="email"
                                        placeholder="Email">
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <input type="name" name="user" class="form-control input-lg" id="email"
                                        placeholder="Username">
                                </div>
                                <div class="form-group col-md-12 ">
                                    <input type="password" name="password" class="form-control input-lg" id="password"
                                        placeholder="Password">
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" name="submit"
                                        class="btn btn-lg btn-primary btn-block m-t-10">Sign Up</button>
                                    <p>Already have an account?
                                        <a class="text-blue" href="sign-in.php">Sign In</a>
                                    </p>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End: Signup Section 
==================================================-->