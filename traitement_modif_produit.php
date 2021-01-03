<?php
	session_start();
	include('dbInit.php');
	$title = $_POST['nom'];
	$prix = $_POST['prix'];
	$stock = $_POST['stock'];
	$description = $_POST['description'];
	$prix_no_promo = "0";
	$priceItem = $bd->query('SELECT prix,prix_no_promo FROM produit WHERE id_produit='.$_GET['id_produit'])->fetch();
	$oldPrixNoPromo = floatval($priceItem['prix_no_promo']);
	$oldPrix = floatval($priceItem['prix']);
	if($oldPrixNoPromo > floatval($prix))
		$prix_no_promo = $oldPrixNoPromo;
	else if($oldPrix > floatval($prix))
		$prix_no_promo = $oldPrix;
	if($_FILES['photo']['name'] == ""){
	$query = 'UPDATE produit SET nom=\''.$title.'\',prix='.$prix.',prix_no_promo='.$prix_no_promo.',description=\''.$description.'\',stock='.$stock.' WHERE id_produit='.$_GET['id_produit'];
}
else{
	$target_dir = "images/products/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["photo"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["photo"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

	$query = 'UPDATE produit SET nom=\''.$title.'\',prix='.$prix.',prix_no_promo='.$prix_no_promo.',stock='.$stock.',description=\''.$description.'\',photo=\''.$target_file.'\' WHERE id_produit='.$_GET['id_produit'];
	echo $query;
}
$bd->query($query);
header('location: products.php');
?>