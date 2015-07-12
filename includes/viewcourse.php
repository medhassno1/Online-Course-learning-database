<?php
	require("common.php");
	// SQL statement to view all from course
	$q = $_GET['q'];
	
	$p = $_GET['p'];
	
    $query = "
        SELECT
            *
        FROM course
		INNER JOIN
		program_course
		ON
		program_course.course_code = course.course_code
		WHERE
		program_course.program_code = '".$p."'
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

<select name="AddsecCourse" id="AddsecCourse" onchange="loadSec(this.value)" class="form-control"  >
<option value="">Select Course</option>
    <?php foreach($rows as $row): ?>
       
			<option value="<?php echo htmlentities($row['Course_Code'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlentities($row['Course_Code'], ENT_QUOTES, 'UTF-8'); ?></option>
			
        
    <?php endforeach; ?>
</select>
