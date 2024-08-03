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

// SQL query to join the "subjects" and "Syllabus" tables
$sql = "SELECT subjects.subject_name, Syllabus.topic_name
        FROM subjects
        LEFT JOIN Syllabus ON subjects.subject_id = Syllabus.subject_id
        WHERE subjects.subject_name = 'Python'";

$result = $connection->query($sql);

if ($result) {
    echo "Subject: Python<br>";
    echo "Syllabus:<br>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row["topic_name"] . "<br>";
        }
    } else {
        echo "No syllabus data found for the subject 'Python'.";
    }
} else {
    echo "Error: " . $connection->error;
}

// Close the MySQL connection
$connection->close();
?>
