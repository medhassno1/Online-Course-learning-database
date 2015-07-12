<?php
	
	// SQL statement to view all from course
    $query = "
        SELECT
            *, 
			term_code			
        FROM program p,
			term_program tp
		WHERE
		p.program_code = 
		tp.program_code
		
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
			<th>Semester</th>
			<th>Program Code</th>
			<th>Program Version</th>
			<th>Program Name</th>
			<th>Total Students</th>
			<th>Level</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Coordinator Name</th>
			<th>Coordinator Phone#</th>			
		</tr>
	</thead>	
    <tbody>
		<?php foreach($rows as $row): ?>
			<tr>
				<td><?php echo htmlentities($row['Term_Code'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['Program_Code'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['Program_Version'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['Program_Name'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['Total_Student'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo $row['Level']; ?></td>
				<td><?php echo $row['Start_Date']; ?></td>
				<td><?php echo $row['End_Date']; ?></td>
				<td><?php echo htmlentities($row['Coordinator_Name'], ENT_QUOTES, 'UTF-8'); ?></td>	
				<td><?php echo htmlentities($row['Coordinator_PhoneNumber'], ENT_QUOTES, 'UTF-8'); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>