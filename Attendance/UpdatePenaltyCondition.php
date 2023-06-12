<?php

/** @var mysqli $mysql */
include "Database/Config.php";
if (!isset($_POST['id']))
    die();
$id = $_POST['id'];
$name = $_POST['name'];
$type = $_POST['type'];
$duration = $_POST['duration'];
$penalty = $_POST['penalty'];
$groupPolicyId = $_POST['group-policy-id'];
$query = "
UPDATE penalty_conditions
SET name = '$name', type = '$type', duration = '$duration', penalty = '$penalty', group_policy_id = '$groupPolicyId'
WHERE id = '$id'";

$mysql->query($query);

header('Location: ' . $_SERVER['HTTP_REFERER']);
