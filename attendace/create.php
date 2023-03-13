<?php
include "dbConfig.php";


/** @var $dbUser */
/** @var $dbHost */
/** @var $dbPass */
/** @var $dbName */

$db = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($db->connect_error)
    return;

$query = "INSERT INTO leaves (`from`, `to`, type, user) VALUES ('', '', '0', '')";
$db->query($query);