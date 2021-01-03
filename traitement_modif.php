<?php session_start();
	include('dbInit.php');
	if($_GET['pass']=="true")$password = $_POST['pwn'];
	$ville = $_POST['ville'];
	$adress = $_POST['adress'];
	if($_GET['pass']=="true") $bd->query('UPDATE user SET password=\''.$password.'\',ville=\''.$ville.'\',adress=\''.$adress.'\' WHERE id_user='.$_SESSION['user']['id_user']);
	else 
		$bd->query('UPDATE user SET ville=\''.$ville.'\',adress=\''.$adress.'\' WHERE id_user='.$_SESSION['user']['id_user']);
	$_SESSION['user']=$bd->query('SELECT * FROM user WHERE id_user='.$_SESSION['user']['id_user'])->fetch();
	header('location: index.php');
?>