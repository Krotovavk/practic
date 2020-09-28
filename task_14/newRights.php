<?php

include('linkdb.php');

class new_rights extends linkBd{


		function updete_admin(){

			$link = mysqli_connect($this->host,$this->user_db,$this->password_db,$this->database_db)
					or die(mysqli_error($link));

			$new_adm = $_POST['email_root'];// передача методом post выбранного пользователя
			$check_Admin_In_Db = mysqli_query($link, "SELECT * FROM `user acounts` WHERE email = '$new_adm' ");
			$admin = mysqli_fetch_assoc($check_Admin_In_Db);
			$admin = $admin['email'];
			if($admin){

				$result = mysqli_query($link, "UPDATE `user rights` SET  `admin` = '1' , user = '0' WHERE `user_name` = '$admin' ");
			}
			else{
				echo "Ошибка, Администратор не добавлен.";
			}

		}


		function delete(){

			$link = mysqli_connect($this->host,$this->user_db,$this->password_db,$this->database_db)
					or die(mysqli_error($link));

			$del_admin = $_POST['email_root'];// считываем удаляемого Админа методот POST

			$check_Admin_In_Db = mysqli_query($link, "SELECT * FROM `user acounts` 
					WHERE email = '$del_admin' ");

			$admin = mysqli_fetch_assoc($check_Admin_In_Db);
			$admin = $admin['email'];
			if($admin){
				$result = mysqli_query($link, "DELETE FROM `user rights` WHERE user_name = '$admin' ");
				$result = mysqli_query($link, "DELETE FROM `user acounts` WHERE email = '$admin' ");
			}
			else{
				echo ("Ошибка, Администратор не удалён.");
			}

		}


		function updete_user(){

			$link = mysqli_connect($this->host,$this->user_db,$this->password_db,$this->database_db)
					or die(mysqli_error($link));

			$new_user = $_POST['email_root'];// передача методом post выбранного пользователя
			$check_user = mysqli_query($link, "SELECT * FROM `user acounts` WHERE email = '$new_user' ");
			$user = mysqli_fetch_assoc($check_user);
			$user = $user['email'];
			if($user){
				$result = mysqli_query($link, "UPDATE `user rights` SET  `admin` = '0' , user = '1' WHERE `user_name` = '$user' ");
				echo "жопа";
			}
			else{
				echo "Ошибка, User не добавлен.";
			}

		}

		
	
}

$a = new new_rights;
$a -> link();

if (isset($_POST['add_admin'])){
	$a -> updete_admin();
}
if (isset($_POST['ent_del'])){
	$a -> delete();
}
if (isset($_POST['add_user'])){
	$a -> updete_user();
}


?>