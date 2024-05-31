<?php
if (isset($_POST['submit'])) {
    // $author_name = $_POST['author_name'];
    $num_international_journal_papers = $_POST['num_international_journal_papers'];
    $num_national_journal_papers = $_POST['num_national_journal_papers'];
    $num_international_conference_papers = $_POST['num_international_conference_papers'];
    $num_national_conference_papers = $_POST['num_national_conference_papers'];
    $num_patents = $_POST['num_patents'];
    $num_books = $_POST['num_books'];
    $num_book_chapters = $_POST['num_book_chapters'];

    $author_name_publication = $_POST['author_name_publication'];
    $title = $_POST['title'];
    $journal_conference_name = $_POST['journal_conference_name'];
    $year_of_publication = $_POST['year_of_publication'];
    // $volume_issue_page = $_POST['volume_issue_page'];
    $impact_factor = $_POST['impact_factor'];
    $doi = $_POST['doi'];
    $status = $_POST['status'];

    $inventor_name = $_POST['inventor_name'];
    $title_patent = $_POST['title_patent'];
    $country = $_POST['country'];
    $patent_number = $_POST['patent_number'];
    $date_filed = $_POST['date_filed'];
    $date_published = $_POST['date_published'];
    $status_patent = $_POST['status_patent'];
    
    $author_name_book = $_POST['author_name_book'];
    $title_book = $_POST['title_book'];
    $year_of_publication_book = $_POST['year_of_publication_book'];
    $isbn_book = $_POST['isbn_book'];
    
    $author_name_chapter = $_POST['author_name_chapter'];
    $title_chapter = $_POST['title_chapter'];
    $year_of_publication_chapter = $_POST['year_of_publication_chapter'];
    $isbn_chapter = $_POST['isbn_chapter'];

    // $author_name_scholar = $_POST['author_name_scholar'];
    $url_scholar = $_POST['url_scholar'];

    try {
        // Establish database connection
        $conn = new PDO('mysql:host=localhost;dbname=test', 'root', '12345');

        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Start a transaction
        $conn->beginTransaction();

        $stmt_publication_summary = $conn->prepare("INSERT INTO publicationssummary (NumInternationalJournalPapers, NumNationalJournalPapers, NumInternationalConferencePapers, NumNationalConferencePapers, NumPatents, NumBooks, NumBookChapters) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt_publication_summary->bindParam(1, $num_international_journal_papers);
        $stmt_publication_summary->bindParam(2, $num_national_journal_papers);
        $stmt_publication_summary->bindParam(3, $num_international_conference_papers);
        $stmt_publication_summary->bindParam(4, $num_national_conference_papers);
        $stmt_publication_summary->bindParam(5, $num_patents);
        $stmt_publication_summary->bindParam(6, $num_books);
        $stmt_publication_summary->bindParam(7, $num_book_chapters);
        $stmt_publication_summary->execute();

        $stmt_publications = $conn->prepare("INSERT INTO BestPublications (AuthorName, Title, JournalConferenceName, YearOfPublication , ImpactFactor, DOI, Status) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt_publications->bindParam(1, $author_name_publication);
        $stmt_publications->bindParam(2, $title);
        $stmt_publications->bindParam(3, $journal_conference_name);
        $stmt_publications->bindParam(4, $year_of_publication);
        $stmt_publications->bindParam(5, $impact_factor);
        $stmt_publications->bindParam(6, $doi);
        $stmt_publications->bindParam(7, $status);
        $stmt_publications->execute();

        $stmt_patents = $conn->prepare("INSERT INTO Patents (InventorName, Title, Country, PatentNumber, DateFiled, DatePublished, Status) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt_patents->bindParam(1, $inventor_name);
        $stmt_patents->bindParam(2, $title_patent);
        $stmt_patents->bindParam(3, $country);
        $stmt_patents->bindParam(4, $patent_number);
        $stmt_patents->bindParam(5, $date_filed);
        $stmt_patents->bindParam(6, $date_published);
        $stmt_patents->bindParam(7, $status_patent);
        $stmt_patents->execute();

        $stmt_books = $conn->prepare("INSERT INTO Books (AuthorName, Title, YearOfPublication, ISBN) VALUES (?, ?, ?, ?)");
        $stmt_books->bindParam(1, $author_name_book);
        $stmt_books->bindParam(2, $title_book);
        $stmt_books->bindParam(3, $year_of_publication_book);
        $stmt_books->bindParam(4, $isbn_book);
        $stmt_books->execute();

        $stmt_chapters = $conn->prepare("INSERT INTO BookChapters (AuthorName, Title, YearOfPublication, ISBN) VALUES (?, ?, ?, ?)");
        $stmt_chapters->bindParam(1, $author_name_chapter);
        $stmt_chapters->bindParam(2, $title_chapter);
        $stmt_chapters->bindParam(3, $year_of_publication_chapter);
        $stmt_chapters->bindParam(4, $isbn_chapter);
        $stmt_chapters->execute();

        $stmt_scholar = $conn->prepare("INSERT INTO GoogleScholarLinks (URL) VALUES (?)");
        // $stmt_scholar->bindParam(1, $author_name_scholar);
        $stmt_scholar->bindParam(1, $url_scholar);
        $stmt_scholar->execute();

        // Commit the transaction
        $conn->commit();

        // Close the connection
        $conn = null;

        // Redirect after successful insertion
        header("Location: 5th page.php");
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
	<title>Publication Details</title>
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
<style type="text/css">
	body { background-color: rgb(172, 229, 246); padding-top:0px!important;}

</style>
<body>
<div class="container-fluid" style="background-color: rgb(172, 229, 246); margin-bottom: 10px;">
	<div class="container">
        <div class="row" style="margin-bottom:10px; ">
        	<div class="col-md-8 col-md-offset-2">

        		<!--  <img src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/IITIndorelogo.png" alt="logo1" class="img-responsive" style="padding-top: 5px; height: 120px; float: left;"> -->

        		<h3 style="text-align:center;color:#414002!important;font-weight: bold;font-size: 2.3em; margin-top: 3px; font-family: 'Noto Sans', sans-serif;">भारतीय प्रौद्योगिकी संस्थान पटना</h3>
    			<h3 style="text-align:center;color: #414002!important;font-weight: bold;font-family: 'Oswald', sans-serif!important;font-size: 2.2em; margin-top: 0px;">Indian Institute of Technology Patna</h3>
    			

        	</div>
        	

    	   
        </div>
		    <!-- <h3 style="text-align:center; color: #414002; font-weight: bold;  font-family: 'Fjalla One', sans-serif!important; font-size: 2em;">Application for Academic Appointment</h3> -->
    </div>
   </div> 
   <h3 style="color: #ff0026; margin-bottom: 1px; font-weight: bold; text-align: center;font-family: 'Noto Serif', serif;" class="moving-text">Application for Faculty Position</h3>
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

span{
  font-size: 1.2em;
  font-family: 'Oswald', sans-serif!important;
  text-align: left!important;
  padding: 0px 10px 0px 0px!important;
  /margin-bottom: 20px!important;/

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
                $('#dob').datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true
                });
            });
</script>

<script type="text/javascript">
var tr="";
var counter_jour=1;
// var counter_confer=1;
var counter_book=1;
var counter_book_chapter=1;
var counter_patent=1;
  $(document).ready(function(){

    $("#add_more_jour").click(function(){
        create_tr();
        create_serial('jour');
        create_input('author[]', 'Author', 'author'+counter_jour,'jour', counter_jour, 'jour');
        create_input('title[]', 'Title', 'title'+counter_jour,'jour', counter_jour, 'jour');
        create_input('journal[]', 'Journal', 'journal'+counter_jour,'jour', counter_jour, 'jour');
        create_input('year[]', 'Year, Vol., Page', 'year'+counter_jour,'jour', counter_jour, 'jour');
        create_input('impact[]', 'Impact Factor','impact'+counter_jour, 'jour', counter_jour, 'jour');
        create_input('doi[]', 'DOI','doi'+counter_jour, 'jour', counter_jour, 'jour');
        create_input('status[]', 'Status', 'status'+counter_jour,'jour', counter_jour,'jour',true, true);
        counter_jour++;
        return false;
    });

    // $("#add_more_confer").click(function(){
    //     create_tr();
    //     create_serial('confer');
    //     create_input('cname[]', 'Conference','cname'+counter_confer, 'confer',counter_confer, 'confer');
    //     create_input('ctitle[]', 'Title', 'ctitle'+counter_confer,'confer',counter_confer, 'confer');
    //     create_input('cyear[]', 'Year', 'cyear'+counter_confer,'confer',counter_confer, 'confer',true);
    //     counter_confer++;
    //     return false;
    // });

    $("#add_more_book").click(function(){
        create_tr();
        create_serial('book');
        create_input('bauthor[]', 'Book','bauthor'+counter_book, 'book',counter_book, 'book');
        create_input('btitle[]', 'Title of the Book', 'btitle'+counter_book,'book',counter_book, 'book');
        create_input('byear[]', 'Year', 'byear'+counter_book,'book',counter_book, 'book');
        create_input('bisbn[]', 'ISBN', 'bisbn'+counter_book,'book',counter_book, 'book',true);
        // create_input('bstatus[]', 'Status', 'bstatus'+counter_book,'book', counter_book,'book',true, true);
        // create_input('dol[]', 'Date of Leaving', 'dol'+counter_exp,'exp',counter_exp, 'exp');
        // create_input('duration2[]', 'Duration','duration2'+counter_exp, 'exp',counter_exp,'exp', true);
        // //create_input('perce[]', 'Percentage', 'perce'+counter_exp,'exp', true);
        counter_book++;
        return false;
    });


    $("#add_more_book_chapter").click(function(){
        create_tr();
        create_serial('book_chapter');
        create_input('bc_author[]', 'Book Chapter','bc_author'+counter_book_chapter, 'book_chapter',counter_book_chapter, 'book_chapter');
        create_input('bc_title[]', 'Title', 'bc_title'+counter_book_chapter,'book_chapter',counter_book_chapter, 'book_chapter');
        create_input('bc_year[]', 'Year', 'bc_year'+counter_book_chapter,'book_chapter',counter_book_chapter, 'book_chapter');
        create_input('bc_isbn[]', 'ISBN', 'bc_isbn'+counter_book_chapter,'book_chapter',counter_book_chapter, 'book_chapter',true);
        counter_book_chapter++;
        return false;
    });


    $("#add_more_patent").click(function(){
        create_tr();
         create_serial('patent');
        create_input('pauthor[]', 'Inventor(s)','pauthor'+counter_patent, 'patent',counter_patent, 'patent');
        // create_input('p_year[]', 'Year of the patent','p_year'+counter_patent, 'patent',counter_patent, 'patent');
        create_input('ptitle[]', 'Title of Patent', 'ptitle'+counter_patent,'patent',counter_patent, 'patent');
        create_input('p_country[]', 'Country of patent','p_country'+counter_patent, 'patent',counter_patent, 'patent');
        create_input('p_number[]', 'Patent Number','p_number'+counter_patent, 'patent',counter_patent, 'patent');
        create_input('pyear_filed[]', 'DD/MM/YYYY','pyear_filed'+counter_patent, 'patent',counter_patent, 'patent');
        create_input('pyear_published[]', 'DD/MM/YYYY','pyear_published'+counter_patent, 'patent',counter_patent, 'patent');
        create_input('pyear_issued[]', 'DD/MM/YYYY','pyear_issued'+counter_patent, 'patent',counter_patent, 'patent',true);
        // create_input('pyear[]', 'Year', 'pyear'+counter_patent,'patent',counter_patent, 'patent',true);
        // create_input('pstatus[]', 'Status', 'pstatus'+counter_patent,'patent', patent,'patent',true, true);
        // create_input('dol[]', 'Date of Leaving', 'dol'+counter_exp,'exp',counter_exp, 'exp');
        // create_input('duration2[]', 'Duration','duration2'+counter_exp, 'exp',counter_exp,'exp', true);
        // //create_input('perce[]', 'Percentage', 'perce'+counter_exp,'exp', true);
        counter_patent++;
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
  function create_input(t_name, place_value, id, tbody_id, counter, remove_name, btn=false, select=false)
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
      sel.innerHTML+="<option value='published'>Published</option>";
      sel.innerHTML+="<option value='accepted'>Accepted</option>";
      // sel.innerHTML+="<option value='in_preparation'>In-Preparation</option>";
      var td=document.createElement("td");
      td.appendChild(sel);
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
    //var tbody=document.getElementById(tbody_id);
    //console.log(tbody[1].childNodes);
    // var row=tbody[0].getElementByTagName("tr");
    // var td=row[0].getElementByTagName("td");
    // td.innerHTML=i;
    // for(var i=1; i<=x; i++)
    // {
    //     var tbody=document.getElementById(tbody_id);
    //     var row=tbody[0].getElementByTagName("tr");
    //     var td=row[0].getElementByTagName("td");
    //     td.innerHTML=i;
    // }
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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-8 well">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="ci_csrf_token" value="" />
            <fieldset>
             
                 <legend>
                  <div class="row">
                    <div class="col-md-10">
                        <h4>Welcome : <font color="#025198"><strong>Ravina&nbsp;Budania</strong></font></h4>
                    </div>
                    <div class="col-md-2">
                      <a href="index.php" class="btn btn-sm btn-success  pull-right">Logout</a>
                    </div>
                  </div>
                
                
        </legend>

             

    
            <!-- Form Name -->
            
              
            <!-- Text input-->
           
            <h4 style="text-align:center; font-weight: bold; color: #6739bb;">5. Summary of Publications *</h4>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-body">
                <span class="col-md-5 control-label" for="summary_journal_inter">Number of International Journal Papers</span>  
                <div class="col-md-1">
                    <input id="summary_journal_inter" name="num_international_journal_papers" type="text" placeholder="" class="form-control input-md" required="" maxlength="3">
                </div>
                <span class="col-md-5 control-label" for="summary_journal">Number of National Journal Papers</span>  
                <div class="col-md-1">
                    <input id="summary_journal" name="num_national_journal_papers" type="text" placeholder="" class="form-control input-md" required="" maxlength="3">
                </div>
                <span class="col-md-5 control-label" for="summary_conf_inter">Number of International Conference Papers</span>  
                <div class="col-md-1">
                    <input id="summary_conf_inter" name="num_international_conference_papers" type="text" placeholder="" class="form-control input-md" required="" maxlength="3">
                </div>
                <span class="col-md-5 control-label" for="summary_conf_national">Number of National Conference Papers</span>  
                <div class="col-md-1">
                    <input id="summary_conf_national" name="num_national_conference_papers" type="text" placeholder="" class="form-control input-md" required="" maxlength="3">
                </div>
                <span class="col-md-5 control-label" for="patent_publish">Number of Patent(s) [Filed, Published, Granted]</span>  
                <div class="col-md-1">
                    <input id="patent_publish" name="num_patents" type="text" placeholder="" class="form-control input-md" required="" maxlength="3">
                </div>
                <span class="col-md-5 control-label" for="summary_book">Number of Book(s)</span>  
                <div class="col-md-1">
                    <input id="summary_book" name="num_books" type="text" placeholder="" class="form-control input-md" required="" maxlength="3">
                </div>
                <span class="col-md-5 control-label" for="summary_book_chapter">Number of Book Chapter(s)</span>  
                <div class="col-md-1">
                    <input id="summary_book_chapter" name="num_book_chapters" type="text" placeholder="" class="form-control input-md" required="" maxlength="3">
                </div>
            </div>
        </div>
    </div>
</div>
<!---done-->
<h4 style="text-align:center; font-weight: bold; color: #6739bb;">6. List of 10 Best Publications (Journal/Conference)</h4>
<div class="container-fluid table-responsive">
<div class="row">
    <div class="panel panel-success">
        <div class="panel-heading">List of 10 Best Publications (Journal/Conference) &nbsp;&nbsp;&nbsp;
            <button class="btn btn-sm btn-danger" id="add_more_jour">Add Details</button>
        </div>
        <table class="table table-bordered">
            <tbody id="jour">
                <tr height="30px">
                    <th class="col-md-1"> S. No.</th>
                    <th class="col-md-2"> Author(s) </th>
                    <th class="col-md-1"> Title</th>
                    <th class="col-md-2"> Name of Journal/Conference </th>
                    <th class="col-md-1"> Year, Vol., Page</th>
                    <th class="col-md-1"> Impact Factor </th>
                    <th class="col-md-1"> DOI</th>
                    <th class="col-md-2"> Status</th>
                </tr>
                <tr height="60px">
                    <td class="col-md-1"> 1 </td>
                    <td class="col-md-2"> 
                    <input id="author_name_publication" name="author_name_publication" type="text" value="" placeholder="Author" class="form-control input-md" required="">
                    </td>
                    <td class="col-md-2"> 
                    <input id="title" name="title" type="text" value="" placeholder="Title of the Publication" class="form-control input-md" required="">
                    </td>
                    <td class="col-md-2"> 
                    <input id="journal_conference_name" name="journal_conference_name" type="text" value="" placeholder="Journal/Conference Name" class="form-control input-md" required="">
                    </td>
                    <td class="col-md-2"> 
                    <input id="year_of_publication" name="year_of_publication" type="text" value="" placeholder="Year of Publication" class="form-control input-md" required="">
                    </td>
                    <td class="col-md-2"> 
                    <input id="volume_issue_page" name="volume_issue_page" type="text" value="" placeholder="Volume, Issue, Page" class="form-control input-md" required="">
                    </td>
                    <td class="col-md-2"> 
                    <input id="impact_factor" name="impact_factor" type="text" value="" placeholder="Impact Factor" class="form-control input-md" required="">
                    </td>
                    <td class="col-md-2"> 
                    <input id="doi" name="doi" type="text" value="" placeholder="doi" class="form-control input-md" required="">
                    </td>
                    <td class="col-md-2"> 
                        <select id="status1" name="status" class="form-control input-md">
                            <option value="">Select</option>
                            <option  value="published">Published</option>
                            <option  value="accepted">Accepted</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


              
   <!--done2--> 

           <!-- Patent Text -->
           <div class="container-fluid table-responsive">
    <h4 style="text-align:center; font-weight: bold; color: #6739bb;">7. List of Patent(s), Book(s), Book Chapter(s)</h4>
    <div class="row">
        <div class="panel panel-success">
            <div class="panel-heading">(A) Patent(s) &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_more_patent">Add Details</button></div>
            <table class="table table-bordered">
                <tbody id="patent">
                    <tr height="30px">
                        <th class="col-md-1"> S. No.</th>
                        <th class="col-md-1"> Inventor(s) </th>
                        <th class="col-md-2"> Title of Patent </th>
                        <th class="col-md-1"> Country of Patent </th>
                        <th class="col-md-1"> Patent Number</th>
                        <th class="col-md-1"> Date of Filing</th>
                        <th class="col-md-1"> Date of Published</th>
                        <th class="col-md-1"> Status</th>
                    </tr>
                    <tr height="60px">
                        <td class="col-md-1"> 1 </td>
                        <td class="col-md-1"> 
                        <input id="inventor_name" name="inventor_name" type="text" value="" placeholder="Inventor(s)" class="form-control input-md" required="">
                        </td>
                        <td class="col-md-2"> 
                        <input id="title_patent" name="title_patent" type="text" value="" placeholder="Title of Patent" class="form-control input-md" required="">
                        </td>
                        <td class="col-md-1"> 
                        <input id="country" name="country" type="text" value="" placeholder="Country of Patent" class="form-control input-md" required="">
                        </td>
                        <td class="col-md-1"> 
                        <input id="patent_number" name="patent_number" type="text" value="" placeholder="Patent Number" class="form-control input-md" required="">
                        </td>
                        <td class="col-md-1"> 
                        <input id="date_filed" name="date_filed" type="text" value="" placeholder="Date of Filing (DD/MM/YYYY)" class="form-control input-md" required="">
                        </td>
                        <td class="col-md-1"> 
                        <input id="date_published" name="date_published" type="text" value="" placeholder="Date of Published (DD/MM/YYYY)" class="form-control input-md" required="">
                        </td>
                        <td class="col-md-1"> 
                        <input id="status_patent" name="status_patent" type="text" value="" placeholder="Status Filed/Published/Granted" class="form-control input-md" required="">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--done3-->

            <!-- Book Text -->

            <div class="container-fluid table-responsive">
    <div class="row">
        <div class="panel panel-success">
            <div class="panel-heading">(B) Book(s) &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_more_book">Add Details</button></div>
            <table class="table table-bordered">
                <tbody id="book">
                    <tr height="30px">
                        <th class="col-md-1"> S. No.</th>
                        <th class="col-md-2"> Author(s)</th>
                        <th class="col-md-2"> Title of the Book </th>
                        <th class="col-md-2"> Year of Publication </th>
                        <th class="col-md-2"> ISBN</th>
                    </tr>
                    <tr height="60px">
                        <td class="col-md-1"> 1 </td>
                        <td class="col-md-4"> 
                        <input id="author_name_book" name="author_name_book" type="text" value="" placeholder="Author(s)" class="form-control input-md" required="">
                        </td>
                        <td class="col-md-3"> 
                        <input id="title_book" name="title_book" type="text" value="" placeholder="Title of the Book" class="form-control input-md" required="">
                        </td>
                        <td class="col-md-2"> 
                        <input id="year_of_publication_book" name="year_of_publication_book" type="text" value="" placeholder="Year of Publication" class="form-control input-md" required="">
                        </td>
                        <td class="col-md-2"> 
                        <input id="isbn_book" name="isbn_book" type="text" value="" placeholder="ISBN" class="form-control input-md" required="">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br />
<br />


            <!-- Book chapter Text -->

            <div class="container-fluid table-responsive">
    <div class="row">
        <div class="panel panel-success">
            <div class="panel-heading">(C) Book Chapter(s)&nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_more_book_chapter">Add Details</button></div>
            <table class="table table-bordered">
                <tbody id="book_chapter">
                    <tr height="30px">
                        <th class="col-md-1"> S. No.</th>
                        <th class="col-md-2"> Author(s)</th>
                        <th class="col-md-2"> Title of the Book Chapter(s) </th>
                        <th class="col-md-2"> Year of Publication </th>
                        <th class="col-md-2"> ISBN</th>
                        <!-- <th class="col-md-2"> Status</th> -->
                    </tr>              
                    <tr height="60px">
                        <td class="col-md-1"> 
                            1                     
                        </td>
                        <td class="col-md-4"> 
                            <input id="author_name_chapter" name="author_name_chapter" type="text" value="" placeholder="Author(s)" class="form-control input-md" required="">
                        </td> 
                        <td class="col-md-3"> 
                            <input id="title_chapter" name="title_chapter" type="text" value="" placeholder="Title of the Book Chapter(s)" class="form-control input-md" required="">
                        </td>
                        <td class="col-md-2"> 
                            <input id="year_of_publication_chapter" name="year_of_publication_chapter" type="text" value="" placeholder="Year of Publication" class="form-control input-md" required="">
                        </td>
                        <td class="col-md-2"> 
                            <input id="isbn_chapter" name="isbn_chapter" type="text" value="" placeholder="ISBN" class="form-control input-md" required="">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> 
</div>
<br />
<br />
<h4 style="text-align:center; font-weight: bold; color: #6739bb;">8. Google Scholar Link *</h4>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">URL</div>
            <div class="panel-body">
                <span class="col-md-2 control-label" for="google_link">Google Scholar Link </span>  
                <div class="col-md-10">
                    <input id="url_scholar" name="url_scholar" type="text" value="" placeholder="Google Scholar Link" class="form-control input-md" required="">
                </div>
            </div>
        </div>
    </div>
</div>


            <!-- Button -->
<div class="form-group">

  <div class="col-md-1">
    <a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/employment_details" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-fast-backward"></i></a>
  </div>

<div class="col-md-11">
  <button id="submit" type="submit" name="submit" value="Submit" class="btn btn-success pull-right">SAVE & NEXT</button>
  
</div>

             
            </div>
           

            </fieldset>
            </form>
            
            

        </div>
    </div>
</div>

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