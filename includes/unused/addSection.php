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
	<title>Add Section</title>

	<link rel="stylesheet" type="text/css" href="../css/tabs.css"/>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	
	<script src="js/tabs.js" type="text/javascript"></script>
	<script src="js/childWindows.js" type="text/javascript"></script>
	<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="js/jquery-ui.js" type="text/javascript"></script>

</head>
<body>
	<h1> Add New Section</h1>
	<form class="form-inline" role="form" name="addSectionForm"id="addSectionForm" onsubmit=""> 		
		<table class="table">
			<thead>	
				<tr>
					<th>Course Code</th>
					<th>Section Code</th>
					<th>Section Size</th>
					<th>Room Code</th>
					<th>Room Description</th>
					<th>Delivery Type 1</th>
					<th>Hours Type 1</th>
					<th>Delivery Type 2</th>
					<th>Hours Type 2</th>
					<th>Delivery Type 3</th>
					<th>Hours Type 3</th>
				</tr>
			</thead>	
			<tbody>
				<tr>
					<td><input type="text" id="couCode" name="couCode" class="form-control" /></td>
					<td><input type="text" id="secCode" name="secCode" class="form-control" /></td>
					<td><input type="text" id="secSiz" name="secSiz" class="form-control" /></td>
					<td><input type="text" id="romCode" name="romCode" class="form-control"/></td>
					<td><input type="text" id="romDes" name="romDes" class="form-control" /></td> 
					<td><input type="radio" name="delTyp1"  value="lab">Lab<br>
						<input type="radio" name="delTyp1"  value="hybrid">Hybrid<br>
						<input type="radio" name="delTyp1"  value="theory">Theory<br>
					</td>
					<td><input type="text" id="hou1" name="hou1" class="form-control" /></td> 
					<td><input type="radio" name="delTyp2"  value="lab">Lab<br>
						<input type="radio" name="delTyp2"  value="hybrid">Hybrid<br>
						<input type="radio" name="delTyp2"  value="theory">Theory<br>
					</td>
					<td><input type="text" id="hou2" name="hou2" class="form-control" /></td>
					<td><input type="radio" name="delTyp3"  value="lab">Lab<br>
						<input type="radio" name="delTyp3"  value="hybrid">Hybrid<br>
						<input type="radio" name="delTyp3"  value="theory">Theory<br>
					</td>
					<td><input type="text" id="hou3" name="hou3" class="form-control" /></td> 
				</tr>
				<tr>
					<td colspan="9"/>
					<td><button type="submit" form="addSectionForm"  class="btn btn-success" value="addSection" onclick="">Submit</button></td>
					<td><button type="submit" form="addSectionForm"	 class="btn btn-danger" value="Cancel" onclick="window.close()"/>Cancel</button></td>
				</tr>	
			</tbody>
		</table>
	</form> 	
</body>
</html>
