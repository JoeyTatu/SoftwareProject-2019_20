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

$venue_name               = $_POST['venue_name'];
$address_id               = $_POST['address_id'];
$venue_contact_first_name = $_POST['venue_contact_first_name'];
$venue_contact_last_name  = $_POST['venue_contact_last_name'];
$venue_phone              = $_POST['venue_phone'];


$sql = "INSERT INTO Venue(venue_id, venue_name, address_id, venue_contact_first_name, venue_contact_last_name, venue_phone)
VALUES ('', '$venue_name', '$address_id', '$venue_contact_first_name', '$venue_contact_last_name','$venue_phone')";

$success = $db->query($sql);

if (!$success){
    die("Could not enter data: ".$db->error);
}
echo "Thank you. Venue added!"


?>