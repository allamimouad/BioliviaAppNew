<div class="filtre_area">
	<div style="width: 100%"><h1>Sélectionnez les dimensions de vos pneus</h1></div>
	<div style="width: 100%;display: flex;">
		<div style="width: 50%;border-right: 10px solid #fff;border-bottom: 10px solid transparent;"></div>
		<div style="width: 50%;border-left: 10px solid #fff;border-bottom: 10px solid transparent;"></div>
	</div>
	<div class="filtre_container">
		<form method="post" action="filtreResult.php" style="position: relative;" class="filtre-form">
			<div class="type select" style="display: inline-block;">
				
			<label class="select-label" style="margin-left: 21%">Type</label><select onchange="typePneu(this)" style="margin-left:7.5%" class="typeP" name="typeP">
				<option value="0">Type de pneus</option>
				<?php
					$requeteMarques = $bd->query('SELECT * FROM produit GROUP BY type_pneu ORDER BY type_pneu');
					while($itemMarques = $requeteMarques->fetch()){
						echo '<option value="'.$itemMarques['type_pneu'].'">'.$itemMarques['type_pneu'].'</option>';
					}
				?>
			</select>
			<label class="select-label" style="margin-left: 12%">Marque</label><select onchange="marque(this)" class="marque" name="marqueP">
				<option value="0">Marques</option>
				<?php
					$requeteMarques = $bd->query('SELECT * FROM constructeur');
					while($itemMarques = $requeteMarques->fetch()){
						echo '<option value="'.$itemMarques['id_constructeur'].'">'.$itemMarques['nom'].'</option>';
					}
				?>
			</select>
			<label style="margin-left: 7.5%;margin-top: 6px"><input type="checkbox" name="runflat" style="width: 15px;height: 15px;margin: 0; position: relative;top: 3px;margin-right: 3px;">Runflat</label>
		</div>
		<div class="references select1" style="display: inline;">
			<div style="width: 100%">
			<label class="select-label">Largeur</label><select onchange="largeur(this)" style="margin-top: 19px" class="largeur" name="largeurP">
				<option value="0">Largeur</option>
