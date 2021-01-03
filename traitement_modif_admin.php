<?php session_start();
	include('dbInit.php');
	$password = $_POST['pwn'];
	$ville = $_POST['ville'];
	$adress = $_POST['adress'];
	if(isset($_POST['admin']))$admin = 1;else $admin = 0;
	$bd->query('UPDATE user SET password=\''.$password.'\',ville=\''.$ville.'\',adress=\''.$adress.'\',genre='.$admin.' WHERE id_user='.$_GET['id_user']);
	header('location: index.php');
?>