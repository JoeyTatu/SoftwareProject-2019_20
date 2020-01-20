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

$address_street  = $_POST['address_street']; /* not null */
$address_street2 = $_POST['address_street2'];
$address_city    = $_POST['address_city']; /* not null */
$address_county  = $_POST['address_county']; /* not null */
$address_eircode = $_POST['address_eircode'];
$address_country = $_POST['address_country'];
$address_geo_latitude = null;
$address_geo_longtitude = null;

$sql = "INSERT INTO Address(address_id, address_street, address_street2, address_city, address_county, address_eircode, address_country, address_geo_latitude, address_geo_longtitude)
VALUES ('', '$address_street', '$address_street2', '$address_city', '$address_county', '$address_eircode', '$address_country', '$address_geo_latitude', '$address_geo_longtitude')";

$success = $db->query($sql);

/*if (!$success){
    die("Could not enter data: ".$db->error);
}
echo "Thank you. Address submitted!"


$db->close();*/
?>