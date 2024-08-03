<?php
// $host = "localhost";
// $username = "root";
// $password = "";
// $databaseName = "Elearn";

// // Create a connection to the MySQL server
// $connection = new mysqli($host, $username, $password);

// // Check if the connection was successful
// if ($connection->connect_error) {
//     die("Connection failed: " . $connection->connect_error);
// }

// // Select the "Elearn" database
// $connection->query("USE $databaseName");

// // Insert "Python" into the "subjects" table
// $pythonSubject = "Python";
// $insertSubjectSql = "INSERT INTO subjects (subject_name) VALUES ('$pythonSubject')";

// if ($connection->query($insertSubjectSql) === TRUE) {
//     $pythonSubjectId = $connection->insert_id;

//     // Insert the Python syllabus into the "Syllabus" table and associate it with the "Python" subject
//     $pythonSyllabus = "Python Syllabus\nIntroduction to Python\nWhat is Python?\nWhy learn Python?\nFeatures of Python\nInstalling and setting up Python\nPython basics: variables, data types, operators, conditional statements, loops\nPython Functions\nWhat are functions?\nDefining and calling functions\nPassing arguments to functions\nFunction scope and lifetime\nBuilt-in functions\nPython Modules\nWhat are modules?\nImporting modules\nCreating custom modules\nUsing modules to organize your code\nPython Objects\nObject-oriented programming (OOP) concepts\nCreating classes and objects\nInheritance\nPolymorphism\nAbstraction\nPython Data Structures\nLists\nTuples\nSets\nDictionaries\nPython File Handling\nReading and writing files\nWorking with directories\nRegular expressions\nPython Web Development\nIntroduction to web development\nUsing Python to build web applications\nDjango and Flask web frameworks\nPython Machine Learning\nIntroduction to machine learning\nSupervised learning\nUnsupervised learning\nReinforcement learning";
//     $insertSyllabusSql = "INSERT INTO Syllabus (topic_name, subject_id) VALUES (?, ?)";

//     $stmt = $connection->prepare($insertSyllabusSql);
//     $stmt->bind_param("si", $pythonSyllabus, $pythonSubjectId);

//     if ($stmt->execute()) {
//         echo "Python syllabus inserted successfully!";
//     } else {
//         echo "Error inserting Python syllabus: " . $stmt->error;
//     }

//     $stmt->close();
// } else {
//     echo "Error inserting 'Python' subject: " . $connection->error;
// }

// // Close the MySQL connection
// $connection->close();
?>

<?php
$host = "localhost";
$username = "root";
$password = "";
$databaseName = "Elearn";
$subjectName = "Python"; // The subject name you want to associate with the syllabus

$syllabus = [
    "Introduction to Python",
    "What is Python?",
    "Why learn Python?",
    "Features of Python",
    "Installing and setting up Python",
    // Add the remaining syllabus topics here
];

// Create a connection to the MySQL server
$connection = new mysqli($host, $username, $password);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Select the "Elearn" database
$connection->query("USE $databaseName");

// Insert syllabus topics into the "Topics" table
foreach ($syllabus as $syllabusTopic) {
    $escapedSyllabusTopic = $connection->real_escape_string($syllabusTopic);

    $insertSyllabusSql = "INSERT INTO Topics (topic_name, subject_id) VALUES ('$escapedSyllabusTopic', (SELECT subject_id FROM subjects WHERE subject_name = '$subjectName'))";

    if ($connection->query($insertSyllabusSql) === TRUE) {
        echo "Syllabus topic '$escapedSyllabusTopic' inserted successfully!<br>";
    } else {
        echo "Error inserting syllabus topic: " . $connection->error;
    }
}

// Close the MySQL connection
$connection->close();
?>


