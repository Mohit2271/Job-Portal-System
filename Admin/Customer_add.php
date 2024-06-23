<?php
include('connection/db.php');

$email = $_POST['email'];
$password = $_POST['password'];
$username = $_POST['username'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$admin_type = $_POST['admin_type'];

$query = mysqli_query($conn, "INSERT INTO admin_login (admin_email, admin_pass, admin_username, first_name, last_name, admin_type)
VALUES ('$email', '$password', '$username', '$first_name', '$last_name', '$admin_type')");

if ($query) {
    echo 'Data Successfully inserted';
} else {
    echo 'Failed to insert data into the database';
}
?>
