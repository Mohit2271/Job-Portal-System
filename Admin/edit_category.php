<?php
include('connection/db.php');

include('header.php');
include('sidebar.php');

$id = $_GET['edit'];
$query = mysqli_query($conn, "SELECT * FROM job_category WHERE id = '$id'");

while ($row = mysqli_fetch_array($query)) {
    $category = $row['category'];
    $des = $row['des'];
}
?>
   <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="category.php">Category</a></li>
                    <li class="breadcrumb-item"><a href="#">Update Category</a></li>
                </ol>
            </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Update Category</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                
              </div>
            </div>
          </div>
          <div style="width: 60%; margin-left:20%; background-color: #F2F4F4;">
          <div id="msg"></div>
            <form action="" method="post" style="margin: 3%; padding:3%;" name="customer_form" id="customer_form">
                <div class="form-group">
                    <label for="Customer Email">Enter Category Name</label>
                    <input type="Company" name="category" id="category" value="<?php echo $category; ?>" placeholder="Enter Company Name" onkeypress="req(event)" class="form-control">
                </div>

                <div class="form-group">
        <label for="Customer Username">Enter Description</label>
        <textarea name="des" id="des" class="form-control" cols="30" rows="10"><?php echo $des; ?></textarea>
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

$(document).ready(function(){
    $("#submit").click(function(){
        var category = $('#category').val();
        var des = $('#des').val();

        
        if(category==''){
            alert('Please enter Job Title');
            return false;
        }
        if(des==''){
            alert('Please enter description');
            return false;
        }

        var data = $("#customer_form").serialize();

      });
});

    </script>
<?php
include('connection/db.php');
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $category=$_POST['category'];
    $des=$_POST['des'];

    

$query1 = mysqli_query($conn,"update job_category set category='$category',des='$des' where id='$id'");
if($query1){
    echo "<script>alert('record updated successfully')</script>";
    }else{
        echo "<script>alert('error')</script>";
}
}
?>