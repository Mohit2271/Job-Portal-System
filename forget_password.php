<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <title>Forgot Password</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="container">

<h1>Forget Password</h1>

<form class="form" id="forget_password" action="" method="post" name="forget_password">

    <div class="form-group">
        <i class="fa-solid fa-user fa-2x"></i>
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email" tabindex="1" required>
    </div>

    <div class="form-group">
        <i class="fa-solid fa-lock fa-flip fa-2x"></i>
        <input type="password" class="form-control" id="password" name="password" placeholder=" New Password" tabindex="1" required>
    </div>

    <div class="form-group">
        <i class="fa-solid fa-lock fa-flip fa-2x"></i>
        <input type="password" class="form-control" id="password" name="password" placeholder=" Confirm Password" tabindex="1" required>
    </div>

    <input class="btn" type="submit" placeholder="reset" name="Reset Password">
   
    <h4></h4>


</form>
</div>
</body>
</html>




