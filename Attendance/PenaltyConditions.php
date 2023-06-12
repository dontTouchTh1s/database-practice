<?php

/** @var mysqli $mysql */
include "Database/Config.php";
$query = "
SELECT pc.id, pc.name, type, duration, penalty, gp.name as 'group policy name'
FROM penalty_conditions pc
INNER JOIN group_policies gp on pc.group_policy_id = gp.id
";
$result = $mysql->query($query);
$result = $result->fetch_all();

$query = "SELECT id, name FROM group_policies";
$groupPolicies = $mysql->query($query);
$groupPolicies = $groupPolicies->fetch_all();

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
foreach ($result as $item) {
    echo
    "<form action='UpdatePenaltyCondition.php' method='post'>
        <input name='id' readonly value=$item[0]>
        <input name='name' value=$item[1]>
        <input name='type' value=$item[2]>
        <input name='duration' value=$item[3]>
        <input name='penalty' value=$item[4]>
        <select name='group-policy-id'>";
    foreach ($groupPolicies as $groupPolicy) {
        if ($groupPolicy[1] == $item[5])
            echo "<option value='$groupPolicy[0]' selected>$groupPolicy[1]</option>";
        else echo "<option value='$groupPolicy[0]'>$groupPolicy[1]</option>";
    }
    echo "</select>
        <button type='submit'>update</button>
    </form>";
}
?>
<h3>Create penalty condition</h3>
<form action='CreatePenaltyCondition.php' method='post' class="form-flex">
    <label>
        name:
        <input name='name'>
    </label>
    <label>
        type
        <select name="type">
            <option value="delay">delay</option>
            <option value="cutting out">cutting out</option>
            <option value="leave attendance">leave attendance</option>
        </select>
    </label>
    <label>
        duration
        <input name='duration'>
    </label>
    <label>
        leave penalty
        <input name='penalty'>
    </label>
    <label>
        group policy
        <select name="group-policy-id">
            <?php
            foreach ($groupPolicies as $groupPolicy) {
                echo
                "
                <option value='$groupPolicy[0]'>$groupPolicy[1]</option>
                ";
            }
            ?>
        </select>
    </label>
    <button type='submit'>create</button>
</form>
</body>
</html>
