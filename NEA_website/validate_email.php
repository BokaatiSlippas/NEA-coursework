<?php

$email = $_POST['email'];

if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

	exit("invalid format");

}

$api_key = "82d25f57dfd84118bd839112bb18254e";

$ch = curl_init();

curl_setopt_array($ch, [
	CURLOPT_URL => "https://emailvalidation.abstractapi.com/v1?api_key=$api_key&email=$email",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true
]);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);

if(($data['deliverability'] === "UNDELIVERABLE") || ($data['is_disposable_email']["value"] === true)) {
	header('Location: invalid_email.php');
	exit();
}

var_dump($data);
exit;

echo "email address is valid";