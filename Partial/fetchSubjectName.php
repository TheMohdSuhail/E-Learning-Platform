<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "elearn";

$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM subjects";
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}

$subjects = array(); // An array to store the fetched subjects

while ($row = $result->fetch_assoc()) {
    $subjects[] = $row;
}


?>