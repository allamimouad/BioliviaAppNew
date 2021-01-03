<?php session_start();
include('dbInit.php');
if(!isset($_SESSION['user']))
		header('location: index.php');
	else if($_SESSION['user']['genre'] == "0")
		header('location: index.php');
$item = $bd->query('SELECT * FROM user WHERE id_user='.$_GET['id_user'])->fetch(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>gestion des comptes</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<?php include("icon.php"); ?>
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
	<div class="col-12" style="margin-top: 40px;">
		<h1 class="titreP">GESTION DE COMPTE</h1>
	</div>
<div class="col-12">
	<div class="form2">
		<h1 class="titreS" style="margin-bottom: 30px;">GESTION DE COMPTE NUMERO <?php echo $item['id_user']; ?></h1>
		<p class="err3"></p>
		
	<form method="post" class ="forme3" action="traitement_modif_admin.php?id_user=<?php echo $item['id_user']; ?>">
		<p class="email email2">Email : <?php echo $item['email']; ?></p>
		<p class="email email2">Nom : <?php echo $item['nom']; ?></p>
		<p class="email email2">Prenom : <?php echo $item['prenom']; ?></p>
		<p class="email email2">telephone : <?php echo $item['telephone']; ?></p>
		<label for="pwn" style="display: block;margin:0;">Mot de pass</label><input type="text" class="pwn" name="pwn" maxlength="16"  value="<?php echo $item['password']; ?>" placeholder="votre nouveau mot de passe*"><br>
		<label for="ville" style="display: block;margin:0;">Ville</label><input type="text" class="ville" name="ville" maxlength="16" value="<?php echo $item['ville']; ?>" placeholder="votre ville*"><br>
		<label for="adress" style="display: block;margin:0;">Adress</label><input type="text" class="adress" name="adress" maxlength="30" value="<?php echo $item['adress']; ?>" placeholder="votre adress*"><br>
		<label for="admin" style="display: block;margin:0;">Admin</label><input type="checkbox" id="admin" class="admin" name="admin" style="width: 25px;" <?php if($item['genre'] == "1") echo 'checked'; ?>><br>
		
			<button class="sauvegarder">Sauvegarder</button> <button class="supprimer">Supprimer</button>
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
var button3 = document.querySelector('.supprimer');
const pwn = document.querySelector(".pwn");
button2.addEventListener("click",function(e) {
	e.preventDefault();
	var err = document.querySelector(".err3");
		pwn.style.borderColor = "initial";
		pwn.style.backgroundColor = "#fff";
		if(pwn.value == "" || ville.value == "" || adress.value == "") {
			err.innerHTML = "<i onclick='hide3()' class='fas fa-times-circle hide2'></i> veuillez remplire tous les champs";
			err.style.display="-webkit-box";
		}
		else if(pwn.value.length < 8 || pwn.value.length > 16) {
			err.innerHTML = "<i onclick='hide3()' class='fas fa-times-circle hide2'></i> le mot de passe doit contenire entre 8 et 16 caracteres";
			err.style.display="-webkit-box";
			pwn.style.borderColor = "red";
		pwn.style.backgroundColor = "#fef0f2";
		}
		else {
			form2.submit();
		}

});
button3.addEventListener("click",function(e) {
	e.preventDefault();
	document.querySelector('.confirmation-container').style.display = "block";
});
document.querySelector('#no').addEventListener("click",function(e) {
	e.preventDefault();
	document.querySelector('.confirmation-container').style.display = "none";
});
document.querySelector('#yes').addEventListener("click",function(e) {
	e.preventDefault();
	form2.action = "delete_user.php?id_user=<?php echo $item['id_user']; ?>";
	form2.submit();
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