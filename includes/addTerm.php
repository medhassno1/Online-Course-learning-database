<?php

		
	// calls connection and session info
    require("common.php");
    
    // check if the user is logged in
    if(empty($_SESSION['user']))
    {
        // if not logged in send them to login page.
        header("Location: ../login.php");
        
        // stop script
        die("Redirecting to login.php");
    }
	
	// Has the form been submitted?
	// yes = run registration code, no = display form
    if(!empty($_POST))
    {
        // check to see if term is null
        if(empty($_POST['trmCode']))
        {
            // fast and dirty way to tell user to enter a user name
			// fix this with JS before it gets here
            die("Please enter a term.");
        }
        
        
        // SQL statement to check if term is taken
        $query = "
            SELECT
                1
            FROM term
            WHERE
                term_code = :trmCode
        ";
        
        // The parameter values for the SQL statement to be used to query database
        $query_params = array(
            ':trmCode' => $_POST['trmCode']
        );
        
        try
        {
            // tries to execute the query against the database
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex)
        {
            // traps any errors while connecting to database
			// $ex->getMessage() is for testing purposes and will need to remove for final release 
            die("Failed to run query: " . $ex->getMessage());
        }
        // get the row associated with that term (false value returned = no term found)
        $row = $stmt->fetch();
        
        // If a row is found then term is already taken 
        if($row)
        {
			// tell user that term is taken
            die("This term is already in use");
        }
        
        // SQL statement to insert the new user information 
        $query = "
            INSERT INTO term (
                term_code				
            ) VALUES (
                :trmCode
            )
        ";

        
		// The parameter values for the SQL statement to be used to inset into database
        $query_params = array(
            ':trmCode' => $_POST['trmCode']
			
        );
        
        try
        {
            // tries to execute the query to create the user
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex)
        {
            // traps any errors while connecting to database
			// $ex->getMessage() is for testing purposes and will need to remove for final release
            die("Failed to run query: " . $ex->getMessage());
        }
        
        // script to redirect the user back to the admin page after they register a new user
        header("Location: ../mainuser.php");
        
        // stops script
        die("Redirecting to mainuser.php");
    }
    
?>
