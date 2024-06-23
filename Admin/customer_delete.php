<?php
include('connection/db.php');
$del=$_GET['del'];

$query=mysqli_query($conn,"delete from admin_login where id='$del'");
if ($query) {
    header("location:Customers.php");
    echo "<script>alert('Record successfully deleted')</script>";

}else{
    echo "<script>alert('Error')</script>";
}
?>