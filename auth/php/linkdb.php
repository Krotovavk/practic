<?php

class linkBd{

	public $host = 'localhost';
	public $database_db = "pizza";
	public $user_db = 'root';
	public $password_db = 'root';//Поменяй пароль к sql
	

	function link(){

		$link = mysqli_connect($this->host,$this->user_db,$this->password_db,$this->database_db)
				or die(mysqli_error($link));

	}



}

?>