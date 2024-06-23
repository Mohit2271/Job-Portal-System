<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <title>Login</title>
</head>
<body>
    <div class="container">

        <h1>User Login form</h1>
        <form class="form" id="login" action="login.php" method="post" name="login">

            <div class="form-group">
                <i class="fa-solid fa-user fa-2x"></i>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email" tabindex="1" required>
            </div>

            <div class="form-group">
                <i class="fa-solid fa-lock fa-flip fa-2x"></i>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" tabindex="1" required>
            </div>

            <input class="btn" type="submit" placeholder="Sign In" name="submit">
            <h4><a href="sign_up.php" style="color: white;">Create a Account</a></h4>
            
            <h4><a href="../chaturvedi job portal/Admin/admin_login.php" style="color: white;" onclick="toggleLoginType()">Switch to Admin Login</a></h4>


            <h4></h4>

        </form>
    </div>
</body>
</html>
<script>
    function toggleLoginType() {
            var form = document.getElementById('login');
            var adminLoginInput = document.querySelector('input[name="admin_login"]');
            adminLoginInput.value = adminLoginInput.value === "1" ? "0" : "1";
            form.submit();
        }
</script>
<?php
include('connection/db.php');

if(isset($_POST['submit'])){
  $email = $_POST["email"];
 $pass = $_POST["password"];

    $query=mysqli_query($conn,"select * from jobskeer where email= '$email' and password='$pass'");

if($query){
if(mysqli_num_rows($query)>0){
    $_SESSION['email1']=  $email;
    header('location:index.php');
}else{
    echo "<script>alert('Invalid email or password')</script>";
}
}
}
?>
