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

$business_name = $_POST['business_name'];
$address_id = $_POST['address_id'];
$rep_first_name = $_POST['rep_first_name'];
$rep_last_name= $_POST['rep_last_name'];
$rep_email = $_POST['rep_email'];
$rep_phone = $_POST['rep_phone'];

if (($business_name == "") || ($address_id == "") || ($rep_first_name == "") || ($rep_phone == ""))
    die("Required fields missing values");


$sql = "INSERT INTO Business(business_id, business_name, address_id, rep_first_name, rep_last_name, rep_email, rep_phone)
VALUES ('', '$business_name', '$address_id', '$rep_first_name', '$rep_last_name', '$rep_email', '$rep_phone')";

$success = $db->query($sql);

if (!$success){
    die("Could not enter data: ".$db->error);
}
echo "Thank you. Business submitted!"


?>