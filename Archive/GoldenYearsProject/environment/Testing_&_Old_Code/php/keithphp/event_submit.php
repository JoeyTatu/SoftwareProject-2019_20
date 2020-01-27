<?php
require '../connect.php';

$event_title            = $_POST['event_title'];
$event_type_id          = $_POST['event_type_id'];
$venue_id               = $_POST['venue_id'];
$event_time_hour        = $_POST['event_time_hour'];
$event_time_min         = $_POST['event_time_min'];
$event_date             = $_POST['event_date'];
$is_transport_provided  = $_POST['is_transport_provided'];
$transport_id           = $_POST['transport_id'];
$can_pay_cash           = $_POST['can_pay_cash'];
$price                  = $_POST['price'];
$business_id            = $_POST['business_id'];



$sql = "INSERT INTO Event(event_id, event_title, event_type_id, venue_id. event_time_hour, event_time_min, event_date, is_transport_provided, transport_id, can_pay_cash, price business_id)
VALUES ('', '$event_title', $event_type_id', '$venue_id', '$event_time_hour', '$event_time_min', '$event_date', '$is_transport_provided', '$transport_id', '$can_pay_cash', '$price', '$business_id')";

$success = $db->query($sql);

if (!$success){
    die("Could not enter data: ".$db->error);
}
echo "Thank you. Address submitted!"
?>