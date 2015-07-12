<?php
	
	// calls connection and session info
    require("common.php");
    
    $query = "
            UPDATE course SET Course_Code=?,Version=?, Course_Name = ? , Level = ?, Course_Mode = ? , Course_Length = ?,
			Course_Hours = ? , CostCentre_Code = ?	 
			WHERE
			Course_Code = ?
        ";

         $coCode = $_POST['code'];
            $coVer = $_POST['version'];
            $coName = $_POST['name'];
            $Level = $_POST['level'];
            $Mode = $_POST['mode'];
            $Length = $_POST['length'];
            $Hrs = $_POST['hours'];
            $CCCode = $_POST['center_code'];
			$coCodeid = $_POST['code'];
		// The parameter values for the SQL statement to be used to inset into database
        $query_params = array(
           $coCode,$coVer,$coName,$Level,$Mode,$Length,$Hrs,$CCCode,$coCodeid
			
        );
        
         $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            
     
            
            echo "success";
?>