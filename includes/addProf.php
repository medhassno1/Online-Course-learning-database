<?php
	
	// calls connection and session info
    require("common.php");
    
    $query = "
            INSERT INTO professor (
                Professor_Code,Professor_FirstName,Professor_LastName,Professor_Constraints,Cell_Phone,Office_Number,email	
            ) VALUES (
                :pcode,:pfname,:plname,:pcont,:cph,:onu,:email
            )
        ";

        
		// The parameter values for the SQL statement to be used to inset into database
        $query_params = array(
           ':pcode' => $_POST['code'],
           ':pfname' => $_POST['fname'],
			':plname' => $_POST['lname'],
			':pcont' => $_POST['constraint'],
			':cph' => $_POST['number'],
			':onu' => $_POST['ofc_number'],
			':email' => $_POST['email']
        );
        
         $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            
			
            
            echo "success";
?>