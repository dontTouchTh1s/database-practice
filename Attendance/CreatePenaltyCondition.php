<?php

/** @var mysqli $mysql */
include "Database/Config.php";
if (!isset($_POST['name']) || !isset($_POST['type']) || !isset($_POST['duration']) || !isset($_POST['penalty']) || !isset($_POST['group-policy-id']))
    die();
$name = $_POST['name'];
$type = $_POST['type'];
$duration = $_POST['duration'];
$penalty = $_POST['penalty'];
$groupPolicyId = $_POST['group-policy-id'];
$query = "
INSERT INTO penalty_conditions (name, type, duration, penalty, group_policy_id) 
VALUES ('$name', '$type', '$duration', '$penalty', '$groupPolicyId')";

$mysql->query($query);

header('Location: ' . $_SERVER['HTTP_REFERER']);
