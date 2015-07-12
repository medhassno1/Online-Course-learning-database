<?php
	
	// calls connection and session info
    require("common.php");
    
    $query = "
            INSERT INTO program (
                Program_Code,Program_Version,Program_Name,Total_Student,Start_Date,End_Date,Coordinator_Name,Coordinator_PhoneNumber			
            ) VALUES (
                :prgCode,:prgVer,:prgName,:totStudent,:StrtDate,:endDate,:CooName,:Coonumber
            )
        ";

        
		// The parameter values for the SQL statement to be used to inset into database
        $query_params = array(
            ':prgCode' => $_POST['code'],
            ':prgVer' => $_POST['version'],
            ':prgName' => $_POST['name'],
            ':totStudent' => $_POST['total_student'],
            
            ':StrtDate' => $_POST['start_date'],
            ':endDate' => $_POST['end_date'],
            ':CooName' => $_POST['cooname'],
            ':Coonumber' => $_POST['phono']
			
        );
        
         $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            
             $query = "
            INSERT INTO term_program (
                Term_Code,Program_Code			
            ) VALUES (
                :trmCode,:prgCode
            )
        ";
	
	 $query_params = array(
	    ':trmCode' => $_POST['trmCodeSelect'],
            ':prgCode' => $_POST['code']
           
			
        );
        
         $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
			
			 $query = "
            INSERT INTO program_level (
                Program_Code,Level_Code			
            ) VALUES (
                :prgCode,:Level
            )
        ";
			
			 $query_params = array(
			 ':prgCode' => $_POST['code'],
            ':Level' => $_POST['level']
			);
			
			  $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            echo "success";
?>