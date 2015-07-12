<?php
	
	// SQL statement to view all from course
    $query = "
        SELECT
            *
        FROM course
		
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
<h2>Course Information</h2>
<table class="table table-bordered table-striped">
    <thead>
		<tr>
			<th>Course Code</th>
			<th>Course Version</th>
			<th>Course Name</th>
			<th>Level</th>
			<th>Course Mode</th>
			<th>Course Length</th>
			<th>Course Hours</th>
			<th>Exam (y/n)</th>
			<th>Exam Hours</th>
			<th>Course Constraint</th>
			<th>Course Description</th>
			<th>Capacity</th>
			<th>Cost Centre</th>		
		</tr>
	</thead>
	<tbody>
		<?php foreach($rows as $row): ?>
			<tr>
				<td><?php echo htmlentities($row['Course_Code'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['Version'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['Course_Name'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo $row['Level']; ?></td>
				<td><?php echo htmlentities($row['Course_Mode'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo $row['Course_Length']; ?></td>
				<td><?php echo $row['Course_Hours']; ?></td>
				<td><?php echo htmlentities($row['Exam_Exist'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo $row['Exam_Hours']; ?></td>
				<td><?php echo htmlentities($row['Course_Constraint'], ENT_QUOTES, 'UTF-8'); ?></td>	
				<td><?php echo htmlentities($row['Course_Description'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo $row['Capacity']; ?></td>
				<td><?php echo htmlentities($row['CostCentre_Code'], ENT_QUOTES, 'UTF-8'); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>	
</table>
