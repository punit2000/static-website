<?php
$dbhost='localhost';
$username='root';
$password='';

$con = mysqli_connect("$dbhost","$username","$password","database");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>