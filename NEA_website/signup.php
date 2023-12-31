<?php
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		if(!empty($user_name) && !empty($password) && !empty($email) && !is_numeric($user_name) && !is_numeric($email))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password,email) values ('$user_id','$user_name','$password','$email')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{

			echo "Please enter some valid information";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" href="signup_style.css">
</head>
<body>
	<div class="box" id="box">
		<span class="borderLine"></span>
		<form method="post" action="validate_email.php">
			<div style="font-size: 20px;margin: 10px;color: white">Signup</div>
			<div class="inputBox">
				<input id="text" type="text" name="user_name" required="required">
				<span>Username</span>
				<i></i>
			</div>
			<div class="inputBox">
				<input id="email" type="text" name="email" required="required" onkeydown="validation()">
				<span id="email">Email</span>
				<i></i>
			</div>
			<div class="inputBox">
				<input id="text" type="password" name="password" required="required">
				<span>Password</span>
				<i></i>
			</div>
			<div class="inputBox">
				<input id="text" type="password" name="re_password" required="required">
				<span>Confirm Password</span>
				<i></i>
			</div>
			<br><br>
			<div class="links">
				<a href="login.php">Click to Login</a>
			</div>
			<br>
			<input id="button" type="submit" value="Signup">
		</form>
	</div>
</body>
</html>