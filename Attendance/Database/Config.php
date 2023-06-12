<?php
const HOST = "localhost";
const USER = "root";
const PASSWORD = "";
const DATABASE = "test";

$mysql = new mysqli(HOST, USER, PASSWORD);
$database = DATABASE;
$query = "CREATE DATABASE IF NOT EXISTS `$database`";
if ($mysql->query($query)) {
    $mysql->select_db(DATABASE);
}


