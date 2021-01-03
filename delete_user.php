<?php
	session_start();
	include('dbInit.php');
	$id_user = $_GET['id_user'];
	$bd->query('DELETE FROM user WHERE id_user='.$id_user);
	header('location: clients.php');
?>