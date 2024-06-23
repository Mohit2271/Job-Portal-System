<?php
include('connection/db.php');
$del=$_GET['del'];

$query=mysqli_query($conn,"delete from company where company_id='$del'");
if ($query) {
    header("location:create_company.php");
    echo "<script>alert('Record successfully deleted')</script>";

}else{
    echo "<script>alert('Error')</script>";
}
?>