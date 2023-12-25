<?php
$host = "localhost";
$username = "root";
$db = "chat";
$connection = new mysqli($host,$username,"",$db);

// Check connection
if ($connection -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>