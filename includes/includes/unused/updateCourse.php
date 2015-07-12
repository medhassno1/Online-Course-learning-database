<?php
	
	// SQL statement to view all from course
    $query = "
        SELECT
            *
        FROM program
		
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
<form>
	<table>
		<tr>
			<td>
				<label id="pro_code" for="pro_code">Program Code</label>
			</td>
			<td>
				<label id="ter_code" for="ter_code">Term Code</label>
			</td>
			<td>
				<label id="pro_name" for="pro_name">Program Name</label>
			</td>
			<td>
				<label id="tot_stud" for="tot_stud">Total Students</label>
			</td>
			<td>
				<label id="pro_vers" for="pro_vers">Version</label>
			</td>
			<td>
				<label id="pro_leve" for="pro_leve">Level</label>
			</td>
			<td>
				<label id="pro_star" for="pro_star">Start_Date</label>
			</td>	
			<td>
				<label id="pro_ends" for="pro_ends">End_Date</label>
			</td>
			<td>
				<label id="cor_name" for="cor_name">Coordinator Name</label>
			<td>	
				<label id="cor_phon" for="cor_phon">Coordinator Phone Number</label>
			</td>
		</tr>
		<?php foreach($rows as $row): ?>
		<tr>
			<td>
				<?php echo <select name=\"pro_code\">;
					while($row = $rows)
					{
					echo htmlentities"<option value='".$row['PcID']."'>".$row['PcID']."</option>";

					?>
				</select>
			</td>
			
			echo htmlentities($row['Program_Code'], ENT_QUOTES, 'UTF-8'); ?></td>
			
        
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlentities($row['username'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlentities($row['user_role'], ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>
    <?php endforeach; ?>
			
			
			
			
			
			
			
			<td>
				<select name="field2">
					<option value="A">option A</option>
					<option value="B">option B</option>
					<option value="C">option C</option>
				</select>
			</td>
			<td>
				<select name="field3">
					<option value="A">option A</option>
					<option value="B">option B</option>
					<option value="C">option C</option>
				</select>
			</td>
			<td>
				<select name="field4">
					<option value="A">option A</option>
					<option value="B">option B</option>
					<option value="C">option C</option>
				</select>
			</td>
			<td>
				<select name="field5">
					<option value="A">option A</option>
					<option value="B">option B</option>
					<option value="C">option C</option>
				</select>
			</td>
			<td>
				<select name="field6">
					<option value="A">option A</option>
					<option value="B">option B</option>
					<option value="C">option C</option>
				</select>
			</td>
			<td>
				<select name="field7">
					<option value="A">option A</option>
					<option value="B">option B</option>
					<option value="C">option C</option>
				</select>
			</td>
			<td>
				<select name="field8">
					<option value="A">option A</option>
					<option value="B">option B</option>
					<option value="C">option C</option>
				</select>
			</td>
			<td>
				<select name="field9">
					<option value="A">option A</option>
					<option value="B">option B</option>
					<option value="C">option C</option>
				</select>
				<td>
				<select name="field10">
					<option value="A">option A</option>
					<option value="B">option B</option>
					<option value="C">option C</option>
				</select>
			</td>			
		</tr>
	</table>	

</form>
<!--<a href="private.php">Go Back</a><br /> -->