<?php

/** @var mysqli $mysql */
include "Database/Config.php";
if (!isset($_POST['id']))
    die();
$id = $_POST['id'];
$name = $_POST['name'];
$month = $_POST['max-leave-month'];
$year = $_POST['max-leave-year'];
$query = "UPDATE group_policies 
SET name='$name', max_leave_month='$month', max_leave_year='$year' 
WHERE id='$id'";

$mysql->query($query);

header('Location: ' . $_SERVER['HTTP_REFERER']);
