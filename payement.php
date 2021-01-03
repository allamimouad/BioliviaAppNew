<?php session_start(); 
	include('dbInit.php');
	if(!isset($_SESSION['user']) or !isset($_SESSION['panier']))
		header('location: index.php');
	else if(count($_SESSION['panier']) == 0)
		header('location: index.php');
else{
	$total = 0;
	$error = false;
	foreach ($_SESSION['panier'] as $key => $produit) {
			$total += floatval($produit['prix']);
			$stock = intval($bd->query('SELECT stock FROM produit WHERE id_produit='.$produit['id_produit'])->fetch()['stock']);
			if(intval($produit['quantite']) > $stock)
				$error = true;
		}	
	$commande = $_POST['commande'];
	if(!$error){
		$bd->query('INSERT INTO commande(user,text_content,total) VALUES('.$_SESSION['user']['id_user'].',\''.$commande.'\','.$total.')');
		$id = $bd->lastInsertId();
		foreach ($_SESSION['panier'] as $key => $produit) {
			$bd->query('UPDATE produit SET stock = stock - '.$produit['quantite'].' WHERE id_produit='.$produit['id_produit']);
		}
	}
	unset($_SESSION['panier']);
	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>payement</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<?php include("icon.php"); ?>
</head>
<body style="position: relative;">
	<div class="row1">
		<?php include('header.inc.php'); ?>
		
	<div class="col-12 product_container" style="margin-bottom: 15px;margin-top: 25px;background-color: #fff;padding: 30px;border-top: 4px solid #ff6826;min-height: 250px">
		<ul style="padding: 0">
		<li><div style="margin-top:10px;">
			<?php if($error) echo '<p class="err3" style="display: -webkit-box;"><i class="fas fa-exclamation-triangle" style="margin-right: 5px;"></i>Une erreur est survenue lors de la finalisation de la commande</p>'; else echo '<p class="err3" style="display: -webkit-box;background: #4bda63;border-color: #58b849;"><i class="fas fa-check-circle" style="margin-right: 5px;"></i>Merci pour votre commande numero '.$id; ?>. <a href="index.php" style="color: #fff;font-size: 1.1em">continuez vos achats.</a></p>
		</div></li>
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