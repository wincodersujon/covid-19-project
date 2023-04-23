<?php
ob_start();
$page = 'vaccine-form';
include "inc/header.php";  
?>


<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2  col-md-12 m-t-20 basic_form">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h3 class="d-inline font-primary">Register For Vaccine </h3>
                        </div>

                        <?php
                    if(isset($_POST['submit'])){
                      //Database Connection
                      include "inc/connection.php";

                      $m_name = mysqli_real_escape_string($connection,$_POST['m_name']); 
                      $m_phone = mysqli_real_escape_string($connection,$_POST['m_phone']);
                      $m_address = mysqli_real_escape_string($connection,$_POST['m_address']);
                      $gender = mysqli_real_escape_string($connection,$_POST['gender']);  
                      $m_birth = date('Y-m-d', strtotime($_POST['m_birth']));

 
                      $query = "SELECT fullname FROM vaccine_registration WHERE fullname='$m_name'";
                      $result = mysqli_query($connection, $query) or die("Query Faild");

                      $count = mysqli_num_rows($result);
                      if($count > 0){
                          echo "This User Already Exists";
                      }else{
                          $query1 = "INSERT INTO vaccine_registration (fullname,phone,address,gender,dateofbirth)
                          VALUE ('$m_name','$m_phone','$m_address','$gender','$m_birth')";
                          $result1 = mysqli_query($connection, $query1) or die("Query Faild.");

                          if($result1==true){
                              header("location: index.php");
                          }
                      }
                    }
                  ?>



                        <!-- Form Start -->
                        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="menu_id" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" name="m_name" value="<?php echo $_SESSION['username'] ?>" class="form-control" id="name" placeholder="Full Name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="address">Present Address</label>
                                <input type="text" name="m_address" class="form-control" id="address"
                                    placeholder="Enter Present Address" required>
                            </div>
                            <div class="form-group">
                                <label for="birth">Date of Birth</label>
                                <input type="date" name="m_birth" class="form-control" id="dob" max="2003-12-20"
                                    required>

                            </div>
                            <div class="form-group">
                                <label>Select Gender</label>
                                <select class="form-control" name="gender" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone">Mobile Number</label>
                                <input type="text" name="m_phone" class="form-control" id="phone"
                                    placeholder="Enter Number" required>
                            </div>
                            <div class="form-footer pt-4 mt-4 border-top">
                                <input type="submit" name="submit" value="Register" />
                                <input type="reset" value="Cancel" onclick="history.back();" />
                            </div>
                        </form> <!-- End: Form  -->
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
            </div> <!-- .col-lg-6 m-t-30 basic_form -->
        </div> <!-- .row (2nd)-->
    </div> <!-- .content -->
</div>
<!-- End: content-wrapper Section -->


<?php include 'inc/footer.php';
ob_end_flush();
?>