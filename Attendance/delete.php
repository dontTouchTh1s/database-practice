<?php
include "dbConfig.php";


/** @var $dbUser */
/** @var $dbHost */
/** @var $dbPass */
/** @var $dbName */

$db = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($db->connect_error)
    return;

$query = "UPDATE leaves SET deleted = 1 WHERE id = 1 ";
$db->query($query);