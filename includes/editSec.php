<?php
	
	// calls connection and session info
    require("common.php");
    
    $query = "
            UPDATE section SET Section_Size=?,Room_Code = ?,Room_Description = ?, delivery = ? 
			
			WHERE
			Section_Code = ?
        ";

         $coCode = $_POST['code'];
            $coVer = $_POST['capacity'];
           $room_code = $_POST['room_code'];
          $room_Des = $_POST['room_description'];
            $Mode = $_POST['mode'];

      
        
			$coCodeid = $_POST['code'];
		// The parameter values for the SQL statement to be used to inset into database
        $query_params = array(
           $coVer,$room_code,$room_Des,$Mode,$coCodeid
			
        );
        
         $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
            
     
            
            echo "success";
?>