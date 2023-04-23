<?php
include('../M/visite.class.php');
include('../V/pages/Formulairevisite.php');
include('../v/pages/tableauvisite.php');


if(isset($_GET['nVi']) AND !empty($_GET['nVi']) AND isset($_GET['fich']) AND !empty($_GET['fich'])){
	$nv=htmlspecialchars($_GET['nVi']); 
	$fich=htmlspecialchars($_GET['fich']); 
	$rem=$_GET['rem'];

    echo visite::ajoutervisite($nv,$rem,$fich);
			
}
// ///MODIFICATION 
// 	if(isset($_POST['NomClient']) AND isset($_GET['EnrgMod']) AND !empty($_GET['EnrgMod'])){

// 	$id=htmlspecialchars($_GET['EnrgMod']);
// 	$NomCli=htmlspecialchars($_POST['NomClient']); 
// 	$IdNation=htmlspecialchars($_POST['Nation']);  
// 	$IdQuart=htmlspecialchars($_POST['Quartier']); 
	
// 	$client= new client();
//     echo $client->modifierclient($id,$NomCli,$PostnomCli,$PrenomCli,$GenreCli,$NumParcelCli,$DateNaisCli,$TelCli,$PhotoCli,$IdJeton,$IdNation,$IdQuart);
			
// }


 if(isset($_GET['RechVisite']) AND !empty($_GET['RechVisite']))
{
	$vat=htmlspecialchars($_GET['RechVisite']);
	echo FiltreVisite($vat);
}
if(isset($_GET['RechVisite']) AND empty($_GET['RechVisite']))
{
	$vat=htmlspecialchars($_GET['RechVisite']);
	echo listeVisite();
}

if(isset($_GET['VerifiFic']) AND !empty($_GET['VerifiFic'])){
	include('../M/fiche.class.php');
	$tab=fiche::filtrerfiche2($_GET['VerifiFic']);
	$list=$tab->fetch();
	if($list['IdFiche']==$_GET['VerifiFic']){
		echo 1;
	}else{
		echo 0;
	}
}
 
 //idclientMod
if (isset($_GET['idclientMod']) AND !empty($_GET['idclientMod'])) {
 	echo fclientfiltre($_GET['idclientMod']); 
 }
//AnnalerMod
if (isset($_GET['AnnalerMod']) AND !empty($_GET['AnnalerMod'])) {
	include('../M/adresse.class.php');
 	echo fclient(); 
 }