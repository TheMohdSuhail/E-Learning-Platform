<?php

include 'dbconnect.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"],PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username,email,password) VALUES('$username','$email','$password')";

    mysqli_query($conn,$sql);
    echo 'data Submmit ';
    
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Fancy Sign Up Form</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Custom CSS -->
	<style>
		body {
			background-color: #f8f9fa;
		}
		.form-container {
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
			padding: 30px;
			margin-top: 50px;
		}
		.form-container h2 {
			text-align: center;
			margin-bottom: 30px;
			color: #343a40;
		}
		.form-container input[type="text"], .form-container input[type="email"], .form-container input[type="password"] {
			padding: 10px;
			margin-bottom: 20px;
			border-radius: 5px;
			border: none;
			width: 100%;
			font-size: 16px;
			background-color: #f8f9fa;
		}
		.form-container input[type="submit"] {
			padding: 10px 20px;
			margin-top: 20px;
			border-radius: 5px;
			border: none;
			background-color: #007bff;
			color: #fff;
			font-size: 16px;
			cursor: pointer;
			width: 100%;
		}
		.form-container input[type="submit"]:hover {
			background-color: #0069d9;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="form-container">
					<h2>Sign Up</h2>
					<form action="signTest.php" method="POST">
						<div class="form-group">
							<label for="username">Name:</label>
							<input type="text" id="username" name="username" required>
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="email" id="email" name="email" required>
						</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" id="password" name="password" required>
						</div>

						<button value="submit">submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>