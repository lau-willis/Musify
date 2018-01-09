<?php include "includes/classes/Account.php"; 
	  include "includes/classes/Constants.php";

	  $account = new Account();

	  include "includes/handlers/register-handler.php"; 
	  include "includes/handlers/login-handler.php"; 

	  function getInputValue($name){
	  	if(isset($_POST[$name])){
	  		echo $_POST[$name];
	 	 }
	}

?>

<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Welcome to Spotify</title>
    </head>
    <body>
		<div id="inputContainer">
			<form action="register.php" id="loginForm" method="POST">
				<h2>Login to your account</h2>
					<div>
						<label for="loginUsername">Username</label>
						<input type="text" id="loginUsername" name="loginUsername" placeholder="Enter Username" required>	
					</div>
					<div>
						<label for="loginPassword">Password</label>
						<input type="password" id="loginPassword" name="loginPassword" placeholder="Enter Password" required>	
					</div>
					<button type="submit" name="loginButton">Log In</button>
			</form>
			<form action="register.php" id="registerForm" method="POST">
				<h2>Register to your account</h2>
					<div>
						<?php echo $account->getError(Constants::$usernameCharacters); ?>
						<label for="username">Username</label>
						<input type="text" id="username" name="username" placeholder="Enter Username" required value="<?php getInputValue('username'); ?>">	
					</div>
					<div>
						<?php echo $account->getError(Constants::$firstnameCharacters); ?>
						<label for="firstname">First Name</label>
						<input type="text" id="firstname" name="firstname" placeholder="Enter First Name" required value="<?php getInputValue('firstname'); ?>">	
					</div>
					<div>
						<?php echo $account->getError(Constants::$lastnameCharacters); ?>
						<label for="lastname">Last Name</label>
						<input type="text" id="lastname" name="lastname" placeholder="Enter Last Name" required value="<?php getInputValue('lastname'); ?>">	
					</div>
					<div>
						<?php echo $account->getError(Constants::$emailInvalid); ?>
						<label for="email">Email</label>
						<input type="email" id="email" name="email" placeholder="Enter Email" required value="<?php getInputValue('email'); ?>">	
					</div>
					<div>
						<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$passwordNotAlphaNumberic); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?>
						<label for="registerPassword">Password</label>
						<input type="password" id="password" name="password" placeholder="Enter Password" required>	
					</div>
					<div>
						<label for="confirmPassword">Confirm Password</label>
						<input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>	
					</div>
					<button type="submit" name="registerButton">Register</button>
			</form>
		</div>
    </body>
</html>