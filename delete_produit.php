<?php
	session_start();
	include('dbInit.php');
	$id_produit = $_GET['id_produit'];
	$bd->query('DELETE FROM produit WHERE id_produit='.$id_produit);
	header('location: products.php');
?>