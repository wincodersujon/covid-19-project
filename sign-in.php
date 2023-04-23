<?php
session_start();

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


<!-- Start: Login Section 
==================================================-->
<div class="login_wrapper">
    <div class="container ">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-sm-12 col-lg-7 col-md-6">
                <div class="login-graphics heartbeat">
                    <img src="img/login.png" alt="">
                </div>
            </div>
            <div class="col-sm-12 col-lg-5 col-md-6">
                <div class="card">
                    <div class="card-body p-5">
                        <h4 class="text-center text-uppercase m-b-20"> Sign In </h4>

                        <!-- Form Start -->
                        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-lg btn-primary btn-block mb-4"
                                value="Sign In" />
                            <p>Don't have an account yet ?
                                <a class="text-blue" href="sign-up.php">Sign Up</a>
                            </p>
                        </form>
                        <!-- /Form  End -->

                        <?php
                    if(isset($_POST['login'])){
                        include "admin/inc/connection.php";
                        $username = mysqli_real_escape_string($connection,$_POST['username']);
                        $password = md5($_POST['password']);
                        $query = "SELECT user_id,username,role FROM user WHERE username='{$username}' AND password='{$password}'";
                        $result = mysqli_query($connection,$query) or die("Query Failed");
                        if(mysqli_num_rows($result) > 0 ){
                            while($row = mysqli_fetch_assoc($result)){
                                session_start();
                                $_SESSION['username'] = $row['username'];
                                $_SESSION['user_id'] = $row['user_id'];
                                $_SESSION['role'] = $row['role'];
                                header("location: admin/index.php");
                            }
                        }else{
                            echo "Username and Password are not matched";
                        }
                    }
                ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End: Login Section 
==================================================-->