<?php 
	session_start();
	include('dbInit.php');
	$id_produit = $_GET['id_produit'];
	$requete = $bd->query('SELECT * FROM produit WHERE id_produit='.$id_produit);
	$item = $requete->fetch();
	if(isset($_POST['quantite']))
		$quantite = intval($_POST['quantite']);
	else $quantite = 1;
	if(!isset($_SESSION['panier'])) {
		$_SESSION['panier'] = array(array('id_produit'=>intval($item['id_produit']),'nom' => $item['nom'],'photo' => $item['photo'],'prix'=>intval($item['prix'])*$quantite,'quantite'=>$quantite));
	}
	else {
		array_push($_SESSION['panier'], array('id_produit'=>intval($item['id_produit']),'nom' => $item['nom'],'photo' => $item['photo'],'prix'=>intval($item['prix'])*$quantite,'quantite'=>$quantite));
	}
	header('location: index.php');
 ?>