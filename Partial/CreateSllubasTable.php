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

// Create the "subjects" table if it doesn't exist
$connection->query("USE $databaseName");
$createSubjectsTable = "CREATE TABLE IF NOT EXISTS subjects (
    subject_id INT AUTO_INCREMENT PRIMARY KEY,
    subject_name VARCHAR(255) NOT NULL,
    date_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$connection->query($createSubjectsTable);

// Create the "Syllabus" table with a foreign key relationship to "subjects"
$createSyllabusTable = "CREATE TABLE IF NOT EXISTS Syllabus (
    syllabus_id INT AUTO_INCREMENT PRIMARY KEY,
    topic_name VARCHAR(255) NOT NULL,
    subject_id INT,
    date_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (subject_id) REFERENCES subjects(subject_id)
)";
$connection->query($createSyllabusTable);

// Select subjects and their related topics
$sql = "SELECT subjects.subject_name, Syllabus.topic_name
        FROM subjects
        LEFT JOIN Syllabus ON subjects.subject_id = Syllabus.subject_id";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Subject: " . $row["subject_name"] . "<br>";
        echo "Topic: " . $row["topic_name"] . "<br>";
        echo "<br>";
    }
} else {
    echo "No data found in the database.";
}

// Close the MySQL connection
$connection->close();
?>
