<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "elearn";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // SQL query to create the users table
// $sql = "
//     CREATE TABLE IF NOT EXISTS elearn.users (
//         id INT AUTO_INCREMENT PRIMARY KEY,
//         username VARCHAR(50) NOT NULL,
//         email VARCHAR(100) NOT NULL,
//         password VARCHAR(255) NOT NULL,
//         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
//     )
// ";

// // Execute the query
// if ($conn->query($sql) === TRUE) {
//     echo "Table created successfully";
// } else {
//     echo "Error creating table: " . $conn->error;
// }

// // Close the connection
// $conn->close();
?>

<!--  Inser DAta code -->

<?php
include 'dbconnect.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["form_action"]) && $_POST["form_action"] === "signup") {
    // Collect form data
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = password_hash(mysqli_real_escape_string($conn, $_POST["password"]), PASSWORD_DEFAULT);

    // Check if the username already exists
    $existSql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);

    if ($result) {
        $numExistRows = mysqli_num_rows($result);

        if ($numExistRows > 0) {
            echo "Username already taken. Please choose another username.";
            exit; // Stop further execution
        } else {
            // Insert user data
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

            // Execute the query
            if ($conn->query($sql) === TRUE) {
                echo "User registered successfully";
                
                header("location:index.php");
                // You can redirect the user or perform additional actions here
            } else {
                echo "Error inserting user: " . $conn->error;
            }
        }
    } else {
        echo "Error checking username existence: " . mysqli_error($conn);
    }

    // Close the connection
    $conn->close();
}
?>

<!-- HTML for the form -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <form id="signUpForm" method="post" action="index.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <?php
            // Check and display username availability on form submission
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["form_action"]) && $_POST["form_action"] === "signup") {
                echo '<span>';
                echo isset($numExistRows) && $numExistRows > 0 ? "Username already taken. Please choose another username." : "";
                
                echo '</span>';
            }
            ?>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="hidden" name="form_action" value="signup">

            <button type="submit">Sign Up</button>
        </form>
    </div>
</div>



