<?php 
session_start();
include('connection/db.php');

$login= $_SESSION['email'];

 $job_title = $_POST['job_title'];
 $Description = $_POST['Description'];
 $countries = $_POST['country'];
 $states = $_POST['state'];
 $cities = $_POST['city'];
 $category = $_POST['category'];
 $job_post = $_POST['job_post'];
 $last_date = $_POST['last_date'];

$query= mysqli_query($conn,"insert into all_jobs(customer_email,job_title,des,country,state,city,category,job_post,last_date)
values('$login','$job_title','$Description','$countries','$states','$cities','$category','$job_post',' $last_date')");

if($query){
    echo "<script>alert('Data Successfully inserted')</script>";
}else{
    echo "<script>alert('Failed to insert data into database')</script>";
}
?>