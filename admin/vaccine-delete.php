<?php

include "inc/connection.php";
$receive_id = $_GET['id'];
$receive_file_name = $_REQUEST['profile_pic'];
$query = "DELETE FROM vaccine_registration WHERE vaccine_id = '{$receive_id}'";
$result = mysqli_query($connection,$query);

if($result == true){
    unlink("assets/images/$receive_file_name");
    header("location: vaccine-table.php");
}else{
    echo "Can't Delete Menu.";
}

mysqli_close($connection);

?>