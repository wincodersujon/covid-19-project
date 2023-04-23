 <?php
session_start();

$con = mysqli_connect("localhost","root","","covid");
 
if(isset($_POST['save_date']))
{
     
    $datedose = date('Y-m-d', strtotime($_POST['datedose']));

    $get_id=$_REQUEST['vaccine_id'];

    $query = "UPDATE vaccine_registration SET date_dose ='$datedose' WHERE vaccine_id = '$get_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Date Inserted";
        header("Location: vaccine-table.php");
    }
    else
    {
        $_SESSION['status'] = "Date Inserting Failed";
        header("Location: vaccine-table.php");
    }
}
?>