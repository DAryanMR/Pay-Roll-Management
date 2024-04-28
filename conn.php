<?php
// Establishing connection with the MySQL database named "mydb"
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll_db";

// Creating connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
