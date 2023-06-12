<?php

/** @var mysqli $mysql */
include "Database/Config.php";
if (!isset($_POST['name']) || !isset($_POST['max-leave-month']) || !isset($_POST['max-leave-year']))
    die();
$name = $_POST['name'];
$month = $_POST['max-leave-month'];
$year = $_POST['max-leave-year'];
$query = "
INSERT INTO group_policies (name, max_leave_month, max_leave_year) 
VALUES ('$name', '$month', '$year' )";

$mysql->query($query);

header('Location: ' . $_SERVER['HTTP_REFERER']);
