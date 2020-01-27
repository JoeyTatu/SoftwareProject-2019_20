<?php

$db_exists = file_exists("calendar.sqlite");

$db = new PDO('sqlite:calendar.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

if (!$db_exists) {
    //create the database
    $db->exec("CREATE TABLE IF NOT EXISTS Appointment (
                        id INTEGER PRIMARY KEY, 
                        client_name VARCHAR(100), 
                        start DATETIME, 
                        end DATETIME,
                        resource VARCHAR(100))");

    $messages = array(
                    array('client_name' => 'Joe Bloggs - Mandella on left shoulder',
                        'start' => '2019-12-16T10:00:00',
                        'end' => '2019-12-16T12:00:00',
                        'resource' => 'B')
                );

    $insert = "INSERT INTO Appointment (client_name, start, end, resource) VALUES (:client_name, :start, :end, :resource)";
    $stmt = $db->prepare($insert);
 
    $stmt->bindParam(':client_name', $client_name);
    $stmt->bindParam(':start', $start);
    $stmt->bindParam(':end', $end);
    $stmt->bindParam(':resource', $resource);
 
    foreach ($messages as $m) {
      $client_name = $m['client_name'];
      $start = $m['start'];
      $end = $m['end'];
      $resource = $m['resource'];
      $stmt->execute();
    }
    
}

?>
