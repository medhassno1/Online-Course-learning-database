<?php
	
	// SQL statement to view all from course
    $query = "
        SELECT
			*				
        FROM section
				
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
<h2>Section Information</h2>
<table class="table table-bordered table-striped">
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
		<?php foreach($rows as $row): ?>
			<tr>
				<td><?php echo htmlentities($row['Course_Code'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['Section_Code'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo $row['Section_Size']; ?></td>
				<td><?php echo htmlentities($row['Room_Code'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['Room_Description'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['Delivery_Type1'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo $row['Hours_Type1']; ?></td>
				<td><?php echo htmlentities($row['Delivery_Type2'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo $row['Hours_Type2']; ?></td>
				<td><?php echo htmlentities($row['Delivery_Type3'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo $row['Hours_Type3']; ?></td>			
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>