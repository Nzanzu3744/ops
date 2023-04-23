<?php
include('../v/pages/tableautaux.php');
include('../M/taux.class.php');
include('../M/fonction.class.php');

if (isset($_GET['tauxAj']) AND !empty($_GET['tauxAj'])) {
	$taux=htmlspecialchars($_GET['tauxAj']);
	taux::ajoutertaux($taux);
	echo listeTaux();
}

if (isset($_GET['FocntAj']) AND !empty($_GET['FocntAj'])) {
$fonct=htmlspecialchars($_GET['FocntAj']);
	fonction::ajouterfonct($fonct);
	echo listeFonct();
}

if (isset($_GET['supfonct']) AND !empty($_GET['supfonct'])) {
$fonct=htmlspecialchars($_GET['supfonct']);
	fonction::supprimerfonct($fonct);
	echo listeFonct();
}

if(isset($_GET['SupTaux']) AND !empty($_GET['SupTaux'])) {
$idtaux=htmlspecialchars($_GET['SupTaux']);
	echo taux::supprimetaux($idtaux);
	 listeTaux();
}
?>