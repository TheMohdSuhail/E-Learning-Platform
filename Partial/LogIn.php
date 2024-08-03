<?php 
echo '
<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeLoginModal">&times;</span>
        <h2>Login</h2>
        <form method="post" action="index.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="login_password" name="password" required>

            <button type="submit">Login</button>
        </form>';?>
        <?php if (isset($login_error)) { echo "<p class='error'>$login_error</p>"; } ?>
    <?php
     echo '</div>
 </div>';
?>

<?php
// $login = false;
// $showError = false;
// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     include 'dbconnect.php';
//     $username = $_POST["username"];
//     $password = $_POST["password"]; 
    
     
//     $sql = "Select * from users where username ='$username' AND password='$password'";
//     $result = mysqli_query($conn, $sql);
//     $num = mysqli_num_rows($result);
//     if ($num == 1){
//         $login = true;
//         session_start();
//         $_SESSION['loggedin'] = true;
//         $_SESSION['username'] = $username;
//         header("location: /learn/index.php");

//     } 
//     else{
//         $showError = "Invalid Credentials";
//     }
// }




    
?>

<?php
$login = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'dbconnect.php';

    // Check if the necessary form fields are set
    if (isset($_POST["username"], $_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM users WHERE username ='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $num = mysqli_num_rows($result);

            if ($num == 1) {
                $login = true;
                // session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                // print_r($_SESSION);
                // echo $_SESSION['username'];
                header("location: /learn/index.php");
                exit(); // Ensure that script stops execution after redirection
            } else {
                $showError = "Invalid Credentials";
            }
        } else {
            // Handle query execution error
            $showError = "Error executing the query: " . mysqli_error($conn);
        }
    } else {
        $showError = "Username and password are required";
    }
}
?>




