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
	<title>Login</title>
	<link rel="stylesheet" href="login_style.css">
</head>
<body>
	<div class="box" id="box">
		<span class="borderLine"></span>
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white">Login</div>
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
				<a href="signup.php">Click to Signup</a>
				<a href="forgot_password.php" class="float-end">Forgot Password</a>
			</div>
			<br><br>
			<input id="button" type="submit" value="Login">
		</form>
	</div>
</body>
</html>