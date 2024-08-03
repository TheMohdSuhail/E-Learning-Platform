<?php
include 'dbconnect.php';

$login = false;

if(($_SERVER['REQUEST_METHOD']=="POST")){
    $user = $_POST["username"];
    $pass = $_POST["password"];
$sql = "SELECT * FROM USERS  where username= '$user' AND password ='$pass'";

$result = mysqli_query($conn,$sql);

if($result){
    $existUser = mysqli_num_rows($result);
    if($existUser == 1){
        $login = True;
        session_start();
        $_SESSION["username"]=$user;
        // echo $_SESSION["username"];
        header("location:../index.php");

        
       }else{echo "false";}

}else{echo "galat query";}
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Login Page</title>
  <style>
    * {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: Arial, sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #f4f4f4;
}

.container {
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
  display: flex;
  flex-direction: column;
}

h2 {
  text-align: center;
  margin-bottom: 20px;
}

.input-group {
  margin-bottom: 15px;
}

input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

label {
  margin-bottom: 5px;
  display: block;
}

button {
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #007bff;
  color: #fff;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

p {
  text-align: center;
  margin-top: 15px;
}
  </style>
</head>
<body>
  <div class="container">
    <form action="logInTest.php" method="post">
      <h2>Login</h2>
      <div class="input-group">
        <input type="text" name="username" required>
        <label for="username">Username</label>
      </div>
      <div class="input-group">
        <input type="password" name="password" required>
        <label for="password">Password</label>
      </div>
      <button type="submit">Sign in</button>
      <p>Don't have an account? <a href="signup.php">Register here</a></p>
    </form>
  </div>
</body>
</html>