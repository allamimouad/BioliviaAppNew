<?php session_start(); 
	include('dbInit.php');
	if(!isset($_SESSION['user']))
		header('location: index.php');
	$requete = $bd->query('SELECT * FROM commande WHERE user='.$_SESSION['user']['id_user'].' ORDER BY date_ajout DESC');
?>
<!DOCTYPE html>
<html>
<head>
	<title>historique</title>
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
          			<div style="width:30%;display:inline-block;font-family: Bebas;font-size: 1.2em;">Numero de commande</div>
          			<div style="width:30%;display:inline-block;font-family: Bebas;font-size: 1.2em;">Date</div>
          			<div style="width:30%;display:inline-block;font-family: Bebas;font-size: 1.2em;">Prix total</div>
          			</div></li>
		<?php
		$count = 0;
		while ($element = $requete->fetch()) {
          			echo '<li><a class="commande-link" href="page_commande.php?id_commande='.$element['id_commande'].'"><div style="padding: 15px 0;">
          			<div style="width:30%;display:inline-block;font-size: 1.2em;">commande numero '.$element['id_commande'].'</div>
          			<div style="width:30%;display:inline-block;font-size: 1.2em;">'.$element['date_ajout'].'</div>
          			<div style="width:30%;display:inline-block;font-size: 1.2em;">'.number_format($element['total'],2,'.',' ').' DH</div>
          			</div></a></li>';
          			$count++;
          		} 
          		if($count == 0)
          			echo '<li><div style="padding: 15px 0;">Acune commande pour l\'instant</div></li>';
      
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