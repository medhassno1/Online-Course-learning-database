<?php

    // calls connection and session info
    require("includes/common.php");
    
    // check if the user is logged in
    if(empty($_SESSION['user']))
    {
        // if not logged in send them to login page
        header("Location: login.php");
        
        // stop script
        die("Redirecting to login.php");
    }
?>


<!--thomas1.01 -->

<!-- basic greeting and temporary tools -->
	

	<!--  HTML starts here -->
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Tab Example</title>

<link rel="stylesheet" type="text/css" href="css/tabs.css"/>


<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<script src="js/tabs.js" type="text/javascript"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>


</head>

	<body onload="init()">
	<div class="container">
		<div class="float:left;">
		<h1>Welcome Administrator </h1>
</div>
<div style="float:right">

<a href="logout.php" class="btn btn-danger btn-large">Logout</a>
</div>

		<ul id="tabNav">
		<li><a href="#tab1">Users</a></li>
		<li><a href="#tab2">Import/Export Database</a></li>
		<li><a href="#tab3">Program</a></li>
		<li><a href="#tab4">Course</a></li>
		<li><a href="#tab5">Section</a></li>
		<li><a href="#tab6">Level</a></li>
		<li><a href="#tab7">Professor</a></li>
		<li><a href="#tab8">Program Term</a></li>
		<li><a href="#tab9">Quick Utility</a></li>
		</ul>
	
	<!-- COODING FOR TAB ONE -->
	
    <div class="tabContent" id="tab1" style="padding-top:20px;">
	
	<form name="userForm" class="form-horizontal">
	<div class="form-group">
		<label class="label-control col-xs-9">If you want to see all members click <a href="includes/memberlist.php">Memberlist</a></label></div>
		<div class="form-group">
		<label class="label-control col-xs-9">To edit an user click here  <a href="includes/edit_account.php">Edit Account</a></label></div>
<div class="form-group">
		<label class="label-control col-xs-9">To register an user click here <a href="includes/register.php">Register</a></label></div>
	</form> 
	</div>
	
	
	<!-- COODING FOR TAB TWO -->
    <div class="tabContent" id="tab2">
	<form name="editDatabaseForm">
	Import export database
	</form>
    </div>
   
	
	<!-- COODING FOR TAB THREE -->
    <div class="tabContent" id="tab3">
	<form name="editProgramTableForm" class="form-horizontal" id="editProgramTableForm"  onsubmit="return validation(this.id)"> 
	<div class="form-group">
	<div class="col-xs-2"></div>
	<div class="col-xs-3">
	<select name="choice" class="form-control" form="editProgramTableForm" >
		<option value="editProgramTable">Edit an existing table</option>
		<option value="newProgramTable">New Program Table</option>
	</select> 
	</div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Program Code :</label>
	<div class="col-xs-3">
	<input type="text" name="proCode" class="form-control" /> 
	</div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Program Version  :</label>
	<div class="col-xs-3">
	<input type="text" name="proVer" class="form-control" />
	</div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Program Name     :</label>
	<div class="col-xs-3">
	<input type="text" name="proNam" class="form-control"/> 
	</div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Total_Student    :</label>
	<div class="col-xs-3">
	<input type="text" name="totSu" class="form-control" /> 
	</div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Level            :</label>
	<div class="col-xs-3">
	<input type="text" name="lvlPro" class="form-control" /> 
	</div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Start Date       :</label>
	<div class="col-xs-3">
	<input type="date" name="staDat" class="form-control" /> 
	</div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">End Date         :</label>
	<div class="col-xs-3">
	<input type="date" name="endDat" class="form-control" /> 
	</div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Coordinator Name :</label>
	<div class="col-xs-3">
	<input type="text" name="cooNam" class="form-control" /> 
	</div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Coordinator Phone :</label>
	<div class="col-xs-3">
	<input type="text" name="phoNam" class="form-control" /> 
	</div>
	</div>
	<div class="form-group">
	<div class="col-xs-3">
	<button type="submit" form="editProgramTableForm"  class="btn btn-primary pull-right" value="SubmitProgramTable">Submit</button>
	</div>
	</div>
    </form> 
    </div>
	
	
	
	
	<!-- COODING FOR TAB FOUR -->
	<div class="tabContent" id="tab4">
	<form name="editCourseTableForm" class="form-horizontal" id="editCourseTableForm" onsubmit="return validation(this.id)">
	<div class="form-group">
