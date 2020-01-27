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


$first_name = $_POST['first_name'];
$last_name= $_POST['last_name'];
$email = $_POST['email'];
$address_id = $_POST['address_id'];
$has_account = $_POST['has_account'];


$sql = "INSERT INTO Customer(customer_id, first_name, last_name, email, address_id, has_account)
VALUES ('', '$first_name', '$last_name', '$email', '$address_id', '$has_account')";

$success = $db->query($sql);

if (!$success){
    die("Could not enter data: ".$db->error);
}
echo "Thank you. Customer successfully entered"

?>