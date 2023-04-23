<?php
include('../M/facture.class.php');
include('../V/pages/tableaufacture.php');
include('../M/consommation.class.php');


if(!empty($_GET['Prescrid'])){
  $Prescrid=htmlspecialchars($_GET['Prescrid']);
    echo editefacture($Prescrid);
  }

if(isset($_GET['cons']) AND !empty($_GET['cons']) AND isset($_GET['Quant']) AND !empty($_GET['Quant']) AND isset($_GET['Pu']) AND !empty($_GET['Pu']) AND isset($_GET['idpres']) AND !empty($_GET['idpres']))
{
	$idPrescript=htmlspecialchars($_GET['idpres']);
	$idDesigServi=htmlspecialchars($_GET['cons']);
	$puDesigServi=htmlspecialchars($_GET['Pu']);
	$quantServi=htmlspecialchars($_GET['Quant']);
		consommation::ajouterconso($quantServi,$puDesigServi,$idPrescript,$idDesigServi);
		echo mafacture($idPrescript);
	}
	if(isset($_GET['factureid']) AND !empty($_GET['factureid'])){
		$idpre=htmlspecialchars($_GET['factureid']);
		echo mafacture($idpre);
	}
	//

	if(isset($_GET['idconso']) AND !empty($_GET['idconso']) AND isset($_GET['idpres']) AND !empty($_GET['idpres'])){
		$idpres=htmlspecialchars($_GET['idpres']);
		$idconso=htmlspecialchars($_GET['idconso']);
		if(consommation::supprimerconso($idconso)){
			return mafacture($idpres);
		}

	}
?>