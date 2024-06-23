<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="admin_login.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Login</title>
    <script src="js/admin_login.js" ></script>
</head>
<body>
    <div class="container">

        <h1>Admin Login form</h1>
        <form class="form" id="admin_login" method="post" action="admin_login.php" name="admin_login">

            <div class="form-group">
                <i class="fa-solid fa-user fa-2x"></i>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email" tabindex="1" required>
            </div>
            <div class="form-group">
                <i class="fa-solid fa-lock fa-flip fa-2x"></i>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter Your Password" tabindex="1" required>
            </div>
            <h4><a href="register.php" style="color: white;">Create a Account</a></h4>

            <button class="btn" name="submit" id="submit" type="submit">Submit</button>
            <br>
        </form>
    </div>
</body>
</html>

<?php
include('connection/db.php');

if(isset($_POST['submit'])){
  $email = $_POST["email"];
 $pass = $_POST["pass"];

    $query=mysqli_query($conn,"select * from admin_login where admin_email= '$email' and admin_pass='$pass'");

if($query){
if(mysqli_num_rows($query)>0){
    $_SESSION['email']=  $email;
    header('location:admin_dashboard.php');
}else{
    echo "<script>alert('Invalid email or password')</script>";
}
}
}
?>