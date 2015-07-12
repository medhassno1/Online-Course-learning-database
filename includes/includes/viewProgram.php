<?php
require("common.php");
$q = $_GET["q"];	

	
	// SQL statement to view all from course
    $query = "
        SELECT
			p.program_code,
			p.program_version,
			p.program_name,
			p.level,
			t.term_code
        FROM 
			program p,
			term_program t
			
		WHERE
			p.program_code = t.program_code
		AND	
			t.term_code = '".$q."'
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
			<th>Term</th>
			<th>Program Code</th>
			<th>Program Version</th>
			<th>Program Name</th>
			<th># of Levels</th>		
		</tr>
	</thead>	
    <tbody>
		<?php foreach($rows as $row): ?>
			<tr>
				<td><?php echo htmlentities($row['term_code'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['program_code'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['program_version'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['program_name'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo $row['level']; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>