<?php
// Starting session
session_start();

$_SESSION["firstname"] = "Peter";
$_SESSION["lastname"] = "Parker";



echo 'Hi, ' . $_SESSION["firstname"] . ' ' . $_SESSION["lastname"];
?>