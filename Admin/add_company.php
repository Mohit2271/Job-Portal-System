<?php 
include('header.php');
include('sidebar.php')
?>
<?php
include('connection/db.php');
$query=mysqli_query($conn,"select * from admin_login where admin_type='admin'")
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="create_company.php">Company</a></li>
                    <li class="breadcrumb-item"><a href="#">Add Company</a></li>
                </ol>
            </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Add Company</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                
              </div>
            </div>
          </div>
          <div style="width: 60%; margin-left:20%; background-color: #F2F4F4;">
          <div id="msg"></div>
            <form action="" method="post" style="margin: 3%; padding:3%;" name="Company_form" id="Company_form">
                <div class="form-group">
                    <label for="Customer Email">Company Name</label>
                    <input type="text" name="Company" id="Company" placeholder="Enter Company Name" class="form-control" onkeypress="req(event)" required>
                </div>
                <div class="form-group">
                    <label for="Customer Username">Description</label>
                    <textarea name="Description" id="Description" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="Customer Username">Select Company Admin</label>
                    
                    <select name="admin" class="form-control" id="admin" >
                    <option value="">Select an Admin</option>
                    <?php
                   while($row=mysqli_fetch_array($query)){ ?>
                   
                   <option value="<?php echo $row['admin_email']; ?>"><?php echo $row['admin_email']; ?></option>
                   <?php }

                   ?>
                    </select>
                    <span id="admin_error" style="color: red;"></span>
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
    $("#submit").click(function(event){
        event.preventDefault(); 

        var Company = $('#Company').val();
        var Description = $('#Description').val();
        var admin = $('#admin').val();
       
        if (Company === '') {
            alert('Please enter Company Name');
            return false;
        }
        if (Description === '') {
            alert('Please enter description');
            return false;
        }
        if (admin === '') {
            alert('Please select admin');
            return false;
        }

        var data = $("#Company_form").serialize();
        $.ajax({
            type: 'POST',
            url: 'Company_add.php',
            data: data,
            success: function(data) {
                $("#msg").html(data);
                $("#Company_form")[0].reset();
            }
        });
    });
});

    </script>

  </body>
</html>
