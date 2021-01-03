<?php session_start();
	include('dbInit.php');
	$email = $_POST['email'];
	$password = $_POST['password'];
	$requeteTest = $bd->query('SELECT * FROM user WHERE email=\''.$email.'\'');
	if($itemTest = $requeteTest->fetch()) {
		if($password == $itemTest['password']) {
			$_SESSION['session']="on";
			$_SESSION['user']=$itemTest;
		}
		else  {
		$_SESSION['err'] = "pass";
	}
	}
	else {
		$_SESSION['err'] = "email";
	}
	header('location: index.php');
 ?>