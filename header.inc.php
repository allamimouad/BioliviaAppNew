<p class="err2" style="position: fixed;top:<?php if(isset($_SESSION['err'])){
  if($_SESSION['err'] != "pass" && $_SESSION['err'] != "email") echo "-52px";else echo "0";
}else echo "-52px"; ?>;width: 100%;display: initial;left: 0;z-index: 1001;margin-top: 0;transition: top 300ms ease-in-out">
  <?php 
if(isset($_SESSION['err'])){
  if($_SESSION['err'] == "pass") echo "<i onclick='hide2()' class='fas fa-times-circle hide2' style='margin-right:5px;'></i> mot de passe incorrect";else if($_SESSION['err'] == "email") echo "<i onclick='hide()' class='fas fa-times-circle hide2' style='margin-right:5px;'></i> aucun utilisateur n'est inscrit avec cet email, etes vous nouveau ? <a href='inscription.php' style='color:#fff;font-size:0.95em'>inscrivez vous</a>";
}
 $_SESSION['err'] = "no";  ?>
</p>
<link rel="stylesheet" type="text/css" href="assets/css/header.css">
<div class="header">
	<div class="header_top">
		<div class="row">
		<div class="col-4" style="text-align: center; margin-bottom: 0;">
			<a href="index.php"><img class="logo" src="images/logoTB.png"></a>
		</div>
		<div class="col-4" style="text-align: right; margin-bottom: 0; margin-top: 16px;">
			<form method="post" action="resultat.php" class="formS">
				<div class="divS">
				<input style="padding-left: 12px;" class="search" type="text" name="keyword" maxlength="30" placeholder="Recherchez">
				<button class="buttonS"><i class="fas fa-search"></i></button>
			</div>
			</form>
		</div>
		<div class="col-4" style="text-align: center; margin-bottom: 0; margin-top: 0;">
			<ul class="nav navbar-nav main_nav panierUl">
			<li class='dropdown' style="width: 100%"><a class='dropdown-toggle' style="text-align: left;padding-top: 30px;padding-bottom: 25px;background: #333;color: white;font-size: 1.4em;font-weight: bold;" data-toggle='dropdown' role='button' aria-expanded='false' href='#'><i class="fas fa-shopping-cart"></i> Panier <span class="nbProduit"><?php if(isset($_SESSION['panier'])){if(count($_SESSION['panier']) == 0) echo "(vide)";
			else echo count($_SESSION['panier'])." Articles";}else echo "(vide)"; ?></span><span style="float: right;" class="arrow"><i class="fas fa-chevron-down"></i></span></a>
          <ul class='dropdown-menu okok' style="border:none;background-color: #484848;" role='menu'>
          	<?php  if(isset($_SESSION['panier'])){if(count($_SESSION['panier']) > 0) {
          		$total = 0;
          		foreach ($_SESSION['panier'] as $key=>$element) {
          			echo'<li><div ><a href="page_produit.php?id_produit='.$element['id_produit'].'"><img src="'.$element['photo'].'" class="imgPanier"></a><span class="quantite">'.$element['quantite'].' x </span> <a style="position: relative;bottom: 28px;padding:0;" href="page_produit.php?id_produit='.$element['id_produit'].'">'.substr(strtolower($element['nom']), 0,25).'...</a><span class="pricePanier">'.number_format($element['prix'],0,'.',' ').' Dhs</span><a href ="deletPanier.php?key='.$key.'"><i style="float: right;font-size: 1.3em;position: relative;" class="fas fa-times-circle hide1"></i></a></div></li>';
          			$total += intval($element['prix']);
          		} 
          		echo '<li><div style="background-color: #3d3d3d;"><div class="total"><span class="left">Total</span><span class="right" style="float: right;">'.number_format($total,0,'.',' ').' Dhs</span></div></div></li><li><div style="background-color: #333;text-align: center"><a href="commander.php"; id="commander" class="commander">Commander</a></div></li>';
          	}
          	}
          	 ?>   
            </ul>
          </li>
      </ul>
		</div>
	</div>
		</div>
			<div id="header_bottom" class="header-bottom">
			<div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          <li><a href="index.php" class="home-link" style="color: #fff;border-right: none"><i class="fas fa-home"></i></a></li>
        </ul>
        <ul class="nav navbar-nav main_nav connexion3">
          <li class='dropdown' style='width: 100%'><a style='color: white;border-right: none;letter-spacing: 2px;' class='dropdown-toggle connexion2' data-toggle='dropdown' role='button' aria-expanded='false' href='#'><?php if(isset($_SESSION['user'])) echo $_SESSION['user']['prenom']." ".$_SESSION['user']['nom']; else echo 'ESPACE CLIENT'; ?><span style='float: right; margin-left: 8px;' class='arrow'> <i style="color: #fff" class="fas fa-chevron-down"></i></span></a>
            <?php if(isset($_SESSION['user'])){ $admin = ""; if($_SESSION['user']['genre'] == "1")$admin = '<li><a href="clients.php" style="font-size:1.1em;font-family:Bebas;padding-top:8px;padding-bottom:8px;"><i class="fas fa-user-cog" style="margin-right:10px;"></i>Liste clients</a></li><li><a href="products.php" style="font-size:1.1em;font-family:Bebas;padding-top:8px;padding-bottom:8px;"><i class="fas fa-cubes" style="margin-right:10px;"></i>Liste produits</a></li>'; echo '<ul class="dropdown-menu" style="min-width: 100%; border:none; left:unset; right:0; background-color: #f7f7f7;">
            <li><a href="gestion_de_compte.php" style="font-size:1.1em;font-family:Bebas;padding-top:8px;padding-bottom:8px;"><i class="fas fa-cogs" style="margin-right:10px;"></i>Mon compte</a></li>
            <li><a href="history.php" style="font-size:1.1em;font-family:Bebas;padding-top:8px;padding-bottom:8px;" class="helper"><i class="fas fa-history" style="margin-right:10px;"></i>Historique</a></li>'.$admin.'<li><a href="deconnexion.php" style="font-size:1.1em;font-family:Bebas;padding-top:8px;padding-bottom:8px;" class="helper"><i class="fas fa-sign-out-alt" style="margin-right:10px;"></i>Deconnexion</a></li>
            </ul>'; }else echo '<ul class="dropdown-menu" role="menu" style="text-align: center;display: none;width: 130%;left: unset;right: 0px;border: 2px solid #ff6826;">
              <li class="login">
                <h1 style="border:none;font-weight: bold;padding-bottom: 7px;padding-top: 7px;font-size: 0.9em;">J\'AI DÉJÀ UN COMPTE</h1>
                <form class="login_form" method="post" action="inscription.php">
                  <label style="font-weight: lighter;font-size: 0.9em;color: #666;margin-bottom: 0;">Email</label><br>
                  <i class="fas fa-user" style="position: absolute;top: 66px;left: 25px;"></i><input autocomplete="off" style="width: 100%;border-radius: 3px;border:1px solid #bbb;margin-top: 0;padding-left: 23px;" type="email" name="email" placeholder="Votre email" class="email">
                  <label style="font-weight: lighter;font-size: 0.9em;color: #666;margin-bottom: 0;">Mot de passe</label><br>
                  <i class="fas fa-key" style="position: absolute;top: 130px;left: 25px;"></i><input style="width: 100%;border-radius: 3px;border:1px solid #bbb;margin-top: 0;padding-left: 23px;margin-bottom: 0" type="password" maxlength="16" name="password" placeholder="Mot de passe" class="password">
                </form>
                <div style="text-align: right;padding-right: 7.5%;"><a href="#">mot de passe oublié ?</a></div>
                <div style="padding-right: 7.5%;padding-left: 7.5%;">
                  <button class="login_button" onclick="connexion()" style="font-size: 1em;font-weight: bold;">SE CONNECTER</button>
                </div>
                <div style="margin: 10px 3.75%;padding: 0 3.75%;border-top: 1px solid #333;">
                  <h1 style="border:none;font-weight: bold;padding-bottom: 7px;padding-top: 7px;font-size: 0.9em;">JE N\'AI PAS DE COMPTE</h1>
                  <button class="login_button" onclick="document.querySelector(\'.login_form\').submit()" style="margin-top: 0;font-size: 1em;font-weight: bold;">S\'INSCRIRE</button>
                </div>
              </li>
            </ul>'; ?>

          
          </li>
        </ul>
      </div>
    </nav>
  </section>
      </div>
      
    </div>
		</div>
		</div>
    <script type="text/javascript">
      document.querySelector('.buttonS').addEventListener('click',function(event){
        event.preventDefault();
        if(document.querySelector('.search').value.length>0)
          document.querySelector('.formS').submit();
      });
      function connexion(){
        if(document.querySelector('.email').value == "" || document.querySelector('.password').value == ""){
          document.querySelector(".err2").innerHTML = "<i onclick='hide()' class='fas fa-times-circle hide2' style='margin-right:5px;'></i> veuillez remplire tous les champs";
          document.querySelector(".err2").style.top = "0";
        }
        else {
          document.querySelector('.login_form').action = "authentification.php";
          document.querySelector('.login_form').submit()
        }
      }
      function hide(){
        document.querySelector(".err2").style.top = "-52px";
      }
      function trie(input){
        if(input.value != "0"){
          window.location.href = "setOrder.php?order="+input.value+"&href="+window.location.href;
        }
      }
      
      document.querySelector('.commander').addEventListener('click',function(event){
        event.preventDefault();
        var helper;
        if(helper = document.querySelector('.helper'))
          window.location.href = "commander.php";
        else{
          document.querySelector(".err2").innerHTML = "<i onclick='hide()' class='fas fa-times-circle hide2' style='margin-right:5px;'></i> connectez vous avant de passer la commande";
          document.querySelector(".err2").style.top = "0";
        }
      });
    </script>
		<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/header.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/custom.js"></script>