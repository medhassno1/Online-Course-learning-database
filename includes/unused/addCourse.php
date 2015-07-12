<?php
	
	// calls connection and session info
    require("common.php");
    
    // check if the user is logged in
    if(empty($_SESSION['user']))
    {
        // if not logged in send them to login page.
        header("Location: ../login.php");
        
        // stop script
        die("Redirecting to login.php");
    }
?>

<!--  HTML starts here -->
<!DOCTYPE html>
<head>

	<meta charset="UTF-8">
	<title>Add Course</title>

	<link rel="stylesheet" type="text/css" href="../css/tabs.css"/>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	
	<script src="js/tabs.js" type="text/javascript"></script>
	<script src="js/childWindows.js" type="text/javascript"></script>
	<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="js/jquery-ui.js" type="text/javascript"></script>

</head>
<body>
	<h1> Add New Course</h1>
	<form class="form-inline" role="form" name="addProgramForm"id="addProgramForm" onsubmit=""> 		
		<table class="table">
			<thead>	
				<tr>
					<th>Course Code</th>
					<th>Course Version</th>
					<th>Course Name</th>
					<th>Program Code</th>
					<th>Level</th>
					<th>Course Mode</th>
					<th>Course Length </th>
					<th>Course Hours</th>
					<th>Exam exist?</th>
					<th>Exam hours</th>
					<th>Course Constraints</th>
					<th>Course Description</th>
					<th>Capacity</th>
					<th>Course Centre Code</th>
				</tr>
			</thead>	
			<tbody>
				<tr>
					<td><input type="text" id="couCode" name="couCode" class="form-control" /></td>
					<td><input type="text" id="couVer" name="couVer" class="form-control" /></td>
					<td><input type="text" id="couNam" name="couNam" class="form-control" /></td>
					<td><input type="text" id="proCode" name="proCode" class="form-control"/></td>
					<td><input type="text" id="lvlCou" name="lvlCou" class="form-control" /></td> 
					<td><input type="text" id="couMod" name="couMod" class="form-control" /></td> 
					<td><input type="text" id="couLen" name="couLen" class="form-control" /></td> 
					<td><input type="text" id="couHou" name="couHou" class="form-control" /></td> 
					<td><input type="text" id="exaExi" name="exaExi" class="form-control" /></td> 
					<td><input type="text" id="exaHou" name="exaHou" class="form-control" /></td>
					<td><input type="text" id="couCon" name="couCon" class="form-control" /></td>
					<td><input type="text" id="couDes" name="couDes" class="form-control" /></td>
					<td><input type="text" id="capCou" name="capCou" class="form-control" /></td>
					<td><input type="text" id="couCenCod" name="couCenCod" class="form-control" /></td>
					
				</tr>
				<tr>
					<td colspan="12"/>
					<td><button type="submit" form="addCourseForm"  class="btn btn-success" value="addCourse" onclick="">Submit</button></td>
					<td><button type="submit" form="addCourseFormForm"	 class="btn btn-danger" value="Cancel" onclick="window.close()"/>Cancel</button></td>
				</tr>	
			</tbody>
		</table>
	</form> 	
</body>
</html>
