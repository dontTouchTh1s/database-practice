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
    <title> Group policies </title>
</head>
<body>
<?php
foreach ($groupPolicies as $groupPolicy)
{
    echo
    "<form action='UpdateGroupPolicy.php' method='post'>
        <input name='id' readonly value=$groupPolicy[0]>
        <input name='name' value=$groupPolicy[1]>
        <input name='max-leave-month' value=$groupPolicy[2]>
        <input name='max-leave-year' value=$groupPolicy[3]>
        <button type='submit'>update</button>
    </form>
    ";

}
?>
<h3>Create group policy</h3>
<form action='CreateGroupPolicy.php' method='post' class="form-flex">
    <label>
        name:
        <input name='name'>
    </label>
    <label>
        max leave in month
        <input name='max-leave-month'>
    </label>
    <label>
        max leave in year
        <input name='max-leave-year'>
    </label>
    <button type='submit'>create</button>
</form>
</body>
</html>
