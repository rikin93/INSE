<?php
$host = "localhost"; // DB Settings [Change these, not setted for localhost!]
$username = "root";
$password = "";
$database = "db";

mysql_connect($host, $username, $password); // Connect to DB Server
mysql_select_db($database); // Select the correct DB

$result = mysql_query("SELECT `ProjectId` FROM `Table` WHERE  `UserId`=XX;"); // Select the value from the DB
// Final MySQL Query ("SELECT (Project ID) & (Project Link) FROM (Correct Table) WHERE (User ID = G+ UserID) 
$row = mysql_fetch_row($result); // Fetch the found rows

// Echo Logic: While there's data in the row array, Output the data as an <a> link.

?>