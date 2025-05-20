<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "job_portal";

// Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);
// var_dump($conn);

// Check Connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
?>


