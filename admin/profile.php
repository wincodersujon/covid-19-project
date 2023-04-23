<?php $page = 'index';
include 'inc/header.php';
?>

<!-- Content Section -->
<div class="pl-12 pl-5">
     <?php
            //Database Connection
            include "inc/connection.php";
            $userId =  $_SESSION['user_id'];
            $query = "SELECT * FROM user WHERE user_id = $userId";
            $result = mysqli_query($connection, $query) or die("Failed");
            $count = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);
          
?>
<div style="padding: 10%">
    <h2>Profile</h2>
    <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">User ID:</label>
            <div class="col-sm-10">
                <input disabled type="text" class="form-control" id="user-id" placeholder="Enter email" name="user" value="<?php echo $row['user_id']; ?>">
                <input hidden type="text" class="form-control" id="user-id" placeholder="Enter email" name="user_id" value="<?php echo $row['user_id']; ?>">

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Name:</label>
            <div class="col-sm-10">
                <input type="name" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?php echo $row['name']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $row['email']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">User Type:</label>
            <div class="col-sm-10">
                <input disabled type="text" class="form-control" id="user-id" placeholder="Enter email" name="name" value="<?php echo $row['role'] == 1 ? 'Admin' : 'User'; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button name="submit" type="submit" class="btn btn-primary">Update profile</button>
            </div>
        </div>
    </form>
</div>
<?php
if(isset($_POST['submit'])){
    //Database Connection
    include "inc/connection.php";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_id = $_SESSION['user_id'];
    $query2 = "UPDATE user SET name='{$name}', email= '${email}'  WHERE user_id = '${user_id}'"; // first_name=from database , {$f_name}= Form Name field
   
    $result2 = mysqli_query($connection, $query2) or die("Query Faild");
    if ($result2) {
        $_SESSION['username'] = $_POST['name'];
    }
}
?>
<?php include 'inc/footer.php'; ?>