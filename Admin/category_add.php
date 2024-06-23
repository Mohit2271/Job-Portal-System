<?php
include('connection/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $Description = mysqli_real_escape_string($conn, $_POST['Description']);

    $query = mysqli_query($conn, "INSERT INTO job_category (category, des) VALUES ('$category', '$Description')");

    if ($query) {
        echo "Data Successfully inserted";;
    } else {
        echo "<script>alert('Failed to insert data into database')</script> " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method";
}
?>