<div class="col-xs-2"></div>
<div class="col-xs-3">	
	<select name="choice" class="form-control" form="editCourseTableForm">
		<option value="editCourseTable">Edit an existing table</option>
		<option value="newCourseTable">New Course Table</option>
	</select> 
	</div>
	</div>
<div class="form-group">
	<label class="label-control col-xs-2">Course Code         :</label><div class="col-xs-3"><input type="text" name="couCode" class="form-control"/> </div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Course Version      :</label><div class="col-xs-3"><input type="text" name="couVer" class="form-control"/> </div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Course Name         :</label><div class="col-xs-3"><input type="text" name="couNam" class="form-control"/> </div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Program Code     	:</label><div class="col-xs-3"><input type="text" name="proCode" class="form-control"/> </div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Level            	:</label><div class="col-xs-3"><input type="text" name="lvlCou"class="form-control" /> </div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Course Mode         :</label><div class="col-xs-3"><input type="text" name="couMod" class="form-control" /> </div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Course Length       :</label><div class="col-xs-3"><input type="week" name="couMod" class="form-control"/> </div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Course Hours        :</label><div class="col-xs-3"><input type="text" name="couHou" class="form-control" /> </div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Exam exist         	:</label><div class="col-xs-3"><input type="text" name="exaExi" class="form-control"/> </div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Exam hours       	:</label><div class="col-xs-3"><input type="text" name="exaHou" class="form-control"/> </div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Course Constraints  :</label><div class="col-xs-3"><input type="text" name="couCon" class="form-control"/> </div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Course Description  :</label><div class="col-xs-3"><input type="text" name="couDes" class="form-control" /> </div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Capacity      :</label><div class="col-xs-3"><input type="text" name="capCou" class="form-control" /> </div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Course centre code  :</label><div class="col-xs-3"><input type="text" name="couCenCod" class="form-control"/> </div>
	</div>
	<div class="form-group">
	<div class="col-xs-3">
	<button type="submit" form="editCourseTableForm" class="btn btn-primary pull-right" value="SubmitCourseTable">Submit</button>
	</div>
	</div>
	</form>
	</div>
	
	
	
	<!-- COODING FOR TAB FIVE -->
	<div class="tabContent" id="tab5">
      <form name="editSectionTableForm" class="form-horizontal" id="editSectionTableForm" onsubmit="return validation(this.id)"> 
	 <div class="form-group">
	 <div class="col-xs-2"></div>
	<div class="col-xs-3">
	<select name="choice" class="form-control"  form="editSectionTableForm">
		<option value="editSectionTable">Edit an existing table</option>
		<option value="newSectionTable">New Section Table</option>
	</select> 
	</div>
	</div>
	 <div class="form-group">
	<label class="label-control col-xs-2">Section Code         	:</label><div class="col-xs-3"><input type="text" class="form-control" name="secCode" i/> </div>
	 </div>
	 <div class="form-group">
	<label class="label-control col-xs-2">Course Code         	:</label><div class="col-xs-3"><input type="text" class="form-control" name="couCode" i/> </div>
	</div>
	 <div class="form-group">
	<label class="label-control col-xs-2">Section size        	:</label><div class="col-xs-3"><input type="text" class="form-control" name="secSiz" i/> </div>
	</div>
	 <div class="form-group">
	<label class="label-control col-xs-2">Room Code         		:</label><div class="col-xs-3"><input type="text" class="form-control" name="romCode" i/> </div>
	</div>
	 <div class="form-group">
	<label class="label-control col-xs-2">Delivery Type 1 :</label><div class="col-xs-6"><div class="radio"><label >
	<input type="radio" name="delTyp1"  value="lab">Lab</label></div>
	<div class="radio"><label ><input type="radio" name="delTyp1"  value="hybrid">Hybrid</label></div>
	<div class="radio"><label ><input type="radio" name="delTyp1"  value="theory">Theory</label></div>
	</div>
	</div>

	<div class="form-group">
	<label class="label-control col-xs-2">Delivery Type 2 :</label><div class="col-xs-6"><div class="radio"><label >
	<input type="radio" name="delTyp2"  value="lab">Lab</label></div>
	<div class="radio"><label ><input type="radio" name="delTyp2"  value="hybrid">Hybrid</label></div>
	<div class="radio"><label ><input type="radio" name="delTyp2"  value="theory">Theory</label></div>
	</div>
	</div>
	<div class="form-group">
	<label class="label-control col-xs-2">Delivery Type 3 :</label><div class="col-xs-6"><div class="radio"><label >
	<input type="radio" name="delTyp3"  value="lab">Lab</label></div>
	<div class="radio"><label ><input type="radio" name="delTyp3" value="hybrid">Hybrid</label></div>
	<div class="radio"><label ><input type="radio" name="delTyp3"  value="theory">Theory</label></div>
	</div>
  </div>
  <div class="form-group">
	<label class="label-control col-xs-2">Hours Type 1       		:</label><div class="col-xs-3"><input type="text" class="form-control" name="hou1" /> </div>
	</div>
  <div class="form-group">
	<label class="label-control col-xs-2">Hours Type 2       		:</label><div class="col-xs-3"><input type="text" class="form-control" name="hou2" /> </div>
	</div>
  <div class="form-group">
	<label class="label-control col-xs-2">Hours Type 3       		:</label><div class="col-xs-3"><input type="text" class="form-control" name="hou3" /> </div>
	</div>
	<div class="form-group">
	<div class="col-xs-3">
	<button type="submit" form="editSectionTableForm" class="btn btn-primary pull-right" value="SubmitSectionTable">Submit</button>
	</div>
	</div>
	</form>
	</div>
	
	<!-- COODING FOR TAB Six -->
	<div class="tabContent" id="tab6">
    <form name="editLevelTableForm" class="form-horizontal" id="editLevelTableForm" onsubmit="return validation(this.id)"> 
	 
  <div class="form-group">
	 <div class="col-xs-2"></div>
	<div class="col-xs-3">
	<select name="choice" class="form-control" form="editLevelTableForm">
		<option value="editLevelTable">Edit an existing table</option>
		<option value="newLevelTable">New Level Table</option>
	</select> 
	</div>
	</div>
  <div class="form-group">
	<label class="label-control col-xs-2">Level Code         	:</label><div class="col-xs-3"><input type="text" class="form-control" name="levCode" /> </div>
	</div>
  <div class="form-group">
	<label class="label-control col-xs-2">Student Number start      :</label><div class="col-xs-3"><input type="text" class="form-control" name="stuNumS" /> </div>
	</div>
  <div class="form-group">
	<label class="label-control col-xs-2">Student Number projected      :</label><div class="col-xs-3"><input type="text" class="form-control" name="stuNumP" /> </div>
	</div>
  <div class="form-group">
	<label class="label-control col-xs-2">Student Number actual    :</label><div class="col-xs-3"><input type="text" class="form-control" name="stuNumA" /> </div>
	</div>
  <div class="form-group">
  <div class="col-xs-3">
	<button type="submit" form="editLevelTableForm" class="btn btn-primary pull-right" value="editLevelTable">Submit</button>
	</div>
	</div>
	</form>
	</div>
	
	<!-- COODING FOR TAB SEVEN -->
	<div class="tabContent" id="tab7">
     <form name="editProfessorTableForm" class="form-horizontal" id="editProfessorTableForm" onsubmit="return validation(this.id)">
	 <div class="form-group">
		<div class="col-xs-2"></div>
	<div class="col-xs-3">
	<select name="choice" class="form-control" form="editProfessorTableForm">
		<option value="editProfessorTable">Edit an existing table</option>
		<option value="newProfessorTable">New Professor Table</option>
	</select> 
	</div>
	</div>
	  <div class="form-group"><label class="label-control col-xs-2">Professor Code         	:</label><div class="col-xs-3"><input type="text" class="form-control" name="proCode" /> </div>
	 </div> <div class="form-group"><label class="label-control col-xs-2">Professor First Name       :</label><div class="col-xs-3"><input type="text" class="form-control" name="proFnam" /> </div>
	 </div> <div class="form-group"><label class="label-control col-xs-2">Professor Last Name       	:</label><div class="col-xs-3"><input type="text" class="form-control" name="proLnam" /> </div>
	 </div> <div class="form-group"><label class="label-control col-xs-2">Teaching Status          	:</label><div class="col-xs-3"><input type="text" class="form-control" name="tchStatus" /> </div>
	 </div> <div class="form-group"><label class="label-control col-xs-2">Professor Constraints  	:</label><div class="col-xs-3"><input type="text" class="form-control" name="proCon" /> </div>
	 </div> <div class="form-group"><label class="label-control col-xs-2">Weekly Hours			    :</label><div class="col-xs-3"><input type="text" class="form-control" name="weeHou" /> </div>
	 </div> <div class="form-group"><label class="label-control col-xs-2">Hourly Pay				    :</label><div class="col-xs-3"><input type="text" class="form-control" name="houPay" /> </div>
	</div> <div class="form-group"><label class="label-control col-xs-2"> Address: </label><div class="col-xs-3">
		<textarea  rows="10" cols="30" class="form-control" placeholder="Enter Address here"></textarea> </div>
	</div> <div class="form-group"><label class="label-control col-xs-2">Town				        :</label><div class="col-xs-3"><input type="text" class="form-control" name="twn" /> </div>
	</div> <div class="form-group"><label class="label-control col-xs-2">Postal Code                 :</label><div class="col-xs-3"><input type="text" class="form-control" name="pstCod" /> </div>
	</div> <div class="form-group"><label class="label-control col-xs-2">Home phone 					:</label><div class="col-xs-3"><input type="text" class="form-control" name="hmePhn" /> </div>
	</div> <div class="form-group"><label class="label-control col-xs-2">Work phone 					:</label><div class="col-xs-3"><input type="text" class="form-control"  name="wrkPhn" /> </div>
	</div> <div class="form-group"><label class="label-control col-xs-2">Cell phone 					:</label><div class="col-xs-3"><input type="text" class="form-control" name="cellPhn" /> </div>
	</div> <div class="form-group"><label class="label-control col-xs-2">Office Number 				:</label><div class="col-xs-3"><input type="text" class="form-control" name="offNum" /> </div>
	</div> <div class="form-group"><label class="label-control col-xs-2">Professor Suggested			:</label><div class="col-xs-3"><input type="text" class="form-control" name="proSug" /> </div>
	</div> <div class="form-group"><div class="col-xs-3"><button type="submit" form="editProfessorTableForm" class="btn btn-primary pull-right" value="editProfessorTable">Submit</button></div></div>
	 
	 </form>
	 
	 
	</div>
	
	
	
