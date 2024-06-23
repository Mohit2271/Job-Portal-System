<?php 
include('header.php');
include('sidebar.php')
?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="customers.php">Customers</a></li>
                    <li class="breadcrumb-item"><a href="#">Add Customer</a></li>
                </ol>
            </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Add Customer</h1>
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
                    <input type="email" name="email" id="email"  placeholder="Enter Customer Email" class="form-control" onkeypress="validateEmail()" required>
                    <span id="email_error" class="error" style="color: red;"></span>
                </div>
               
                <div class="form-group">
                    <label for="Customer Username">Enter Password</label>
                    <input type="pass" name="password" id="password" placeholder="Enter Password" class="form-control"  required>
                    <span id="password_error" class="password" style="color: red;"></span>
                </div>
                <div class="form-group">
                    <label for="Customer Username">Enter Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter Customer Username" class="form-control" required>
                    <span id="username_error" class="username" style="color: red;"></span>
                </div>
                <div class="form-group">
                    <label for="First Name">Enter First Name</label>
                    <input type="text" name="first_name" id="first_name" placeholder="Enter First Name" class="form-control" onkeypress="req(event)" required>
                    <span id="firstname_error" class="firstname" style="color: red;"></span>
                </div>
                <div class="form-group">
                    <label for="Last Name">Enter Last Name</label>
                    <input type="text" name="last_name" id="last_name" placeholder="Enter Last Name" onkeypress="req(event)" class="form-control" required>
                    <span id="lastname_error" class="lastname" style="color: red;"></span>
                </div>
                <div class="form-group">
                    <label for="Admin Type">Admin type</label>
                    <select name="admin_type" id="admin_type"  class="form-control" required>
                    <option value="">Select an Admin</option>
                        <option value="Super_Admin">Super Admin</option>
                        <option value="Customer_Admin">Customer Admin</option>
                        </select>
                </div>
                <div class="form-group" style="margin-top: 5%;">
                    <input type="Submit"  class="btn btn-block btn-success" placeholder="Save" name="submit" id="submit">
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
$(document).ready(function(){
            $("#submit").click(function(){     
                var email = $('#email').val();
        var password = $('#password').val();
        var username = $('#username').val(); 
        var firstname = $('#first_name').val();
        var lastname = $('#last_name').val(); 
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
               if(username==''){
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
               if(admin_type==''){
                alert('Please Select Admin Type');
                return false;
               }
               
               var data = $("#customer_form").serialize();
                $.ajax({
                    type: 'POST',
                    url: 'Customer_add.php',
                    data: data,
                    success: function(data){
                        $("#msg").html(data);
                        alert(data);
    },
    error: function (jqXHR, textStatus, errorThrown) {
    console.error("AJAX error: " + textStatus, errorThrown);
    alert('AJAX error: ' + textStatus);
}

                });
            });
        });last_name
</script>
  </body>
</html>
