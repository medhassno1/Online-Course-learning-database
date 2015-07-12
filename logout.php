<?php

    // calls connection and session info
    require("includes/common.php");
    
    // destroy session
    unset($_SESSION['user']);
    
    // script to send them to the login page
    header("Location: login.php");
	
	// end script
    die("Redirecting to: login.php"); 