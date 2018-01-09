<?php

class Account{
	private $errorArray;
	public function __construct(){
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
					return true;
				}else{
					return false;
				}
		}

		public function getError($error){
			if(!in_array($error, $this->errorArray)){
				$error = "";
			}

			return "<span class='errorMessage'>$error</span>";
		}

		private function validateUsername($un){
			if(strlen($un) > 25 || strlen($un) < 5){
				array_push($this->errorArray, Constants::$usernameCharacters);
				return;
			}
			//TODO: check if username exists
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

			//TODO: Check if username hasnt already been used;
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