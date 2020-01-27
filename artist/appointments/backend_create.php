<?php
require_once '_db.php';

$insert = "INSERT INTO Appointment  (client_name, start, end) VALUES (:client_name, :start, :end)";

$stmt = $db->prepare($insert);

$stmt->bindParam(':start', $_POST['start']);
$stmt->bindParam(':end', $_POST['end']);
$stmt->bindParam(':client_name', $_POST['client_name']);

$stmt->execute();

class Result {}

$response = new Result();
$response->result = 'OK';
$response->message = 'Created with id: '.$db->lastInsertId();

header('Content-Type: application/json');
echo json_encode($response);

?>
