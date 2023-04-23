<?php
ob_start();
$page = 'employees-form';
include "inc/header.php";
?>
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2  col-md-12 m-t-20 basic_form">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h3 class="d-inline">Add User</h3>
                        </div>

                        <?php
                    if(isset($_POST['submit'])){
                      //Database Connection
                      include "inc/connection.php";
                      $fname = mysqli_real_escape_string($connection,$_POST['fname']); 
                      $user = mysqli_real_escape_string($connection,$_POST['user']);
                      $password = mysqli_real_escape_string($connection,md5($_POST['password']));
                      $email = mysqli_real_escape_string($connection,$_POST['email']);
                      $role = mysqli_real_escape_string($connection,$_POST['role']);

                      $query = "SELECT username FROM user WHERE username='$user'";
                      $result = mysqli_query($connection, $query) or die("Query Faild");

                      $count = mysqli_num_rows($result);
                      if($count > 0){
                          echo "User Name Already Exists";
                      }else{
                          $query1 = "INSERT INTO user (name,username,password,email,role) 
                          VALUE ('$fname','$user','$password','$email','$role')";
                          $result1 = mysqli_query($connection, $query1) or die("Query Faild.");

                          if($result1==true){
                              header("location: users.php");
                          }
                      }
                    }
                  ?>
                        <!-- Form Start -->
                        <form action="" method="POST" autocomplete="off">
                            <div class="form-group">
                                <label>FulL Name</label>
                                <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" name="user" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>User Role</label>
                                <select class="form-control" name="role">
                                    <option value="0">Subscriber</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" value="Submit" required />
                        </form>
                        <!-- Form End-->


                    </div> <!-- .card-body -->
                </div> <!-- .card -->
            </div> <!-- .col-lg-6 m-t-30 basic_form -->
        </div> <!-- .row (2nd)-->
    </div> <!-- .content -->
</div>
<!-- End: content-wrapper Section -->

<?php include 'inc/footer.php'; ?>