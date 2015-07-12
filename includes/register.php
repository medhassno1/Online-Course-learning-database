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
	
	// Has the registration form been submitted?
	// yes = run registration code, no = display form
    if(!empty($_POST))
    {
        // check to see if user name is null
        if(empty($_POST['username']))
        {
            // fast and dirty way to tell user to enter a user name
			// fix this with JS before it gets here
            die("Please enter a username.");
        }
        
        // check to see if password is null
        if(empty($_POST['password']))
        {
            // fast and dirty way to tell user to enter a password
			// fix this with JS before it gets here
			die("Please enter a password.");
        }
        
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
            die("This username is already in use");
        }
        
        // SQL statement to insert the new user information 
        $query = "
            INSERT INTO users (
                username,
                password,
                salt,
				user_role
				
            ) VALUES (
                :username,
                :password,
                :salt,
				:user_role
            )
        ";
        
		// randomly generates a salt (8 byte hex format to read easier) to be stored in 
		// database to help provide security against brute force and rainbow table attacks 
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
        
        // adds the salt to password and then hashes password using the sha256 hashing algorithm
		// to store password securely in database
        $password = hash('sha256', $_POST['password'] . $salt);
        
		// rehash the password another 65536 more times to enhance security against brute 
		// force attacks (65537 computations against each password guess)
        for($round = 0; $round < 65536; $round++)
        {
            $password = hash('sha256', $password . $salt);
        }
		
		// gets the user role from drop down list in the form
        $user_role = $_POST['user_role'];
        
		// The parameter values for the SQL statement to be used to inset into database
        $query_params = array(
            ':username' => $_POST['username'],
            ':password' => $password,
            ':salt' => $salt,
			':user_role' => $user_role
			
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
        header("Location: ../admin.php");
        
        // stops script
        die("Redirecting to admin.php");
    }
    
?>
<h1>Register</h1>
<form action="register.php" method="post">
    User name:<br />
    <input type="text" name="username" value="" />
    <br /><br />
    User Type:<br />
	<select name="user_role">
		<option value="main_user">main user</option>
		<option value="coordinator">coordinator</option>
		<option value="budget_officer">budget officer</option>
		<option value="admin">admin</option>
	</select>
	<br /><br />
	Password:<br />
    <input type="password" name="password" value="" />
    <br /><br />
    <input type="submit" value="Register" />
</form>
<a href="../admin.php">Go Back</a><br />