<?php session_start();
	$bd = new PDO("mysql:host=localhost;dbname=khalil;charset=utf8","idriss","mysql");
	$email = $_POST['email'];
	$requeteTest = $bd->query('SELECT * FROM user WHERE email=\''.$email.'\'');
		if($itemTest = $requeteTest->fetch()) {
			$_SESSION['err1'] = "email_exist";
			header('location: connexion.php');
		}
		else {
			$_SESSION['email'] = $email;
			header('location: inscription.php');
		}
 ?>