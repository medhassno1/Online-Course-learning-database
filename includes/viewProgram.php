<?php
require("common.php");
$q = $_GET["q"];	

	
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
$i=0;
?>

<!--  HTML starts here -->
<h2>Program Information</h2>
<table class="table  table-striped" border="4">
	<thead>	
		<tr>
			<th>Term</th>
			<th>Program Code</th>
			<th>Program Version</th>
			<th>Program Name</th>
			<th># of Levels</th>
				<th>Actions</th>
		</tr>
	</thead>	
    <tbody>
		<?php foreach($rows as $row): ?>
			<tr>
				<td><?php echo htmlentities($row['term_code'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['program_code'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['program_version'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['program_name'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo $row['level_code']; ?></td>
				<td><?php
				$co = $row['program_code'];
						 $query = "
        SELECT 
			*
		FROM 
			program p,
			program_level l
		WHERE
			p.program_code = l.program_code
			AND
			p.program_code='".$co."'
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
    $rowss = $stmt->fetchAll();
					?>
			<div id="form-pro<?php echo $i; ?>" class="modal hide fade in" style="display: none;">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Edit Program</h3>
			</div>
			<div class="modal-body">
				<form class="pro<?php echo $i; ?>" name="program">
				
				 <?php foreach($rowss as $rowe): ?>
				 <input type="hidden" name="code" value="<?php echo $rowe['Program_Code']; ?>"><br>
					<label class="label" for="version">Program Version</label><br>
					<input type="text" name="version" class="input-xlarge" value="<?php echo $rowe['Program_Version']; ?>"><br>
					<label class="label" for="name">Program Name</label><br>
					<input type="text" name="name" class="input-xlarge" value="<?php echo $rowe['Program_Name']; ?>"><br>
					<label class="label" for="name">Level</label><br>
					<select id="trmCodeSelect" name="level" class="form-control" >
							<?php require('selectLevel.php'); ?>
						</select><br>
					
					 <?php endforeach; ?>
				
			</div>
			<div class="modal-footer">
				<input class="btn btn-success" type="submit" value="Edit" id="<?php echo $i; ?>" onclick = "edit_pro(this.id)">
				<a href="#" class="btn" data-dismiss="modal">Cancel</a>
			</div>
			</form>
		</div>
				
				<a data-toggle="modal" href="#form-pro<?php echo $i; ?>" class="btn btn-primary">Edit</a></td>
			</tr>
		<?php $i++; endforeach; ?>
	</tbody>
</table>