<!-- COODING FOR TAB Eight -->
	<div class="tabContent" id="tab8">
      <form name="editProgramTermTableForm" class="form-horizontal" id="editProgramTermTableForm" onsubmit="return validation(this.id)" >
	 <div class="form-group">
<div class="col-xs-2"></div>
	<div class="col-xs-3">	 
	<select name="choice" class="form-control" form="editProgramTermTableForm">
		<option value="editProgramTermTable">Edit an existing table</option>
		<option value="newProgramTermTable">New Level Table</option>
	</select> 
	</div>
	
	</div> <div class="form-group"><label class="label-control col-xs-2">Term Code     :</label><div class="col-xs-3"><input type="text" class="form-control" name="trmCode" /> </div>
	</div> <div class="form-group"><label class="label-control col-xs-2">Program Code     :</label><div class="col-xs-3"><input type="text" class="form-control" name="proCode" /> </div>
	</div><div class="form-group"><div class="col-xs-3"><button type="submit" form="editProfessorTableForm" class="btn btn-primary pull-right" value="editProfessorTable">Submit</button></div></div>
	</form>
	
	</div>
	
	<!-- COODING FOR TAB Nine -->
	
	<div class="tabContent" id="tab9">
     <form name="UtilityForm" class="form-horizontal" id="UtilityForm" onsubmit="return validation(this.id)" > 
	 <div class="form-group"><label class="label-control col-xs-2">Enter the table to be searched  					:</label><div class="col-xs-3"><input type="text" class="form-control" name="mainSearch" /> </div></div>
	 <div class="form-group"><div class="col-xs-3"><button type="submit" class="btn btn-primary pull-right" form="UtilityForm" value="Utility_view">View</button></div>
	 <div class="col-xs-1"><button type="submit" form="UtilityForm" class="btn btn-primary " value="Utility_print">Print</button></div>
	 <div class="col-xs-1"><button type="submit" form="UtilityForm" class="btn btn-primary " value="Utility_delete">Delete</button></div></div>
	 </form>
	 </div>
	 </div>
	 
	 <script>
	function validation(id) {
	var flag=1;
	id='#'.concat(id);
	 var datafields = $(id).serializeArray();
console.log(datafields);
            var i = 0;
            for(i = 0; i < datafields.length; i++)
            {

                if(datafields[i].value == null || datafields[i].value == '')
                {

                  flag=0;
					alert("Enter all fields");
				return false;
                }
				}
				if(flag==1)
				{
				alert("success");
				return true;
				}
				}
	</script>
	 
	 </body>
</html>