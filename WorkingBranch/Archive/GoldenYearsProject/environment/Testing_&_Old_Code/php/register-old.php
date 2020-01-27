<?php


	$servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;
    
    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 


	 // makes sure they filled it in

 	if($_POST["uname"] && $_POST["psw"]) {
 	    
 	    $uname = $_POST['uname'];
 	    $pword = $_POST['psw'];
 	    
 	    
 	    $db->query("INSERT INTO User (user_id, username, password) VALUES (1, ".$uname."".$pword.");");
 	    
 	    session_start();
        // Storing session data
        $_SESSION["uname"] = $uname;

        echo 'Hi, ' . $_SESSION["uname"] . "! You are logged in via a session!";
        
 	}
 	
?>