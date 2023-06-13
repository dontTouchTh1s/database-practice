<?php

/** @var mysqli $mysql */
include "Database/Config.php";
$query = "SELECT * FROM group_policies";
$result = $mysql->query($query);
$groupPolicies = $result->fetch_all();


?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <link rel="stylesheet" type="text/css" href="Style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Create Leave Request </title>
</head>
<body>
<h3>Create leave request</h3>
<form action='CreateLeaveRequests.php' method='post' class="form-flex">
    <label>
        type
        <label>
            daily
            <input type="radio" name="type" value="daily">
        </label>
        <label>
            hourly
            <input type="radio" name="type" id="hourly" value="hourly">
        </label>
    </label>
    <label>
        from date
        <input type='date' name='from-date'>
    </label>
    <label>
        to date
        <input type='date' name='to-date'>
    </label>
    <div id="hour-inputs">
        <label>
            from hour
            <input type='time' name='from-hour' min='07:00' max='15:00'>
        </label>
        <label>
            to hour
            <input type='time' name='to-hour' min='07:00' max='15:00'>
        </label>
    </div>
    <label>
        description
        <input type='text' multiple name='description'>
    </label>
    <label>
        employee id
        <input type='text' name='employee-id'>
    </label>

    <button type='submit'>create</button>
</form>
</body>
</html>
