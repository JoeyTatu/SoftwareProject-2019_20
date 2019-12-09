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


$login_date = date("Y-m-d H:i:s");
$customer_id = $_POST['customer_id'];
$business_id = $_POST['business_id'];
$password1 = $_POST['password1'];
$password2 = NULL;
$password_encryption = NULL;
$timestamp = NULL;

if ($_POST['customer_id'] === '')
                    {
                        $_POST['customer_id'] = 'NULL';
                    }
if ($_POST['business_id'] === '')
                    {
                        $_POST['business_id'] = 'NULL';
                    }


$sql = "INSERT INTO Login(login_id, login_date, customer_id, business_id, password1, password2, password_encryption, timestamp)
VALUES ('', '$login_date', '$customer_id', '$business_id', '$password1', '$password2', '$password_encryption', '$timestamp')";

$success = $db->query($sql);

if (!$success){
    die("Could not enter data: ".$db->error);
}
echo "Thank you. Login successful!"
?>