<?php session_start(); 
	include('dbInit.php');
	$keyword = $_POST['keyword'];
	$requete = $bd->query('SELECT * FROM produit WHERE nom LIKE \'%'.$keyword.'%\'');

?>
<!DOCTYPE html>
<html>
<head>
	<title>resultat</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/font.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<?php include("icon.php"); ?>
</head>
<body style="position: relative;">
	<div class="row1" style="min-height: 800px">
		<?php include('header.inc.php'); ?>
		<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 20px">
        <section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        
      </div>
		<div id="navbar" class="navbar-collapse collapse">
    </div>
</nav>
</section>
</div>
		<div class="col-12 product_container" style="margin-bottom: 15px;">
			<h1 style="font-family: Bebas;color: #ff6826;padding-left: 15px;word-spacing: 5px;border-bottom: none">Resultats de recherche pour : '<?php echo $keyword; ?>'</h1>

			<?php
				while($item = $requete->fetch()) {
					$promo = "";
					if($item['prix_no_promo'] == "0")
						$promo = "display:none;";
					echo '<div class="col-2" style="">
	<div class="product-container0">
		<div class="image-container">
			<a class="product-link" href="page_produit.php?id_produit='.$item['id_produit'].'"><img class="product-img" src="'.$item['photo'].'"></a>
			<div class="product-name"><a href="page_produit.php?id_produit='.$item['id_produit'].'">'.$item['nom'].'</a></div>
			<div class="old-prix" style="'.$promo.'">'.number_format($item['prix_no_promo'],0,'.',' ').',00 Dhs</div>
			<div class="prix">'.number_format($item['prix'],0,'.',' ').',00 Dhs</div>
		</div>
		<div class="info-container" style="height:164px;">
			<div class="buttons">
				<a  href="addPanier.php?id_produit='.$item['id_produit'].'" class="addPanier">Ajouter Au Panier</a>
				<a  href="page_produit.php?id_produit='.$item['id_produit'].'" class="details">Details</a>
			</div>
		</div>
	</div>
</div>';
				}
			?>
			
		</div>
		<div class="col-12 pre_footer">
			<div style="text-align: center;width: 33%;">
				<div style="width: 100%">Besoin de conseil ?</div>
				<div style="width: 100%;font-weight: bold;color: #5bbf00;font-size: 1.5em;position: relative;bottom: 4px;">06 00 00 00 00</div>
			</div>
			<div style="text-align: center;width: 33%;">
				<img style="width: 60px" src="images/livraison.jpg" alt="Livraison gratuite">
				<div style="display: inline-flex;width: 64px;line-height: 13px;position: relative;bottom:7px;">Livraison gratuite</div>		
			</div>
			<div style="text-align: center;width: 33%;">
				<img style="width: 60px" src="images/paiment.jpg" alt="Livraison gratuite">
				<div style="display: inline-flex;width: 64px;line-height: 13px;position: relative;bottom:7px;">Paiement Sécurisé</div>		
			</div>
		</div>
</div>
<?php
	include('footer.php');
?>
<script type="text/javascript">
	var before = false;
	var linkPos = 1;
function changeBackground(linkPos){
	var url = "";
	var color = "";
	switch(linkPos) {
		case 1:
			url ="assets/css/images/1.jpg";
			color = "#fff"
		break;
		case 2:
			url ="assets/css/images/2.jpg";
			color = "#fff";
		break;
		case 3:
			url ="assets/css/images/3.jpg";
			color = "#fff";
		break;
		case 4:
			url ="assets/css/images/4.jpg";
			color = "#fff";
		break;
		case 5:
			url ="assets/css/images/5.jpg";
			color = "#242424";
		break;
	}
	if(before) {
		document.querySelector('body').style.background = color+" url("+url+") center top no-repeat";
		document.querySelector('.background').style.opacity = "0";
	}else {
		document.querySelector('.background').style.background = color+" url("+url+") center top no-repeat";
		document.querySelector('.background').style.opacity = "1";
}
before = !before;
}
function clickMarque(link) {
	for(var i =0;i<link.parentElement.children.length;i++){
		link.parentElement.children[i].children[0].style.border = "1px solid #ddd";
	}
	link.children[0].style.border = "1px solid #f00";
	linkPos = parseInt(link.className.charAt(4));
	changeBackground(linkPos);
}
setInterval(function(){
	if(linkPos >= 5)
		linkPos = 1;
	else
	linkPos++;
	changeBackground(linkPos);
},20000);
</script>
</body>
</html>
<?php $_SESSION['err1'] = ""; ?>