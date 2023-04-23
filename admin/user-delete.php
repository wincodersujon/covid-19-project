<?php

include "inc/connection.php";
$receive_id = $_GET['id'];
$query = "DELETE FROM user WHERE user_id = '{$receive_id}'";
$result = mysqli_query($connection,$query);

if($result == true){
    header("location: users.php");
}else{
    echo "Can't Delete User.";
}

mysqli_close($connection);

?>