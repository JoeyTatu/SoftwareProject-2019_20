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

$vendor_name        = $_POST['vendor_name'];
$address_id         = $_POST['address_id'];
$contact_first_name = $_POST['contact_first_name'];
$contact_last_name  = $_POST['contact_last_name'];
$contact_email      = $_POST['contact_last_name'];
$contact_phone      = $_POST['contact_phone'];


$sql = "INSERT INTO Vendor(vendor_id, vendor_name, address_id, contact_first_name, contact_last_name, contact_email, contact_phone)
VALUES ('', '$vendor_name', '$address_id', '$contact_first_name', '$contact_last_name','$contact_email', '$contact_phone')";

$success = $db->query($sql);

if (!$success){
    die("Could not enter data: ".$db->error);
}
echo "Thank you. Vendor added!"


?>