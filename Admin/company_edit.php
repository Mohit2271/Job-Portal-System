<?php
include('connection/db.php');
include('header.php');
include('sidebar.php');

$id = $_GET['edit'];
$query = mysqli_query($conn, "SELECT * FROM company WHERE company_id = '$id'");
while ($row = mysqli_fetch_array($query)) {
    $company_name = $row['company'];
    $des = $row['des'];
    $admin = $row['admin'];
}
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="create_company.php">Company</a></li>
                    <li class="breadcrumb-item"><a href="#">Update Company</a></li>
                </ol>
            </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Update Company</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                
              </div>
            </div>
          </div>
          <div style="width: 60%; margin-left:20%; background-color: #F2F4F4;">
          <div id="msg"></div>

<form action="" method="post" style="margin: 3%; padding:3%;" name="customer_form" id="customer_form">
    <div class="form-group">
        <label for="Customer Email">Enter Company Name</label>
        <input type="text" name="company" id="Company" value="<?php echo $company_name ?>" placeholder="Enter Company Name" onkeypress="req(event)" class="form-control">
    </div>
    <div class="form-group">
        <label for="Customer Username">Enter Description</label>
        <textarea name="des" id="des" class="form-control" cols="30" rows="10"><?php echo $des; ?></textarea>
    </div>
    <div class="form-group">
        <label for="Customer Username">Select Company Admin</label>
        <select name="admin" class="form-control" id="admin">
            <option value="">Select an Company Admin</option>
            <?php
            $sql = mysqli_query($conn, "SELECT * FROM admin_login WHERE admin_type='Customer_Admin'");
            while ($row = mysqli_fetch_array($sql)) {
                echo '<option value="' . $row['admin_email'] . '">' . $row['admin_email'] . '</option>';
            }
            ?>
        </select>
    </div>
    <input type="hidden" name="id" id="id" value="<?php echo $_GET['edit']; ?>">
    <div class="form-group" style="margin-top: 5%;">
        <input type="submit" placeholder="Update" class="btn btn-block btn-success" name="submit" id="submit">
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

$(document).ready(function(){
        $("#submit").click(function(event){
            var company_name = $('#Company').val();
            var des = $('#des').val();
            var admin = $('#admin').val();

            if (company_name === '') {
                alert('Please enter Company Name');
                return false;
            }
            if (des === '') {
                alert('Please enter description');
                return false;
            }
            if (admin === '') {
                alert('Please select admin');
                return false;
            }

            var data = $("#customer_form").serialize();

        });
    });

</script>

<?php
include('connection/db.php');
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $company_name = $_POST['company'];
    $des = $_POST['des'];
    $admin = $_POST['admin'];

    $query1 = mysqli_query($conn, "UPDATE company SET company='$company_name', des='$des', admin='$admin' WHERE company_id='$id'");
    if ($query1) {
        echo "<script>alert('Record updated successfully')</script>";
    } else {
        echo "<script>alert('Error')</script>";
    }
}
?>
