<?php
	
	// calls connection and session info
    require("common.php");
    
    $query = "
            UPDATE level SET capacity=?
			
			WHERE
			Level_Code = ?
        ";
			$LCode = $_POST['choiceToAddLevelCo'];
			$capacity = $_POST['cpLvl'];
            
		// The parameter values for the SQL statement to be used to inset into database
        $query_params = array(
          $capacity,$LCode
			
        );
        
         $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            
     
            
            echo "success";
?>