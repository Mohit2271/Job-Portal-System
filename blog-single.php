<?php
session_start();
if(isset($_SESSION['email1'])==true){

}else{
  header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>JobPortal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">JobPortal</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
	          <li class="nav-item active"><a href="contact.php" class="nav-link">Contact</a></li>
            <?php
              if(isset($_SESSION['email1'])==true){ ?>
              <li class="nav-item cta cta-colored"><a href="login.php" class="nav-link"><?php echo $_SESSION['email1']; ?></a></li>           
	          <li class="nav-item cta cta-colored"><a href="logout.php" class="nav-link">Logout</a></li>
              <?php
              }else{?>
              <li class="nav-item cta cta-colored"><a href="login.php" class="nav-link">Login</a></li>
              <?php
              }
           ?>
             
	        </ul>
	      </div>
	    </div>
	  </nav>

    <?php
include('connection/db.php');
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM all_jobs WHERE job_id ='$id'");
  }
  else
  {
  $query = mysqli_query($conn, "SELECT * FROM all_jobs");
}
while ($row = mysqli_fetch_array($query)) {
  $title=$row['job_title'];
  $des=$row['des'];
  $country=$row['country'];
  $state=$row['state'];
  $city=$row['city'];
  $job_post=$row['job_post'];
  $last_date=$row['last_date'];
  $id_job=$row['job_id'];
  }
?>
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
          	<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-3"><a href="blog.html">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span>Single</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Apply</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">
            <h2 class="mb-3"><td><?php echo $title; ?></td></h2>
            <h5>Job Posted - <?php echo $job_post; ?>&nbsp;&nbsp;    Last date - <?php echo $last_date; ?></h5>
            <h5><?php echo $country; ?>,<?php echo $state; ?>,<?php echo $city; ?></h5>
            <p><?php echo $des; ?></p>
            
            <form action="apply_job.php" method="post" id="JobPortal" enctype="multipart/form-data" style="border: 1px solid gray ;">
            <div style="padding: 2%;">
            <input type="hidden" name="job_seeker" value="<?php echo $_SESSION['email1']; ?>" id="job_seeker">
            <input type="hidden" name="id_job" value="<?php echo $id_job; ?>" id="id_job">
 
            <div class="row">
              <div class="col-sm-6">
                <label for="">Enter Your First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name.." onkeypress="req(event)" required>
                
              </div>
              <div class="col-sm-6">
                
                <label for="">Enter Your Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name.." onkeypress="req(event)" required>
              
              </div>
            </div>
            <div class="row">
            <div class="col-sm-6">
                <label for="">Enter Your Date of Birth</label>
                <input type="date" name="dob" id="dob" class="form-control" placeholder="Date of birth.." onblur="validateDOB()" required>
                <span id="dobValidationMessage"></span>
              
              </div>
              <div class="col-sm-6">
                <label for="">Choose Resume</label>
                <input type="file" name="file" id="file" class="form-control"  required>
                </div>
              </div>
              <div class="row">
            <div class="col-sm-6">
                <label for="">Enter Your Contact Number</label>
                <input type="number" name="number" id="number" class="form-control" placeholder="Contact Number.." onkeypress="req2(event)"  required>
              
              </div>
              <div class="col-sm-6">
                <label for="">Email</label>
                <input type="text" pattern="^[a-zA-Z0-9]+@(gmail|yahoo|hotmail)\.com$" class="form-control"  value="<?php echo $_SESSION['email1']; ?>" required disabled>
                </div>
              </div>
              <br>
              <input type="submit" name="submit" value="submit" placeholder="Submit" class="btn btn-primary btn-block">
              </div>
            
            </form>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
        	<div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About</h2>
              <p>Welcome to JobPortal, your dedicated platform for connecting talented professionals with exciting career opportunities. At JobPortal we believe in the power of meaningful work and the positive impact it can have on individuals and businesses alike.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
        </div>
      </div>
    </footer>
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
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
  </script>
  </body>
</html>