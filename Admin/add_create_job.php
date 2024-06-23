<?php 
include('header.php');
include('sidebar.php')
?>
<?php
$query=mysqli_query($conn,"select * from job_category");
?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="job_create.php">All Job List</a></li>
                    <li class="breadcrumb-item"><a href="#">Add Job</a></li>
                </ol>
            </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Add Job</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                
              </div>
            </div>
          </div>
          <div style="width: 60%; margin-left:20%; background-color: #F2F4F4;">
          <div id="msg"></div>
            <form action="" method="post" style="margin: 3%; padding:3%;" name="job_form" id="job_form">
                <div class="form-group">
                    <label for="Customer Email">Job Title</label>
                    <input type="text" name="job_title" id="job_title" placeholder="Enter Job Title" class="form-control" onkeypress="req(event)" required>
                    <span id="job_title_error" class="job_title" style="color: red;"></span>
                </div>
                <div class="form-group">
                    <label for="Customer Username">Description</label>
                    <textarea name="Description" id="Description" class="form-control" cols="30" rows="10" required></textarea>
                    <span id="Description_error" class="Description" style="color: red;"></span>
                </div>

                <div class="form-group">
                <label for="countries">Select a Country:</label>
                
    <select class="form-control" id="countries" name="country"  onkeypress="fetchCountries()">
    <option value="">Select Country</option>
    <span id="country_error" class="country" style="color: red;"></span>
</select>
    
    <script src="script.js"></script>
                </div>
                <div class="form-group">
                <label for="states">Select a State:</label>

    <select class="form-control" id="states" name="state" onkeypress="fetchStates()" onchange="fetchCities()">
    <option value="" >Select State</option>
</select>
     
    <script src="script.js"></script>
                </div>
                <div class="form-group">
                <label for="city">Select a City:</label>
    <select class="form-control" id="cities" name="city" onkeypress="fetchCities()">
    <option value="" >Select City</option>
</select>
    <script src="script.js"></script>
                </div>

                <div class="form-group">
                    <label for="">Select Category</label>
                    <select name="category" class="form-control" id="category" required>
                    <option value="">Select an Category</option>
                        <?php
                        while($row=mysqli_fetch_array($query)){
                            ?>
                            <option><?php echo $row['category']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <span id="category_error" class="category" style="color: red;"></span>
                </div>
            <div class="form-group">
                <label>Enter Your Date of Job Post:</label>
                <input type="date" name="job_post" id="job_post" class="form-control"  placeholder="Enter your Date of job Post">           
        </div>
            <div class="form-group">
                <label>Enter Your Last Date of Apply:</label>
                <input type="date" name="last_date" id="last_date" class="form-control"  placeholder="Enter your Last Date of Apply">              
            </div>     
                <div class="form-group" style="margin-top: 5%;">
                    <input type="Submit" class="btn btn-block btn-success" placeholder="Save" name="submit" id="submit">
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
        var job_title = $('#job_title').val();
        var Description = $('#Description').val();
        var country = $('#countries').val(); // Corrected ID
        var state = $('#states').val(); // Corrected ID
        var city = $('#cities').val(); // Corrected ID
        var category = $('#category').val();
        var job_post = $('#job_post').val();
        var last_date = $('#last_date').val();

        if(job_title==''){
            alert('Please enter Job Title');
            return false;
        }
        if(Description==''){
            alert('Please enter description');
            return false;
        }
        if(country==''){
            alert('Please Select Country');
            return false;
        }
        if(state==''){
            alert('Please Select State');
            return false;
        }
        if(city==''){
            alert('Please Select City');
            return false;
        }
        if(category==''){
            alert('Please Select Admin Type');
            return false;
        }
        if(job_post==''){
            alert('Please enter Date of job post');
            return false;
        }
        if(last_date==''){
            alert('Please enter last date of job');
            return false;
        }
        var data = $("#job_form").serialize();
        $.ajax({
            type : 'POST',
            url  : 'add_new_job.php',
            data : data,
            success : function(response){
                $("#msg").html(response);
            }
        });
    });
});
    </script>
  </body>
</html>
