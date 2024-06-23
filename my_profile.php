<?php
include('connection/db.php');
include('header.php');
include('my_profile_1.php');

$query=mysqli_query($conn,"select * from profiles where user_email='{$_SESSION['email1']}'");
while ($row = mysqli_fetch_array($query)) {
    $img=$row['img'];
    $name=$row['name'];
    $number=$row['number'];
    $dob=$row['dob'];
    $email=$row['email'];
}
?>
<br>
   <div style="margin-left: 25%; width:50%; border: 1px solid gray; padding: 10px;">
    <form action="profile_add.php" method="POST" id="profile_form" name="profile_form" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4">
            <img src="profile_img/<?php if(!empty($img)){ echo $img;}else{ echo 'logo.png'; } ?>" class="img-thumbnail" alt="Cinque Terre">
            </div>
            <div class="col-md-4">
                <input type="file" class="form-control" name="img" id="img">
            </div>
           
        </div>
        <br>
        <div style="margin-left: 10%;">
        <div class="row">
            <div class="col-md-6">
                <td>Enter Your Name:</td>
            </div>
            <div class="col-md-6">
                <td><input type="text" name="name" id="name" value="<?php if(!empty($name)) echo $name; ?>" class="form-control" placeholder="Enter your name" onkeypress="req(event)" required ></td>
            </div>
           
        </div>
        <div class="row">
            <div class="col-md-6">
                <td>Enter Your DOB:</td>
            </div>
            <div class="col-md-6">
                <td><input type="date" name="dob" id="dob" class="form-control" value="<?php if(!empty($dob)) echo $dob; ?>" placeholder="Enter your DOB" onblur="validateDOB()"></td>
                <span id="dobValidationMessage"></span>
            </div>
           
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <td>Enter Your Mobile Number:</td>
            </div>
            <div class="col-md-6">
                <td><input type="number" name="number" id="number" class="form-control" value="<?php if(!empty($number)) echo $number; ?>" placeholder="Enter your Mobile Number" onkeypress="req2(event)" required  ></td>
            </div>
           
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <td>Enter Your Email:</td>
            </div>
            <div class="col-md-6">
                <td><input type="email" pattern="^[a-zA-Z0-9]+@(gmail|yahoo|hotmail)\.com$" name="email" id="email" class="form-control" value="<?php if(!empty($email)) echo $email; ?>" placeholder="Enter your Email" required></td>
            </div>
           
        </div>
        <div class="form-group">
            <input type="submit" id="submit" placeholder="Update" value="Update" name="submit" class="btn btn-success">
        </div>
        </div>
    </form>
   </div>
   <br>		
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
	
	if(document.getElementById('number').value==2 || document.getElementById('number').value==1 || document.getElementById('number').value==3 || document.getElementById('number').value==4 || document.getElementById('number').value==5)
	{
		document.getElementById('number').value='';
		e.preventDefault();
	}
	if((document.getElementById('number').value).length>=10)
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
 </script>

<?php
include("footer.php")
?>
<script>
    $(document).ready(function(){
        $("#submit").click(function(){
            var data = $("#profile_form").serialize();
                $.ajax({
                    type : 'POST',
                    url  : 'profile_add.php',
                    data : data,
                    success : function(data){
                        $("#msg").html(data);
                        }

                    });
        })
    })
</script>