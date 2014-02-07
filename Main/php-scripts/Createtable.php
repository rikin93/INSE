<?php
//Add database info here.
$con=mysqli_connect("","","","project");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Create table
$sql="CREATE TABLE WBT(
WBT_ID INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(WBT_ID),
Name CHAR(15),
Description CHAR(50),
)";

// Execute query
if (mysqli_query($con,$sql))
  {
  echo "Table persons created successfully";
  }
else
  {
  echo "Error creating table: " . mysqli_error($con);
  }
?> 