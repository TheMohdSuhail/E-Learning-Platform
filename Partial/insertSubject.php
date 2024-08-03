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

// Define the values to insert
$subjects = [
    "Computer programming fundamentals",
    "Programming languages Object-oriented programming",
    "Data structures and algorithms",
    "Software development methodologies",
    "Database systems",
    "Web development"
];

// Loop through the subjects and insert them into the "subjects" table
foreach ($subjects as $subject) {
    $escapedSubject = $connection->real_escape_string($subject); // Sanitize the input

    // SQL query to insert a subject
    $sql = "INSERT INTO subjects (subject_name) VALUES ('$escapedSubject')";

    if ($connection->query($sql) !== TRUE) {
        echo "Error inserting subject: " . $connection->error;
    }
}

echo "Subjects inserted successfully!";

// Close the MySQL connection
$connection->close();
?>
