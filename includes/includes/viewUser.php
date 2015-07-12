<?php
require("common.php");
$q = $_GET["q"]; 

// SQL statement to view all from course
    $query = "
        SELECT
			*
        FROM 
			users
		WHERE 
			id = '".$q."'
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

    $rows = $stmt->fetchAll();
	$dServer = array($rows);
//	print_r ($dServer);
?>

<!--  HTML starts here -->
<h2>Program Information</h2>
<table class="table table-bordered table-striped">
	<thead>	
		<tr>
			<th>Program Code</th>
			<th>Program Version</th>
			<th>Program Name</th>
			<th># of Levels</th>		
		</tr>
	</thead>	
    <tbody>
		<?php foreach($rows as $row): ?>
			<tr>
				<td><?php echo htmlentities($row['username'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['password'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['salt'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo $row['user_role']; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>