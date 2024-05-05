<!--Login page -->
<?php
session_start(); // Start session for handling user login

if(isset($_POST['submit'])){
    if(isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

    // Establish connection to the database
    $conn = new mysqli('localhost', 'root', '', 'test');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL statement to fetch user by email and password
    $stmt = $conn->prepare("SELECT * FROM registration WHERE email=? AND password=?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        echo "Login successful!";
        
        header("Location: http://localhost/tuter/1st%20page_after%20login.php");
        exit(); // Ensure script stops execution after redirection
    } else {
        echo "Invalid email or password!";
    }
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
    <title>Faculty Login</title>
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
    body { 
        background-color: rgb(172, 229, 246); 
        padding-top: 0px!important;
    }

    .moving-sentence {
        animation: moveSentence 10s linear infinite; /* Adjust duration as needed */
    }

    @keyframes moveSentence {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
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

<h3 style="color: #ff0026; margin-bottom: 1px; font-weight: bold; text-align: center;font-family: 'Noto Serif', serif;" class="moving-sentence">Application for Faculty Position</h3>

<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/pages.css">

<a href='https://ofa.iiti.ac.in/facrec_che_2023_july_02/layout'></a>

<div class="container" style="border-radius:10px; height:300px; margin-top:20px;">
    <div class="col-md-10 col-md-offset-1">
        <div class="row" style="border-width: 2px; border-style: solid; border-radius: 10px; box-shadow: 0px 1px 30px 1px #011731; background-color:#f3fdfd;">
            <div class="col-md-6" style="height:403px; border-radius: 10px 0px 0px 10px;">
                <img src="https://upload.wikimedia.org/wikipedia/en/5/52/Indian_Institute_of_Technology%2C_Patna.svg" style="margin-top: 5%; margin-left: 20%; height: 75%">
                <p style="text-align: center;"></p>
            </div>
            <div class="col-md-6" style="border-radius: 0px 10px 10px 0px; height: 403px;">
                <br />
                <div class="col-md-10 col-md-offset-1">
                    <h3 style="text-align: center;"><strong><u>LOGIN HERE</u></strong></h3><br />
                    <form action="Login Page.php" method="post" role="form">
                        <input type="hidden" name="ci_csrf_token" value="" />
                        <div class="inner-addon left-addon">
                            <i class="glyphicon glyphicon-envelope"></i>
                            <input type="text" name="email" placeholder="Your email" autofocus="" required/>
                        </div>
                        <br />
                        <div class="inner-addon left-addon">
                            <i class="glyphicon glyphicon-lock"></i>
                            <input type="password" placeholder="Enter your password" name="password" required>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-3">
                                <button type="submit" name="submit" value="Submit">Login</button>
                            </div>
                            <div class="col-md-9">
                            <a href="http://localhost/tuter/Forgot%20password.php/"><button type="button" class="cancelbtn pull-right">Forgot Password</button></a>
                        </div>
                        </div>
                    </form>
                    <br />
                    <p style="text-align: center; color: rgb(125, 62, 96); font-size: 1.2em;"><strong>NOT REGISTERED? </strong> <a href='http://localhost/tuter/Sign%20Up%20Page.php/' class="btn-sm btn-primary"> SIGN UP</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="footer"></div>
</body>
</html>
