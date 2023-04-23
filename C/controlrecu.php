<?php
include('../M/facture.class.php');
include('../M/taux.class.php');
include('../M/consommation.class.php');
// include('../C/MonSms.php');
include('../V/pages/tableaufacture_caisse.php');
//affichage de la facture 
if (isset($_GET['idfacture']) AND !empty($_GET['idfacture'])) {
  $idfact=htmlspecialchars($_GET['idfacture']);
  echo maconso($idfact);
}
if(isset($_GET['mont']) AND !empty($_GET['mont']) AND isset($_GET['reste']) AND !empty($_GET['reste'])){
	$devise=htmlspecialchars($_GET['devise']);
	$mont=htmlspecialchars($_GET['mont']);
	$reste=htmlspecialchars($_GET['reste']);

		if($devise==2){
			$req=taux::selectionner_d_taux();
			$result=$req->fetch();
			$IdTaux=$result['IdTaux'];
			$Taux=$result['Taux'];
			echo 'Taux:'.$Taux;
			$montDol=($mont/$Taux);
			if($montDol>$reste){
				echo "Le nombre est a depassement du montat restant ";
				}
				if($montDol<=$reste){
				include('../M/payement.class.php'); 
				 payement::ajouterpayement($_GET['idconso'],$_GET['mont'],$IdTaux,$_GET['devise']);
				 echo "Reussi";
				}
		}

		if($devise==1){
			$IdTaux=1;
			if($mont>$reste){
				echo "Le nombre est a depassement du montat restant";
				}
				if($mont<=$reste){
				include('../M/payement.class.php'); 
				payement::ajouterpayement($_GET['idconso'],$_GET['mont'],$IdTaux,$_GET['devise']);
				echo "Reussi";				
				}
		
		}
}
if(isset($_GET['idcon2']) AND !empty($_GET['idcon2'])){
	$idcons=htmlspecialchars($_GET['idcon2']);
	echo MonRecu($idcons);
}
if(isset($_GET['idP_sup']) AND !empty($_GET['idP_sup'])){
	$idP_sup=htmlspecialchars($_GET['idP_sup']);
	include('../M/payement.class.php');
	echo payement::supprimerP($idP_sup);
}
