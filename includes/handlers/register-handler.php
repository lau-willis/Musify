<?php 

function sanitizeFormString($inputText){
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	//$inputText = ucfirst(strtolower($inputText)); ucfirst() takes the first letter in string and caps it
	return $inputText;
}

function sanitizeFormPassword($inputText){
	$inputText = strip_tags($inputText);
	return $inputText;
}


if(isset($_POST['registerButton'])){
	$username = sanitizeFormString($_POST['username']);
	$firstname = sanitizeFormString($_POST['firstname']);
	$lastname = sanitizeFormString($_POST['lastname']);
	$email = sanitizeFormString($_POST['email']);
	$password = sanitizeFormPassword($_POST['password']);
	$confirmPassword = sanitizeFormPassword($_POST['confirmPassword']);

	$wasSuccessful = $account->register($username, $firstname, $lastname, $email, $password, $confirmPassword);
	if($wasSuccessful){
		header("Location: index.php");
	}
}



?>