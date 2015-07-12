<?php
	
	// calls connection and session info
    require_once("common.php");
    
    $query = "
            UPDATE program SET Program_Version=?, Program_Name = ? 
			
			WHERE
			Program_Code = ?
        ";

        
            $coVer = $_POST['version'];
            $coName = $_POST['name'];
            $coCode = $_POST['code'];
			$level = $_POST['level'];
		// The parameter values for the SQL statement to be used to inset into database
        $query_params = array(
          $coVer,$coName,$coCode
			
        );
        
         $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            
			  $query = "
            UPDATE program_level SET Level_Code = ? 
			
			WHERE
			Program_Code = ?
        ";

        
           
		// The parameter values for the SQL statement to be used to inset into database
        $query_params = array(
          $level,$coCode
			
        );
        
         $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
     
            
            echo "success";
?>