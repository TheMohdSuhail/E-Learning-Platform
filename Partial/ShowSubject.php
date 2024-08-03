<?php
$host = "localhost";
$username = "root";
$password = "";
$databaseName = "Elearn";

// Create a connection to the MySQL server
$connection = new mysqli($host, $username, $password);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Select the "Elearn" database
$connection->query("USE $databaseName");

// SQL query to fetch data from the "subjects" table
$sql = "SELECT * FROM subjects";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "Subject Name: " . $row["subject_name"] . "<br>";
    }
} else {
    echo "No subjects found in the database.";
}

// Close the MySQL connection
$connection->close();
?>
