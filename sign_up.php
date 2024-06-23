<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="sign_up.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="sign_up.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="first_name" id="first_name" name="first_name" class="form-control" placeholder="Enter your First Name" onkeypress="req(event)" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="last_name" id="last_name" name="last_name" class="form-control" placeholder="Enter your Last Name" onkeypress="req(event)" required>
          </div>
         
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" pattern="^[a-zA-Z0-9]+@(gmail|yahoo|hotmail)\.com$" name="email" id="inputEmail" class="form-control" placeholder="Enter your Email" required autofocus oninput="validateEmail(event)" >
            <span class="error" id="emailError"></span>
          </div>
          <div class="input-box">
            <span class="details">Mobile Number</span>
            <input type="mobile_number" id="mobile_number" name="mobile_number" class="form-control" placeholder="Enter your Mobile Number" onkeypress="req2(event)" required >
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Enter your Password" required onkeyup="validatePassword(event)">
            <!-- <span id="passwordValidationMessage"></span> -->
            <span class="error" id="passwordError"></span>
          </div>
          <div class="input-box">
            <label>Birth Date</label>
            <input type="date" id="dob" name="dob" class="form-control" placeholder="Enter Birth Date" required onblur="validateDOB()"/>
            <span id="dobValidationMessage"></span>
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
function validateDOB() {
  var dobInput = document.getElementById('dob');
  var dobValidationMessage = document.getElementById('dobValidationMessage');
  var dobValue = new Date(dobInput.value);
  var today = new Date();
  var age = today.getFullYear() - dobValue.getFullYear();

  if (
    today.getMonth() < dobValue.getMonth() ||
    (today.getMonth() === dobValue.getMonth() && today.getDate() < dobValue.getDate())
  ) {
    age--;
  }

  if (age >= 18) {
    dobValidationMessage.style.color = 'green';
    dobValidationMessage.innerHTML = 'Date of birth is valid.';
  } else {
    dobValidationMessage.style.color = 'red';
    dobValidationMessage.innerHTML = 'Must be at least 18 years old.';
  }
}

function validateEmail() {
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

function validatePassword() {
    var password = document.getElementById('inputPassword').value;
    var passwordError = document.getElementById('passwordError');
    if (password.length < 8) {
        passwordError.textContent = 'Password should be at least 8 characters';
        passwordError.style.color = 'red';
    } else {
        passwordError.textContent = '';
    }
}


$(document).ready(function () {
    $("#submit").click(function () {
      var firstname = $('#first_name').val();
        var lastname = $('#last_name').val();
        var email = $('#inputEmail').val();
        var mobile_number = $('#mobile_number').val();
        var password = $('#inputPassword').val();
        var dob = $('#dob').val();
        
        var emailRegex = /^[a-zA-Z0-9]+@(gmail|yahoo|hotmail)\.com$/;

        if (firstname == '') {
            alert('Please enter First Name');
            return false;
        }
        if (lastname == '') {
            alert('Please enter Last Name');
            return false;
        }
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
       
        if (dob == '') {
            alert('Please enter Date of Birth');
            return false;
        }
        if (mobile_number == '') {
            alert('Please enter Mobile Number');
            return false;
        }
    });
});
</script>
<?php
include('connection/db.php');
if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $dob=$_POST['dob'];
    $mobile_number=$_POST['mobile_number'];

$query=mysqli_query($conn,"insert into jobskeer(email,password,first_name,last_name,dob,mobile_number)values('$email','$password','$first_name','$last_name','$dob','$mobile_number')");
if($query)
{
    echo "<script>alert('Registration Successful')</script>";
}
else
{
    echo "<script>alert('Error,Please try Again')</script>";
    }
}
?>











