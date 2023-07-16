<?php
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Game recommender index page</title>
		<link rel="stylesheet" href="index_style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>
<body>
	<input type="checkbox" id="check">
	<label for="check">
		<i class="fas fa-bars" id="btn"></i>
		<i class="fas fa-times" id="cancel"></i>
	</label>
	<div class="sidebar">
		<header>Menu</header>
		<ul>
			<li><a href="#"><i class="fas fa-qrcode"></i>Dashboard</a></li>
			<li><a href="#"><i class="fas fa-link"></i>Shortcuts</a></li>
			<li><a href="#"><i class="far fa-question-circle"></i>About</a></li>
			<li><a href="#"><i class="fas fa-sliders-h"></i>Services</a></li>
			<li><a href="#"><i class="fas fa-envelope"></i>Contact</a></li>
			<li><a href="#"><i class="fas fa-cog"></i>Settings</a></li>
			<li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
		</ul>
	</div>
	<section></section>

	<br>
	
</body>
</html>