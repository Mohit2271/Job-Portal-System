<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
    <?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'email/vendor/autoload.php';

$to=$_POST['to'];
$from=$_POST['from'];
$body=$_POST['body'];
$id=$_POST['id'];
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                      //Enable verbose debug output
    //$mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'tls://smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = "mohitchaturvedi911@gmail.com";                     //SMTP username
    $mail->Password   = 'jzoh lfzp ltry xpon';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //Recipients
    $mail->setFrom('mohitchaturvedi911@gmail.com', 'Mailer');
    $mail->addAddress('rohitsharma45@gmail.com', 'Joe User');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
     $mail->addReplyTo('mohitchaturvedi911@gmail.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    if($mail->send()){
        return '1';                 
    }else{
        return 'Order email sending failed';
    }
    //$mail->send();
    echo '<h1>Message has been sent</h1>';
    include('connection/db.php');
    $query=mysqli_query($conn,"delete from job_apply where id ='$id'");
    echo "<script>
    window.setTimeout(function(){
        window.location.href='http://localhost/php/chaturvedi%20job%20portal/Admin/apply_jobs.php';
    }, 5000)</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
<button class="btn btn-success btn-lg" onclick="abc()">Back</button>
    </body>
    <script>
        function abc()
        {
            history.back();
        }
        </script>
</html>