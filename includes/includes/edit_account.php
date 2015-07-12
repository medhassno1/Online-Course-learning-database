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
    
    // Has the edit account form been submitted?
	// yes = run edit account code, no = display form
    if(!empty($_POST))
    {
       
        // checks to see if user name is the same as session user name
        if($_POST['username'] != $_SESSION['user']['username'])
        {
            // SQL statement to check if user name is taken
            $query = "
                SELECT
                    1
                FROM users
                WHERE
                    username = :username
            ";
            
            // The parameter values for the SQL statement to be used to query database
            $query_params = array(
                ':username' => $_POST['username']
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
            
            // get the row associated with that user name (false value returned = no user name found)
            $row = $stmt->fetch();
			
			// If a row is found then user name is already taken
            if($row)
            {
				// tell user that user name is taken
                die("This user name address is already in use");
            }
        }
        
        // new password means new hash and salt
        if(!empty($_POST['password']))
        {
            $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
            $password = hash('sha256', $_POST['password'] . $salt);
            for($round = 0; $round < 65536; $round++)
            {
                $password = hash('sha256', $password . $salt);
            }
        }
        else
        {
            // no password was entered
            $password = null;
            $salt = null;
        }
        
        // Initial query parameter values
        $query_params = array(
            ':username' => $_POST['username'],
            ':user_id' => $_SESSION['user']['id'],
        );
        
        // query parameters if updating password
        if($password !== null)
        {
            $query_params[':password'] = $password;
            $query_params[':salt'] = $salt;
        }
        
        // set up update query
        $query = "
            UPDATE users
            SET
                username = :username
        ";
        
        // if new password, append the query
        if($password !== null)
        {
            $query .= "
                , password = :password
                , salt = :salt
            ";
        }
        
        // Finally we finish the update query by specifying that we only wish
        // append the query for updating the one user
        $query .= "
            WHERE
                id = :user_id
        ";
        
        try
        {
            // tries to execute the query
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex)
        {
            // traps any errors while connecting to database
			// $ex->getMessage() is for testing purposes and will need to remove for final release
            die("Failed to run query: " . $ex->getMessage());
        }
        
        // refreshes user name in session
        $_SESSION['user']['username'] = $_POST['username'];
        
        
		// Redirect the user to back budget officer page.
		if($_SESSION['user']['user_role']=='budget_officer')
        { 
			// execute script 
			header("Location: ../budgetofficer.php");
			// stop script
			die("Redirecting to: budgetofficer.php");
		}
			
		// Redirect the user to back admin page.	
		if($_SESSION['user']['user_role']=='admin')
		{ 
			// execute script 
			header("Location: ../admin.php");
			// stop script
			die("Redirecting to: admin.php");
		}
		
		// Redirect the user back to main user page.
		if($_SESSION['user']['user_role']=='main_user')
		{ 
			// execute script 
			header("Location: ../mainuser.php");
			// stop script
			die("Redirecting to: mainuser.php");
		}
		
		// Redirect the user back to coordinator page.
		if($_SESSION['user']['user_role']=='coordinator') 	
		{
			// execute script 
			header("Location: ../coordinator.php");
			// stop script
			die("Redirecting to: coordinator.php");
		}
		
    }
    
?>
<h1>Edit Account</h1>
<form action="edit_account.php" method="post">
    Username:<br />
    <b><?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?></b>
    <br /><br />    
	User Name:<br />
    <input type="text" name="username" value="<?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>" />
    <br /><br />
    Password:<br />
    <input type="password" name="password" value="" /><br />
    <i>(leave blank if you do not want to change your password)</i>
    <br /><br />
    <input type="submit" value="Update Account" />
</form>