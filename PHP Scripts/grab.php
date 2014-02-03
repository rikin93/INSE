<?php
$host = "localhost"; // DB Settings
$username = "root";
$password = "";
$database = "dprin";

mysql_connect($host, $username, $password); // Connect & Select
mysql_select_db($database);

$result = mysql_query("SELECT `pid` FROM `debug` WHERE  `uid`=2;"); // Select the value from the DB
$row = mysql_fetch_row($result); // Fetch the row
echo $row[0]; // Echo the results [Use a loop]

?>