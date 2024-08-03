<?php
$host = "localhost"; // Change this to your database server host
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$databaseName = "Elearn";

// Create a connection to the MySQL server
$connection = new mysqli($host, $username, $password);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Create the "subjects" table
$sql = "ALTER TABLE subjects DROP COLUMN topic_name";

// Select the "Elearn" database
$connection->query("USE $databaseName");

if ($connection->query($sql) === TRUE) {
    echo "Table 'subjects' created successfully!";
} else {
    echo "Error creating table: " . $connection->error;
}

// Close the MySQL connection
$connection->close();
?>
