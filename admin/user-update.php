<?php
ob_start();
$page = 'user';
include 'inc/header.php'; 
?>

<?php
if(isset($_POST['submit'])){
    //Database Connection
    include "inc/connection.php";
    $user_id = mysqli_real_escape_string($connection,$_POST['user_id']);
    $f_name = mysqli_real_escape_string($connection,$_POST['f_name']);
    $username = mysqli_real_escape_string($connection,$_POST['username']); 
    $email = mysqli_real_escape_string($connection,$_POST['email']); 
    $role = mysqli_real_escape_string($connection,$_POST['role']);

    $query2 = "UPDATE user SET name='{$f_name}', username='{$username}', email='{$email}', role='{$role}' WHERE user_id = '{$user_id}'"; // first_name=from database , {$f_name}= Form Name field
   
    $result2 = mysqli_query($connection, $query2) or die("Query Faild");
    if($result2 == true){
        header ("location: users.php");
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
                            <h3 class="d-inline">User Update </h3>
                        </div>

                        <?php
    $user_idd = $_GET['id'];
    $connection = mysqli_connect('localhost','root','','covid') or die("Not Connected". mysqli_error());
    $query = "SELECT * FROM user WHERE user_id = {$user_idd}";
    $result = mysqli_query($connection,$query) or die("FAILED");
    $count = mysqli_num_rows($result);

    if($count > 0){
        while($row = mysqli_fetch_assoc($result)){
?>


                        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="user_id" class="form-control"
                                    value="<?php echo $row['user_id'] ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="f_name" class="form-control" value="<?php echo $row['name'] ?>"
                                    placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" name="username" class="form-control"
                                    value="<?php echo $row['username'] ?>" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>"
                                    placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>User Role</label>
                                <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                                    <?php 
                                if($row['role'] == 1){
                                    echo "<option value='0'> Subscriber </option>";
                                    echo "<option value='1' selected > Admin </option>";
                                }else{
                                    echo "<option value='0' selected > Subscriber </option>";
                                    echo "<option value='1'> Admin </option>";
                                }    
                            ?>
                                </select>
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