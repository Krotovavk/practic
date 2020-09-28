<?php
session_start();
	
include ('linkdb.php');

class Autoris extends linkBd{

	// Поменяй все POST как у тебя в html

	public function Sin_in(){

		$link = mysqli_connect($this->host,$this->user_db,$this->password_db,$this->database_db)
			or die(mysqli_error($link));

		$user_name = htmlentities(mysqli_real_escape_string($link,$_POST['name']));
		$password = $_POST['password'];
		$name = $_POST['name'];
		$password = md5($password."aisruifgo9egoiehrugeiporjg9jthpgioerdnpiguerio09u45fh434h09fg093420t0gbhui9rwhfg21fi34yqfgqgjwbe4780g34fgmpoierjh");

		$password = htmlentities(mysqli_real_escape_string($link,$password));			
		$email = htmlentities(mysqli_real_escape_string($link,$_POST['email']));

		$query = "INSERT INTO `user_acounts` VALUES(NULL,'$name','$password','$email')";
		$rights = mysqli_query($link, "INSERT INTO `user_rights` VALUES(NULL, '$email', NULL, '1')");
			$_SESSION['loged_user'] = $email;

		$result = mysqli_query($link, $query);

		if ($result and $rights){
				echo "вы зарегистрированы";
				/*
				header('Location: ');//Сюда воткнешь ссылку на страницу
				exit();*/
		}

	}

	function check(){

		$link = mysqli_connect($this->host,$this->user_db,$this->password_db,$this->database_db)
			or die(mysqli_error($link));

		if( isset($_POST['password'])
				and isset($_POST['email'])
				and isset($_POST['rep_password'])
				and isset($_POST['name']))
		{
			$password = $_POST['password'];
			$password_rep = $_POST['rep_password'];

			if($password == $password_rep){

				$len = strlen($password);
				if ($len >= 8 and $len <= 16){

					$email = $_POST['email'];
					$result = mysqli_query($link,"SELECT * FROM `user_acounts` WHERE email LIKE '$email' ");
					if ($result->num_rows > 0){
						echo "Всё херня, давай по новой";
					}
					else{
						$a = new Autoris;
						$a -> Sin_in();
					}

				}
				else{
					echo "повторный пароль не совпадает с исходным";
				}
			}
		}
	}
}

if (isset($_POST['ent_sin_up'])){ 
	$a = new Autoris;
	$a -> link();
	$a -> check();
}

?>