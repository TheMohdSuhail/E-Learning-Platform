<?php
// $host = "localhost";
// $username = "root";
// $password = "";
// $databaseName = "Elearn"; // Change this to your database name
// $tableName = "subjects"; // Change this to the table you want to display

// // Create a connection to the MySQL server
// $connection = new mysqli($host, $username, $password);

// // Check if the connection was successful
// if ($connection->connect_error) {
//     die("Connection failed: " . $connection->connect_error);
// }

// // Select the database
// $connection->query("USE $databaseName");

// // Get the data from the specified table
// $sql = "SELECT * FROM $tableName";
// $result = $connection->query($sql);

// if ($result) {
//     echo "Data in the '$tableName' table:<br>";

//     if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             foreach ($row as $key => $value) {
//                 echo "$key: $value<br>";
//             }
//             echo "<br>";
//         }
//     } else {
//         echo "No data found in the table.";
//     }
// } else {
//     echo "Error: " . $connection->error;
// }

// // Close the MySQL connection
// $connection->close();
?>


<?php
$host = "localhost";
$username = "root";
$password = "";
$databaseName = "Elearn"; // Change this to your database name

// Create a connection to the MySQL server
$connection = new mysqli($host, $username, $password);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Select the database
$connection->query("USE $databaseName");

// Get the list of tables in the selected database
$sql = "SHOW TABLES";
$result = $connection->query($sql);

if ($result) {
    echo "Tables in the database '$databaseName':<br>";

    while ($row = $result->fetch_row()) {
        echo $row[0] . "<br>";
    }
} else {
    echo "Error: " . $connection->error;
}

// Close the MySQL connection
$connection->close();
?>

