<?php
	require("common.php");
	// SQL statement to view all from course
	
$q = $_GET["q"];	
	// SQL statement to view all from course
    $query = "
        SELECT 
			*
		FROM 
			section
		
		WHERE
			course_code='".$q."'
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
	$i=1;
?>
<table  border="4">
  <tr>
 
	<th>Section Number</th>
	  <th>Delivery Type </th>
		<th>Capacity per type</th>
		<th>Actions</th>
		
	
  </tr>
		<?php foreach($rows as $row): ?>
			<tr>
				<td><?php echo htmlentities($row['Section_Code'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['delivery'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlentities($row['Section_Size'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php
				$co = $row['Section_Code'];
						 $query = "
        SELECT 
			*
		FROM 
			section
		WHERE
			section_code='".$co."'
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
			<div id="form-content-sec<?php echo $i; ?>" class="modal hide fade in" style="display: none;">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Edit Section</h3>
			</div>
			<div class="modal-body">
				<form class="section<?php echo $i; ?>" name="program">
				
				 <?php foreach($rowss as $rowe): ?>
					<label class="label" for="code">Section Code</label><br>
					<input type="text" name="code" class="input-xlarge" value="<?php echo $rowe['Section_Code']; ?>"><br>
					<label class="label" for="version">Capacity</label><br>
					<input type="text" name="capacity" class="input-xlarge" value="<?php echo $rowe['Section_Size']; ?>"><br>
					
						<label class="label" for="version">Room Code</label><br>
					<input type="text" name="room_code" class="input-xlarge" value="<?php echo $rowe['Room_Code']; ?>"><br>
					
						<label class="label" for="version">Room Description</label><br>
					<input type="text" name="room_description" class="input-xlarge" value="<?php echo $rowe['Room_Description']; ?>"><br>
					<label class="label" for="level">Delivery</label><br>
					<select name="mode">
					<option value="theory" <?php if($rowe['delivery']=='theory') echo 'selected'; ?>>Theory</option>
					<option value="lab" <?php if($rowe['delivery']=='lab') echo 'selected'; ?>>Lab</option>
					<option value="hybrid" <?php if($rowe['delivery']=='hybrid') echo 'selected'; ?>>Hybrid</option>
					</select>
					
					 <?php endforeach; ?>
				
			</div>
			<div class="modal-footer">
				<input class="btn btn-success" type="submit" value="Edit" id="<?php echo $i; ?>" onclick = "edit_sec(this.id)">
				<a href="#" class="btn" data-dismiss="modal">Cancel</a>
			</div>
			</form>
		</div>
				<div id="thanks-sec<?php echo $i; ?>"><p></p></div>
				<a data-toggle="modal" href="#form-content-sec<?php echo $i; ?>" class="btn btn-primary">Edit</a></td>
				
			</tr>
			
		<?php $i++; endforeach; ?>
		</table>
	