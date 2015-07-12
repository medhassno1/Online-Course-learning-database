<?php

    // calls connection and session info
    require("includes/common.php");
    require("includes/Courseloading_Save.php");
	
    // check if the user is logged in
    if(empty($_SESSION['user']))
    {
        // if not logged in send them to login page
        header("Location: login.php");
        
        // stop script
        die("Redirecting to login.php");
    }
?>


<!--  HTML starts here -->
<!DOCTYPE html>
<head>

	<meta charset="UTF-8">
	<title>Main User View</title>

	<link rel="stylesheet" type="text/css" href="css/tabs.css"/>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	<script src="js/tabs.js" type="text/javascript"></script>
	<script src="js/jq.js" type="text/javascript"></script>
	<script src="js/childWindows.js" type="text/javascript"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="js/jquery-ui.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js"></script>
	
<script>
function showTerm(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","includes/viewProgram.php?q="+str,true);
xmlhttp.send();
}



</script>
<script>
function showProgram(str)
{
if (str=="")
  {
  document.getElementById("load_program").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("load_program").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","includes/selectProgram.php?q="+str,true);
xmlhttp.send();
}



</script>
<script>
function showProgram1(str)
{
if (str=="")
  {
  document.getElementById("sel_program").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("sel_program").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","includes/selectProgram.php?q="+str+"&load=level",true);
xmlhttp.send();
}



</script>
<script>
function showProgram2(str)
{
if (str=="")
  {
  document.getElementById("sel_program1").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("sel_program1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","includes/selectProgram.php?q="+str+"&load=levels",true);
xmlhttp.send();
}



</script>
<script>
function showProgram3(str)
{
if (str=="")
  {
  document.getElementById("sel_program3").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("sel_program3").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","includes/selectProgram.php?q="+str+"&load=cou",true);
xmlhttp.send();
}



</script>

<script>
function loadProgram(str)
{
if (str=="")
  {
  document.getElementById("program_loading").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("program_loading").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","includes/loadProgram.php?q="+str,true);
xmlhttp.send();
}



</script>
<script>
function viewLevel(str)
{
if (str=="")
  {
  document.getElementById("level_loading").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("level_loading").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","includes/viewLevel.php?q="+str,true);
xmlhttp.send();
}



</script>

<script>
function viewLevels(str)
{
if (str=="")
  {
  document.getElementById("levels_loading").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("levels_loading").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","includes/viewLevel.php?q="+str+"&load=course",true);
xmlhttp.send();
}



</script>

<script>
function loadCapacity(str)
{
var program_code =  document.getElementById("programSelect").value;
if (str=="")
  {
  document.getElementById("capacity_load").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("capacity_load").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","includes/loadCapacity.php?q="+str+"&p="+program_code,true);
xmlhttp.send();
}



</script>

<script>
function viewCourse1(str)
{
var program_code =  document.getElementById("programSelects").value;


if (str=="")
  {
  document.getElementById("coursess_load").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("coursess_load").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","includes/viewCourse.php?q="+str+"&p="+program_code,true);
xmlhttp.send();
}



</script>

<script>
function viewCourse1(str)
{



if (str=="")
  {
  document.getElementById("course1_load").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("course1_load").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","includes/viewCourse1.php?q="+str,true);
xmlhttp.send();
}



</script>

<script>
function loadCour(str)
{



if (str=="")
  {
  document.getElementById("cour_des").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("cour_des").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","includes/loadCour.php?q="+str,true);
xmlhttp.send();
}



</script>

<script>
function loadProfessor(str)
{



if (str=="")
  {
  document.getElementById("load_professor").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("load_professor").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","includes/loadProfessor.php?q="+str,true);
xmlhttp.send();
}



</script>


<script>
function loadSec(str)
{


if (str=="")
  {
  document.getElementById("sec_load").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("sec_load").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","includes/viewSection.php?q="+str,true);
xmlhttp.send();
}



</script>

 <script>
		$(document).ready(function () {
			$("input#submit").click(function(){
				$.ajax({
					type: "POST",
					url: "includes/addProgram.php", // 
					data: $('form.contact').serialize(),
					success: function(msg){
						$("#thanks").html(msg)
						$("#form-content").modal('hide');	
					},
					error: function(){
						alert("failure");
					}
				});
			});
		});
    </script>
	
	 <script>
		$(document).ready(function () {
			$("input#editcapa").click(function(){
			var lvl_code = $("#choiceToAddLevelCo").val();
			var lvl_capacity = $("#cpLvl").val();
			var data = {'cpLvl' : lvl_code,
						'choiceToAddLevelCo' : lvl_capacity }
				$.ajax({
					type: "POST",
					url: "includes/editCap.php", // 
					data: data,
					success: function(msg){
						
							
					},
					error: function(){
						alert("failure");
					}
				});
			});
		});
    </script>
	
	 <script>
		function edit_cu(str) {
			var id = "form.contact".concat(str);
			var temp = "#form-content".concat(str);
			var ty = "#thanks3".concat(str);
		
			var data = $(id).serialize();
			
				$.ajax({
					type: "POST",
					url: "includes/editCourse.php", // 
					data: data,
					success: function(msg){
						$(ty).html(msg);
						$(temp).modal('hide');	
					},
					error: function(){
						alert("failure");
					}
				});
			}
		
    </script>
	
	<script>
		$(document).ready(function () {
			$("input#add_course").click(function(){
				$.ajax({
					type: "POST",
					url: "includes/addCourse.php", // 
					data: $('form.contact').serialize(),
					success: function(msg){
						$("#thanks1").html(msg)
						$("#form-content1").modal('hide');	
					},
					error: function(){
						alert("failure");
					}
				});
			});
		});
    </script>
	
	<script>
		$(document).ready(function () {
			$("input#AddSec").click(function(){
			
				$.ajax({
					type: "POST",
					url: "includes/addSec.php", // 
					data: $('form.editCourseSectionForm').serialize(),
					success: function(msg){
						$("#thanks2").html(msg)
						
					},
					error: function(){
						alert("failure");
					}
				});
			});
		});
    </script>
	
</head>

<body onload="init();" onFocus="parentDisable();" onclick="parentDisable();">
	<div class="container">
		<div class="float:left;">
			<h1>Welcome Main User </h1>
		</div>
		<div style="float:right">
			<a href="logout.php" class="btn btn-danger btn-large">Logout</a>
		</div>

		<ul id="tabNav">
			<li><a href="#tab1">Term</a></li>
			<li><a href="#tab2">Program</a></li>
			<li><a href="#tab3">Program Loading</a></li>
			<li><a href="#tab4">Course</a></li>
			<li><a href="#tab5">Course-Section</a></li>
			<li><a href="#tab6">Course Loading</a></li>
			<li><a href="#tab7">Professor</a></li>
		</ul>
	
	
		<!-- COODING FOR TAB THREE -->
 <!--   
	

	<!-- COODING FOR drop down bar -->
<!-- 
	
	
	
	
	
	
	
	
	
	
		<!-- COODING FOR TAB ONE -->
		<div class="tabContent" id="tab1">
			<form name="editTermForm" class="form-horizontal" id="editTermForm" action="includes/addTerm.php" onsubmit="return validation(this.id)" method="post">
				<div class="form-group">
					<div class="col-xs-2"><label class="label-control">Terms:</label></div>
					<div class="col-xs-3">
			
						<!-- COODING FOR drop down bar -->
						<select id="trmCodeSelect" name="trmCodeSelect" class="form-control" >
							<?php 
								require("includes/selectTerm.php"); 
							?>
						</select>
					
					</div>
				</div>
				<div class="form-group">
					<label class="label-control col-xs-2">Add New Term :</label>
						<div class="col-xs-3">
							<input type="text" id="trmCode" name="trmCode" class="form-control" /> 
						</div>
				</div><br>
						
				<!-- COODING FOR the add the term button -->
				<div class="form-group">
					<div class="col-xs-3">
						<button type="submit" form="editTermForm"  class="btn btn-primary" value="SubmitTermValue">Add Term</button>
					</div>
				</div>
			</form> 
		</div>	

						
		<!-- COODING FOR TAB TWO -->
		<div class="tabContent" id="tab2">
			<form name="editProgramForm" id="editProgramForm" action="" onsubmit="" method="post">
				<div class="col-xs-3">
				<select name="users" onchange="showTerm(this.value)"id="trmCodeSelect2" name="trmCodeSelect2" class="form-control"  >
					<option value="">Select a term:</option>
					<?php 
							require("includes/selectTerm.php"); 
					?>
				</select></div>
				<div class="col-xs-3">
				copy from </div><div class="col-xs-3">
				<select id="trmCodeSelect3" name="trmCodeSelect3" class="form-control" >
						<?php 
							require("includes/selectTerm.php"); 
						?>
				</select></div><div class="col-xs-3">
				<button type="submit" form="editProgramForm"  class="btn btn-success">Import</button></div>
				
				<div id="txtHint"><b>Person info will be listed here.</b>
				</div>
				</form>
				<div id="form-content" class="modal hide fade in" style="display: none;">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Add new Program</h3>
			</div>
			<div class="modal-body">
				<form class="contact" name="program">
				<label class="label" for="term">Term</label><br>
				<select id="trmCodeSelect" name="trmCodeSelect" class="form-control" >
							<?php 
								require("includes/selectTerm.php"); 
							?>
						</select><br>
					<label class="label" for="code">Program Code</label><br>
					<input type="text" name="code" class="input-xlarge"><br>
					<label class="label" for="version">Program Version</label><br>
					<input type="text" name="version" class="input-xlarge"><br>
					<label class="label" for="name">Program Name</label><br>
					<input type="text" name="name" class="input-xlarge"><br>
					<label class="label" for="total">Total Student</label><br>
					<input type="text" name="total_student" class="input-xlarge"><br>
					<label class="label" for="level">Level</label><br>
					<input type="text" name="level" class="input-xlarge"><br>
					<label class="label" for="start_date">Start Date</label><br>
					<input type="date" name="start_date" class="input-xlarge"><br>
					<label class="label" for="end_date">End Date</label><br>
					<input type="date" name="end_date" class="input-xlarge"><br>
					<label class="label" for="Co ordinator Name">Co-ordinator Name</label><br>
					<input type="text" name="cooname" class="input-xlarge"><br>
					<label class="label" for="Phone no">Phone number</label><br>
					<input type="text" name="phono" class="input-xlarge"><br>
					
				</form>
			</div>
			<div class="modal-footer">
				<input class="btn btn-success" type="submit" value="Add" id="submit">
				<a href="#" class="btn" data-dismiss="modal">Cancel</a>
			</div>
		</div>
				<div id="thanks"><p></p></div>

				<a data-toggle="modal" href="#form-content" class="btn btn-primary">Add New Program</a>
			</form>	
			</div>
			<!-- COODING FOR TAB THREE -->
			<div class="tabContent" id="tab3">
			<form name="programLoadingForm" id="programLoadingForm" action="" onsubmit="" method="post">
				<select name="users" onchange="showProgram(this.value)" id="trmCodeSelect4" name="trmCodeSelect4" class="form-control" style="width:300px"  >
					<option value="">Select a term:</option>
					<?php 
							require("includes/selectTerm.php"); 
					?>
				</select><br>
				<div id="load_program">
				<select  class="form-control" style="width:300px"  >
					<option value="">Select a Program:</option>
					
				</select>
				</div>
				<div id="program_loading">
				Program loading will be here
				</div>
				
			</form>
		</div>
		<!-- COODING FOR TAB FOUR -->
		<div class="tabContent" id="tab4">
			
	 
				<!-- Choose Term here -->
				<div class="form-group">
					<label class="label-control col-xs-2">Please Choose the term  </label>    
					<div class="col-xs-3">
						<select name="choiceToAddCo" onchange="showProgram1(this.value)" id="choiceToAddCo" class="form-control" form="editCourseForm" >
							<option value="">Select a term:</option>
							<?php 
							require("includes/selectTerm.php"); 
					?>
						</select> 
					</div>
				</div> 
	
				<!-- Choose Program  here --> 
				<div class="form-group">
					<label class="label-control col-xs-2">Please Choose the Program  </label>    
					<div class="col-xs-3" id="sel_program">
						<select name="choiceToAddProgramCo" class="form-control" form="editCourseForm" >
						
							<option value="">Select a Program</option>
						</select> 
					</div>
				</div> 
	
				<!-- Choose Level here  here --> 
				
				<div class="form-group">
					<label class="label-control col-xs-2">Please Choose the Level </label>  
					<div class="col-xs-3" id="level_loading">
						<select name="choiceToAddLevelCo" class="form-control" form="editCourseForm" >
							
							
						</select> 
					</div>
				</div> 
	
				<!-- Choose capacity  here  here --> 
				<div  id="capacity_load">
					<label class="label-control col-xs-2">Capacity for the Level       	:</label><div class="col-xs-3">
					<input type="text" class="form-control" name="cpLvl" value="" /> </div>
				
				
					<div class="col-xs-3">
						<button type="submit" id="edit" class="btn btn-primary " value="SaveCapacity">Save</button>
					</div>
				<br>
	
	
				<!-- COODING FOR table -->
				
				</div><br>
	
			<!-- COODING Adding New course button -->
			
		
		<div id="form-content1" class="modal hide fade in" style="display: none;">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Add new Course</h3>
			</div>
			<div class="modal-body">
				<form class="contact1" name="program">
				<label class="label" for="term">Program Code</label><br>
				<select id="prgCodeSelect" name="prgCodeSelect" class="form-control" >
							<?php 
								require("includes/chooseProgram.php"); 
							?>
						</select><br>
					<label class="label" for="code">Course Code</label><br>
					<input type="text" name="code" class="input-xlarge"><br>
					<label class="label" for="version">Course Version</label><br>
					<input type="text" name="version" class="input-xlarge"><br>
					<label class="label" for="name">Course Name</label><br>
					<input type="text" name="name" class="input-xlarge"><br>
					<label class="label" for="level">Level</label><br>
					<input type="text" name="level" class="input-xlarge"><br>
					<label class="label" for="level">Course Mode</label><br>
					<select name="mode">
					<option value="theory">Theory</option>
					<option value="lab">Lab</option>
					<option value="hybrid">Hybrid</option>
					</select>
					<br>
					<label class="label" for="level">Course Length</label><br>
					<input type="text" name="length" class="input-xlarge"><br>
					<label class="label" for="level">Course Hours</label><br>
					<input type="text" name="hours" class="input-xlarge"><br>
					<label class="label" for="level">CostCenter_Code</label><br>
					<input type="text" name="center_code" class="input-xlarge"><br>
					
				</form>
			</div>
			<div class="modal-footer">
				<input class="btn btn-success" type="submit" value="Add" id="add_course">
				<a href="#" class="btn" data-dismiss="modal">Cancel</a>
			</div>
		</div>
				<div id="thanks1"><p></p></div>
				<a data-toggle="modal" href="#form-content1" class="btn btn-primary">Add New Course</a>
	</div>
	
		
		
		
		
		
		
		
		<!-- COODING FOR TAB FIVE -->
		<div class="tabContent" id="tab5">
	
     <form name="editCourseSectionForm" class="editCourseSectionForm" id="editCourseSectionForm" onsubmit="return validation(this.id)"> 
	 
	 <!-- Choose Term here -->
	 <div class="form-group">
	<label class="label-control col-xs-2">Please Choose the term  </label>    
		
	<div class="col-xs-3">
	<select name="choiceToAddCoS" onchange="showProgram2(this.value)" id="choiceToAddCoS" class="form-control" form="editCourseSectionForm" >
		<option value="">Select a term:</option>
							<?php 
							require("includes/selectTerm.php"); 
					?>
	</select> 
	</div>
	</div>
	 <!-- Choose Program  here --> 
	<div class="form-group">
					<label class="label-control col-xs-2">Please Choose the Program  </label>    
					<div class="col-xs-3" id="sel_program2">
						<select name="choiceToAddProgramS" class="form-control" form="editCourseForm" >
						
							<option value="">Select a Program</option>
						</select> 
					</div>
				</div> 
	
	 <!-- Choose Level here  here --> 
	 <div class="form-group" >
	<label class="label-control col-xs-2">Please Choose the Level </label>  
	<div class="col-xs-3" id="levels_loading">
	<select name="choiceToAddLevelCoS" class="form-control" form="editCourseSectionForm" >
		<option value="">Select Level</option>
		
	</select> 
	</div>
	</div> 


	
	 <!-- Choose Course here   --> 
	 <div class="form-group">
	<label class="label-control col-xs-2">Please Choose the Level </label>  
	<div class="col-xs-3" id="coursess_load">
	<select name="choiceToAddLevelCoS" class="form-control" form="editCourseSectionForm" >
		<option value="">Select Course</option>
		
	</select> 
	</div>
	</div> 
	
	
		<!-- COODING FOR table -->
		<div id="sec_load">
	
</div>


	<!-- Add new section--> 
	<div class="form-group"><label class="label-control col-xs-2">Section Number       	:</label><div class="col-xs-3"><input type="text" class="form-control" name="SctNum" /> </div>
	</div>
	
	<div class="form-group"><label class="label-control col-xs-2">Delivery Type    	:</label><div class="col-xs-3"><input type="text" class="form-control" name="DlvTyp" /> </div>
	</div>
	
	<div class="form-group"><label class="label-control col-xs-2">Capacity  	:</label><div class="col-xs-3"><input type="text" class="form-control" name="Capacity" /> </div>
	</div>
	
	<div class="form-group">
	<div class="col-xs-3">
	<input type="submit" form="editCourseSectionForm" id="AddSec" class="btn btn-primary " value="Add New Section" />
	</div>
	</div>
	<div id="thanks2"><p></p></div>
	</form>
	
	</div>
		
		
		
		
		<!-- COODING FOR TAB SIX -->
		<div class="tabContent" id="tab6">
		
					 <form name="editCourseLoadingForm" class="form-horizontal" id="editCourseLoadingForm" onsubmit="return validation(this.id)"> 
					 
					 <!-- Choose Term here -->
					 <div class="form-group">
					<label class="label-control col-xs-2">Please Choose the term  </label>    
						
					<div class="col-xs-3">
					<select name="choiceToAddCoL" onchange="showProgram3(this.value)" class="form-control" form="editCourseLoadingForm" >
						<option value="">Select a term:</option>
							<?php 
							require("includes/selectTerm.php"); 
					?>
					</select> 
					</div>
					</div>
					 <!-- Choose Program  here --> 
					<div class="form-group">
					<label class="label-control col-xs-2">Please Choose the Program  </label>    
						
					<div class="col-xs-3" id="sel_program3">
						<select name="choiceToAddProgramCoL" class="form-control" form="editCourseForm" >
						
							<option value="">Select a Program</option>
						</select> 
					</div>
					</div> 
					
					

					
					 <!-- Choose Course here   --> 
					 <div class="form-group">
					<label class="label-control col-xs-2">Please Choose the Course </label>  
					<div class="col-xs-3" id="course1_load">
					<select name="choiceToAddLevelCoL" class="form-control" form="editCourseLoadingForm" >
						<option value="">Select Course</option>
					</select> 
					</div>
					</div>


<div id="cour_des">
				<!-- COODING FOR table -->
					
				</div>
				<!-- COODING Adding New course button -->
					<div class="form-group">
					<div class="col-xs-3">
					<button type="submit" form="editCourseLoadingForm" class="btn btn-primary" value="SaveData">Save</button>
					</div>
					</div>
					</form>
					</div>
		
		
		
		
		
		
	 
		<?php
		/*
		  while ($row = $stmt->fetch_assoc()): ?>
            <tr class="<?php echo $row['user_id']; ?>">
                <td><input type="text" value="<?php echo $row['couse name']; ?>" /></td>
                <td><input type="text" value="<?php echo $row['section']; ?>" /></td>
                <td><input type="text" value="<?php echo $row['professor']; ?>" /></td>
				 <td><input type="text" value="<?php echo $row['room no']; ?>" /></td>
				  <td><input type="text" value="<?php echo $row['description']; ?>" /></td>
            </tr>
        <?php endwhile; ?>
		
		
		// Detect if there was XHR request
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $fields = array('row', 'column', 'text');
    $sqlFields = array('name', 'section', 'professor', 'room no', 'description');
 
    foreach ($fields as $field) {
        if (!isset($_POST[$field]) || strlen($_POST[$field]) <= 0) {
            sendError('No correct data');
            exit();
        }
    }
 
   
 
    $userQuery = sprintf("UPDATE course_load SET %s='%s' WHERE course_id=%d",
            $sqlFields[intval($_POST['column'])],
            $db->real_escape_string($_POST['text']),
            $db->real_escape_string(intval($_POST['row'])));
    $stmt = $db->query($userQuery);
    if (!$stmt) {
        sendError('Update failed');
        exit();
    }
 
}
		*/ ?>
		<!-- COODING FOR TAB SEVEN -->
		<div class="tabContent" id="tab7">
		<form name="editProfessorForm" class="form-horizontal" id="editProfessorForm" onsubmit="return validation(this.id)"> 
			<!-- Choose Course here   --> 
			<div class="form-group">
			<label class="label-control col-xs-2">Please Choose the Professor </label>  
			<div class="col-xs-3">
				<select name="choiceToAddLevelCoL" id="choiceToAddLevelCoL" onchange="loadProfessor(this.value)" class="form-control" form="editProfessorForm" >
				<option value="">Select Professor</option>
					<?php
					require("includes/selectProfessor.php"); 
					?>
				</select>
				</div>
				</div> <br>
				<!-- Add new Prof Button -->
				<div class="form-group">
				<div class="col-xs-3">
				<button type="submit" form="editProfessorForm" class="btn btn-primary" value="AddProf">Add new Professor</button>
				</div>
				</div> <br>
				<div id="load_professor">
				<!-- COODING FOR table -->

			
				
			
			  
				</div>
				
				
					<!-- Add new Prof Button -->
				
				</form>
				</div>
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