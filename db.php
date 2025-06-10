<?php
$servername = 'localhost';
$username = 'root';
$password = 'password';
$dbname = "visit";
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
if ($conn->connect_errno) {
  die('Could not Connect MySql Server:' . $conn->connect_error);
}