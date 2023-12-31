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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";

			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "Wrong username or password";
		}else
		{

			echo "Wrong username or password";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Personal Details</title>
	<link rel="stylesheet" href="signup_style.css">
</head>
<body>
	<div class="box" id="box">
		<span class="borderLine"></span>
		<form method="post" action="validate_email.php">
			<div style="font-size: 20px;margin: 10px;color: white">Personal settings</div>
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