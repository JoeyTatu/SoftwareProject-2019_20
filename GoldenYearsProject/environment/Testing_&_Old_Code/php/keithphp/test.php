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

/* $address_id is addressed in the INSERT method below */
$address_street  = $_POST['address_street']; /* not null */
$address_street2 = $_POST['address_street2'];
$address_city    = $_POST['address_city']; /* not null */
$address_county  = $_POST['address_county']; /* not null */
$address_eircode = $_POST['address_eircode'];
$address_country = $_POST['address_country'];
$address_geo_latitude = null; /* must be included, because it's in the INSERT statement */
$address_geo_longtitude = null; /* must be included, because it's in the INSERT statement */

$sql = "INSERT INTO Test(address_id, address_street, address_street2, address_city, address_county, address_eircode, address_country, address_geo_latitude, address_geo_longtitude)
VALUES ('', '$address_street', '$address_street2', '$address_city', '$address_county', '$address_eircode', '$address_country', '$address_geo_latitude', '$address_geo_longtitude')"; /* address_id value should be empty as it auto increments, database will auto put in value */

$success = $db->query($sql);

if (!$success){
    die("Test NOT successful becasue of error: ".$db->error); /* if no error message is displayed, it's becasue there's an issue with inconsistency or spelling*/
}
echo "Test successful" /* This message will display if everyone is working*/


/*$db->close();*/
?>