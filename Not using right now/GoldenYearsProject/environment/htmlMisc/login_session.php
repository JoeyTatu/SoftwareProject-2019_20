<?php


// Starting session
session_start();

$uname = $_POST['uname'];
 
// Storing session data
$_SESSION["uname"] = $uname;

echo 'Hi, ' . $_SESSION["uname"];




?>
    