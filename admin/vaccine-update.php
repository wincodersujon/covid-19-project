<?php
ob_start();
$page = 'vaccine-table';
include 'inc/header.php'; 
?>

<?php
if(isset($_POST['submit'])){
    //Database Connection
    include "inc/connection.php";
    $vaccine_id = mysqli_real_escape_string($connection,$_POST['vaccine_id']); 
    
                      $m_name = mysqli_real_escape_string($connection,$_POST['m_name']); 
                      $m_phone = mysqli_real_escape_string($connection,$_POST['m_phone']);
                      $m_address = mysqli_real_escape_string($connection,$_POST['m_address']);
                      $gender = mysqli_real_escape_string($connection,$_POST['gender']); 
                      $m_birth = mysqli_real_escape_string($connection,$_POST['m_birth']); 

    $query2 = "UPDATE vaccine_registration SET fullname='{$m_name}', address='{$m_address}', dateofbirth='{$m_birth}', gender='{$gender}', phone='{$m_phone}' WHERE vaccine_id = '{$vaccine_id}'"; // first_name=from database , {$f_name}= Form Name field
   
    $result2 = mysqli_query($connection, $query2) or die("Query Faild");
    if($result2 == true){
        header ("location: vaccine-table.php");
    }
}
?>


<!-- Content Section -->
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2  col-md-12 m-t-50 basic_form">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h3 class="d-inline">Vaccine Register Update </h3>
                        </div>
                        <?php
    $vaccine_idd = $_GET['id'];
    include "inc/connection.php";
    $query = "SELECT * FROM vaccine_registration WHERE vaccine_id = {$vaccine_idd}";
    $result = mysqli_query($connection,$query) or die("FAILED");
    $count = mysqli_num_rows($result);

    if($count > 0){
        while($row = mysqli_fetch_assoc($result)){
?>
                        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="vaccine_id" class="form-control"
                                    value="<?php echo $row['vaccine_id'] ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="title">Full Name</label>
                                <input type="text" name="m_name" class="form-control" id="title"
                                    value="<?php echo $row['fullname'] ?>" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Present Address</label>
                                <input type="text" name="m_address" class="form-control" id="address"
                                    value="<?php echo $row['address'] ?>" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="birth">Date of Birth</label>
                                <input type="date" name="m_birth" class="form-control" id="dateofbirth"
                                    value="<?php echo $row['dateofbirth'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Select Gender</label>
                                <select class="form-control" name="gender" value="<?php echo $row['gender'] ?>">
                                    <?php  
                                if($row['gender'] == 'male'){
                                  echo "<option value='male' selected > Male </option>";
                                  echo "<option value='Female'> Female </option>";
                                  echo "<option value='Other'> Other </option>";
                                } elseif ($row['gender'] == 'female') {
                                  echo "<option value='male'> Male </option>";
                                  echo "<option value='Female' selected > Female </option>";
                                  echo "<option value='Other'> Other </option>";
                                } else {
                                  echo "<option value='male'> Male </option>";
                                  echo "<option value='Female'> Female </option>";
                                  echo "<option value='Other' selected > Other </option>";
                                }   
                            ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone">Mobile Number</label>
                                <input type="text" name="m_phone" class="form-control" id="phone"
                                    value="<?php echo $row['phone'] ?>" placeholder="">
                            </div>

                            <input type="submit" name="submit" class="btn btn-primary" value="Update" required />

                        </form>
                        <?php 
            }//while
        } //if
    ?>
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