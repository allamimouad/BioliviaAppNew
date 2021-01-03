<?php session_start(); 
	include('dbInit.php');
	if(!isset($_SESSION['user']))
		header('location: index.php');
	$commandeItem = $bd->query('SELECT * FROM commande where id_commande='.$_GET['id_commande'])->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>commande</title>
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
		<h1><span>commande numero <?php echo $commandeItem['id_commande']; ?></span><span style="float: right;"><?php echo $commandeItem['date_ajout']; ?></span></h1>
		<ul style="padding: 0">
		<?php

		echo $commandeItem['text_content'];
		?>
	</ul>
	</div>
</div>
<?php include('footer.php'); ?>
<script type="text/javascript">

</script>
</body>
</html>