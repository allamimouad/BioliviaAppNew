<?php session_start(); 
	include('dbInit.php');
	$requete = $bd->query('SELECT * FROM produit WHERE id_produit='.$_GET['id_produit']);
	$item = $requete->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>produit</title>
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
	
	<div class="col-3">
		<div style="padding: 4px;border: 1px solid gainsboro;" class="image-container1">
			<img style="width: 100%" class="img-produit" src="<?php echo $item['photo']; ?>">
		</div>
	</div>
	<div class="col-3">
		<div style="padding: 13px 10px 10px 40px;" class="info-container">
			<h2 style="font-weight: normal;margin-bottom: 26px;"><?php echo $item['nom']; ?></h2>
			<p><span style="font-weight: bold;">État : </span><span style="font-size: 0.9em;color: grey;">Nouveau produit</span></p>
			<p style="margin-top: 22px;"><span style="font-weight: bold;">Stock : </span><?php if($item['stock'] == "0") echo '<span style="background-color: #ff3b31;border: 1px solid #d93737;color: white;font-weight: bold;font-size: 0.9em;padding: 8px;">NON DISPONIBLE</span>'; else echo '<span style="background-color: #29c770;border: 1px solid #2ea550;color: white;font-weight: bold;font-size: 0.9em;padding: 8px;">DISPONIBLE</span>'; ?></p>
			<p style="font-size: 1.6em;margin-top: 25px;margin-bottom: 40px;"><?php echo $item['description']; ?></p>
			<span style="background-color: #fe9126;border: 1px solid #e4752b;color: white;font-weight: bold;font-size: 0.9em;padding: 8px;">PRODUIT SUR COMMANDE</span>
		</div>
	</div>
	<div class="col-2">
		<div style="border: 1px solid gainsboro;background-color: #f6f6f6;" class="ajoutPanier-container">
			<div style=" box-shadow: 0px 6px 93px 26px rgba(0,0,0,0.2);padding: 13px 10px 34px 25px;" class="pricePlace">
				<h2 ><span style="    font-size: 1.7em;
    font-weight: bold;"><?php echo $item['prix']; ?>DH</span><span style="font-size:0.5em;">TTC</span></h2>
    <h2 style="    <?php if($item['prix_no_promo'] == "0") echo "display: none;"; ?>line-height: 0;
    position: relative;
    left: 4px;
    text-decoration: line-through;"><span style="    font-size: 0.7em;
    font-weight: bold;"><?php echo $item['prix_no_promo']; ?>DH</span></h2>
			</div>
			<form class="addPanier" method="post" action="addPanier.php?id_produit=<?php echo $item['id_produit']; ?>">
			<div style="
    box-shadow: 0px 6px 93px 26px rgba(0,0,0,0.2);
    padding: 20px 10px 21px 25px;" class="panierPlace">
				<span style="font-weight: bold;
    font-size: 0.9em;">Quantité</span><br>
				<input class="quantitee" style="width: 77px;height: 28px" type="number" name="quantite" value="1" min="1" onchange="change(this)"> <span onclick="moins()" class="moinss" style="color: grey;
    padding: 6px 7px 4px 6px;
    background: #fff;
    border: 1px solid gainsboro;
    cursor: pointer;"><i class="fas fa-minus"></i></span><span onclick="plus()" class="pluss" style="color: grey;
    padding: 6px 7px 4px 6px;
    background: #fff;
    border: 1px solid gainsboro;
    cursor: pointer;"><i class="fas fa-plus"></i></span>
			</div>
			<div style="
    box-shadow: 0px 6px 93px 26px rgba(0,0,0,0.2);
    padding: 13px 10px 15px 10px;" id="buttonPLace">
				<button class="buttonPanier" style="border-radius:10px;border: 1px solid #06b2e6; font-size: 1.4em;background-image: linear-gradient(#007ab7,#009ad0);padding: 12px;
    color: white;
    font-weight: bold;"><span style="padding-right: 10px"><i class="fas fa-shopping-cart"></i></span><span>Ajouter au panier</span></button>
			</div>
		</form>
		</div>
	</div>
	
	</div>

</div>
<?php include('footer.php'); ?>
<script type="text/javascript">
	var stock = <?php echo $item['stock']; ?>;
	function plus() {
		var input = document.querySelector('.quantitee');
		input.value++;
		if(input.value > stock){
			document.querySelector('.buttonPanier').style.background = "#ddd";
			document.querySelector('.buttonPanier').style.border = "1px solid #ddd";
			document.querySelector('.buttonPanier').style.cursor = "auto";
			document.querySelector('.buttonPanier').onclick = function(event){
				event.preventDefault();
			};
		}	
	}
	function moins() {
		var input = document.querySelector('.quantitee');
		if(input.value>1)
		input.value--;
	if(input.value <= stock){
			document.querySelector('.buttonPanier').style.background = "#009ad0";
			document.querySelector('.buttonPanier').style.border = "1px solid #06b2e6";
			document.querySelector('.buttonPanier').style.cursor = "pointer";
			document.querySelector('.buttonPanier').onclick = function(event){
				document.querySelector('.addPanier').submit();
			};
		}
	}
	function change(input){
		if(input.value > stock){
			document.querySelector('.buttonPanier').style.background = "#ddd";
			document.querySelector('.buttonPanier').style.border = "1px solid #ddd";
			document.querySelector('.buttonPanier').style.cursor = "auto";
			document.querySelector('.buttonPanier').onclick = function(event){
				event.preventDefault();
			};
		}
		else{
			document.querySelector('.buttonPanier').style.background = "#009ad0";
			document.querySelector('.buttonPanier').style.border = "1px solid #06b2e6";
			document.querySelector('.buttonPanier').style.cursor = "pointer";
			document.querySelector('.buttonPanier').onclick = function(event){
				document.querySelector('.addPanier').submit();
			};
		}
	}
	if(document.querySelector('.quantitee').value > stock){
			document.querySelector('.buttonPanier').style.background = "#ddd";
			document.querySelector('.buttonPanier').style.border = "1px solid #ddd";
			document.querySelector('.buttonPanier').style.cursor = "auto";
			document.querySelector('.buttonPanier').onclick = function(event){
				event.preventDefault();
			};
		}
</script>
</body>
</html>