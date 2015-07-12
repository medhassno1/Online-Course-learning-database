<?php
require("common.php");
	// SQL statement to view all from course
$q = $_GET["q"];	

	if(isset($_GET["load"]))
	{
	$level = $_GET["load"];
	}
	else
	$level="";
	// SQL statement to view all from course
    $query = "
        SELECT
			p.program_code,
			p.program_version,
			p.program_name,
			l.level_code,
			t.term_code
        FROM 
			program p,
			term_program t,
			program_level l
			
		WHERE
			p.program_code = t.program_code
			AND
			p.program_code = l.program_code
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
<?php if($level=="level") { ?>
<!--  HTML starts here -->
<select name="users" id="programSelect" onchange="viewLevel(this.value)" name="programSelect" class="form-control" style="width:300px"  >
<?php } 
elseif($level=="levels") { ?>
<select name="users" id="programSelects" onchange="viewLevels(this.value)" name="programSelect" class="form-control" style="width:300px"  >
<?php } 
elseif($level=="cou") { ?>
<select name="users" id="programSelectc" onchange="viewCourse1(this.value)" name="programSelect" class="form-control" style="width:300px"  >
<?php }else { ?>
<select name="users" id="programSelect" onchange="loadProgram(this.value)" name="programSelect" class="form-control" style="width:300px"  > 
<?php } ?>
<option value="">Select a Program</option>
		<?php foreach($rows as $row): ?>
			<option value= "<?php echo htmlentities($row['program_code'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlentities($row['program_code'], ENT_QUOTES, 'UTF-8'); ?> 
			</option>
		<?php endforeach; ?>
		</select>
	