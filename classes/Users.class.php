<?php
class Users {
	private $db;
	private $username;
	private $password;
	private $email;

	public function __construct(){
		$this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
		if($this->db->connect_errno > 0) {
			die("Fel vid anslutning: " . $this->db->connect_error);
		}
	}
	public function setUsername($username){
		if($username != ""){
			if(preg_match('/^[a-zA-Z0-9åäö]*$/', $username)){
				$this->username = $username;
				return true;	
		} else {
			return false;
		}				
	}
	public function setPassword($password){
		if($password != ""){
			if(preg_match('/^[a-zA-Z0-9åäö]*$/', $password)){
			$this->password = $password;
			return true;		
			}

		} else {
			return false;
		}
	}
	public function setEmail($email){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			$this->email = $email;
			return true;
		} else {
			return false;
		}
	}
	public function getUsername(){
		return $this->username;
	}
	public function getPassword(){
		return $this->password;
	}
	public function getEmail(){
		return $this->email;
	}
	public function saveUser{
		$hashPass = md5($this->password);
		$sql = "INSERT INTO Users(username, password, email)VALUES('" . $this->username . "','" . $hashPass . "','" . $this->email "');";
		if($result = $this->db->query($sql)) {
			return true;
		} else {
			return false;
		}
	}

}

