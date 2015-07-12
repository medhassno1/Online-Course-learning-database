<?php
	
	// calls connection and session info
    require("common.php");
    
    $query = "
            INSERT INTO course (
                Course_Code,Version,Course_Name,Course_Mode,Course_Length,Course_Hours,CostCentre_Code			
            ) VALUES (
                :coCode,:coVer,:coName,:Mode,:Length,:Hrs,:CCCode
            )
        ";

        
		// The parameter values for the SQL statement to be used to inset into database
        $query_params = array(
            ':coCode' => $_POST['code'],
            ':coVer' => $_POST['version'],
            ':coName' => $_POST['name'],
           
            ':Mode' => $_POST['mode'],
            ':Length' => $_POST['length'],
            ':Hrs' => $_POST['hours'],
            ':CCCode' => $_POST['center_code']
			
        );
        
         $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            
             $query = "
            INSERT INTO program_course (
                Program_Code,Course_Code			
            ) VALUES (
                :prgCode,:trmCode
            )
        ";
	
	 $query_params = array(
	    
            ':prgCode' => $_POST['prgCodeSelect'],
			':trmCode' => $_POST['code']
           
			
        );
        
         $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            
            echo "success";
?>