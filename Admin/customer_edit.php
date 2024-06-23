<?php
include('connection/db.php');

include('header.php');
include('sidebar.php');

$id=$_GET['edit'];
$query=mysqli_query($conn,"select * from admin_login where id = '$id'");
while ($row=mysqli_fetch_array($query)){
    $admin_email=$row['admin_email'];
    $first_name=$row['first_name'];
    $last_name=$row['last_name'];
    $admin_pass=$row['admin_pass'];
    $admin_username=$row['admin_username'];
    $dob=$row['dob'];
    $mobile_number=$row['mobile_number'];
    $admin_type=$row['admin_type'];

    }

?>
   <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="customers.php">Customers</a></li>
                    <li class="breadcrumb-item"><a href="#">Update Customer</a></li>
                </ol>
            </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Update Customer</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                
              </div>
            </div>
          </div>
          <div style="width: 60%; margin-left:20%; background-color: #F2F4F4;">
          <div id="msg"></div>
            <form action="" method="post" style="margin: 3%; padding:3%;" name="customer_form" id="customer_form">
                <div class="form-group">
                    <label for="Customer Email">Enter Email</label>
                    <input type="email" name="email" id="email" value="<?php echo $admin_email?>" placeholder="Enter Customer Email" class="form-control">
                    <span id="email_error" class="error" style="color: red;"></span>
                </div>
                <div class="form-group">
                    <label for="Customer Username">Enter Username</label>
                    <input type="text" name="Username" id="Username" value="<?php echo $admin_username?>" placeholder="Enter Customer Username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Customer Username">Enter Password</label>
                    <input type="pass" name="password" id="password" value="<?php echo $admin_pass;?>" placeholder="Enter Password" class="form-control">
                    <span id="password_error" class="password" style="color: red;"></span>
                </div>
                <div class="form-group">
                    <label for="First Name">Enter First Name</label>
                    <input type="text" name="first_name" id="first_name" value="<?php echo $first_name?>" placeholder="Enter First Name" onkeypress="req(event)" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Last Name">Enter Last Name</label>
                    <input type="text" name="last_name" id="last_name" value="<?php echo $last_name?>" placeholder="Enter Last Name" onkeypress="req(event)" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Last Name">Enter Date of Birth</label>
                    <input type="date" name="dob" id="dob" value="<?php echo $dob?>" placeholder="Enter Date of birth" onblur="validateDOB()"  class="form-control">
                    <span id="dobValidationMessage"></span>
                </div>
                <div class="form-group">
                    <label for="Last Name">Enter Mobile Number</label>
                    <input type="text" name="mobile_number" id="mobile_number" value="<?php echo $mobile_number?>" placeholder="Enter mobile number" onkeypress="req2(event)" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Admin Type">Admin type</label>
                    <select name="admin_type" id="admin_type" value="<?php echo $admin_type?>" class="form-control">
                        <option value="Super_Admin">Super Admin</option>
                        <option value="Customer_Admin">Customer Admin</option>
                        </select>
                </div>
                <input type="hidden" name="id" id="id" value="<?php echo $_GET['edit']; ?>">
                <div class="form-group" style="margin-top: 5%;">
                    <input type="Submit"  placeholder="Update" class="btn btn-block btn-success" name="submit" id="submit">
                </div>
                        
               
            </form>
          </div>
          <canvas class="my-4" id="myChart" width="900" height="380"></canvas>

          <div class="table-responsive">
           
          </div>
        </main>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        new DataTable('#example');
    </script>


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

    $(document).ready(function(){
            $("#submit").click(function(){
               
                var email = $('#email').val();
        var password = $('#password').val();
        var Username = $('#Username').val(); 
        var firstname = $('#first_name').val();
        var lastname = $('#last_name').val();
        var dob = $('#dob').val(); 
        var mobile_number = $('#number').val();
        var admin_type = $('#admin_type').val();
        var emailRegex = /^[a-zA-Z0-9]+@(gmail|yahoo|hotmail)\.com$/;

               if(email==''){
                alert('Please enter Customer Email');
                return false;
               }
               if (emailRegex.test(email)) {
                } else {
                    alert('Please enter a valid email address!');
                    return false;
                }
               if(password==''){
                alert('Please enter Password');
                return false;
               }
               if(password.length<8)
               {
                alert("Password should be min 8");
               return false;
                }
               if(Username==''){
                alert('Please enter Username');
                return false;
               }
               if(firstname==''){
                alert('Please enter First Nmae');
                return false;
               }
               if(lastname==''){
                alert('Please enter Last Name');
                return false;
               }
               if(dob==''){
                alert('Please enter DOB');
                return false;
               }
               if(mobile_number==''){
                alert('Please enter mobile number');
                return false;
               }
               if(admin_type==''){
                alert('Please Select Admin Type');
                return false;
               }
               
            });
        });last_name



</script>
<?php
include('connection/db.php');
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $email=$_POST['email'];
    $Username=$_POST['Username'];
    $password=$_POST['password'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];  
    $dob=$_POST['dob'];  
    $mobile_number=$_POST['mobile_number'];  
    $admin_type=$_POST['admin_type'];

    

$query1 = mysqli_query($conn,"update admin_login set admin_email='$email',admin_username='$Username',admin_pass='$password', 
first_name='$first_name',last_name='$last_name', dob='$dob', mobile_number='$mobile_number', admin_type='$admin_type' where id='$id'");
if($query1){
    echo "<script>alert('record updated successfully')</script>";
    }else{
        echo "<script>alert('error')</script>";
}
}
?>