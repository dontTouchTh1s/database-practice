<?php

/** @var mysqli $mysql */
include "../Database/Config.php";

$query = "
INSERT INTO group_policies (name, max_leave_month, max_leave_year) VALUES ('employees policies', 20, 240);
";
$mysql->multi_query($query);
