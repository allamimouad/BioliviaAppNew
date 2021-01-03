<?php session_start(); 
	include('dbInit.php');
	if(!isset($_SESSION['user']))
		header('location: index.php');
	else if($_SESSION['user']['genre'] == "0")
		header('location: index.php');
	$requete = $bd->query('SELECT * FROM user WHERE id_user!='.$_SESSION['user']['id_user']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>clients</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<?php include("icon.php"); ?>
</head>
<body style="position: relative;">
	<div class="row1">
		<?php include('header.inc.php'); ?>
	<div class="col-12 product_container" style="min-height: 250px;margin-bottom: 15px;margin-top: 25px;background-color: #fff;padding: 30px;border-top: 4px solid #ff6826;">
		<ul style="padding: 0">
			<li><div style="font-family: Bebas">
          			<div style="width:6%;display:inline-block;font-family: Bebas;font-size: 1.2em;">ID</div>
          			<div style="width:25%;display:inline-block;font-family: Bebas;font-size: 1.2em;">NOM PRENOM</div>
          			<div style="width:30%;display:inline-block;font-family: Bebas;font-size: 1.2em;">Admin</div>
          			<div style="width:30%;display:inline-block;font-family: Bebas;font-size: 1.2em;">NOMBRE DE COMMANDES</div>
          			</div></li>
		<?php
		$count = 0;
		while ($element = $requete->fetch()) {
			$commandes = $bd->query('SELECT COUNT(*) AS nombre FROM commande WHERE user='.$element['id_user'])->fetch()['nombre'];
			if($element['genre'] == "1") $adminCheck = 'oui';else$adminCheck = 'non';
          			echo '<li><a class="commande-link" href="gestion_de_compte_admin.php?id_user='.$element['id_user'].'"><div style="padding: 15px 0;">
          			<div style="width:6%;display:inline-block;font-size: 1.2em;">'.$element['id_user'].'</div>
          			<div style="width:25%;display:inline-block;font-size: 1.2em;">'.$element['nom'].' '.$element['prenom'].'</div>
          			<div style="width:30%;display:inline-block;font-size: 1.2em;">'.$adminCheck.'</div>
          			<div style="width:30%;display:inline-block;font-size: 1.2em;">'.$commandes.'</div>
          			</div></a></li>';
          		} 
      
		?>

	</ul>
	</div>
</div>
<?php include('footer.php'); ?>
<script type="text/javascript">
	function plus() {
		var input = document.querySelector('.quantitee');
		input.value++;
	}
	function moins() {
		var input = document.querySelector('.quantitee');
		if(input.value>1)
		input.value--;
	}
	document.querySelector('.sauvegarder').addEventListener('click',function(event){
		event.preventDefault();	
		if(document.querySelector('#cc').checked){
			document.querySelector('.commandeText').value = '<?php echo $commande; ?>';
			document.querySelector('.payer').action = "ccInfo.php";
			document.querySelector('.payer').submit();
		}
		else{
			document.querySelector('.commandeText').value = '<?php echo $commande; ?>';
			document.querySelector('.payer').submit();
		}
	});
</script>
</body>
</html>