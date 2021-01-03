<?php session_start();
	include('dbInit.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body style="position: relative;">
	<div class="row1">
		<?php include('header.inc.php'); ?>
	<div class="col-12" style="margin-top: 40px;">
		<h1 class="titreP">INSCRIVEZ-VOUS</h1>
	</div>
<div class="col-12">
	<div class="form2">
		<h1 class="titreS" style="margin-bottom: 30px;">INSCRIPTION</h1>
		<p class="err3" <?php if(isset($_SESSION['errIns'])){if($_SESSION['errIns'] == "emailI") echo "style='display:-webkit-box;'";} ?>><?php if(isset($_SESSION['errIns'])){if($_SESSION['errIns'] == "emailI") echo "<i onclick='hide2()' class='fas fa-times-circle hide2'></i> cet email est deja utilise dans un autre compte";} ?></p>
		<?php $_SESSION['errIns'] = ""; ?>
		<h4 style="margin: 0">*champ aubligatoire</h4>
	<form method="post" class ="forme3" action="traitement_inscription.php">
		<input type="email" class="nom emailIn" name="email" maxlength="40" placeholder="votre email*"><br>
		<input type="text" class="nom" name="nom" maxlength="16" placeholder="votre nom*"><br>
		<input type="text" class="prenom" name="prenom" maxlength="16" placeholder="votre prenom*"><br>
		<input type="text" class="prenom" name="telephone" maxlength="10" placeholder="numéro de téléphone*"><br>
		<input type="text" class="ville" name="ville" maxlength="16" placeholder="votre ville*"><br>
		<input type="text" class="adress" name="adress" maxlength="30" placeholder="votre adress*"><br>
		<input type="password" class="password pass new" name="password" maxlength="16" placeholder="votre mot de passe*"><br>
		<input type="password" class="password pass confirm" name="pass" maxlength="16" placeholder="confirmer mot de passe*"><br>
			<button class="connexion">Créer un compte</button>
	</form>
</div>
</div>
</div>
<?php include('footer.php'); ?>
<script type="text/javascript">
const email = document.querySelector(".emailIn");
const nom = document.querySelector(".nom");
const prenom = document.querySelector(".prenom");
const ville = document.querySelector(".ville");
const adress = document.querySelector(".adress");
const form2 = document.querySelector(".forme3");
var button2 = document.querySelector(".connexion");
const pw = document.querySelector(".new");
const pwn = document.querySelector(".confirm");

button2.addEventListener("click",function(e) {
	e.preventDefault();
	pw.style.borderColor = "initial";
		pw.style.backgroundColor = "#fff";
	var err = document.querySelector(".err3");
	pwn.style.borderColor = "initial";
		pwn.style.backgroundColor = "#fff";
	if(nom.value == "" || pw.value == ""|| prenom.value == "" || adress.value == "" || ville.value == "" || email.value == "") {
		err.innerHTML = "<i onclick='hide2()' class='fas fa-times-circle hide2'></i> veuillez remplire tous les champs";
		err.style.display="-webkit-box";
	}
	else if(pw.value.length < 8 || pw.value.length > 16) {
		err.innerHTML = "<i onclick='hide2()' class='fas fa-times-circle hide2'></i> votre mot de passe doit contenire entre 8 et 16 caracteres";
		err.style.display="-webkit-box";
		pw.style.borderColor = "red";
		pw.style.backgroundColor = "#fef0f2";
	}
	else if(pw.value != pwn.value) {
		err.innerHTML = "<i onclick='hide2()' class='fas fa-times-circle hide2'></i> il faut entrer le meme mot de passe";
		err.style.display="-webkit-box";
		pw.style.borderColor = "red";
		pw.style.backgroundColor = "#fef0f2";
		pwn.style.borderColor = "red";
		pwn.style.backgroundColor = "#fef0f2";
	}
	else 
		form2.submit();
});
function hide1() {
	var err = document.querySelector(".err1");
	err.style.display="none";
}
function hide2() {
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