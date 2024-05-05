<?php
if (isset($_POST['submit'])) {
    // Present Employment Details
    $present_position = $_POST['present_position'];
    $present_organization = $_POST['present_organization'];
    $present_status = $_POST['present_status'];
    $present_date_of_joining = $_POST['present_date_of_joining'];
    $present_date_of_leaving = $_POST['present_date_of_leaving'];
    $present_duration = $_POST['present_duration'];

    // Employment History
    $emp_position = $_POST['emp_position'];
    $employer = $_POST['employer'];
    $emp_date_of_joining = $_POST['emp_date_of_joining'];
    $emp_date_of_leaving = $_POST['emp_date_of_leaving'];
    $emp_duration = $_POST['emp_duration'];

    // Teaching Experience
    $teaching_position = $_POST['teaching_position'];
    $teaching_employer = $_POST['teaching_employer'];
    $course_taught = $_POST['course_taught'];
    $ug_pg = $_POST['ug_pg'];
    $no_of_students = $_POST['no_of_students'];
    $teaching_date_of_joining = $_POST['teaching_date_of_joining'];
    $teaching_date_of_leaving = $_POST['teaching_date_of_leaving'];
    $teaching_duration = $_POST['teaching_duration'];

    // Research Experience
    $research_position = $_POST['research_position'];
    $research_institute = $_POST['research_institute'];
    $supervisor = $_POST['supervisor'];
    $research_date_of_joining = $_POST['research_date_of_joining'];
    $research_date_of_leaving = $_POST['research_date_of_leaving'];
    $research_duration = $_POST['research_duration'];

    // Industrial Experience
    $industrial_organization = $_POST['industrial_organization'];
    $work_profile = $_POST['work_profile'];
    $industrial_date_of_joining = $_POST['industrial_date_of_joining'];
    $industrial_date_of_leaving = $_POST['industrial_date_of_leaving'];
    $industrial_duration = $_POST['industrial_duration'];

    // Areas of Specialization and Current Area of Research
    $areas_of_specialization = $_POST['areas_of_specialization'];
    $current_area_of_research = $_POST['current_area_of_research'];

    try {
        // Establish database connection
        $conn = new PDO('mysql:host=localhost;dbname=test', 'root', '');

        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Start a transaction
        $conn->beginTransaction();

        // Insert data into Present Employment table
        $stmt = $conn->prepare("INSERT INTO Present_Employment (Position, Organization, Status, Date_of_Joining, Date_of_Leaving, Duration) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $present_position);
        $stmt->bindParam(2, $present_organization);
        $stmt->bindParam(3, $present_status);
        $stmt->bindParam(4, $present_date_of_joining);
        $stmt->bindParam(5, $present_date_of_leaving);
        $stmt->bindParam(6, $present_duration);
        $stmt->execute();

        // Insert data into Employment History table
        $stmt = $conn->prepare("INSERT INTO Employment_History (Position, Employer, Date_of_Joining, Date_of_Leaving, Duration) VALUES (?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $emp_position);
        $stmt->bindParam(2, $employer);
        $stmt->bindParam(3, $emp_date_of_joining);
        $stmt->bindParam(4, $emp_date_of_leaving);
        $stmt->bindParam(5, $emp_duration);
        $stmt->execute();

        // Insert data into Teaching Experience table
        $stmt = $conn->prepare("INSERT INTO Teaching_Experience (Position, Employer, Course_Taught, UG_PG, No_of_Students, Date_of_Joining_Institute, Date_of_Leaving_Institute, Duration) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $teaching_position);
        $stmt->bindParam(2, $teaching_employer);
        $stmt->bindParam(3, $course_taught);
        $stmt->bindParam(4, $ug_pg);
        $stmt->bindParam(5, $no_of_students);
        $stmt->bindParam(6, $teaching_date_of_joining);
        $stmt->bindParam(7, $teaching_date_of_leaving);
        $stmt->bindParam(8, $teaching_duration);
        $stmt->execute();

        // Insert data into Research Experience table
        $stmt = $conn->prepare("INSERT INTO Research_Experience (Position, Institute, Supervisor, Date_of_Joining, Date_of_Leaving, Duration) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $research_position);
        $stmt->bindParam(2, $research_institute);
        $stmt->bindParam(3, $supervisor);
        $stmt->bindParam(4, $research_date_of_joining);
        $stmt->bindParam(5, $research_date_of_leaving);
        $stmt->bindParam(6, $research_duration);
        $stmt->execute();

        // Insert data into Industrial Experience table
        $stmt = $conn->prepare("INSERT INTO Industrial_Experience (Organization, Work_Profile, Date_of_Joining, Date_of_Leaving, Duration) VALUES (?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $industrial_organization);
        $stmt->bindParam(2, $work_profile);
        $stmt->bindParam(3, $industrial_date_of_joining);
        $stmt->bindParam(4, $industrial_date_of_leaving);
        $stmt->bindParam(5, $industrial_duration);
        $stmt->execute();

        // Insert data into Specialization Research table
        $stmt = $conn->prepare("INSERT INTO Specialization_Research (Areas_of_specialization, Current_Area_of_research) VALUES (?, ?)");
        $stmt->bindParam(1, $areas_of_specialization);
        $stmt->bindParam(2, $current_area_of_research);
        $stmt->execute();

        // Commit the transaction
        $conn->commit();

        // Close the connection
        $conn = null;

        // Redirect after successful insertion
        header("Location: http://localhost/tuter/4th%20page.php");
        exit(); // Ensure script stops execution after redirection
    } catch (PDOException $e) {
        // Rollback the transaction on error
        if (isset($conn)) {
            $conn->rollback();
        }
        // Provide a user-friendly error message
        echo "An error occurred: " . $e->getMessage();
    }
}
?>

<html>
<head>
	<title>Employment Details</title>
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
<script type="text/javascript">
    $(function () {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
    });
</script>

<script type="text/javascript">
var tr="";
var counter_exp=1;
var counter_t_exp=1;
var counter_r_exp=1;
var counter_ind_exp=1;


  $(document).ready(function(){
    
    $("#add_more_exp").click(function(){
        create_tr();
        create_serial('exp');
        create_input('position[]', 'Position','position'+counter_exp, 'exp',counter_exp, 'exp');
        create_input('employer[]', 'Organization/Institution', 'employer'+counter_exp,'exp',counter_exp, 'exp');
        create_input('doj[]', 'DD/MM/YYYY', 'doj'+counter_exp,'exp',counter_exp, 'exp');
        create_input('dol[]', 'DD/MM/YYYY', 'dol'+counter_exp,'exp',counter_exp, 'exp');
        create_input('exp_duration[]', 'Duration','exp_duration'+counter_exp, 'exp',counter_exp,'exp', true);
        counter_exp++;
        return false;
    });

    $("#add_more_t_exp").click(function(){
        create_tr();
        create_serial('t_exp');
        create_input('te_position[]', 'Position','te_position'+counter_t_exp, 't_exp',counter_t_exp, 't_exp');
        create_input('te_employer[]', 'Employer', 'te_employer'+counter_t_exp,'t_exp',counter_t_exp, 't_exp');
        create_input('te_course[]', 'Courses', 'te_course'+counter_t_exp,'t_exp',counter_t_exp, 't_exp');
        create_input('te_ug_pg[]', 'UG/PG', 'te_ug_pg'+counter_t_exp,'t_exp',counter_t_exp, 't_exp');
        create_input('te_no_stu[]', 'No. of Students', 'te_no_stu'+counter_t_exp,'t_exp',counter_t_exp, 't_exp');
        create_input('te_doj[]', 'DD/MM/YYYY', 'te_doj'+counter_t_exp,'t_exp',counter_t_exp, 't_exp');
        create_input('te_dol[]', 'DD/MM/YYYY', 'te_dol'+counter_t_exp,'t_exp',counter_t_exp, 't_exp');
        create_input('te_duration[]', 'Duration', 'te_duration'+counter_t_exp,'t_exp',counter_t_exp, 't_exp', true);
        counter_t_exp++;
        return false;
    });

    
    $("#add_more_r_exp").click(function(){
        create_tr();
        create_serial('r_exp');
        create_input('r_exp_position[]', 'Position','r_exp_position'+counter_r_exp, 'r_exp',counter_r_exp, 'r_exp');
        create_input('r_exp_institute[]', 'Institute', 'r_exp_institute'+counter_r_exp,'r_exp',counter_r_exp, 'r_exp');
        create_input('r_exp_supervisor[]', 'Supervisor', 'r_exp_supervisor'+counter_r_exp,'r_exp',counter_r_exp, 'r_exp');
        create_input('r_exp_doj[]', 'DD/MM/YYYY', 'r_exp_doj'+counter_r_exp,'r_exp',counter_r_exp, 'r_exp');
        create_input('r_exp_dol[]', 'DD/MM/YYYY', 'r_exp_dol'+counter_r_exp,'r_exp',counter_r_exp, 'r_exp');
        create_input('r_exp_duration[]', 'Duration', 'r_exp_duration'+counter_r_exp,'r_exp',counter_r_exp, 'r_exp', true);
        counter_r_exp++;
        return false;
    });



$("#add_more_ind_exp").click(function(){
    create_tr();
    create_serial('ind_exp');
    create_input('org[]', 'Organization','org'+counter_ind_exp, 'ind_exp',counter_ind_exp, 'ind_exp');
    create_input('work[]', 'Work Profile', 'work'+counter_ind_exp,'ind_exp',counter_ind_exp, 'ind_exp');
    create_input('ind_doj[]', 'DD/MM/YYYY', 'ind_doj'+counter_ind_exp,'ind_exp',counter_ind_exp, 'ind_exp');
    create_input('ind_dol[]', 'DD/MM/YYYY', 'ind_dol'+counter_ind_exp,'ind_exp',counter_ind_exp, 'ind_exp');
    create_input('period[]', 'Duration', 'period'+counter_ind_exp,'ind_exp',counter_ind_exp, 'ind_exp',true);
    counter_ind_exp++;
    return false;
  });

  

});

  function create_select()
  {
    
  }
  function create_tr()
  {
    tr=document.createElement("tr");
  }
  function create_serial(tbody_id)
  {
    //console.log(tbody_id);
    var td=document.createElement("td");
    // var x=0;
     var x = document.getElementById(tbody_id).rows.length;
    // if(document.getElementById(tbody_id).rows)
    // {
    // }
    td.innerHTML=x;
    tr.appendChild(td);
  }
   function for_date_picker(obj)
  {
    obj.setAttribute("data-provide", "datepicker");
    obj.className += " datepicker";
    return obj;

  }
  
  function create_input(t_name, place_value, id, tbody_id, counter, remove_name, btn=false, select=false, datepicker_set=false)
  {
    //console.log(counter);
    if(select==false)
    {

      var input=document.createElement("input");
      input.setAttribute("type", "text");
      input.setAttribute("name", t_name);
      input.setAttribute("id", id);
      input.setAttribute("placeholder", place_value);
      input.setAttribute("class", "form-control input-md");
      input.setAttribute("required", "");
      var td=document.createElement("td");
      td.appendChild(input);
    }
    if(select==true)
    {

      var sel=document.createElement("select");
      sel.setAttribute("name", t_name);
      sel.setAttribute("id", id);
      sel.setAttribute("class", "form-control input-md");
      sel.innerHTML+="<option>Select</option>";
      sel.innerHTML+="<option value='Principal Investigator'>Principal Investigator</option>";
      sel.innerHTML+="<option value='Co-investigator'>Co-investigator</option>";
      // sel.innerHTML+="<option value='in_preparation'>In-Preparation</option>";
      var td=document.createElement("td");
      td.appendChild(sel);
    }
    if(datepicker_set==true)
    {
      input=for_date_picker(input);
    }
    if(btn==true)
    {
      // alert();
      var but=document.createElement("button");
      but.setAttribute("class", "close");
      but.setAttribute("onclick", "remove_row('"+remove_name+"','"+counter+"', '"+tbody_id+"')");
      but.innerHTML="x";
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
  function remove_row(remove_name, n, tbody_id)
  {
    var tab=document.getElementById(remove_name);
    var tr=document.getElementById("row"+n);
    tab.removeChild(tr);
    var x = document.getElementById(tbody_id).rows.length;
    for(var i=0; i<=x; i++)
    {
      $("#"+tbody_id).find("tr:eq("+i+") td:first").text(i);
      
    }
    
  }
</script>
<!-- all bootstrap buttons classes -->
<!-- 
  class="btn btn-sm, btn-lg, "
  color - btn-success, btn-primary, btn-default, btn-danger, btn-info, btn-warning
-->



<a href='https://ofa.iiti.ac.in/facrec_che_2023_july_02/layout'></a>

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
                      <a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/facultypanel/logout" class="btn btn-sm btn-success  pull-right">Logout</a>
                    </div>
                  </div>
                
                
        </legend>

<h4 style="text-align:center; font-weight: bold; color: #6739bb;">3. Employment Details</h4>


            <!-- Form Name -->
            <div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">(A) Present Employment</div>
            <div class="panel-body">

                <span class="col-md-2 control-label" for="pres_emp_position">Position</span>  
                <div class="col-md-4">
                    <input id="pres_emp_position" value="" name="present_position" type="text" placeholder="Position" class="form-control input-md" autofocus="" required="">
                </div>

                <span class="col-md-2 control-label" for="pres_emp_employer">Organization/Institution</span>  
                <div class="col-md-4">
                    <input id="pres_emp_employer" value="" name="present_organization" type="text" placeholder="Organization/Institution" class="form-control input-md" autofocus="">
                </div> 
                
                <span class="col-md-2 control-label" for="pres_status">Status</span>  
                <div class="col-md-4">
                    <select id="pres_status" name="present_status" class="form-control input-md" required="">
                        <option value="">Select</option>
                        <option value="Central Govt.">Central Govt.</option>
                        <option value="State Government">State Government</option>
                        <option value="Private">Private</option>
                        <option value="Quasi Govt.">Quasi Govt.</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <span class="col-md-2 control-label" for="pres_emp_doj">Date of Joining</span>  
                <div class="col-md-4">
                    <input id="pres_emp_doj" name="present_date_of_joining" type="text" placeholder="Date of Joining" value="" class="form-control input-md" required="">
                </div>

                <span class="col-md-2 control-label" for="pres_emp_dol">Date of Leaving <br />(Mention Continue if working)</span>  
                <div class="col-md-4">
                    <input id="pres_emp_dol" value="" name="present_date_of_leaving" type="text" placeholder="Date of Leaving" class="form-control input-md" required="">
                </div>
                
                <span class="col-md-2 control-label" for="pres_emp_duration">Duration (in years & months)</span>  
                <div class="col-md-4">
                    <input id="pres_emp_duration" name="present_duration" type="text" placeholder="Duration" value="" class="form-control input-md" required="">
                </div>
            </div>
        </div>
    </div>
</div>
<!---done---->

<!-- Employment History -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">(B) Employment History (After PhD, Starting with Latest) </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tbody id="exp">
                        <tr height="30px">
                            <th class="col-md-1"> S. No.</th>
                            <th class="col-md-3"> Position </th>
                            <th class="col-md-4"> Organization/Institution </th>
                            <th class="col-md-1"> Date of Joining</th>
                            <th class="col-md-1"> Date of Leaving </th>
                            <th class="col-md-2"> Duration (in years & months)</th>
                        </tr>
                        <tr height="60px">
                            <td class="col-md-1"> 1 </td>
                            <td class="col-md-2">
                                <input id="position1" value="" name="emp_position" type="text" placeholder="Position" class="form-control input-md" required="">
                            </td>
                            <td class="col-md-2">
                               <input id="employer" value="" name="employer" type="text" placeholder="Employer" class="form-control input-md" required="">
                            </td>
                            <td class="col-md-2">
                                <input id="doj" name="emp_date_of_joining" value="" type="text" placeholder="DD/MM/YYYY" class="form-control input-md" required="">
                            </td>
                            <td class="col-md-2">
                                <input id="dol" name="emp_date_of_leaving" value="" type="text" placeholder="DD/MM/YYYY" class="form-control input-md" required="">
                            </td>
                            <td class="col-md-2">
                                <input name="emp_duration" value="" type="text" placeholder="Duration" class="form-control input-md" required="">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Teaching Experience -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">(C) Teaching Experience (After PhD)</div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tbody id="t_exp">
                        <tr height="30px">
                            <th class="col-md-1"> S. No.</th>
                            <th class="col-md-2"> Position</th>
                            <th class="col-md-1"> Employer </th>
                            <th class="col-md-1"> Course Taught </th>
                            <th class="col-md-1"> UG/PG </th>
                            <th class="col-md-1"> No. of Students </th>
                            <th class="col-md-1"> Date of Joining the Institute</th>
                            <th class="col-md-1"> Date of Leaving the Institute</th>
                            <th class="col-md-1"> Duration (in years & months) </th>
                        </tr>
                        <tr height="60px">
                            <td class="col-md-1"> 1 </td>
                            <td class="col-md-2"> 
                                <input id="te_position1" name="teaching_position" type="text" value="" placeholder="Position" class="form-control input-md" required=""> 
                            </td>
                            <td class="col-md-2"> 
                                <input id="te_employer1" name="teaching_employer" type="text" value="" placeholder="Employer" class="form-control input-md" required=""> 
                            </td>
                            <td class="col-md-2"> 
                                <input id="te_course1" name="course_taught" type="text" value="" placeholder="Course Taught" class="form-control input-md" required=""> 
                            </td>
                            <td class="col-md-2"> 
                                <input id="te_ug_pg1" name="ug_pg" type="text" value="" placeholder="UG/PG" class="form-control input-md" required=""> 
                            </td>
                            <td class="col-md-2"> 
                                <input id="te_no_stu1" name="no_of_students" type="text" value="" placeholder="No. of Students" class="form-control input-md" required=""> 
                            </td>
                            <td class="col-md-1"> 
                                <input id="te_doj1" name="teaching_date_of_joining" type="text" value="" placeholder="Joining" class="form-control input-md" required=""> 
                            </td>
                            <td class="col-md-1"> 
                                <input id="te_dol1" name="teaching_date_of_leaving" type="text" value="" placeholder="Leaving" class="form-control input-md" required=""> 
                            </td>
                            <td class="col-md-1"> 
                                <input id="te_duration1" name="teaching_duration" type="text" value="" placeholder="Duration" class="form-control input-md" required=""> 
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


  <!-- c) Research Experience: (including Postdoctoral) input-->
  <div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">(D) Research Experience (Post PhD, including Post Doctoral)</div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tbody id="r_exp">
                        <tr height="30px">
                            <th class="col-md-1"> S. No.</th>
                            <th class="col-md-1"> Position </th>
                            <th class="col-md-2"> Institute</th>
                            <th class="col-md-2"> Supervisor</th>
                            <!-- <th class="col-md-2"> Topic </th> -->
                            <th class="col-md-1"> Date of Joining</th>
                            <th class="col-md-1"> Date of Leaving</th>
                            <th class="col-md-1"> Duration (in years & months) </th>
                        </tr>
                        <tr height="60px">
                            <td class="col-md-1"> 1 </td>
                            <td class="col-md-2"> 
                                <input id="r_exp_position1" name="research_position" type="text" value="" placeholder="Position" class="form-control input-md" required=""> 
                            </td>
                            <td class="col-md-2"> 
                                <input id="r_exp_institute1" name="research_institute" type="text" value="" placeholder="Institute" class="form-control input-md" required=""> 
                            </td>
                            <td class="col-md-2"> 
                                <input id="r_exp_supervisor1" name="supervisor" type="text" value="" placeholder="Supervisor" class="form-control input-md" required=""> 
                            </td>
                            <!-- <td class="col-md-2"> 
                                <input id="r_exp_topic1" name="r_exp_topic[]" type="text" value="" placeholder="Topic" class="form-control input-md" required=""> 
                            </td> -->
                            <td class="col-md-1"> 
                                <input id="r_exp_doj1" name="research_date_of_joining" type="text" value="" placeholder="Joining" class="form-control input-md" required=""> 
                            </td>
                            <td class="col-md-1"> 
                                <input id="r_exp_dol1" name="research_date_of_leaving" type="text" value="" placeholder="Leaving" class="form-control input-md" required=""> 
                            </td>
                            <td class="col-md-1"> 
                                <input id="r_exp_duration1" name="research_duration" type="text" value="" placeholder="Duration" class="form-control input-md" required=""> 
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- g)  Industrial Experience Interaction -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">(E) Industrial Experience &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_more_ind_exp">Add Details</button></div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tbody id="ind_exp">
                        <tr height="30px">
                            <th class="col-md-1"> S. No.</th>
                            <th class="col-md-2"> Organization </th>
                            <th class="col-md-3"> Work Profile</th>
                            <th class="col-md-2"> Date of Joining</th>
                            <th class="col-md-2"> Date of Leaving</th>
                            <th class="col-md-2"> Duration (in years & months)</th>
                        </tr>
                        <tr height="60px">
                            <td class="col-md-1"> 1 </td>
                            <td class="col-md-2"> 
                                <input id="org1" name="industrial_organization" type="text" value="" placeholder="Organization" class="form-control input-md" required=""> 
                            </td>
                            <td class="col-md-2"> 
                                <input id="work1" name="work_profile" type="text" value="" placeholder="Nature of Work" class="form-control input-md" required=""> 
                            </td>
                            <td class="col-md-1"> 
                                <input id="ind_doj1" name="industrial_date_of_joining" type="text" value="" placeholder="Joining" class="form-control input-md" required=""> 
                            </td>
                            <td class="col-md-1"> 
                                <input id="ind_dol1" name="industrial_date_of_leaving" type="text" value="" placeholder="Leaving" class="form-control input-md" required=""> 
                            </td>
                            <td class="col-md-2"> 
                                <input id="period1" name="industrial_duration" type="text" value="" placeholder="Period" class="form-control input-md" required=""> 
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<h4 style="text-align:center; font-weight: bold; color: #6739bb;">4. Area(s) of Specialization and Current Area(s) of Research</h4>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-body">
                <strong>Areas of specialization</strong>
                <textarea style="height:150px" placeholder="Areas of specialization" class="form-control input-md" name="areas_of_specialization" maxlength="500" required=""></textarea>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-body">
                <strong>Current Area of research</strong>
                <textarea style="height:150px" placeholder="Current Area of research" class="form-control input-md" name="current_area_of_research" maxlength="500" required=""></textarea>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
  
  <div class="col-md-1">
    <a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/acde" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-fast-backward"></i></a>
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