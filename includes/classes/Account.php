<?php

class Account{
	private $con;
	private $errorArray;
	public function __construct($con){
		$this->con = $con;
		$this->errorArray = [];
	}
		public function register($un, $fn, $ln, $em, $pass, $confirmPass){
				$this->validateUsername($un);
				$this->validateFirstname($fn);
				$this->validateLastname($ln);
				$this->validateEmail($em);
				$this->validatePasswords($pass, $confirmPass);

				if(empty($this->errorArray)){
					//if the error array is empty we can start inserting into db.
					return $this->insertUserDetails($un, $fn, $ln, $em, $pass);
				}else{
					return false;
				}
		}

		public function login($un, $pass){
			$pass = md5($pass);
			$query = mysqli_query($this->con, "SELECT * FROM users WHERE username = '$un' AND password = '$pass'");
			if(mysqli_num_rows($query) == 1){
				return true;
			}else{
				array_push($this->errorArray, Constants::$loginFailed);
				return false;
			}
		}

		public function getError($error){
			if(!in_array($error, $this->errorArray)){
				$error = "";
			}

			return "<span class='errorMessage'>$error</span>";
		}

		private function insertUserDetails($un, $fn, $ln, $em, $pass){
			$encryptedPass = md5($pass);
			$profilePic = "assets/images/profile-pics/head_emerald.png";
			$date = date("Y-m-d");

			$result = mysqli_query($this->con, "INSERT INTO users VALUES('','$un', '$fn', '$ln' ,'$em', '$encryptedPass', '$date', '$profilePic')");
			return $result;
		}

		private function validateUsername($un){
			if(strlen($un) > 25 || strlen($un) < 5){
				array_push($this->errorArray, Constants::$usernameCharacters);
				return;
			}
			$checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username = '$un'");
			if(mysqli_num_rows($checkUsernameQuery) != 0){
				array_push($this->errorArray, Constants::$usernameTaken);
				return;
			}

		}

		private function validateFirstname($fn){
			if(strlen($fn) > 25 || strlen($fn) < 2){
				array_push($this->errorArray, Constants::$firstnameCharacters);
				return;
			}
		}

		private function validateLastname($ln){
			if(strlen($ln) > 25 || strlen($ln) < 2){
				array_push($this->errorArray, Constants::$lastnameCharacters);
				return;
			}
		}

		private function validateEmail($em){
			if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
				array_push($this->errorArray, Constants::$emailInvalid);
				return;	
			}

			$checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email = '$em'");
			if(mysqli_num_rows($checkEmailQuery) != 0){
				array_push($this->errorArray, Constants::$emailTaken);
				return;
			}
		}

		private function validatePasswords($pass, $confirmPass){
			if($pass != $confirmPass){
				array_push($this->errorArray, Constants::$passwordsDoNotMatch);
				return;
			}

			if(preg_match('/[^A-Za-z0-9]/', $pass)){
				array_push($this->errorArray, Constants::$passwordNotAlphaNumberic);
				return;
			}

			if(strlen($pass) > 30 || strlen($pass) < 5){
				array_push($this->errorArray, Constants::$passwordCharacters);
				return;
			}
		}
}

?>