<?php
	require("common.php");
	// SQL statement to view all from course
$q = $_GET["q"];	
	// SQL statement to view all from course
    $query = "
        SELECT 
			*
		FROM 
			level
		WHERE
			level_code='".$q."'
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

		<?php foreach($rows as $row): $lvl_capacity = $row['capacity']; ?>
			
				<label class="label-control col-xs-2">Capacity for the Level       	:</label><div class="col-xs-3">
					<input type="text" class="form-control" name="cpLvl" id="cpLvl"  value="<?php echo htmlentities($row['capacity'], ENT_QUOTES, 'UTF-8'); ?>" /> </div>
			
			
		<?php endforeach; ?>
		
	<div class="col-xs-3">
						<button type="button" form="editCourseForm" id = "editcapa" class="btn btn-primary " onclick="changecapacity()" value="SaveCapacity">Save</button>
					</div>
					
				<br>
<?php
		$p = $_GET['p'];
	
    $query = "
        SELECT
            *
        FROM course
		INNER JOIN
		program_course
		ON
		program_course.course_code = course.course_code
		WHERE
		program_course.program_code = '".$p."'
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
	
	$i=2;
?>
<table  border="4">
					<tr>
						<th>Level </th>
						<th>Level Capacity </th>
						<th>Course ID</th>
						<th>Course Name </th>
						<th>Actions</th>
					</tr>
    <?php foreach($rows as $row): 
	
	?>
        <tr>
			<td><?php echo $q; ?></td>
			<td><?php echo $lvl_capacity; ?></td>
			<td><?php echo htmlentities($row['Course_Code'], ENT_QUOTES, 'UTF-8'); ?></td>
			<td><?php echo htmlentities($row['Course_Name'], ENT_QUOTES, 'UTF-8'); ?></td>
			<td>
				<?php
				$co = $row['Course_Code'];
						 $query = "
        SELECT 
			*
		FROM 
			course
		WHERE
			course_code='".$co."'
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
    $rowss = $stmt->fetchAll();
					?>
			<div id="form-content<?php echo $i; ?>" class="modal hide fade in" style="display: none;">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Edit Course</h3>
			</div>
			<div class="modal-body">
				<form class="contact<?php echo $i; ?>" name="program">
				
				 <?php foreach($rowss as $rowe): ?>
					<label class="label" for="code">Course Code</label><br>
					<input type="text" name="code" class="input-xlarge" value="<?php echo $rowe['Course_Code']; ?>"><br>
					<label class="label" for="version">Course Version</label><br>
					<input type="text" name="version" class="input-xlarge" value="<?php echo $rowe['Version']; ?>"><br>
					<label class="label" for="name">Course Name</label><br>
					<input type="text" name="name" class="input-xlarge" value="<?php echo $rowe['Course_Name']; ?>"><br>
					
					<label class="label" for="level">Course Mode</label><br>
					<select name="mode">
					<option value="theory" <?php if($rowe['Course_Mode']=='theory') echo 'selected'; ?>>Theory</option>
					<option value="lab" <?php if($rowe['Course_Mode']=='lab') echo 'selected'; ?>>Lab</option>
					<option value="hybrid" <?php if($rowe['Course_Mode']=='hybrid') echo 'selected'; ?>>Hybrid</option>
					</select>
					<br>
					<label class="label" for="level">Course Length</label><br>
					<input type="text" name="length" class="input-xlarge" value="<?php echo $rowe['Course_Length']; ?>"><br>
					<label class="label" for="level">Course Hours</label><br>
					<input type="text" name="hours" class="input-xlarge" value="<?php echo $rowe['Course_Length']; ?>"><br>
					<label class="label" for="level">CostCenter_Code</label><br>
					<input type="text" name="center_code" class="input-xlarge" value="<?php echo $rowe['CostCentre_Code']; ?>"><br>
					 <?php endforeach; ?>
				
			</div>
			<div class="modal-footer">
				<input class="btn btn-success" type="submit" value="Edit" id="<?php echo $i; ?>" onclick = "edit_cu(this.id)">
				<a href="#" class="btn" data-dismiss="modal">Cancel</a>
			</div>
			</form>
		</div>
				<div id="thanks<?php echo $i; ?>"><p></p></div>
				<a data-toggle="modal" href="#form-content<?php echo $i; ?>" class="btn btn-primary">Edit</a></td>
        </tr>
		
    <?php $i++;  endforeach; ?>
</table>	