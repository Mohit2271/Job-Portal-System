<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="sign-up.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="sign-up.php" method="post">
        <div class="user-details">
        <div class="input-box">
            <span class="details">Email</span>
            <input type="email" pattern="^[a-zA-Z0-9]+@(gmail|yahoo|hotmail)\.com$" name="email" id="inputEmail" class="form-control" placeholder="Enter your Email" required autofocus oninput="validateEmail(event)" >    
            <span class="error" id="emailError"></span>       
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Enter your Password" required onkeyup="validatePassword()">
            <span id="passwordValidationMessage"></span>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="username" id="username" name="username" class="form-control" placeholder="Enter your Username" onkeypress="req(event)" required>
          </div>
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="first_name" id="first_name" name="first_name" class="form-control" placeholder="Enter your First Name" onkeypress="req(event)"  oninput="validateFirstName(event)" required >
            <span class="error" id="firstNameError"></span>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="last_name" id="last_name" name="last_name" class="form-control" placeholder="Enter your Last Name" onkeypress="req(event)" required>
          </div>
          <div class="input-box">
                    <label for="Admin Type" class="details">Admin type</label>
                    <select name="admin_type" id="admin_type"  class="form-control" required>
                    <option value="">Select an Admin</option>
                        <!-- <option value="Super_Admin">Super Admin</option> -->
                        <option value="Customer_Admin">Customer Admin</option>
                        </select>
                </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" id="submit" value="Register">
          <a href="login.php">Already have an Account</a>
        </div>
      </form>
    </div>
  </div>
 
</body>
</html>
<script>
  function validateEmail(e) {
    var email = document.getElementById('inputEmail').value;
    var emailError = document.getElementById('emailError');
    var emailRegex = /^[a-zA-Z0-9]+@(gmail|yahoo|hotmail)\.com$/;
    if (email === '') {
        emailError.textContent = 'Please enter Email';
        emailError.style.color = 'red';
    } else if (!emailRegex.test(email)) {
        emailError.textContent = 'Please enter a valid email address';
        emailError.style.color = 'red';
    } else {
        emailError.textContent = '';
    }
}

function validateFirstName() {
    var firstName = document.getElementById('first_name').value;
    var firstNameError = document.getElementById('firstNameError');
    if (firstName === '') {
        firstNameError.textContent = 'Please enter First Name';
        firstNameError.style.color = 'red';
    } else {
        firstNameError.textContent = '';
    }
}

function req(e) {
    var s = String.fromCharCode(e.which);
    if(/[0-9]/.test(s)) {
        e.preventDefault();
    }
    if(/^[!@#$%*\^&,<>.?"';:\|{}\/)(+=._-]$/.test(s)) {
        e.preventDefault();
    }
  }
        function req2(e)
{
var n=String.fromCharCode(e.which);
	
	if((/^[a-zA-Z!@#$%\^&* )(+=._-]*$/.test(n)))
	{
		e.preventDefault();	
	}
	
	if(document.getElementById('mobile_number').value==2 || document.getElementById('mobile_number').value==1 || document.getElementById('mobile_number').value==3 || document.getElementById('mobile_number').value==4 || document.getElementById('mobile_number').value==5)
	{
		document.getElementById('mobile_number').value='';
		e.preventDefault();
	}
	if((document.getElementById('mobile_number').value).length>=10)
	{
		e.preventDefault();
	}	
	}



$(document).ready(function () {
    $("#submit").click(function () {
        var email = $('#inputEmail').val();
        var password = $('#inputPassword').val();
      var username = $('#username').val();
      var firstname = $('#first_name').val();
        var lastname = $('#last_name').val();
        var admin_type = $('#admin_type').val();
        
        var emailRegex = /^[a-zA-Z0-9]+@(gmail|yahoo|hotmail)\.com$/;

        if (email == '') {
            alert('Please enter  Email');
            return false;
        }
        if (!emailRegex.test(email)) {
            alert('Please enter a valid email address!');
            return false;
        }
        if (password == '') {
            alert('Please enter Password');
            return false;
        }
        if (password.length < 8) {
            alert("Password should be at least 8 characters");
            return false;
        }
        if (username == '') {
            alert('Please enter Username');
            return false;
        }
        if (firstname == '') {
            alert('Please enter First Name');
            return false;
        }
        if (lastname == '') {
            alert('Please enter Last Name');
            return false;
        }
        if(admin_type==''){
                alert('Please Select Admin Type');
                return false;
               }
    });
});
</script>
<?php
include('connection/db.php');
if(isset($_POST['submit']))
{
  
$email = $_POST['email'];
$password = $_POST['password'];
$username = $_POST['username'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$admin_type = $_POST['admin_type'];


$query = mysqli_query($conn, "INSERT INTO admin_login (admin_email, admin_pass, admin_username, first_name, last_name, admin_type)
VALUES ('$email', '$password', '$username', '$first_name', '$last_name', '$admin_type')");
if($query)
{
    echo "<script>alert('Registration Successful')</script>";
    // header('location:login.php');
}
else
{
    echo "<script>alert('Error,Please try Again')</script>";
    }
}
?>