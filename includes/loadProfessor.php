<?php
require("common.php");
$q = $_GET["q"];	

	
	// SQL statement to view all from course
    $query = "
        SELECT
			*
        FROM 
			professor
			
		WHERE
			professor_code = '".$q."'
		
    ";
    
    try
    {
        // tries to execute the query against the database
        $stmt = $db->prepare($query);
        $stmt->execute();
    }
    catch(PDOException $ex)
    {
        // traps any errors while connecting to database
		// $ex->getMessage() is for testing purposes and will need to remove for final release
        die("Failed to run query: " . $ex->getMessage());
    }
        
    // gets an array all of the found rows
    $rows = $stmt->fetchAll();

?>

<!--  HTML starts here -->
<h2>Program Information</h2>
<table class="table table-bordered table-striped">
	<thead>	
		<tr>
			<th>Professor Name</th>
			<th>ID</th>
			<th>Professor Constraint</th>
			<th>Phone Number</th>
			<th>Email Address</th>	
			<th>Office Number</th>			
		</tr>
	</thead>	
    <tbody>
		<?php foreach($rows as $row): ?>
			<tr>
				<td><?php echo htmlentities($row['Professor_FirstName'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['Professor_Code'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['Professor_Constraints'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['Cell_Phone'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo htmlentities($row['Office_Number'], ENT_QUOTES, 'UTF-8'); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<br />
				<br />
				<br />
				<div class="form-group">
				<label class="label-control col-xs-2">Course/section Assigned to each professor</label>  
				</div> 
					
				<table border= "4">
				<!-- COODING FOR table -->
				 
			  <tr>
					 <th>Course ID</th>
					<th>Course Name </th>
					<th>Section</th>
					<th>Delivery type</th>
					
			  </tr>
<?php 

$q = $_GET["q"];	

	
	// SQL statement to view all from course
    $query = "
        SELECT
			*
        FROM 
			professor p
		INNER JOIN
			course_professor cp on
			p.professor_code = cp.professor_code
		INNER JOIN
			course c on
			cp.course_code = c.course_code
		INNER JOIN
			section s on
			s.course_code = c.course_code
		WHERE
			p.professor_code = '".$q."'
		
    ";
    
    try
    {
        // tries to execute the query against the database
        $stmt = $db->prepare($query);
        $stmt->execute();
    }
    catch(PDOException $ex)
    {
        // traps any errors while connecting to database
		// $ex->getMessage() is for testing purposes and will need to remove for final release
        die("Failed to run query: " . $ex->getMessage());
    }
	$cour = array();
        
    // gets an array all of the found rows
    $rows = $stmt->fetchAll();
	$i=0;
?>			  
			  <?php foreach($rows as $row): 
			  
			  $cour[$i] = $row['Course_Code'];
			  ?>
			<tr>
				<td><?php echo htmlentities($row['Course_Code'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['Course_Name'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['Section_Code'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['delivery'], ENT_QUOTES, 'UTF-8'); ?></td>
				
			</tr>
		<?php $i++; endforeach; 
		
		  $query = "
        SELECT
			*
        FROM 
			course
			
		
		
    ";
  
        // tries to execute the query against the database
        $stmt = $db->prepare($query);
        $stmt->execute();
		
		$rows = $stmt->fetchAll();
		
		$cou = array();
		$k=0;
		?>
		</table><br>
	
			<div id="form-prof-cou" class="modal hide fade in" style="display: none;">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Add new Course</h3>
			</div>
			<div class="modal-body">
				<form class="add_profcou" >
					<label for "course">Select Course</label>
					<input type="hidden" name="prof_id" value="<?php echo $q; ?>" />
					<select name="course" class="form-control">
					 <?php foreach($rows as $row):
						if(count($cour)>0) {
					for($j=0;$j<count($cour);$j++) {
						if($cour[$j]!=$row['Course_Code'])
						$cou[$k] = $row['Course_Code']; } }
						else
							$cou[$k] = $row['Course_Code'];
						?>
						<?php $k++; endforeach; ?>
						<?php for($i=0;$i<count($cou);$i++) {
					?>
					<option value="<?php echo $cou[$i]; ?>"><?php echo $cou[$i]; ?></option> <?php } ?>
					</select>
				</form>
			</div>
			<div class="modal-footer">
				<input class="btn btn-success" type="submit" value="Add" id="add_profcou" onclick = "add_cu(this.id)" />
				<a href="#" class="btn" data-dismiss="modal">Cancel</a>
			</div>
		</div>
	
				<div id="thanks-prof_cou"><p></p></div>
				<a data-toggle="modal" href="#form-prof-cou" class="btn btn-primary">Add course to this Professor</a><br>