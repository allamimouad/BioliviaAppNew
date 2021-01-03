<?php 
	session_start();
	$key = $_GET['key'];
	unset($_SESSION['panier'][intval($key)]);
	header('location: index.php');
 ?>