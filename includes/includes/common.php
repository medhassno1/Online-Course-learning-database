 <?php

    // define database connection variables
    $username = "25sK9PcRsutUchM8";
    $password = "8SLAjsaZXju8C6Yd";
    $host = "localhost";
    $dbname = "cls";
	
	// communicate with database using UTF-8 character encoding
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    
	// try to connect to database
    try
    {
        // connection to database using defined variables 
        $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
    }
    catch(PDOException $ex)
    {
        // traps any errors while connecting to database
		// $ex->getMessage() is for testing purposes and will need to remove for final release
        die("Failed to connect to the database: " . $ex->getMessage());
    }
    
    // configures PDO to throw an exception when it encounters an error
    // and allows for trapping of database errors in try/catch blocks
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // configures PDO to return database rows from database using an associative array
    // ie array will have string indexes, where the string value = column name
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // this function gets rid of magic quotes encase an older version of PHP is used by 
	// our client in production at a later time
	if(function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc())
    {
        function undo_magic_quotes_gpc(&$array)
        {
            foreach($array as &$value)
            {
                if(is_array($value))
                {
                    undo_magic_quotes_gpc($value);
                }
                else
                {
                    $value = stripslashes($value);
                }
            }
        }
    
        undo_magic_quotes_gpc($_POST);
        undo_magic_quotes_gpc($_GET);
        undo_magic_quotes_gpc($_COOKIE);
    }
    
    // Tell web browser that we are communicating with it using UTF-8 encoding
    header('Content-Type: text/html; charset=utf-8');
    
    // This initializes a server side session and stores information about the 
	// visit similar to a cookie
    session_start();

    // Good practice is to never finish off a PHP file with a closing PHP tag