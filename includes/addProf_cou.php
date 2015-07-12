<?php
	
	// calls connection and session info
    require("common.php");
    
    $query = "
            INSERT INTO course_professor (
                Course_Code,Professor_Code	
            ) VALUES (
                :ccode,:p_code
            )
			
        ";

        
		// The parameter values for the SQL statement to be used to inset into database
        $query_params = array(
           ':ccode' => $_POST['course'],
			':p_code' => $_POST['prof_id']
        );
        
         $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            
			
            
            echo "success";
?>