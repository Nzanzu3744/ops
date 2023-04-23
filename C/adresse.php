<?php
// include('../M/agent.class.php');
include('../M/adresse.class.php');
	if(isset($_GET['Idpay']) AND !empty($_GET['Idpay'])){
		$Idpays=htmlspecialchars($_GET['Idpay']);
		$adresse=adresse::rechercheprov($Idpays);
		?>
		<option value=""> Aucun </option>
		
		<?php
	 	while ($liste=$adresse->fetch()){
		?>
	 	<option value="<?php echo $liste['IdProv']?>"><?Php echo $liste['NomProv'];?></option>
		<?php
		}
	}
	if(isset($_GET['Idprov']) AND !empty($_GET['Idprov'])){
		$Idpro=htmlspecialchars($_GET['Idprov']);
		$adresse=adresse::rechercheville($Idpro);
		
		?>
		<option value=""> Aucun </option>
		
		<?php
	 	while ($liste=$adresse->fetch()){
		?>
	 	<option value="<?php echo $liste['IdVille']?>"> <?Php echo $liste['NomVille'];?></option>
		<?php
		}
	}

	if(isset($_GET['Idville']) AND !empty($_GET['Idville'])){
		$Idv=htmlspecialchars($_GET['Idville']);
		$adresse=adresse::recherchequart($Idv);
		
		?>
		<option value=""> Aucun </option>
		
		<?php
	 	while ($liste=$adresse->fetch()){
		?>
	 	<option value="<?php echo $liste['IdQuart']?>"> <?Php echo $liste['NomQuart'];?></option>
		<?php
		}
	}
		


                             