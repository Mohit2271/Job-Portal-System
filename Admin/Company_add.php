<?php
include('connection/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Company = mysqli_real_escape_string($conn, $_POST['Company']);
    $Description = mysqli_real_escape_string($conn, $_POST['Description']);
    $admin = mysqli_real_escape_string($conn, $_POST['admin']);

    $query = mysqli_query($conn, "INSERT INTO company(company, des, admin) VALUES ('$Company', '$Description', '$admin')");

    if ($query) {
        echo "<script>alert('Data Successfully inserted')</script>";
    } else {
        echo "<script>alert('Failed to insert data into database')</script>";
    }
} else {
    echo "<script>alert('Invalid request')</script>";
}
?>
