<?php

    // calls connection info and starts session
    require("includes/common.php");

	// variable used to repopulate user name in login form if they enter wrong password
    $submitted_username = '';
    
    // Has the login form been submitted?
	// yes = run login code, no = display form
    if(!empty($_POST))
    {
        // SQL statement to get user info based on user name
        $query = "
            SELECT
                id,
                username,
                password,
                salt,
				user_role
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
        
        // variable to tell if login worked or not (starts off as false for when user first gets to page)
        $login_ok = false;
        
        // get the row associated with that user name (false value returned = no user name found)
        $row = $stmt->fetch();
        if($row)
        {
            // takes password (from the form) and the salt(stored in the database for that user)
			// and hashes the password using the sha256 hashing algorithm and then compares it 
            // to currently stored (salted and hashed) password in the database
            $check_password = hash('sha256', $_POST['password'] . $row['salt']);
            
			for($round = 0; $round < 65536; $round++)
            {
                $check_password = hash('sha256', $check_password . $row['salt']);
            }
            
            if($check_password === $row['password'])
            {
                // if passwords match set to true
                $login_ok = true;
            }
        }
        
		// direct user to appropriate page based on user type
        if($login_ok)
        {
			// strip the user's salt and password so its not saved in session (extra security)
            unset($row['salt']);
            unset($row['password']);
            
            // save user info into session to check if user is logged in or not on secured pages
            $_SESSION['user'] = $row;
            
            // Redirect the user to budget officer page.
			 if($row['user_role']=='budget_officer')
            { 
				// execute script 
				header("Location: budgetofficer.php");
				// stop script
				die("Redirecting to: budgetofficer.php");
			}

			// Redirect the user to admin page.
			if($row['user_role']=='admin')
            { 
				// execute script 
				header("Location: admin.php");
				// stop script
				die("Redirecting to: admin.php");
			}
			
			// Redirect the user to main user page.
			if($row['user_role']=='main_user')
            { 
				// execute script 
				header("Location: mainuser.php");
				// stop script
				die("Redirecting to: mainuser.php");
			}
			
			// Redirect the user to coordinator page.
			if($row['user_role']=='coordinator') 	
			{
				// execute script 
				header("Location: coordinator.php");
				// stop script
				die("Redirecting to: coordinator.php");
			} 
        }
        else
        {
            // Tell the user that the login attempt has failed
            echo '<h5 style="text-align:center;">Login Failed</h5>';
            
            // repopulate user name in login form using htmlentities to guard against 
			// XSS (cross site scripting) attacks.	
            $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
        }
    }
    
?>
<!-- basic login form with user name and password -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>cp7 solutions</title>

<link rel="stylesheet" type="text/css" href="css/tabs.css"/>
<!-- Bootstrap css used -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<script src="js/tabs.js" type="text/javascript"></script>

</head>
<body>
<!-- class container -->
<div class="container">



<!-- class form container to align center -->
<div class="form-container">



<form action="login.php" class="form-horizontal" method="post">
<div class="form-group">
<div class="col-xs-6">
<h1>Login</h1>
</div>
</div>
<div class="form-group">
<label class="control-label col-xs-2">
    Username:</label>
	<div class="col-xs-8">
    <input type="text" name="username" class="form-control" value="<?php echo $submitted_username; ?>" />
	</div>
	</div>
    <div class="form-group">
	<label class="control-label col-xs-2">
    Password:</label>
	<div class="col-xs-8">
    <input type="password" name="password" class="form-control" value="" />
	</div>
    </div>
	<div class="form-group">
	<div class="col-xs-6">
    <input type="submit" class="btn btn-primary pull-right" value="Login" />
	</div>
	</div>
	</form>
</div>
</div>
</body>
</html>