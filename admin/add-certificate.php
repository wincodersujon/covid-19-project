<?php

 
$conn = new PDO('mysql:host=localhost; dbname=covid','root', ''); 

$get_id=$_REQUEST['vaccine_id'];

move_uploaded_file($_FILES["image"]["tmp_name"],"assets/images/" . $_FILES["image"]["name"]);			
$location1=$_FILES["image"]["name"];


$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE vaccine_registration SET profile_pic ='$location1' WHERE vaccine_id = '$get_id' ";

$conn->exec($sql);
echo "<script>alert('Successfully Updated!!!'); window.location='vaccine-table.php'</script>";
?>