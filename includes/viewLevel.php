<?php
	require("common.php");
	// SQL statement to view all from course
	if(isset($_GET['load']))
	$load=$_GET['load'];
	else
	$load="";
$q = $_GET["q"];	
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
		WHERE
			program_level.program_code='".$q."'
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
<?php if($load=="course") { ?>
<select name="choiceToAddLevelS" id="choiceToAddLevelS" onchange="viewCourse(this.value)" class="form-control" form="editCourseForm" >
<?php } else { ?>
<!--  HTML starts here -->
<select name="choiceToAddLevelCo" id="choiceToAddLevelCo" onchange="loadCapacity(this.value)" class="form-control" form="editCourseForm" >
<?php } ?>
<option value="">Select Level</option>
		<?php foreach($rows as $row): ?>
			
				<option value="<?php echo htmlentities($row['Level_Code'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlentities($row['Level_Code'], ENT_QUOTES, 'UTF-8'); ?></option>
			
			
		<?php endforeach; ?>
		</select>
	