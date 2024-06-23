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
      <form action="register.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Enter your Email" required autofocus oninput="validateEmail(event)">
            <span class="error" id="emailError"></span>   
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Enter your Password" required onkeyup="validatePassword()" oninput="validatePassword1(event)">
            <span id="passwordValidationMessage"></span>
            <span class="error" id="passwordError"></span>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" id="username" name="username" class="form-control" placeholder="Enter your Username" oninput="validateUserName(event)"  required>
            <span class="error" id="userNameError"></span>
          </div>
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Enter your First Name" onkeypress="req(event)"  oninput="validateFirstName(event)" required>
            <span class="error" id="firstNameError"></span>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Enter your Last Name" onkeypress="req(event)" oninput="validateLastName(event)" required>
            <span class="error" id="lastNameError"></span>
          </div>
          <div class="input-box">
            <span class="details">Date of Birth</span>
            <input type="date" id="dob" name="dob" class="form-control" placeholder="Enter Birth Date"  onblur="validateDOB()" required/>
            <span id="dobValidationMessage"></span>
          </div>
          <div class="input-box">
            <span class="details">Mobile Number</span>
            <input type="mobile_number" id="mobile_number" name="mobile_number" class="form-control" placeholder="Enter your Mobile Number" onkeypress="req2(event)" oninput="validateMobileNumber(event)" required >
            <span class="error" id="moblieNumberError"></span>
          </div>
          <div class="input-box">
            <label for="user_type" class="details">Admin Type</label>
            <select name="user_type" id="user_type" class="form-control" required>
              <option value="">Select Admin Type</option>
              <!-- <option value="user">User</option> -->
              <option value="admin">Admin</option>
            </select>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" id="submit" value="Register">
          <a href="http://localhost/php/landing%20page%20%20job%20portal/">Already have an Account</a>
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
function validateLastName() {
    var lastName = document.getElementById('last_name').value;
    var lastNameError = document.getElementById('lastNameError');
    if (lastName === '') {
      lastNameError.textContent = 'Please enter Last Name';
      lastNameError.style.color = 'red';
    } else {
      lastNameError.textContent = '';
    }
}
function validateUserName() {
    var userName = document.getElementById('username').value;
    var userNameError = document.getElementById('userNameError');
    if (userName === '') {
      userNameError.textContent = 'Please enter User Name';
      userNameError.style.color = 'red';
    } else {
      userNameError.textContent = '';
    }
}
function validateMobileNumber() {
    var moblieNumber = document.getElementById('mobile_number').value;
    var moblieNumberError = document.getElementById('moblieNumberError');
    if (moblieNumber === '') {
      moblieNumberError.textContent = 'Please enter Mobile Number';
      moblieNumberError.style.color = 'red';
    } else {
      moblieNumberError.textContent = '';
    }
}
function validatePassword1() {
    var Password = document.getElementById('inputPassword').value;
    var passwordError = document.getElementById('passwordError');
    if (Password === '') {
      passwordError.textContent = 'Please enter 8 Digit Password';
      passwordError.style.color = 'red';
    } else {
      passwordError.textContent = '';
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

$(document).ready(function () {
    $("#submit").click(function () {
        var email = $('#inputEmail').val();
        var password = $('#inputPassword').val();
      var username = $('#username').val();
      var firstname = $('#first_name').val();
        var lastname = $('#last_name').val();
        var dob = $('#dob').val();
        var mobile_number = $('#mobile_number').val();
        var user_type = $('#user_type').val();
        
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
        if (dob == '') {
            alert('Please enter DOB');
            return false;
        }
        if (mobile_number == '') {
            alert('Please enter mobile number');
            return false;
        }
        if(user_type==''){
                alert('Please Select Admin Type');
                return false;
               }
    });
});
</script>

<?php
include('connection/db.php');
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $username = $_POST['username'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $dob = $_POST['dob'];
  $mobile_number = $_POST['mobile_number'];
  $user_type = $_POST['user_type'];

  $table = ($user_type == 'admin') ? 'admin_login' : 'jobskeer';

if ($user_type == 'user') {
    $query = mysqli_query($conn, "INSERT INTO jobskeer (email, password, username, first_name, last_name, dob, mobile_number, user_type)
                                 VALUES ('$email', '$password', '$username', '$first_name', '$last_name', '$dob', '$mobile_number', '$user_type')");
    
} elseif ($user_type == 'admin') {
    $query = mysqli_query($conn, "INSERT INTO admin_login (admin_email, admin_pass, admin_username, first_name, last_name, dob, mobile_number, admin_type)
                                 VALUES ('$email', '$password', '$username', '$first_name', '$last_name', '$dob', '$mobile_number', '$user_type')");
} else {
    echo "<script>alert('Invalid user type')</script>";
    exit();
}
  if ($query) {
    echo "<script>alert('Registration Successful')</script>";
  } else {
    echo "<script>alert('Error,Please try Again')</script>";
  }
}
?>
