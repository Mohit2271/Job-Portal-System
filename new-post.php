<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <title>Login <form action=""></form></title>
</head>
<body>
    <div class="container">

        <h1>Login form</h1>
        <form class="form" action="new-post.php" method="post">

            <div class="form-group">
                <i class="fa-solid fa-user fa-2x"></i>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email" tabindex="1" required>
            </div>

            <div class="form-group">
                <i class="fa-solid fa-lock fa-flip fa-2x"></i>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" tabindex="1" required>
            </div>

            <input class="btn" type="submit" name="submit" value="Sign In" >

            <h4>or Login with</h4>

            <div class="social">
                <div class="google">
                    <i class="fa-brands fa-square-google-plus fa-2x"><span>Google</span></i>
                </div>
                <div class="facebook">
                    <i class="fa-brands fa-square-facebook fa-2x"><span>Facebook</span></i>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<?php
include('connection/db.php');
if(isset($_POST['submit'])){
  $email = $_POST["email"];
  $pass = $_POST["password"];

    $query=mysqli_query($conn,"select * from admin_login where admin_email= '$email' and admin_pass='$pass' and admin_type='Customer_Admin'");

if($query){
if(mysqli_num_rows($query)>0){
    $_SESSION['email1']=  $email;
    header('location:http://localhost/php/chaturvedi%20job%20portal/admin/admin_dashboard.php');
}else{
    echo "<script>alert('Invalid email or password')</script>";
}
}
}
?>