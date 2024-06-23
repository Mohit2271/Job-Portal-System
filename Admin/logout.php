<?php
session_start();
session_unset();
header("location:admin_login.php");

include('connection/db.php');

$query=mysqli_query($conn,"select * from admin_login where admin_email='{$_SESSION['email']}' and admin_type='Customer_Admin'");
if ($query) {
    header("location:http://localhost/php/landing%20page%20%20job%20portal/index.php");
}
else{
    header("location:admin_login.php");
    }

?>
