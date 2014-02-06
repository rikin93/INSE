<?php
//Add our database connection here.
$con=mysqli_connect("","","");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Create database
$sql="CREATE DATABASE project";
if (mysqli_query($con,$sql))
  {
  echo "Database my_db created successfully";
  }
else
  {
  echo "Error creating database: " . mysqli_error($con);
  }
?> 