<?php
					$requeteMarques = $bd->query('SELECT * FROM produit GROUP BY largeur ORDER BY largeur');
					while($itemMarques = $requeteMarques->fetch()){
						echo '<option value="'.$itemMarques['largeur'].'">'.$itemMarques['largeur'].'</option>';
					}
				?>
			</select>
			<label class="select-label">Hauteur</label><select onchange="hauteur(this)" style="margin-top: 19px" class="hauteur" name="hauteurP">
				<option value="0">Hauteur</option>
	<?php
					$requeteMarques = $bd->query('SELECT * FROM produit GROUP BY hauteur ORDER BY hauteur');
					while($itemMarques = $requeteMarques->fetch()){
						echo '<option value="'.$itemMarques['hauteur'].'">'.$itemMarques['hauteur'].'</option>';
					}
				?>
			</select>
			
			<label class="select-label">Diametre</label><select onchange="diametre(this)" style="margin-top: 19px" class="diametre" name="diametreP">
				<option value="0">Diametre</option>
	<?php
					$requeteMarques = $bd->query('SELECT * FROM produit GROUP BY diametre ORDER BY diametre');
					while($itemMarques = $requeteMarques->fetch()){
						echo '<option value="'.$itemMarques['diametre'].'">'.$itemMarques['diametre'].'</option>';
					}
				?>diametre
			</select>
			
			<label class="select-label">Charge</label><select onchange="charge(this)" style="margin-top: 19px" class="charge" name="chargeP">
				<option value="0">Charge</option>
	<?php
					$requeteMarques = $bd->query('SELECT * FROM produit GROUP BY charge ORDER BY charge');
					while($itemMarques = $requeteMarques->fetch()){
						echo '<option value="'.$itemMarques['charge'].'">'.$itemMarques['charge'].'</option>';
					}
				?>charge
			</select>
			
			<label class="select-label">Vitesse</label><select onchange="vitesse(this)" style="margin-top: 19px" class="vitesse" name="vitesseP">
				<option value="0">Vitesse</option>
				<?php
					$requeteMarques = $bd->query('SELECT * FROM produit GROUP BY vitesse ORDER BY vitesse');
					while($itemMarques = $requeteMarques->fetch()){
						echo '<option value="'.$itemMarques['vitesse'].'">'.$itemMarques['vitesse'].'</option>';
					}
				?>
			</select>
			<button class="search_button">Recherche</button>
		</div>
		<div style="width: 100%; padding-top: 7px;padding-left: 117px;">
			<img src="images/pneu.png">

			<span class="Lar ref" style="top: 97px;left: 175px;transform: rotate(-37deg);">255</span>
			<span class="ref" style="top: 82px;left: 216px;transform: rotate(-37deg);">/</span>
			<span class="Haut ref" style="top: 75px;left: 232px;transform: rotate(-11deg);">55</span>
			<span class="Diam ref" style="top: 76px;left: 269px;transform: rotate(12deg);">R16</span>
			<span class="Char ref" style="top: 92px;left: 318px;transform: rotate(30deg);">93</span>
			<span class="Vit ref" style="top: 119px;left: 350px;transform: rotate(46deg);">V</span>
		</div>	
		</div>
		</form>
	</div>
	<script type="text/javascript">
		document.querySelector('.search_button').onclick = function(event){
			event.preventDefault();
			if(document.querySelector('.typeP').value == "0" &&
				document.querySelector('.marque').value == "0" &&
				document.querySelector('.largeur').value == "0" &&
				document.querySelector('.hauteur').value == "0" &&
				document.querySelector('.diametre').value == "0" &&
				document.querySelector('.charge').value == "0" &&
				document.querySelector('.vitesse').value == "0")
				window.alert("remplissez au moin un filtre !");
			else
				document.querySelector('.filtre-form').submit();
		};
		function marque(input){
			if(input.value == "0")
				input.previousSibling.style.display = "none";
			else
				input.previousSibling.style.display = "initial";
		}
		function typePneu(input){
			if(input.value == "0")
				input.previousSibling.style.display = "none";
			else
				input.previousSibling.style.display = "initial";
		}
		function largeur(input){
			if(input.value == "0")
				input.previousSibling.style.display = "none";
			else
				input.previousSibling.style.display = "initial";
		document.querySelector(".Lar").innerHTML = input.value;
		document.querySelector(".Lar").style.color = "#E55335";
		document.querySelector(".Haut").style.color = "#E55335";
		document.querySelector(".Diam").style.color = "#E55335";
		document.querySelector(".Char").style.color = "#E55335";
		document.querySelector(".Vit").style.color = "#E55335";
		setTimeout(function(){document.querySelector(".Lar").style.color = "#fff";
		document.querySelector(".Haut").style.color = "#fff";
		document.querySelector(".Diam").style.color = "#fff";
		document.querySelector(".Char").style.color = "#fff";
		document.querySelector(".Vit").style.color = "#fff";},400);
		
	}
	function hauteur(input){
		if(input.value == "0")
				input.previousSibling.style.display = "none";
			else
				input.previousSibling.style.display = "initial";
		document.querySelector(".Haut").innerHTML = input.value;
		document.querySelector(".Haut").style.color = "#E55335";
		document.querySelector(".Diam").style.color = "#E55335";
		document.querySelector(".Char").style.color = "#E55335";
		document.querySelector(".Vit").style.color = "#E55335";
		setTimeout(function(){
		document.querySelector(".Haut").style.color = "#fff";
		document.querySelector(".Diam").style.color = "#fff";
		document.querySelector(".Char").style.color = "#fff";
		document.querySelector(".Vit").style.color = "#fff";},400);
	}
	function diametre(input){
		if(input.value == "0")
				input.previousSibling.style.display = "none";
			else
				input.previousSibling.style.display = "initial";
		document.querySelector(".Diam").innerHTML = input.value;
		document.querySelector(".Diam").style.color = "#E55335";
		document.querySelector(".Char").style.color = "#E55335";
		document.querySelector(".Vit").style.color = "#E55335";
		setTimeout(function(){
		document.querySelector(".Diam").style.color = "#fff";
		document.querySelector(".Char").style.color = "#fff";
		document.querySelector(".Vit").style.color = "#fff";},400);
	}
	function charge(input){
		if(input.value == "0")
				input.previousSibling.style.display = "none";
			else
				input.previousSibling.style.display = "initial";
		document.querySelector(".Char").innerHTML = input.value;
		document.querySelector(".Char").style.color = "#E55335";
		document.querySelector(".Vit").style.color = "#E55335";
				setTimeout(function(){
		document.querySelector(".Char").style.color = "#fff";
		document.querySelector(".Vit").style.color = "#fff";},400);
	}
	
	function vitesse(input){
		if(input.value == "0")
				input.previousSibling.style.display = "none";
			else
				input.previousSibling.style.display = "initial";
		document.querySelector(".Vit").innerHTML = input.value;
		document.querySelector(".Vit").style.color = "#E55335";
		setTimeout(function(){
		document.querySelector(".Vit").style.color = "#fff";},400);
	}
	</script>
</div>