<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>apply job</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="apply_job.css" rel="stylesheet">
  </head>

  <body class="text-center">

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">


      <main role="main" class="inner cover">
        <h1 class="cover-heading">Cover your page.</h1>
        <?php
include('connection/db.php');
if(isset($_POST['submit'])){
  
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $dob=$_POST['dob'];
    $file=$_FILES['file']['name'];
    $number=$_POST['number'];
    $tmp_name=$_FILES['file']['tmp_name'];
    $id_job=$_POST['id_job'];
    $job_seeker=$_POST['job_seeker'];
    $q="select * from job_apply where job_seeker='$job_seeker' and id_job='$id_job'";
    $sql=mysqli_query($conn,$q);
    if (mysqli_num_rows($sql)>0) {
      echo "<h1>Already Applied</h1>";
      }else{
    move_uploaded_file($_FILES['file']['tmp_name'],'files/'. $file);

    $query=mysqli_query($conn,"insert into job_apply(first_name,last_name,dob,file,id_job,job_seeker,mobile_number)values('$first_name','$last_name','$dob','$file','$id_job','$job_seeker','$number')");
    if($query){ ?>
    <p class="lead">Your Form Successfully Added</p>
       
       <?php
    }else{
        echo "not done";
    }
}
}
?>
        <p class="lead">
          <a href="http://localhost/php/landing%20page%20%20job%20portal/index.php" class="btn btn-lg btn-secondary">Back</a>
        </p>
      </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
