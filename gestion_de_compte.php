<?php session_start();
include('dbInit.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>gestion de compte</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<?php include("icon.php"); ?>
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
		
	<form method="post" class ="forme3" action="traitement_modif.php">
		<p class="email email2">Email : <?php echo $_SESSION['user']['email']; ?></p>
		<p class="email email2">Nom : <?php echo $_SESSION['user']['nom']; ?></p>
		<p class="email email2">Prenom : <?php echo $_SESSION['user']['prenom']; ?></p>
		<p class="email email2">telephone : <?php echo $_SESSION['user']['telephone']; ?></p>
		<p class="email passModif1">Mot de passe : ******   <a onclick="modif()" style="cursor: pointer;">Modifier</a></p>
		
	<span class="passModif2" style="display: none">
		<h4 style="margin: 0">*champ aubligatoire</h4>
		<input type="password" class="pwo" name="pwo" maxlength="16"  placeholder="votre ancien mot de passe*"><br>
		<input type="password" class="pwn" name="pwn" maxlength="16" placeholder="votre nouveau mot de passe*"><br>
		<input type="password" class="pwc" name="pwc" maxlength="16"  placeholder="confirmer votre mot de passe*"><br>
	</span>
		<input type="text" class="ville" name="ville" maxlength="16" value="<?php echo $_SESSION['user']['ville']; ?>" placeholder="votre ville*"><br>
		<input type="text" class="adress" name="adress" maxlength="30" value="<?php echo $_SESSION['user']['adress']; ?>" placeholder="votre adress*"><br>
		
			<button class="sauvegarder">Sauvegarder</button>
	</form>
</div>
</div>
</div>
<script type="text/javascript">
var passModif1 = document.querySelector(".passModif1");
var passModif2 = document.querySelector(".passModif2");
var bool = false;
const nom = document.querySelector(".nom");
const prenom = document.querySelector(".prenom");
const ville = document.querySelector(".ville");
const adress = document.querySelector(".adress");
const form2 = document.querySelector(".forme3");
var button2 = document.querySelector(".sauvegarder");
const pwo = document.querySelector(".pwo");
const pwn = document.querySelector(".pwn");
const pwc = document.querySelector(".pwc");
passO = "<?php echo $_SESSION['user']['password']; ?>";
function modif() {
	if(!bool) {
		bool = !bool;
		passModif1.style.display = "none";
		passModif2.style.display = "block";
	}
	else {
		bool = !bool;
		passModif2.style.display = "none";
		passModif1.style.display = "block";
	}
}
button2.addEventListener("click",function(e) {
	e.preventDefault();
	var err = document.querySelector(".err3");
	if(bool) {
		pwo.style.borderColor = "initial";
		pwo.style.backgroundColor = "#fff";
		pwn.style.borderColor = "initial";
		pwn.style.backgroundColor = "#fff";
		pwc.style.borderColor = "initial";
		pwc.style.backgroundColor = "#fff";
		if(pwo.value == "" || pwc.value == "" || pwn.value == "" || ville.value == "" || adress.value == "") {
			err.innerHTML = "<i onclick='hide3()' class='fas fa-times-circle hide2'></i> veuillez remplire tous les champs";
			err.style.display="-webkit-box";
		}
		else if(pwo.value != passO){
			err.innerHTML = "<i onclick='hide3()' class='fas fa-times-circle hide2'></i> mot de passe incorrect";
			err.style.display="-webkit-box";
			pwo.style.borderColor = "red";
		pwo.style.backgroundColor = "#fef0f2";
		}
		else if(pwn.value.length < 8 || pwn.value.length > 16) {
			err.innerHTML = "<i onclick='hide3()' class='fas fa-times-circle hide2'></i> votre mot de passe doit contenire entre 8 et 16 caracteres";
			err.style.display="-webkit-box";
			pwn.style.borderColor = "red";
		pwn.style.backgroundColor = "#fef0f2";
		}
		else if(pwn.value != pwc.value) {
			err.innerHTML = "<i onclick='hide3()' class='fas fa-times-circle hide2'></i> il faut entrer le meme mot de passe";
			err.style.display="-webkit-box";
			pwn.style.borderColor = "red";
		pwn.style.backgroundColor = "#fef0f2";
		pwc.style.borderColor = "red";
		pwc.style.backgroundColor = "#fef0f2";
		}
		else {
			form2.action = "traitement_modif.php?pass=true";
			form2.submit();
		}

	}
	else {
		if(ville.value == "" || adress.value == "") {
			err.innerHTML = "<i onclick='hide3()' class='fas fa-times-circle hide2'></i> veuillez remplire tous les champs";
			err.style.display="-webkit-box";
	}
	else {
		form2.action = "traitement_modif.php?pass=false";
		form2.submit();
	}}
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