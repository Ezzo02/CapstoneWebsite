<?php
session_start();

$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "capstone_db";

// Create connection
$conn = mysqli_connect($servername, $username_db, $password_db, $dbname);

if(!$conn){
  echo "failed";
}

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "hi";

header("Location: ../html/dashboard.html");

$conn->close();
