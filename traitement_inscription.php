<?php session_start();
	include('dbInit.php');
	$email = $_POST['email'];
	if($item = $bd->query('SELECT * FROM user WHERE email=\''.$email.'\'')->fetch()){
		$_SESSION['errIns'] = 'emailI';
		header('location: inscription.php');
	}
	else {
	$password = $_POST['password'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$ville = $_POST['ville'];
	$adress = $_POST['adress'];

	$telephone = $_POST['telephone'];
	
	$bd->query('INSERT INTO user(nom,prenom,telephone,email,password,ville,adress,genre) VALUES(\''.$nom.'\',\''.$prenom.'\',\''.$telephone.'\',\''.$email.'\',\''.$password.'\',\''.$ville.'\',\''.$adress.'\',\'0\')');
	$_SESSION['session']="on";
	$_SESSION['user']=$bd->query('SELECT * FROM user WHERE id_user='.$bd->lastInsertId())->fetch();
	header('location: index.php');
}
?>