<?php session_start(); 
	include('dbInit.php');
	$condition = "1";
	$string = "";
		if($_POST['marqueP'] != "0"){
		$condition = $condition." AND constructeur=".$_POST['marqueP'];
		$marque = $bd->query('SELECT nom FROM constructeur WHERE id_constructeur='.$_POST['marqueP'])->fetch()['nom'];
		$string = $string . " " . $marque;
	}
	if($_POST['typeP'] != "0"){
		$condition = $condition." AND type_pneu='".$_POST['typeP']."'";
		$string = $string . " " . $_POST['typeP'];
	}
	if($_POST['largeurP'] != "0"){
		$condition = $condition." AND largeur=".$_POST['largeurP'];
		$string = $string . " " . $_POST['largeurP'];
	}
	if($_POST['hauteurP'] != "0"){
		$condition = $condition." AND hauteur=".$_POST['hauteurP'];
		$string = $string . " " . $_POST['hauteurP'];
	}
	if($_POST['diametreP'] != "0"){
		$condition = $condition." AND diametre='".$_POST['diametreP']."'";
		$string = $string . " " . $_POST['diametreP'];
	}
	if($_POST['chargeP'] != "0"){
		$condition = $condition." AND charge='".$_POST['chargeP']."'";
		$string = $string . " " . $_POST['chargeP'];
	}
	if($_POST['vitesseP'] != "0"){
		$condition = $condition." AND vitesse='".$_POST['vitesseP']."'";
		$string = $string . " " . $_POST['vitesseP'];
	}
	if(isset($_POST['runflat'])){
		$condition = $condition." AND RunFlat=1";
		$string = $string . " RunFlat";
	}

	$requete = $bd->query('SELECT * FROM produit WHERE '.$condition);
?>
<!DOCTYPE html>
<html>
<head>
	<title>filtre</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/font.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body style="position: relative;">
	<div class="row1" style="min-height: 800px">
		<?php include('header.inc.php');
		include('filtre.php'); ?>
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
			<h1 style="font-family: Bebas;color: #ff6826;padding-left: 15px;word-spacing: 5px;border-bottom: none"><?php echo $string; ?></h1>
			<?php
				while($item = $requete->fetch()) {
					switch ($item['fuel']) {
						case 'A':
							$fuel = "#2ea550";
							break;
						case 'B':
							$fuel = "#58b849";
							break;
						case 'C':
							$fuel = "#bbd735";
							break;
						case 'D':
							$fuel = "#fbf51f";
							break;
						case 'E':
							$fuel = "#f6b928";
							break;
						case 'F':
							$fuel = "#ea7130";
							break;
						case 'G':
							$fuel = "#e32732";
							break;						
					}
					switch ($item['breaking']) {
						case 'A':
							$breaking = "#2ea550";
							break;
						case 'B':
							$breaking = "#58b849";
							break;
						case 'C':
							$breaking = "#bbd735";
							break;
						case 'D':
							$breaking = "#fbf51f";
							break;
						case 'E':
							$breaking = "#f6b928";
							break;
						case 'F':
							$breaking = "#ea7130";
							break;
						case 'G':
							$breaking = "#e32732";
							break;						
					}
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
			<div class="caracteristique-photos">
				<img src="images/fuel.jpg">
				<img src="images/braking.jpg">
				<img src="images/noise.jpg">
			</div>
			<div class="caracteristique">
				<span class="fuel" style="background-color:'.$fuel.';">'.$item['fuel'].'</span>
				<span class="breaking" style="background-color:'.$breaking.';">'.$item['breaking'].'</span>
				<span class="noise">'.$item['noise'].'dB</span>
			</div>
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
			<div style="text-align: center;width: 20%;">
				<div style="width: 100%">Besoin de conseil ?</div>
				<div style="width: 100%;font-weight: bold;color: #ff6826;font-size: 1.5em;position: relative;bottom: 4px;">06 00 00 00 00</div>
			</div>
			<div style="text-align: center;width: 20%;">
				<img style="width: 60px" src="https://static.allopneus.com/marketing/mail/kameleoon/livraison-gratuite.jpg" alt="Livraison gratuite">
				<div style="display: inline-flex;width: 64px;line-height: 13px;position: relative;bottom:7px;">Livraison gratuite</div>		
			</div>
			<div style="text-align: center;width: 20%;">
				<img style="width: 60px" src="https://static.allopneus.com/marketing/mail/kameleoon/paiement.jpg" alt="Livraison gratuite">
				<div style="display: inline-flex;width: 64px;line-height: 13px;position: relative;bottom:7px;">Paiement Sécurisé</div>		
			</div>
			<div style="text-align: center;width: 20%;">
				<img style="width: 60px" src="https://static.allopneus.com/marketing/mail/kameleoon/centre-montage.jpg" alt="Livraison gratuite">
				<div style="display: inline-flex;width: 82px;line-height: 13px;position: relative;bottom:7px;">Centres de montage</div>		
			</div>
			<div style="text-align: center;width: 20%;">
				<img style="width: 60px" src="https://static.allopneus.com/marketing/mail/kameleoon/montage-domicile.jpg" alt="Livraison gratuite">
				<div style="display: inline-flex;width: 64px;line-height: 13px;position: relative;bottom:7px;">Montage à domicile</div>		
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