<?php
	  include "includes/config.php";
	  include "includes/classes/Account.php"; 
	  include "includes/classes/Constants.php";

	  $account = new Account($con);

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
        <link rel="stylesheet" href="assets/css/register.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="assets/js/register.js"></script>
    </head>
    <body>
    	<?php 
    	if(isset($_POST['registerButton'])){
    		echo '<script>
			  		  $(document).ready(function(){
			    	  $("#loginForm").hide();
					  $("#registerForm").show();
					  });
    			  </script>';	
    	}else{
    		echo '<script>
		    		$(document).ready(function(){
		    		$("#loginForm").show();
					$("#registerForm").hide();
					});
    			  </script>';
    	}
    	?>
    	<div id="background">
    		<div id="loginContainer">
				<div id="inputContainer">
					<form action="register.php" id="loginForm" method="POST">
						<h2>Login to your account</h2>
							<p>
								<?php echo $account->getError(Constants::$loginFailed); ?>
								<label for="loginUsername">Username</label>
								<input type="text" id="loginUsername" name="loginUsername" placeholder="Enter Username" required value="<?php getInputValue('loginUsername')?>">	
							</p>
							<p>
								<label for="loginPassword">Password</label>
								<input type="password" id="loginPassword" name="loginPassword" placeholder="Enter Password" required>	
							</p>
							<button type="submit" name="loginButton">Log In</button>
							<div class="hasAccountText">
								<span id="hideLogin">Don't have an account yet? Sign up here.</span>
							</div>
					</form>
					<form action="register.php" id="registerForm" method="POST">
						<h2>Register to your account</h2>
							<p>
								<?php echo $account->getError(Constants::$usernameCharacters); ?>
								<?php echo $account->getError(Constants::$usernameTaken); ?>
								<label for="username">Username</label>
								<input type="text" id="username" name="username" placeholder="Enter Username" required value="<?php getInputValue('username'); ?>">	
							</p>
							<p>
								<?php echo $account->getError(Constants::$firstnameCharacters); ?>
								<label for="firstname">First Name</label>
								<input type="text" id="firstname" name="firstname" placeholder="Enter First Name" required value="<?php getInputValue('firstname'); ?>">	
							</p>
							<p>
								<?php echo $account->getError(Constants::$lastnameCharacters); ?>
								<label for="lastname">Last Name</label>
								<input type="text" id="lastname" name="lastname" placeholder="Enter Last Name" required value="<?php getInputValue('lastname'); ?>">	
							</p>
							<p>
								<?php echo $account->getError(Constants::$emailInvalid); ?>
								<?php echo $account->getError(Constants::$emailTaken); ?>
								<label for="email">Email</label>
								<input type="email" id="email" name="email" placeholder="Enter Email" required value="<?php getInputValue('email'); ?>">	
							</p>
							<p>
								<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
								<?php echo $account->getError(Constants::$passwordNotAlphaNumberic); ?>
								<?php echo $account->getError(Constants::$passwordCharacters); ?>
								<label for="registerPassword">Password</label>
								<input type="password" id="password" name="password" placeholder="Enter Password" required>	
							</p>
							<p>
								<label for="confirmPassword">Confirm Password</label>
								<input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>	
							</p>
							<button type="submit" name="registerButton">Register</button>
							<div class="hasAccountText">
								<span id="hideRegister">Already have an account? Log in here.</span>
							</div>
					</form>
				</div>
				<div id="loginText">
					<h1>Get great music, right now</h1>
					<h2>Listen to loads of songs for free</h2>
					<ul>
						<li>Discover music that you'll fall in love with</li>
						<li>Create your own playlists</li>
						<li>Follow artists to keep up to date</li>
					</ul>
				</div>
			</div>
		</div>
    </body>
</html>