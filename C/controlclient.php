<?php
include('../M/client.class.php');
include('../M/jeton.class.php');

// include('../M/Upload.class.php');

if(isset($_POST['NomClient']) AND !isset($_GET['EnrgMod'])){
	 $NomCli=htmlspecialchars($_POST['NomClient']); 
	 $PostnomCli=htmlspecialchars($_POST['PostnomClient']); 
	 $PrenomCli=htmlspecialchars($_POST['PrenomClient']); 
	 $NumParcelCli=htmlspecialchars($_POST['NumParcelClient']); 
	 $GenreCli=htmlspecialchars($_POST['GenreClient']); 
	 $DateNaisCli=htmlspecialchars($_POST['DateNaisClient']); 


	 $IdJeton=htmlspecialchars($_POST['Jeton']); 

	// $photocli= new Upload_file('PhotoCli');
	// $photocli->envoi_photo($_POST['PhotoCli']);

	
	// $NomPho=$photocli->getNom_du_fichier();

	// $DossierPho=getDossier();

	$PhotoCli='photoxxx';


	$TelCli=htmlspecialchars($_POST['TelClient']); 
	$IdNation=htmlspecialchars($_POST['Nation']);  
	$IdQuart=htmlspecialchars($_POST['Quartier']); 
	$MotCleCli=sha1(12345678);
	$AccesCli='0'; 
	$ActifCli='0';
	$client= new client();
    echo $client->ajouterclient($NomCli,$PostnomCli,$PrenomCli,$GenreCli,$NumParcelCli,$DateNaisCli,$TelCli,$PhotoCli,$IdJeton,$IdNation,$IdQuart,$ActifCli,$AccesCli,$MotCleCli);
			
}
///MODIFICATION 
	if(isset($_POST['NomClient']) AND isset($_GET['EnrgMod']) AND !empty($_GET['EnrgMod'])){

	$id=htmlspecialchars($_GET['EnrgMod']);
	$NomCli=htmlspecialchars($_POST['NomClient']); 
	$PostnomCli=htmlspecialchars($_POST['PostnomClient']); 
	$PrenomCli=htmlspecialchars($_POST['PrenomClient']); 
	$NumParcelCli=htmlspecialchars($_POST['NumParcelClient']); 
	$GenreCli=htmlspecialchars($_POST['GenreClient']); 
	$DateNaisCli=htmlspecialchars($_POST['DateNaisClient']); 


	$IdJeton=htmlspecialchars($_POST['Jeton']); 

	// $photocli= new Upload_file('PhotoCli');
	// $photocli->envoi_photo($_POST['PhotoCli']);
	// $NomPho=$photocli->getNom_du_fichier();
	// $DossierPho=getDossier();
	$PhotoCli='photoxxx';


	$TelCli=htmlspecialchars($_POST['TelClient']); 
	$IdNation=htmlspecialchars($_POST['Nation']);  
	$IdQuart=htmlspecialchars($_POST['Quartier']); 
	
	$client= new client();
    echo $client->modifierclient($id,$NomCli,$PostnomCli,$PrenomCli,$GenreCli,$NumParcelCli,$DateNaisCli,$TelCli,$PhotoCli,$IdJeton,$IdNation,$IdQuart);
			
}

//
 if(isset($_GET['id']) AND !empty($_GET['id']))
{
	$IdClient=htmlspecialchars($_GET['id']);
	echo client::supprimerclient($IdClient);
}
if(isset($_GET['md']) AND !empty($_GET['md']) AND isset($_GET['id']) AND !empty($_GET['id'])){
	$IdAgent=htmlspecialchars($_GET['id']);
	agent::modiferagent($IdAgent,$NomAgent, $PostnomAgent, $PrenomAgent, $NumeParcelAgent, $GenreAgent, $DateNaisAgent, $NNAgent, $TelAgent, $IdQualif, $IdNation, $IdFonct, $IdQuart, $MotCleAgent,$AccesAgent, $ActifAgent);
}
 if (isset($_GET['idjeton']) AND !empty($_GET['idjeton'])) {
 	$IdJeton=htmlspecialchars($_GET['idjeton']);
 	$tab=jeton::Filterjeton($IdJeton);
 	$liste=$tab->fetch();
      if(!empty($liste['IdJeton'])){
      	echo 1;
      }
      if(empty($liste['IdJeton'])){
      	echo 0;
      }
 }
 //idclientMod
if (isset($_GET['idclientMod']) AND !empty($_GET['idclientMod'])) {
	include('../V/pages/Formulaireclient.php');
	session_start();
 	echo fclientfiltre($_GET['idclientMod']); 
 }
if (isset($_GET['Actualise']) AND !empty($_GET['Actualise'])) {
	include('../V/pages/Formulaireclient.php');
	session_start();
 	echo fclient(); 
 }
