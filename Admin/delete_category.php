<?php
include('connection/db.php');
$del=$_GET['del'];

$query=mysqli_query($conn,"delete from job_category where id='$del'");
if ($query) {
    header("location:category.php");
    echo "<script>alert('Record successfully deleted')</script>";

}else{
    echo "<script>alert('Error')</script>";
}
?>