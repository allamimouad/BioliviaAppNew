<?php session_start(); 
	include('dbInit.php');
	if(!isset($_SESSION['user']) or !isset($_SESSION['panier']))
		header('location: index.php');
	else if(count($_SESSION['panier']) == 0)
		header('location: index.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>commander</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<?php include("icon.php"); ?>
</head>
<body style="position: relative;">
	<div class="row1">
		<?php include('header.inc.php'); ?>
	<div class="col-12 product_container" style="margin-bottom: 15px;margin-top: 25px;background-color: #fff;padding: 30px;border-top: 4px solid #ff6826;">
		<ul style="padding: 0">
		<?php
		$total = 0;
		$commande = "";
		foreach ($_SESSION['panier'] as $key=>$element) {
          			$commande .='<li><div ><a href="page_produit.php?id_produit='.$element['id_produit'].'"><img src="'.$element['photo'].'" class="imgPanier" style="width:120px;height:160px;"></a><span class="quantite" style="font-size:1.7em;">'.$element['quantite'].' x </span> <a style="position: relative;bottom: 28px;padding:0;color:grey;font-size:1.5em;" href="page_produit.php?id_produit='.$element['id_produit'].'">'.$element['nom'].'</a><span class="pricePanier" style="font-weight:bold;font-size:1.3em;">'.number_format($element['prix'],0,'.',' ').' Dhs</span></div></li>';
          			$total += intval($element['prix']);
          		}
          		$commande .='<li><div class="total" style="margin-top:10px;border-top:3px solid grey"><span class="left" style="font-weight:bold;font-size:1.3em">Total</span><span class="right" style="float: right;font-weight:bold;font-size:1.3em">'.number_format($total,0,'.',' ').' DHS</span></div></li>'; 
          		echo $commande;
		?>
		<li><div style="margin-top:10px;">
			<form method="post" action="payement.php" class="payer">
				<textarea class="commandeText" name="commande" style="display: none"></textarea>
				<input type="radio" id="cc" name="methode" value="cc" style="width: 14px;" checked>
				<label for="cc" style="position: relative;bottom: 12px;margin-right: 8px">Carte credit</label>
				<input type="radio" id="pl" name="methode" value="pl" style="width: 14px;">
				<label for="pl" style="position: relative;bottom: 12px">Payement a la livraison</label>
				<button class="sauvegarder" style="float: right;font-weight:bold;font-size:1.3em;position: relative;bottom: 20px">Payer</button>
			</form>

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