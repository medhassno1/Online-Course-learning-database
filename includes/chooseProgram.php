<?php
 $query = "
        SELECT
			*				
        FROM 
			program
		ORDER BY
			program_code DESC
				
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

		<?php foreach($rows as $row): ?>
			<option value= "<?php echo htmlentities($row['Program_Code'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlentities($row['Program_Code'], ENT_QUOTES, 'UTF-8'); ?> 
			</option>
		<?php endforeach; ?>
	