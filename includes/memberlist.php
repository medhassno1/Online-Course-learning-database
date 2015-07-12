<?php

    // calls connection and session info
    require("common.php");
    
    // check if the user is logged in
    if(empty($_SESSION['user']))
    {
        // if not logged in send them to login page
        header("Location: ../login.php");
        
        // stop script
        die("Redirecting to login.php");
    }
    
    // SQL statement to view the user table
    $query = "
        SELECT
            id,
            username,
            user_role
        FROM users
    ";
    
    try
    {
        // tries to execute the query to view the users
        $stmt = $db->prepare($query);
        $stmt->execute();
    }
    catch(PDOException $ex)
    {
        // traps any errors while connecting to database
		// $ex->getMessage() is for testing purposes and will need to remove for final release
        die("Failed to run query: " . $ex->getMessage());
    }
        
    // gets an array all of the found rows
    $rows = $stmt->fetchAll();
?>
<h1>Memberlist</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>User role</th>
    </tr>
    <?php foreach($rows as $row): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlentities($row['username'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlentities($row['user_role'], ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="../admin.php">Go Back</a><br />