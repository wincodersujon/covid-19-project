<?php $page = 'appointment-table';
include 'inc/header.php';  
?>

<!-- Content Section -->
<div class="content-wrapper vac_reg_table">
    <div class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header m-b-25">
                            <h3 class="font-primary text-center"> Appointment List </h3>
                        </div>
                        <div class="table-responsive">

                            <?php
              //Database Connection
              include "inc/connection.php";
              $query = "SELECT * FROM appointment ORDER BY appointment_id DESC";
              $result = mysqli_query($connection,$query) or die("Failed");
              $count = mysqli_num_rows($result);
                          if($count > 0){ ?>

                            <table class="mb-0 table table-bordered">
                                <thead>
                                    <tr class="heading">
                                        <th scope="col">Full Name</th>
                                        <th scope="col"> Address </th>
                                        <th scope="col"> Phone </th>
                                        <th scope="col"> Visit Doctor </th>
                                        <th scope="col"> Department </th>
                                        <th class="col-1" scope="col"> Visit Date </th>
                                        <?php if($_SESSION['role'] == 1){  ?>
                                        <th>Action</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                    $serial = 1;
                    while($row = mysqli_fetch_assoc($result)){  
                ?>
                                    <tr>
                                        <td class="col-1"><?php echo $row['fullname']; ?></td>
                                        <td class="col-2"><?php echo $row['address']; ?></td>
                                        <td class="col-1"><?php echo $row['phone']; ?></td>
                                        <td class="col-1"><?php echo $row['visit_doctor']; ?></td>
                                        <td class="col-1"><?php echo $row['department']; ?></td>
                                        <td class="col-1"><?php echo $row['vdate']; ?></td>
                                        <?php if($_SESSION['role'] == 1){  ?>
                                        <td class="col-1">
                                            <a href="appointment-update.php?id=<?php echo $row['appointment_id'] ?>"
                                                class="edit"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a onclick="return confirm('Are You Sure?')"
                                                href='appointment-delete.php?id= <?php echo $row['appointment_id'] ?>'><i
                                                    class='mdi mdi-delete-outline'></i></a>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                    <?php 
                    } //while
                ?>
                                </tbody>
                                <?php
            }else{
                echo "No Data";
        } //if

        ?>
                            </table>
                        </div> <!-- end: table-responsive  -->
                    </div><!-- end: card-body -->
                </div><!-- end: card -->
            </div> <!-- end: col-md-6 -->



        </div> <!-- .row -->
    </div> <!-- .content -->
</div>
<!-- End: content-wrapper Section -->


<?php include 'inc/footer.php'; ?>