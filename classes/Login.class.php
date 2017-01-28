<?php
class Login {
	private $db;
	private $checkPass;
	private $checkUser;

	public function __construct(){
		$this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
		if($this->db->connect_errno > 0) {
			die("Fel vid anslutning: " . $this->db->connect_error);
		}
	}
	public function setUser($checkUser){
		if($username != ""){
			if(preg_match('/^[a-zA-Z0-9åäö]*$/', $checkUser)){
				$this->checkUser = $checkUser;
				return true;	
		} else {
			return false;
		}				
	}
	public function setPass($checkPass){
		if($password != ""){
			if(preg_match('/^[a-zA-Z0-9åäö]*$/', $checkPass)){
			$this->checkPass = $checkPass;
			return true;		
			}

		} else {
			return false;
		}
	}

}



