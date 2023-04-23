<?php
ob_start();
$page = 'appointment-table';
include 'inc/header.php'; 
?>

<?php
if(isset($_POST['submit'])){
    //Database Connection
    include "inc/connection.php";
    echo 'hdjdhfjh';
    $appointment_id = mysqli_real_escape_string($connection,$_POST['appointment_id']); 
    
    $a_name = mysqli_real_escape_string($connection,$_POST['a_name']); 
    $m_phone = mysqli_real_escape_string($connection,$_POST['m_phone']);
    $a_address = mysqli_real_escape_string($connection,$_POST['a_address']);
    $department = mysqli_real_escape_string($connection,$_POST['department']); 
    $visit_doctor = mysqli_real_escape_string($connection,$_POST['visit_doctor']); 

    $visitdate = date('Y-m-d', strtotime($_POST['visitdate']));

    $query2 = "UPDATE appointment SET fullname='{$a_name}', address='{$a_address}', visit_doctor='{$visit_doctor}', vdate='{$visitdate}', department='{$department}', phone='{$m_phone}' WHERE appointment_id = '{$appointment_id}'"; // first_name=from database , {$f_name}= Form Name field
   
    $result2 = mysqli_query($connection, $query2) or die("Query Faild");
    if($result2 == true){
        header ("location: appointment-table.php");
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
                            <h3 class="d-inline"> Doctor Appointment Update </h3>
                        </div>
                        <?php
    $vaccine_idd = $_GET['id'];
    include "inc/connection.php";
    $query = "SELECT * FROM appointment WHERE appointment_id = {$vaccine_idd}";
    $result = mysqli_query($connection,$query) or die("FAILED");
    $count = mysqli_num_rows($result);

    if($count > 0){
        while($row = mysqli_fetch_assoc($result)){
?>
                        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="appointment_id" class="form-control"
                                    value="<?php echo $row['appointment_id'] ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="title">Full Name</label>
                                <input type="text" name="a_name" class="form-control" id="title"
                                    value="<?php echo $row['fullname'] ?>" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Address</label>
                                <input type="text" name="a_address" class="form-control" id="address"
                                    value="<?php echo $row['address'] ?>" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Mobile Number</label>
                                <input type="text" name="m_phone" class="form-control" id="phone"
                                    value="<?php echo $row['phone'] ?>" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Visit Doctor</label>
                                <select class="form-control" name="visit_doctor"
                                    value="<?php echo $row['visit_doctor'] ?>">
                                    <?php  
                                if($row['visit_doctor'] == 'Sujon'){
                                  echo "<option value='Dr Sujon' selected > Dr Sujon </option>";
                                  echo "<option value='Dr Devi'> Dr Devi </option>";
                                  echo "<option value='Dr Hasan'> Dr Hasan </option>";
                                  echo "<option value='Dr Pullen'> Dr Pullen </option>";
                                  echo "<option value='Dr Fillmore'> Dr Fillmore </option>";
                                  echo "<option value='Dr Nervo'> Dr Nervo </option>";
                                  echo "<option value='Dr Holler'> Holler </option>";
                                } elseif ($row['visit_doctor'] == 'Devi') {
                                  echo "<option value='Dr Sujon'> Dr Sujon </option>";
                                  echo "<option value='Dr Devi' selected> Dr Devi </option>";
                                  echo "<option value='Dr Hasan'> Dr Hasan </option>";
                                  echo "<option value='Dr Pullen'> Dr Pullen </option>";
                                  echo "<option value='Dr Fillmore'> Dr Fillmore </option>";
                                  echo "<option value='Dr Nervo'> Dr Nervo </option>";
                                  echo "<option value='Dr Holler'> Dr Holler </option>";
                                } elseif ($row['visit_doctor'] == 'Hasan') {
                                  echo "<option value='Dr Sujon'> Dr Sujon </option>";
                                  echo "<option value='Dr Devi'> Dr Devi </option>";
                                  echo "<option value='Dr Hasan' selected> Dr Hasan </option>";
                                  echo "<option value='Dr Pullen'> Dr Pullen </option>";
                                  echo "<option value='Dr Fillmore'> Dr Fillmore </option>";
                                  echo "<option value='Dr Nervo'> Dr Nervo </option>";
                                  echo "<option value='Dr Holler'> Dr Holler </option>";
                                }elseif ($row['visit_doctor'] == 'Pullen') {
                                  echo "<option value='Dr Sujon'> Dr Sujon </option>";
                                  echo "<option value='Dr Devi'> Dr Devi </option>";
                                  echo "<option value='Dr Hasan'> Dr Hasan </option>";
                                  echo "<option value='Dr Pullen' selected> Dr Pullen </option>";
                                  echo "<option value='Dr Fillmore'> Dr Fillmore </option>";
                                  echo "<option value='Dr Nervo'> Dr Nervo </option>";
                                  echo "<option value='Dr Holler'> Dr Holler </option>";
                                }elseif ($row['visit_doctor'] == 'Fillmore') {
                                  echo "<option value='Dr Sujon'> Dr Sujon </option>";
                                  echo "<option value='Dr Devi'> Dr Devi </option>";
                                  echo "<option value='Dr Hasan'> Dr Hasan </option>";
                                  echo "<option value='Dr Pullen'> Dr Pullen </option>";
                                  echo "<option value='Dr Fillmore' selected> Dr Fillmore </option>";
                                  echo "<option value='Dr Nervo'> Dr Nervo </option>";
                                  echo "<option value='Dr Holler'> Dr Holler </option>";
                                }else {
                                  echo "<option value='Dr Sujon'> Dr Sujon </option>";
                                  echo "<option value='Dr Devi'> Dr Devi </option>";
                                  echo "<option value='Dr Hasan'> Dr Hasan </option>";
                                  echo "<option value='Dr Pullen'> Dr Pullen </option>";
                                  echo "<option value='Dr Fillmore'> Dr Fillmore </option>";
                                  echo "<option value='Dr Nervo'> Dr Nervo </option>";
                                  echo "<option value='Dr Holler' selected> Dr Holler </option>";
                                }   
                            ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Select Department </label>
                                <select class="form-control" name="department" value="<?php echo $row['department'] ?>">
                                    <?php  
                                if($row['visit_doctor'] == 'Cardiologist'){
                                  echo "<option value='cardiologist' selected > Cardiologist </option>";
                                  echo "<option value='ent'>ENT specialist</option>";
                                  echo "<option value='physician'>General Physician</option>";
                                  echo "<option value='neurologist'> Neurologist </option>";
                                  echo "<option value='orthopedician'>Orthopedician</option>"; 
                                } elseif ($row['visit_doctor'] == 'ENT') {
                                  echo "<option value='cardiologist'> Cardiologist </option>";
                                  echo "<option value='ent' selected> ENT specialist </option>";
                                  echo "<option value='physician'>General Physician</option>";
                                  echo "<option value='neurologist'> Neurologist </option>";
                                  echo "<option value='orthopedician'>Orthopedician</option>"; 
                                }  elseif ($row['visit_doctor'] == 'Physician') {
                                  echo "<option value='cardiologist'> Cardiologist </option>";
                                  echo "<option value='ent'>ENT specialist</option>";
                                  echo "<option value='physician' selected> General Physician </option>";
                                  echo "<option value='neurologist'> Neurologist </option>";
                                  echo "<option value='orthopedician'>Orthopedician</option>"; 
                                } elseif ($row['visit_doctor'] == 'Neurologist') {
                                  echo "<option value='cardiologist'> Cardiologist </option>";
                                  echo "<option value='ent'>ENT specialist</option>";
                                  echo "<option value='physician'>General Physician</option>";
                                  echo "<option value='neurologist' selected> Neurologist </option>";
                                  echo "<option value='orthopedician'>Orthopedician</option>"; 
                                } elseif ($row['visit_doctor'] == 'Oncologist') {
                                  echo "<option value='cardiologist'> Cardiologist </option>";
                                  echo "<option value='ent'>ENT specialist</option>";
                                  echo "<option value='physician'>General Physician</option>";
                                  echo "<option value='neurologist'> Neurologist </option>";
                                  echo "<option value='oncologist' selected> Oncologist </option>"; 
                                } else {
                                  echo "<option value='cardiologist'> Cardiologist </option>";
                                  echo "<option value='ent'>ENT specialist</option>";
                                  echo "<option value='physician'>General Physician</option>";
                                  echo "<option value='neurologist'> Neurologist </option>";
                                  echo "<option value='orthopedician'>Orthopedician</option>"; 
                                }   
                            ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone">Appointment Date</label>
                                <input type="date" name="visitdate" class="form-control" id="m_date"
                                    value="<?php echo $row['vdate'] ?>">
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