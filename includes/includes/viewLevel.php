<?php
	
	// SQL statement to view all from course
    $query = "
        SELECT 
			*
		FROM 
			level
		INNER JOIN 
			program_level
		ON
			level.level_code=
			program_level.level_code
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
<h2>Level Information</h2>
<table class="table table-bordered table-striped">
	<thead>	
		<tr>
			<th>Course Code</th>
			<th>Level Code</th>
			<th>Student Number Start</th>
			<th>Student Number Projected</th>
			<th>Student Number Actual</th>				
		</tr>
	</thead>	
    <tbody>
		<?php foreach($rows as $row): ?>
			<tr>
				<td><?php echo htmlentities($row['Course_Code'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['Level_Code'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo $row['StudentNumber_Start']; ?></td>
				<td><?php echo $row['StudentNumber_Projected']; ?></td>
				<td><?php echo $row['StudentNumber_Actual']; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>