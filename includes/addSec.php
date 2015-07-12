<?php
	
	// calls connection and session info
    require("common.php");
    
    $query = "
            INSERT INTO section (
                Section_Code,Course_Code,Section_Size,delivery		
            ) VALUES (
                :sCode,:coCode,:sSize,:delivery
            )
        ";

        
		// The parameter values for the SQL statement to be used to inset into database
        $query_params = array(
            ':sCode' => $_POST['SctNum'],
            ':coCode' => $_POST['AddsecCourse'],
            ':sSize' => $_POST['Capacity'],
            ':delivery' => $_POST['DlvTyp']
           
			
        );
        
         $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            
    
            
            echo "success";
?>