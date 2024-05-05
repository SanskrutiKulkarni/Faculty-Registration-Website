<?php
if (isset($_POST['submit'])) {
    // Form data for PHD section
    $phd_university = $_POST['phd_university'];
    $phd_department = $_POST['phd_department'];
    $phd_supervisor = $_POST['phd_supervisor'];
    $phd_joining_year = $_POST['phd_joining_year'];
    $phd_defence_date = $_POST['phd_defence_date'];
    $phd_award_date = $_POST['phd_award_date'];
    $phd_thesis_title = $_POST['phd_thesis_title'];

    // Form data for MTech section
    $mtech_degree = $_POST['mtech_degree'];
    $mtech_university = $_POST['mtech_university'];
    $mtech_branch = $_POST['mtech_branch'];
    $mtech_joining_year = $_POST['mtech_joining_year'];
    $mtech_completion_year = $_POST['mtech_completion_year'];
    $mtech_duration_years = $_POST['mtech_duration_years'];
    $mtech_percentage_cgpa = $_POST['mtech_percentage_cgpa'];
    $mtech_division_class = $_POST['mtech_division_class'];

    // Form data for BTech section
    $btech_degree = $_POST['btech_degree'];
    $btech_university = $_POST['btech_university'];
    $btech_branch = $_POST['btech_branch'];
    $btech_joining_year = $_POST['btech_joining_year'];
    $btech_completion_year = $_POST['btech_completion_year'];
    $btech_duration_years = $_POST['btech_duration_years'];
    $btech_percentage_cgpa = $_POST['btech_percentage_cgpa'];
    $btech_division_class = $_POST['btech_division_class'];

    // Form data for Additional Educational Qualifications section
    $degree_certificate = $_POST['degree_certificate'];
    $university_institute = $_POST['university_institute'];
    $branch_stream = $_POST['branch_stream'];
    $additional_joining_year = $_POST['additional_joining_year'];
    $additional_completion_year = $_POST['additional_completion_year'];
    $additional_duration_years = $_POST['additional_duration_years'];
    $additional_percentage_cgpa = $_POST['additional_percentage_cgpa'];
    $additional_division_class = $_POST['additional_division_class'];

    // Form data for Academic Details Class 12 section
    $class12_school = $_POST['class12_school'];
    $class12_passing_year = $_POST['class12_passing_year'];
    $class12_percentage_grade = $_POST['class12_percentage_grade'];
    $class12_division_class = $_POST['class12_division_class'];

    try {
        // Establish database connection
        $conn = new PDO('mysql:host=localhost;dbname=test', 'root', '');

        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Start a transaction
        $conn->beginTransaction();

        // Insert data into PHD table
        $stmt = $conn->prepare("INSERT INTO detailsPHD (university, department, supervisor, joining_year, defence_date, award_date, thesis_title) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $phd_university);
        $stmt->bindParam(2, $phd_department);
        $stmt->bindParam(3, $phd_supervisor);
        $stmt->bindParam(4, $phd_joining_year);
        $stmt->bindParam(5, $phd_defence_date);
        $stmt->bindParam(6, $phd_award_date);
        $stmt->bindParam(7, $phd_thesis_title);
        $stmt->execute();
        
        // Get last inserted ID
        $phd_id = $conn->lastInsertId();

        // Insert data into MTech table
        $stmt = $conn->prepare("INSERT INTO detailsMTech (degree, university, branch, joining_year, completion_year, duration_years, percentage_cgpa, division_class) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $mtech_degree);
        $stmt->bindParam(2, $mtech_university);
        $stmt->bindParam(3, $mtech_branch);
        $stmt->bindParam(4, $mtech_joining_year);
        $stmt->bindParam(5, $mtech_completion_year);
        $stmt->bindParam(6, $mtech_duration_years);
        $stmt->bindParam(7, $mtech_percentage_cgpa);
        $stmt->bindParam(8, $mtech_division_class);
        $stmt->execute();

        // Insert data into BTech table
        $stmt = $conn->prepare("INSERT INTO detailsBTech (degree, university, branch, joining_year, completion_year, duration_years, percentage_cgpa, division_class) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $btech_degree);
        $stmt->bindParam(2, $btech_university);
        $stmt->bindParam(3, $btech_branch);
        $stmt->bindParam(4, $btech_joining_year);
        $stmt->bindParam(5, $btech_completion_year);
        $stmt->bindParam(6, $btech_duration_years);
        $stmt->bindParam(7, $btech_percentage_cgpa);
        $stmt->bindParam(8, $btech_division_class);
        $stmt->execute();

        // Insert data into Additional Educational Qualifications table
        $stmt = $conn->prepare("INSERT INTO additional_educational_qualifications (degree_certificate, university_institute, branch_stream, joining_year, completion_year, duration_years, percentage_cgpa, division_class) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $degree_certificate);
        $stmt->bindParam(2, $university_institute);
        $stmt->bindParam(3, $branch_stream);
        $stmt->bindParam(4, $additional_joining_year);
        $stmt->bindParam(5, $additional_completion_year);
        $stmt->bindParam(6, $additional_duration_years);
        $stmt->bindParam(7, $additional_percentage_cgpa);
        $stmt->bindParam(8, $additional_division_class);
        $stmt->execute();

        // Insert data into Academic Details Class 12 table
        $stmt = $conn->prepare("INSERT INTO academicdetails_class12 (school, passing_year, percentage_grade, division_class) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $class12_school);
        $stmt->bindParam(2, $class12_passing_year);
        $stmt->bindParam(3, $class12_percentage_grade);
        $stmt->bindParam(4, $class12_division_class);
        $stmt->execute();

        // Commit the transaction
        $conn->commit();

        // Close the connection
        $conn = null;

        // Redirect after successful insertion
        header("Location: http://localhost/tuter/3rd%20page.php");
        exit(); // Ensure script stops execution after redirection
    } catch(PDOException $e) {
        // Rollback the transaction on error
        if (isset($conn)) {
            $conn->rollback();
        }
        // Log error and provide user-friendly message
        error_log("Error: " . $e->getMessage(), 0);
        echo "An error occurred. Please try again later.";
    }
}
?>

<!--Second page Education Qulifier -->
<html>
<head>
	<title>Academic Details</title>
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
<style type="text/css">
	body { background-color: rgb(172, 229, 246); padding-top:0px!important;}

</style>
<body>
<div class="container-fluid" style="background-color: rgb(172, 229, 246); margin-bottom: 10px;">
	<div class="container">
        <div class="row" style="margin-bottom:10px; ">
        	<div class="col-md-8 col-md-offset-2">

        		<!--  <img src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/IITIndorelogo.png" alt="logo1" class="img-responsive" style="padding-top: 5px; height: 120px; float: left;"> -->

            <h3 style="text-align:center;color: #414002!important;font-weight: bold;font-family: 'Oswald', sans-serif!important;font-size: 2.2em; margin-top: 0px;">Indian Institute of Technology Patna</h3>
        		<h3 style="text-align:center;color:#414002!important;font-weight: bold;font-size: 2.3em; margin-top: 3px; font-family: 'Noto Sans', sans-serif;">भारतीय प्रौद्योगिकी संस्थान पटना</h3>    			

        	</div>
        	

    	   
        </div>
		    <!-- <h3 style="text-align:center; color: #414002; font-weight: bold;  font-family: 'Fjalla One', sans-serif!important; font-size: 2em;">Application for Academic Appointment</h3> -->
    </div>
   </div> 
   <h3 style="color: #ff0026; margin-bottom: 1px; font-weight: bold; text-align: center;font-family: 'Noto Serif', serif;" class="moving-sentence">Application for Faculty Position</h3>

<script type="text/javascript">
var tr="";
var counter_acde=4;
  $(document).ready(function(){
    $("#add_more_acde").click(function(){
        create_tr();
        create_input('add_degree[]', 'Degree','add_degree'+counter_acde, 'acde', counter_acde, 'acde');
        create_input('add_college[]', 'College', 'add_college'+counter_acde,'acde', counter_acde, 'acde');
        create_input('add_subjects[]', 'Subjects', 'add_subjects'+counter_acde,'acde', counter_acde, 'acde');
        create_input('add_yoj[]', 'Year Of Joining', 'add_yoj'+counter_acde,'acde', counter_acde, 'acde');
        create_input('add_yog[]', 'Year Of Graduation','add_yog'+counter_acde, 'acde', counter_acde, 'acde');
        create_input('add_duration[]', 'Duration','add_duration'+counter_acde, 'acde', counter_acde, 'acde');
        create_input('add_perce[]', 'Percentage','add_perce'+counter_acde, 'acde', counter_acde, 'acde');
        create_input('add_rank[]', 'Rank', 'add_rank'+counter_acde,'acde', counter_acde,'acde',true);
        counter_acde++;
        return false;
    });
    
  });

  function create_tr()
  {
    tr=document.createElement("tr");
  }
  function for_date_picker(obj)
  {
    obj.setAttribute("data-provide", "datepicker");
    obj.className += " datepicker";
    return obj;

  }
  function create_input(t_name, place_value, id, tbody_id, counter, remove_name, btn=false, datepicker_set=false, length=80)
  {
    var input=document.createElement("input");
    input.setAttribute("type", "text");
    input.setAttribute("name", t_name);
    input.setAttribute("id", id);
    input.setAttribute("placeholder", place_value);
    input.setAttribute("class", "form-control input-md");
    input.setAttribute("required", "");
    if(datepicker_set==true)
    {
      input=for_date_picker(input);
    }
    var td=document.createElement("td");
    td.appendChild(input);
    if(btn==true)
    {
      // alert();
      var but=document.createElement("button");
      but.setAttribute("class", "close");
      but.setAttribute("onclick", "remove_row('"+remove_name+"','"+counter+"')");
      but.innerHTML="<span style='color:red; font-weight:bold;'>x</span>";
      td.appendChild(but);
    }
    tr.setAttribute("id", "row"+counter);
    tr.appendChild(td);
    document.getElementById(tbody_id).appendChild(tr);
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true
    });
  } 
  function remove_row(remove_name, n)
  {
    var tab=document.getElementById(remove_name);
    var tr=document.getElementById("row"+n);
    tab.removeChild(tr);
  }
</script>

<script type="text/javascript">
    $(function () {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
    });
</script>
<style type="text/css">
body { padding-top:30px; }
.form-control { margin-bottom: 10px; }
.floating-box {
    display: inline-block;
    width: 150px;
    height: 75px;
    margin: 10px;
    border: 3px solid #73AD21;  
}
</style>
<style type="text/css">
body { padding-top:30px; }
.form-control { margin-bottom: 10px; }
label{
  padding: 0 !important;
}
hr{
  border-top: 1px solid #025198 !important;
}
span{
  font-size: 1.2em;
  font-family: 'Oswald', sans-serif!important;
  text-align: left!important;
  padding: 0px 10px 0px 0px!important;
  /*margin-bottom: 20px!important;*/

}
hr{
  border-top: 1px solid #025198 !important;
  border-style: dashed!important;
  border-width: 1.2px;
}

.panel-heading{
  font-size: 1.3em;
  font-family: 'Oswald', sans-serif!important;
  letter-spacing: .5px;
}
.btn-primary {
  padding: 9px;
}
</style>





<div class="container">




<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 well">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ci_csrf_token" value="" />
        <fieldset>
         
             <legend>
              <div class="row">
                <div class="col-md-10">
                    <h4>Welcome : <font color="#025198"><strong>Ravina&nbsp;Budania</strong></font></h4>
                </div>
                <div class="col-md-2">
                  <a href="http://localhost/tuter/Login%20Page.php/" class="btn btn-sm btn-success  pull-right">Logout</a>
                </div>
              </div>
            
            
    </legend>

<h4 style="text-align:center; font-weight: bold; color: #6739bb;">2. Educational Qualifications</h4>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">(A) Details of PhD *</div>
            <div class="panel-body">
                
                <span class="col-md-2 control-label" for="college_phd">University/Institute</span>  
                <div class="col-md-4">
                    <input id="college_phd" value="" name="phd_university" type="text" placeholder="University/Institute" class="form-control input-md" autofocus="" required="">
                </div>

                <span class="col-md-2 control-label" for="stream">Department</span>  
                <div class="col-md-4">
                    <input id="stream" value="" name="phd_department" type="text" placeholder="Department" class="form-control input-md" autofocus="">
                </div> 
                
                <span class="col-md-2 control-label" for="supervisor">Name of PhD Supervisor</span>  
                <div class="col-md-4">
                    <input id="supervisor" name="phd_supervisor" type="text" placeholder="Name of Ph. D. Supervisor" value="" class="form-control input-md" required="">
                </div>

                <span class="col-md-2 control-label" for="yoj_phd">Year of Joining</span>  
                <div class="col-md-4">
                    <input id="yoj_phd" value="" name="phd_joining_year" type="text" placeholder="Year of Joining" class="form-control input-md" required="">
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <span class="col-md-2 control-label" for="dod_phd">Date of Successful Thesis Defence</span>  
                        <div class="col-md-4">
                            <input id="dod_phd" name="phd_defence_date" type="text" data-provide="datepicker" placeholder="Date of Defence" value="" class="form-control input-md datepicker" required="">
                        </div>

                        <span class="col-md-2 control-label" for="doa_phd">Date of Award</span>  
                        <div class="col-md-4">
                            <input id="doa_phd" name="phd_award_date" type="text" data-provide="datepicker" placeholder="Date of Award" value="" class="form-control input-md datepicker" required="">
                        </div>
                    </div>
                </div>
                <br />
                <span class="col-md-2 control-label" for="phd_title">Title of PhD Thesis</span>  
                <div class="col-md-10">
                    <input id="phd_title" value="" name="phd_thesis_title" type="text" placeholder="Title of PhD Thesis" class="form-control input-md" required="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">(B) Academic Details - M. Tech./ M.E./ PG Details</div>
            <div class="panel-body">
                <span class="col-md-2 control-label" for="mtech_degree">Degree/Certificate</span>  
                <div class="col-md-4">
                    <input id="mtech_degree" value="" name="mtech_degree" type="text" placeholder="Degree/Certificate" class="form-control input-md" autofocus="">
                </div>

                <span class="col-md-2 control-label" for="mtech_university">University/Institute</span>  
                <div class="col-md-4">
                    <input id="mtech_university" value="" name="mtech_university" type="text" placeholder="University/Institute" class="form-control input-md" autofocus="">
                </div> 
                
                <span class="col-md-2 control-label" for="mtech_branch">Branch/Stream</span>  
                <div class="col-md-4">
                    <input id="mtech_branch" name="mtech_branch" type="text" placeholder="Branch/Stream" value="" class="form-control input-md" >
                </div>

                <span class="col-md-2 control-label" for="mtech_joining_year">Year of Joining</span>  
                <div class="col-md-4">
                    <input id="mtech_joining_year" value="" name="mtech_joining_year" type="text" placeholder="Year of Joining" class="form-control input-md" >
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <span class="col-md-2 control-label" for="mtech_completion_year">Year of Completion</span>  
                        <div class="col-md-4">
                            <input id="mtech_completion_year" name="mtech_completion_year" type="text" placeholder="Year of Completion" value="" class="form-control input-md" >
                        </div>

                        <span class="col-md-2 control-label" for="mtech_duration_years">Duration (in years)</span>  
                        <div class="col-md-4">
                            <input id="mtech_duration_years" name="mtech_duration_years" type="text" placeholder="Duration" value="" class="form-control input-md" >
                        </div>

                        <span class="col-md-2 control-label" for="mtech_percentage_cgpa">Percentage/ CGPA</span>  
                        <div class="col-md-4">
                            <input id="mtech_percentage_cgpa" name="mtech_percentage_cgpa" type="text" placeholder="Percentage/ CGPA" value="" class="form-control input-md" >
                        </div>

                        <span class="col-md-2 control-label" for="mtech_division_class">Division/Class</span>  
                        <div class="col-md-4">
                            <input id="mtech_division_class" name="mtech_division_class" type="text" placeholder="Division/Class" value="" class="form-control input-md" >
                        </div>
                    </div>
                </div>
                <br />
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">(C) Academic Details - B. Tech /B.E. / UG Details *</div>
            <div class="panel-body">
                <span class="col-md-2 control-label" for="btech_degree">Degree/Certificate</span>  
                <div class="col-md-4">
                    <input id="btech_degree" value="" name="btech_degree" type="text" placeholder="Degree/Certificate" class="form-control input-md" autofocus="" required="">
                </div>

                <span class="col-md-2 control-label" for="btech_university">University/Institute</span>  
                <div class="col-md-4">
                    <input id="btech_university" value="" name="btech_university" type="text" placeholder="University/Institute" class="form-control input-md" autofocus="">
                </div> 
                
                <span class="col-md-2 control-label" for="btech_branch">Branch/Stream</span>  
                <div class="col-md-4">
                    <input id="btech_branch" name="btech_branch" type="text" placeholder="Branch/Stream" value="" class="form-control input-md" required="">
                </div>

                <span class="col-md-2 control-label" for="btech_joining_year">Year of Joining</span>  
                <div class="col-md-4">
                    <input id="btech_joining_year" value="" name="btech_joining_year" type="text" placeholder="Year of Joining" class="form-control input-md" required="">
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <span class="col-md-2 control-label" for="btech_completion_year">Year of Completion</span>  
                        <div class="col-md-4">
                            <input id="btech_completion_year" name="btech_completion_year" type="text" placeholder="Year of Completion" value="" class="form-control input-md" required="">
                        </div>

                        <span class="col-md-2 control-label" for="btech_duration_years">Duration (in years)</span>  
                        <div class="col-md-4">
                            <input id="btech_duration_years" name="btech_duration_years" type="text" placeholder="Duration" value="" class="form-control input-md" required="">
                        </div>

                        <span class="col-md-2 control-label" for="btech_percentage_cgpa">Percentage/ CGPA</span>  
                        <div class="col-md-4">
                            <input id="btech_percentage_cgpa" name="btech_percentage_cgpa" type="text" placeholder="Percentage/ CGPA" value="" class="form-control input-md" required="">
                        </div>

                        <span class="col-md-2 control-label" for="btech_division_class">Division/Class</span>  
                        <div class="col-md-4">
                            <input id="btech_division_class" name="btech_division_class" type="text" placeholder="Division/Class" value="" class="form-control input-md" required="">
                        </div>
                    </div>
                </div>
                <br />
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">(D) Academic Details - School *</div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr height="30px">
                        <th class="col-md-3"> 10th/12th/HSC/Diploma </th>
                        <th class="col-md-3"> School </th>
                        <th class="col-md-1"> Year of Passing</th>
                        <th class="col-md-2"> Percentage/ Grade </th>
                        <th class="col-md-2"> Division/Class </th>
                    </tr>
                    <tr height="60px">
                        <td class="col-md-2">  
                            <input id="hsc_ssc1" name="hsc_ssc" type="text" value="12th/HSC/Diploma" placeholder="" class="form-control input-md" readonly="" required=""> 
                        </td>
                        <td class="col-md-2"> 
                            <input id="school1" name="class12_school" type="text" value=""  placeholder="School" class="form-control input-md" maxlength="80" required=""> 
                        </td>
                        <td class="col-md-2"> 
                            <input id="passing_year1" name="class12_passing_year" type="text" value=""  placeholder="Passing Year" class="form-control input-md" maxlength="5" required=""> 
                        </td>
                        <td class="col-md-2"> 
                            <input id="s_perce1" name="class12_percentage_grade" type="text" value=""  placeholder="Percentage/Grade" class="form-control input-md" maxlength="5" required="">
                        </td>
                        <td class="col-md-2"> 
                            <input id="s_rank1" name="class12_division_class" type="text" value=""  placeholder="Division/Class" class="form-control input-md" maxlength="5" required="">
                        </td>
                    </tr>
                    <tr height="60px">
                        <td class="col-md-2">  
                            <input id="hsc_ssc2" name="hsc_ssc" type="text" value="10th" placeholder="" class="form-control input-md" readonly="" required=""> 
                        </td>
                        <td class="col-md-2"> 
                            <input id="school2" name="class12_school" type="text" value=""  placeholder="School" class="form-control input-md" maxlength="80" required=""> 
                        </td>
                        <td class="col-md-2"> 
                            <input id="passing_year2" name="class12_passing_year" type="text" value=""  placeholder="Passing Year" class="form-control input-md" maxlength="5" required=""> 
                        </td>
                        <td class="col-md-2"> 
                            <input id="s_perce2" name="class12_percentage_grade" type="text" value=""  placeholder="Percentage/Grade" class="form-control input-md" maxlength="5" required="">
                        </td>
                        <td class="col-md-2"> 
                            <input id="s_rank2" name="class12_division_class" type="text" value=""  placeholder="Division/Class" class="form-control input-md" maxlength="5" required="">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
 
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">(E) Additional Educational Qualification (If any)
                <button class="btn btn-sm btn-danger" id="add_more_acde">Add More</button>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tbody id="acde">
                        <tr height="30px">
                            <th class="col-md-2"> Degree/Certificate </th>
                            <th class="col-md-2"> University/Institute </th>
                            <th class="col-md-2"> Branch/Stream </th>
                            <th class="col-md-1"> Year of Joining</th>
                            <th class="col-md-1"> Year of Completion </th>
                            <th class="col-md-1"> Duration (in years)</th>
                            <th class="col-md-3"> Percentage/ CGPA </th>
                            <th class="col-md-3"> Division/Class</th>
                        </tr>
                        <tr height="60px">
                            <td class="col-md-2">  
                                <input id="add_degree1" name="degree_certificate" type="text" value="" placeholder="Degree" class="form-control input-md" maxlength="10" required=""> 
                            </td>
                            <td class="col-md-2"> 
                                <input id="add_college1" name="university_institute" type="text" value=""  placeholder="College" class="form-control input-md" maxlength="80" required=""> 
                            </td>
                            <td class="col-md-2"> 
                                <input id="add_subjects1" name="branch_stream" type="text" value=""  placeholder="Subjects" class="form-control input-md" maxlength="80" required=""> 
                            </td>
                            <td class="col-md-2"> 
                                <input id="add_yoj1" name="additional_joining_year" type="text" value=""  placeholder="Year of Joining" class="form-control input-md" maxlength="5" required=""> 
                            </td>
                            <td class="col-md-2"> 
                                <input id="add_yog1" name="additional_completion_year" type="text" value=""  placeholder="Year of Graduation" class="form-control input-md" maxlength="5" required=""> 
                            </td>
                            <td class="col-md-2"> 
                                <input id="add_duration1" name="additional_duration_years" type="text" value=""  placeholder="Duration" class="form-control input-md" maxlength="4" required=""> 
                            </td>
                            <td class="col-md-2"> 
                                <input id="add_perce1" name="additional_percentage_cgpa" type="text" value=""  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                            </td>
                            <td class="col-md-2"> 
                                <input id="add_rank1" name="additional_division_class" type="text" value=""  placeholder="Division/Class" class="form-control input-md" maxlength="5" required="">
                            </td>
                        </tr>
                        <tr height="60px">
                            <td class="col-md-2">  
                                <input id="add_degree1" name="degree_certificate" type="text" value="" placeholder="Degree" class="form-control input-md" maxlength="10" required=""> 
                            </td>
                            <td class="col-md-2"> 
                                <input id="add_college1" name="university_institute" type="text" value=""  placeholder="College" class="form-control input-md" maxlength="80" required=""> 
                            </td>
                            <td class="col-md-2"> 
                                <input id="add_subjects1" name="branch_stream" type="text" value=""  placeholder="Subjects" class="form-control input-md" maxlength="80" required=""> 
                            </td>
                            <td class="col-md-2"> 
                                <input id="add_yoj1" name="additional_joining_year" type="text" value=""  placeholder="Year of Joining" class="form-control input-md" maxlength="5" required=""> 
                            </td>
                            <td class="col-md-2"> 
                                <input id="add_yog1" name="additional_completion_year" type="text" value=""  placeholder="Year of Graduation" class="form-control input-md" maxlength="5" required=""> 
                            </td>
                            <td class="col-md-2"> 
                                <input id="add_duration1" name="additional_duration_years" type="text" value=""  placeholder="Duration" class="form-control input-md" maxlength="4" required=""> 
                            </td>
                            <td class="col-md-2"> 
                                <input id="add_perce1" name="additional_percentage_cgpa" type="text" value=""  placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                            </td>
                            <td class="col-md-2"> 
                                <input id="add_rank1" name="additional_division_class" type="text" value=""  placeholder="Division/Class" class="form-control input-md" maxlength="5" required="">
                            </td>
                        </tr>
                        <!-- Repeat the above row structure for additional rows -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


            <!-- Form Name -->



<div class="form-group">
  
  <div class="col-md-1">
    <a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/facultypanel" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-fast-backward"></i></a>
  </div>

  <div class="col-md-11">
    <button id="submit" type="submit" name="submit" value="Submit" class="btn btn-success pull-right" style="margin-left: 75%;">SAVE & NEXT</button>
    
  </div>

    
</div>
          
</fieldset>
</form>

        </div>
    </div>
</div>

<script type="text/javascript">
  function yearcalc()
  { 
    // alert('hi');
    var num1=document.getElementById("yoj").value;
    var num2=document.getElementById("yog").value;

    var duration_year=parseFloat(num2)-parseFloat(num1);
    // alert(duration_year);
    document.getElementById("result_test").value = duration_year ;
   
  }

 
</script>

<div id="footer"></div>
</body>
</html>

<script type="text/javascript">
	
	function blinker() {
	    $('.blink_me').fadeOut(500);
	    $('.blink_me').fadeIn(500);
	}

	setInterval(blinker, 1000);
</script>