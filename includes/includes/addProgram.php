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
	<title>Add Program</title>

<!--	<link rel="stylesheet" type="text/css" href="../css/tabs.css"/>
-->	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	
	<script src="js/tabs.js" type="text/javascript"></script>
	<script src="js/childWindows.js" type="text/javascript"></script>
	<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="js/jquery-ui.js" type="text/javascript"></script>

</head>
<body>
	<h1> Add New Program</h1>
	<form class="form-inline" role="form" name="addProgramForm"id="addProgramForm" onsubmit=""> 		
		<table class="table">
			<thead>	
				<tr>
					<th>Semster</th>
					<th>Program Code</th>
					<th>Program Version</th>
					<th>Program Name</th>
					<th>Total Students</th>
					<th>Level</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Coordinator Name</th>
					<th>Coordinator Phone</th>			
				</tr>
			</thead>	
			<tbody>
				<tr>
					<td><input type="text" id="trmCode" name="trmCode" class="form-control" /></td>
					<td><input type="text" id="proCode" name="proCode" class="form-control" /></td>
					<td><input type="text" id="proVer" name="proVer" class="form-control" /></td>
					<td><input type="text" id="proNam" name="proNam" class="form-control"/></td>
					<td><input type="text" id="totSu" name="totSu" class="form-control" /></td> 
					<td><input type="text" id="lvlPro" name="lvlPro" class="form-control" /></td> 
					<td><input type="date" id="staDat" name="staDat" class="form-control" /></td> 
					<td><input type="date" id="endDat" name="endDat" class="form-control" /></td> 
					<td><input type="text" id="cooNam" name="cooNam" class="form-control" /></td> 
					<td><input type="text" id="phoNam" name="phoNam" class="form-control" /></td>
				</tr>
				<tr>
					<td colspan="8"/>
					<td><button type="submit" form="addProgramForm"  class="btn btn-success" value="addProgram" onclick="">Submit</button></td>
					<td><button type="submit" form="addProgramForm"	 class="btn btn-danger" value="Cancel" onclick="window.close()"/>Cancel</button></td>
				</tr>	
			</tbody>
		</table>
	</form> 	
</body>
</html>
