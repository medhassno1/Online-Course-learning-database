<?php
require("common.php");
$q = $_GET["q"];	

	
	// SQL statement to view all from course
    $query = "
        SELECT
			
			p.program_name,
			l.level_code,
			p.total_student
			
        FROM 
			program p,
			program_level l
		WHERE
			p.program_code = l.program_code
		AND
			p.program_code = '".$q."'
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
			<th>Program Name</th>
			<th>Level</th>
			<th>Total Number Of Students</th>
			
					
		</tr>
	</thead>	
    <tbody>
		
			<?php foreach($rows as $row): ?>
			<tr>
				
		
				<td><?php echo htmlentities($row['program_name'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['level_code'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['total_student'], ENT_QUOTES, 'UTF-8'); ?></td>
				
			</tr>
		<?php endforeach; ?>
		
	</tbody>
</table>