<?php

/** @var mysqli $mysql */
include "Database/Config.php";
if (!isset($_POST['type']) || !isset($_POST['from-date']) || !isset($_POST['to-date']) || !isset($_POST['employee-id']))
    header('Location: ' . $_SERVER['HTTP_REFERER']);
$type = $_POST['type'];
$fromDate = $_POST['from-date'];
$toDate = $_POST['to-date'];
$fromHour = $_POST['from-hour'];
$toHour = $_POST['to-hour'];
$employee_id = $_POST['employee-id'];
$description = $_POST['description'];
echo $description;

$query =
    "
INSERT INTO leave_requests (type, from_date, to_date, from_hour, to_hour)
VALUES ('$type', '$fromDate', '$toDate', '$fromHour', '$toHour')
";
if ($mysql->query($query)) {
    $lastId = $mysql->insert_id;
    $query = "
    INSERT INTO requests (requestable_type, requestable_id, employee_id, description) 
    VALUES ('leave', '$lastId', '$employee_id', '$description')";
    $mysql->query($query);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
