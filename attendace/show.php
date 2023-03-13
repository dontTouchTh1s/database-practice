<?php
include "dbConfig.php";


/** @var $dbUser */
/** @var $dbHost */
/** @var $dbPass */
/** @var $dbName */

$db = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($db->connect_error)
    return;

$query = "SELECT * from leaves";
$result = $db->query($query);
print_r ($result->fetch_all());