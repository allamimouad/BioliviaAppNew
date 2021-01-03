<?php session_start(); 
	include('dbInit.php');
	if(!isset($_SESSION['user']))
		header('location: index.php');
	else if($_SESSION['user']['genre'] == "0")
		header('location: index.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>ajouter produit</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body style="position: relative;">
	<div style="width: 100%;height: 100%;background-color: rgba(0,0,0,0.5);z-index: 2000;display: none;position: fixed;top: 0;left: 0" class="confirmation-container">
  <div style="position: absolute;width: 30%;top: 42.5%;left: 35%;background-color: #fff;border: 7px solid #777;border-radius: 6px;text-align: right;" >
    <p style="padding: 5px 10px;background: #ddd;color: #888;text-align: left;font-size: 0.9em;">supprimer</p>
    <p class="confirmation-text" style="padding-bottom: 5px;border-bottom: 1px solid #ddd;margin-top: 10px;text-align: left;font-size: 0.9em;padding-left: 10px;"><img src="images/jhon.png" style="width: 30px;height: auto;margin-right: 5px;">Are you sure about that ?</p>
      <button id="no" class="no">no</button>
      <button id="yes" class="yes">yes</button> 
  </div>
  </div>
	<div class="row1">
		<?php include('header.inc.php'); ?>
		<form class="form-produit" method="post" action="creation_produit.php" enctype="multipart/form-data">
	<div class="col-12 product_container" style="margin-bottom: 15px;margin-top: 25px;background-color: #fff;padding: 30px;border-top: 4px solid #ff6826;">
	
	<div class="col-3">
		<div style="padding: 4px;border: 1px solid gainsboro;" class="image-container1">
			<input id="file" type="file" name="photo" style="display: none">
                    <button style="padding:0;border:none; width: 100%;height: 560px; background:url('images/placeholder.png');background-size: cover;" id="photo"><div class="balck-background" style="width: 100%;height: 100%;top:0;right: 0;"><span class="file-span" style="font-weight: bold;position: relative;top: 46%;"><i style="font-size: 1.3em;" class="fas fa-upload"></i><br><span class="file-name" >Set Image</span></span></div></button>
		</div>
	</div>
	<div class="col-6">
		<div style="padding: 13px 10px 10px 40px;" class="info-container">
			<p><input type="text" class="title" name="nom" style="width: 100%" placeholder="Nom du produit"></p><br>
			 <p style="margin-top: 22px;"><span style="font-weight: bold;">Prix : </span><input type="number" class="prix-input" name="prix" style="width: 100px" min="0" placeholder="prix"> DH</p>
			<p style="margin-top: 22px;"><span style="font-weight: bold;">Stock : </span><input type="number" class="stock" name="stock" style="width: 100px" min="0" placeholder="stock"></p>
			<textarea style="font-size: 1.6em;margin-top: 25px;margin-bottom: 40px;width: 100%;height: 150px;padding: 5px 10px;" placeholder="Description" name="description"></textarea>
		</div>
	</div>
	
	</div>
	<button class="sauvegarder" style="margin-bottom: 10px">Sauvegarder</button>
</form>
</div>
<?php include('footer.php'); ?>
<script type="text/javascript">
	var title = document.querySelector('.title');
	var constructeur = document.querySelector('.constructeur');
	var prix = document.querySelector('.prix-input');
	var stock = document.querySelector('.stock');
	var largeur = document.querySelector('.largeur');
	var hauteur = document.querySelector('.hauteur');
	var diametre = document.querySelector('.diametre');
	var charge = document.querySelector('.charge');
	var vitesse = document.querySelector('.vitesse');
	var saison = document.querySelector('.saison');
	var RunFlat = document.querySelector('.RunFlat');
	var Renforce = document.querySelector('.Renforce');
	var fuel = document.querySelector('.fuel-input');
	var breaking = document.querySelector('.breaking-input');
	var noise = document.querySelector('.noise-input');
	var type_pneu = document.querySelector('.type_pneu');
	var dimension = document.querySelector('.dimension');
	var buttonSupp = document.querySelector('.supprimer');
	var buttonSauv = document.querySelector('.sauvegarder');
	var form = document.querySelector('.form-produit');
	function setDimension(){
		let dim = largeur.value+"/"+hauteur.value+diametre.value+" "+charge.value+vitesse.value;
		dimension.textContent = dim;
	}
	function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      document.querySelector('#photo').style.background = "url("+e.target.result+")";
      document.querySelector('#photo').style.backgroundSize = "cover";
    }
    reader.readAsDataURL(input.files[0]);
    document.querySelector('.file-name').textContent = input.files[0]['name'];
  }
}
$("#file").change(function() {
  readURL(this);
});
$("#photo").on('click',function(event) {
  event.preventDefault();
  $("#file").click();
});
$(".sauvegarder").on('click',function(event) {
  event.preventDefault();
  if(title.value == "" || prix.value == "" || stock.value == "" || document.querySelector('#file').files.length == 0)
  	window.alert("fill all blanks !");
  else
  	form.submit();
});
</script>
</body>
</html>