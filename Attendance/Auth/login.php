<?php
/** @var mysqli $mysql */

include "../Database/Config.php";
$error="";
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $query = "SELECT email FROM employees WHERE email='$email'";
    $result = $mysql->query($query);
    if ($result->num_rows > 0)
        $error = "duplicate email";
    $query = "
INSERT INTO employees (email, password, first_name, last_name, group_policies_id) 
VALUES ('$email', '$password', '$name', '$lastName', 1)";
    $mysql->query($query);
}
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <link rel="stylesheet" type="text/css" href="../Style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Login Page </title>
</head>
<body>
<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" class="form-flex">
    <label>
        email
        <input type="email" placeholder="Enter Username" name="email" required>
    </label>
    <label>
        password
        <input type="password" placeholder="Enter Password" name="password" required>
    </label>
    <label>
        fist name
        <input type="tel" placeholder="Enter Password" name="first-name" required>
    </label>
    <label>
        last name
        <input type="text" placeholder="Enter Password" name="last-name" required>
    </label>
    <button type="submit">Login</button>
    <span><?=$error?></span>
</form>
</body>
</html>