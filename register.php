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
		</div>
    </body>
</html>