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
	<title>carte credit</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<style type="text/css">
		<?php include("icon.php"); ?>
		/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
	</style>
</head>
<body style="position: relative;">
	<div class="row1">
		<?php include('header.inc.php'); ?>
	<div class="col-12" style="margin-top: 40px;">
		<h1 class="titreP">GESTION DE COMPTE</h1>
	</div>
<div class="col-12">
	<div class="form2">
		<h1 class="titreS" style="margin-bottom: 30px;">GESTION DE COMPTE</h1>
		<p class="err3"></p>
		
	<form method="post" class ="forme3" action="payement.php">
		<p class="email email2" style="font-size: 1.4em">Email : <?php echo $_SESSION['user']['email']; ?></p>
		<p class="email email2" style="font-size: 1.4em">Nom : <?php echo $_SESSION['user']['nom']; ?></p>
		<p class="email email2" style="font-size: 1.4em">Prenom : <?php echo $_SESSION['user']['prenom']; ?></p>
		<textarea name="commande" style="display: none"><?php echo $_POST['commande']; ?></textarea>
		<input type="number" class="ccNum" name="ccNum" placeholder="Numero de carte" style="height: 50px;font-size: 1.5em;width: 314px;"><br>
		<select name="mois" class="ccMois" style="height: 50px;font-size: 1.5em;width: 150px;margin-right: 10px;padding-left:7px; ">
			<option value="0">Mois</option>
			<option value="1">jan</option>
			<option value="2">fev</option>
			<option value="3">mar</option>
			<option value="4">avr</option>
			<option value="5">mai</option>
			<option value="6">jun</option>
			<option value="7">jui</option>
			<option value="8">aou</option>
			<option value="9">sep</option>
			<option value="10">oct</option>
			<option value="11">nov</option>
			<option value="12">dec</option>
		</select>
		<select name="annee" class="ccAnnee" style="height: 50px;font-size: 1.5em;width: 150px;padding-left:7px; ">
			<option value="0">Annee</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
			<option value="2024">2024</option>
			<option value="2025">2025</option>
			<option value="2026">2026</option>
			<option value="2027">2027</option>
			<option value="2028">2028</option>
			<option value="2029">2029</option>
			<option value="2030">2030</option>
			<option value="2031">2031</option>
		</select><br>
		<input type="number" class="ccv" name="ccv" placeholder="CCV" maxlength="3" style="height: 50px;font-size: 1.5em;width: 150px;margin-right: 15px"><p style="width: 150px;display: inline-flex;font-size: 0.9em;position: relative;bottom: 20px;color: #888;">3 ou 4 chiffres généralement trouvés sur la bande de signature</p><br>
		
			<button class="sauvegarder" style="width: 314px">Valider</button>
	</form>
</div>
</div>
</div>
<script type="text/javascript">
var button2 = document.querySelector(".sauvegarder");
button2.addEventListener("click",function(e) {
	e.preventDefault();
	var err = document.querySelector(".err3");
		if(document.querySelector('.ccNum').value == "" || document.querySelector('.ccMois').value == "0" || document.querySelector('.ccAnnee').value == "0" || document.querySelector('.ccv').value == "") {
			err.innerHTML = "<i onclick='hide3()' class='fas fa-times-circle hide2'></i> veuillez remplire tous les champs";
			err.style.display="-webkit-box";
		}
		else {
			document.querySelector('.forme3').submit();
		}
});
function hide1() {
	var err = document.querySelector(".err1");
	err.style.display="none";
}
function hide3() {
	var err = document.querySelector(".err3");
	err.style.display="none";
}
function changeArrow1() {
	var arrow = document.querySelector(".item");
	arrow.innerHTML = "<i id='arrow' class='fas fa-sort-up arrow'></i>";
	arrow.style.top = "3px";
}
function changeArrow2() {
	var arrow = document.querySelector(".item");
	arrow.innerHTML = "<i id='arrow' class='fas fa-sort-down arrow'></i>";
	arrow.style.top = "0px";
}
</script>
</body>
</html>