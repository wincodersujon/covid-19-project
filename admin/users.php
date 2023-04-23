<?php
ob_start();
$page = 'user';
include "inc/header.php";
?>

<!-- Content Section -->
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header m-b-25">
                            <h3 class="d-inline font-primary"> All Users</h3>
                            <div class="card_icon"><a href="user-add.php" class="my-btn"> <i class="mdi mdi-plus"></i>
                                    ADD USER </a></div>
                        </div>
                        <div class="table-responsive">

                            <?php
              //Database Connection
              include "inc/connection.php";
              $query = "SELECT * FROM user ORDER BY user_id DESC";
              $result = mysqli_query($connection,$query) or die("Failed");
              $count = mysqli_num_rows($result);
                          if($count > 0){ ?>

                            <table class="mb-0 table table-bordered">
                                <thead>
                                    <tr class="heading">
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email Address</th>
                                        <th scope="col">User Role</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                    $serial = 1;
                    while($row = mysqli_fetch_assoc($result)){  
                ?>
                                    <tr>
                                        <td><?php echo $row['name'];?></td>
                                        <td><?php echo $row['username'];?></td>
                                        <td><?php echo $row['email'];?>
                                        <td>
                                            <?php 
                                if($row['role'] == 1 ){
                                    echo "Admin";
                                }else{
                                    echo "Subscriber";
                                } ?>
                                        </td>
                                        <td class='edit'>
                                            <a href='user-update.php?id=<?php echo $row['user_id'] ?>'><i
                                                    class='mdi mdi-square-edit-outline'></i></a>
                                            <a onclick="return confirm('Are You Sure?')"
                                                href='user-delete.php?id= <?php echo $row['user_id'] ?>'><i
                                                    class='mdi mdi-delete-outline'></i></a>
                                        </td>
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