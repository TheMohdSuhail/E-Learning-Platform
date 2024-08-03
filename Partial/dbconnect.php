<?php
$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "Elearn"; // Change this to your desired database name


// Create a connection to the MySQL server
$conn = new mysqli($servername, $username, $password,$databaseName);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Name of the database you want to create

// SQL query to create a new database
// $sql = "CREATE DATABASE $databaseName";

// if ($connection->query($sql) === TRUE) {
//     echo "Database '$databaseName' created successfully!";
// } else {
//     echo "Error creating database: " . $connection->error;
// }

// Close the MySQL connection
// $conn->close();
?>
