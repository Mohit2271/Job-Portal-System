<?php
include('connection/db.php');
$del=$_GET['del'];

$query=mysqli_query($conn,"delete from all_jobs where job_id='$del'");
if ($query) {
    header("location:job_create.php");
    echo "<script>alert('Record successfully deleted')</script>";

}else{
    echo "<script>alert('Error')</script>";
}
?>