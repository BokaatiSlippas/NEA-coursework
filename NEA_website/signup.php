<?php
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

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
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white">Signup</div>
			<div class="inputBox">
				<input id="text" type="text" name="user_name" required="required">
				<span>Username</span>
				<i></i>
			</div>
			<div class="inputBox">
				<input id="text" type="password" name="password" required="required">
				<span>Password</span>
				<i></i>
			</div>
			<br><br>
			<div class="links">
				<a href="login.php">Click to Login</a>
			</div>
			<br><br>
			<input id="button" type="submit" value="Signup">
		</form>
	</div>
</body>
</html>