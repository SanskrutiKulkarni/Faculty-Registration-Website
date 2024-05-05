<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

if(isset($_POST['submit'])){
    // Retrieve form data
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    //Create an instance; passing true enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'sanskrutikulkarni2004@gmail.com';                     //SMTP username
        $mail->Password   = 'enco oyij fvht wrwr';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

        //Recipients
        $mail->setFrom('sanskrutikulkarni2004@gmail.com', 'Forgot_Password');
        $mail->addAddress($email, 'Forgot_Password');     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Trial';
        $mail->Body    = 'Reset the password';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Faculty Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- Bootstrap Glyphicons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css">
    <!-- Other stylesheets or meta tags can also be included here -->
    <title>Faculty Application | IIT Indore</title>
    <link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/bootstrap-datepicker.css">
    <script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/jquery.js"></script>
    <script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/bootstrap.js"></script>
    <script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/bootstrap-datepicker.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Sintony" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">


    
</head>
<style type="text/css">
    body { background-color: rgb(172, 229, 246); padding-top:0px!important;}

    @keyframes moveText {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    .moving-text {
        animation: moveText 10s linear infinite; /* Adjust duration as needed */
    }
</style>
<body>
<div class="container-fluid" style="background-color: rgb(172, 229, 246); margin-bottom: 10px;">
    <div class="container">
        <div class="row" style="margin-bottom:10px; ">
            <div class="col-md-8 col-md-offset-2">
                <h3 style="text-align:center;color:#414002!important;font-weight: bold;font-size: 2.3em; margin-top: 3px; font-family: 'Noto Sans', sans-serif;">भारतीय प्रौद्योगिकी संस्थान पटना</h3>
                <h3 style="text-align:center;color: #414002!important;font-weight: bold;font-family: 'Oswald', sans-serif!important;font-size: 2.2em; margin-top: 0px;">Indian Institute of Technology Patna</h3>
            </div>
        </div>
    </div>
</div>

<h3 style="color: #ff0026; margin-bottom: 1px; font-weight: bold; text-align: center;font-family: 'Noto Serif', serif;" class="moving-text">Application for Faculty Position</h3>

<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/pages.css">

<div class="container" style="border-radius:10px; height:500px; margin-top:50px;">
        <div class="col-md-10 col-md-offset-1">
  
    <div class="row" style="border-width: 2px; border-style: solid; border-radius: 10px; box-shadow: 0px 1px 30px 1px #599cee; background-color:#F7FFFF;">

        
         <div class="col-md-6"style=" height:403px; border-radius: 10px 0px 0px 10px;"><img src="https://upload.wikimedia.org/wikipedia/en/5/52/Indian_Institute_of_Technology%2C_Patna.svg" style="margin-top: 5%; margin-left: 20%;">
        </div>

        <div class="col-md-6" style="border-radius: 0px 10px 10px 0px; height: 403px;">
         <br />
          <div class="col-md-10 col-md-offset-1">
          <h3 style="text-align: center; color:red;"><strong>FORGOT PASSWORD</strong></h3><br />
           
          <form action="#" method="post" class="form" role="form">
            <input type="hidden" name="ci_csrf_token" value="" />

            <div class="inner-addon left-addon">
               <i class="glyphicon glyphicon-envelope"></i>
               <input type="text" name="email" placeholder="Please Enter Your Registered Email" require type="email" />
           </div>
           
            <br />

            <div class="row">
               <div class="col-md-3">
                 <button type="submit" name="submit" value="Submit" class="cancelbtn">Submit</button>
               </div>
               <div class="col-md-9">
                 <a href="http://localhost/tuter/Login%20Page.php/"><button type="button" class="loginbtn pull-right">Login Area</button></a>
               </div>
             </div>


            
            </form>

                      
        </div>

      
      </div>
    </div>
</div>
    <br />
    
</div>


<div id="footer"></div>
</body>
</html>