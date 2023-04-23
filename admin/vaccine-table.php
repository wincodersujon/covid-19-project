<?php $page = 'vaccine-table';
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
                            <h3 class="font-primary text-center"> Vaccine Registered List </h3>
                        </div>
                        <div class="table-responsive">

                            <?php
                        //Database Connection
                        include "inc/connection.php";
                        $query = "SELECT * FROM vaccine_registration ORDER BY vaccine_id DESC";
                        $result = mysqli_query($connection,$query) or die("Failed");
                        $count = mysqli_num_rows($result);
                                    if($count > 0){ ?>

                            <table class="mb-0 table table-bordered">
                                <thead>
                                    <tr class="heading">
                                        <th scope="col">Full Name</th>
                                        <th scope="col"> Date of Birth </th>
                                        <th scope="col"> Gender </th>
                                        <th scope="col"> Present Address</th>
                                        <th scope="col"> Phone </th>
                                        <th scope="col"> Date Of Dose </th>
                                        <th scope="col"> Certificate </th>
                                        <?php if($_SESSION['role'] == 1){  ?>
                                        <th>Action</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                $serial = 1;
                                while($row = mysqli_fetch_assoc($result)){  
                                $id=$row['vaccine_id'];
                            ?>
                                    <tr>
                                        <td class="col-1"><?php echo $row['fullname']; ?></td>
                                        <td class="col-1"><?php echo $row['dateofbirth']; ?></td>
                                        <td class="col-1"><?php echo $row['gender']; ?></td>
                                        <td class="col-2"><?php echo $row['address']; ?></td>
                                        <td class="col-1"><?php echo $row['phone']; ?></td>
                                        <td class="col-1 text-center datedose_td">
                                            <div class="text-center"> <?php echo $row['date_dose']; ?> </div>
                                            <!-- Date Of Dose Button -->
                                            <?php if($_SESSION['role'] == 1){  ?>
                                            <button type="button" class="btn btn-certificate" data-toggle="modal"
                                                data-target="#dateDoseModal<?php echo $id;?>">
                                                Add Date
                                            </button>
                                            <?php } ?>

                                            <!-- Date Of Dose Modal -->
                                            <div class="modal fade dateDoseModal" id="dateDoseModal<?php echo $id;?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Date of
                                                                Vaccine Dose
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="add-dose-date.php<?php echo '?vaccine_id='.$id; ?>"
                                                                method="POST">
                                                                <input type="date" name="datedose" width="500">
                                                                <br>
                                                                <br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" name="save_date"
                                                                        class="btn btn-certificate">Add Date</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="col-1 text-center">
                                            <div class="cartificate_image">
                                                <img width="70px" src="assets/images/<?php echo $row['profile_pic']; ?>"
                                                    alt="" onerror="this.style.display='none'" />
                                                <?php if($_SESSION['role'] == 0){  ?>
                                                <div class="cartificate_zoom">
                                                    <a class="popup-link"
                                                        href="assets/images/<?php echo $row['profile_pic']; ?>"> <i
                                                            class="mdi mdi-magnify-plus-outline"></i> </a>
                                                    <a download target="_blank" class="cert_download"
                                                        href="assets/images/<?php echo $row['profile_pic']; ?>"> <i
                                                            class="mdi mdi-download"></i> </a>
                                                </div>
                                                <?php } ?>
                                            </div>

                                            <?php if($_SESSION['role'] == 1){  ?>
                                            <button type="button" class="btn btn-certificate" data-toggle="modal"
                                                data-target="#delete<?php echo $id;?>">Add Certificate</button>
                                            <?php } ?>
                                        </td>

                                        <?php if($_SESSION['role'] == 1){  ?>
                                        <td class="col-1 edit_td">
                                            <a href="vaccine-update.php?id=<?php echo $row['vaccine_id'] ?>"
                                                class="edit"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a onclick="return confirm('Are You Sure?')"
                                                href='vaccine-delete.php?id= <?php echo $row['vaccine_id'] ?>&profile_pic=<?php echo $row['profile_pic'] ?>'>
                                                <i class='mdi mdi-delete-outline'></i></a>
                                        </td>
                                        <?php } ?>

                                    </tr>

                                    <!-- Certificate Modal -->
                                    <div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Upload Certificate
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="add-certificate.php<?php echo '?vaccine_id='.$id; ?>"
                                                        method="post" enctype="multipart/form-data">
                                                        <br>
                                                        <input type="file" name="image" style="margin-top:-115px;">
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="submit"
                                                                class="btn btn-certificate">Upload</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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