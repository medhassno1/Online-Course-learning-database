<?php
	require("common.php");
	// SQL statement to view all from course
	
$q = $_GET["q"];	
	// SQL statement to view all from course
    $query = "
        SELECT 
			*
		FROM 
			course c
		INNER JOIN 
			section s on
			c.course_code = s.course_code
		INNER JOIN
			course_professor p on
			c.course_code = p.course_code
		WHERE
			c.course_code='".$q."'
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
<table  border="4">
  <tr>
 
	<th>Course Name</th>
	  <th>Section</th>
		<th>Delivery Mode</th>
		<th>Number Of Students</th>
	  <th>Professor</th>
		<th>Room Code</th>
		<th>Room Description</th>
		
	
  </tr>
		<?php foreach($rows as $row): ?>
			<tr>
				<td><?php echo htmlentities($row['Course_Name'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['Section_Code'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['delivery'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['Section_Size'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['Professor_Code'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['Room_Code'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['Room_Description'], ENT_QUOTES, 'UTF-8'); ?></td>
				
			</tr>
			
		<?php endforeach; ?>
		</table>
	