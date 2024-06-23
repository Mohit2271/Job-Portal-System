<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Apply job</title>

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
session_start();
include('connection/db.php');
 $img=$_FILES['img']['name'];
 $name=$_POST['name'];
$dob=$_POST['dob'];
$number=$_POST['number'];
$email = $_POST["email"];
$user_email=$_SESSION['email1'];
$tmp_name=$_FILES['img']['tmp_name'];

$target_dir = "profile_img/";
$target_file = $target_dir . basename($img);
move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
$sql=mysqli_query($conn,"select * from profiles where user_email='{$_SESSION['email1']}'");
$sql_check=mysqli_num_rows($sql);
if(!empty($sql_check)){
    $query=mysqli_query($conn,"update profiles Set img='$img',name='$name',dob='$dob',number='$number',email='$email' where user_email='$user_email' ");
    if($query) {
    echo "<h1>profile update Successfully</h1>";
    }else{
        echo "<h1>Error please try again</h1>";
    }
}
else{
        move_uploaded_file($_FILES["img"]['tmp_name'],'profile_img/'. $img);
        $query=mysqli_query($conn,"insert into profiles(img,name,dob,number,email,user_email)values('$img', '$name', '$dob', '$number', '$email','$user_email' ) ");
        if($query) {
        echo "<h1>profile added Successfully</h1>";
        }else{
            echo "<h1>Error please try again</h1>";
        }
}
?>

        <p class="lead">
          <a href="http://localhost/php/landing%20page%20%20job%20portal/my_profile.php" class="btn btn-lg btn-secondary">Back</a>
        </p>
      </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
