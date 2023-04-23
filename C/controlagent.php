<?php
include('../M/agent.class.php');


if(isset($_POST['NomAgent']) AND !isset($_GET['idagentModification']) AND empty($_GET['idagentModification']) ){
	$NomAgent=htmlspecialchars($_POST['NomAgent']); 
	$PostnomAgent=htmlspecialchars($_POST['PostnomAgent']); 
	$PrenomAgent=htmlspecialchars($_POST['PrenomAgent']); 
	$NumeParcelAgent=htmlspecialchars($_POST['NumeParcelAgent']); 
	$GenreAgent=htmlspecialchars($_POST['GenreAgent']); 
	$DateNaisAgent=htmlspecialchars($_POST['DateNaisAgent']); 
	$NNAgent=htmlspecialchars($_POST['NNAgent']); 
	$TelAgent=htmlspecialchars($_POST['TelAgent']); 
	$IdQualif=htmlspecialchars($_POST['Qualif']); 
	$IdNation=htmlspecialchars($_POST['Nation']); 
	$IdFonct=htmlspecialchars($_POST['Fonction']); 
	$IdQuart=$_POST['quart']; 
	$PhotoAgent='ok';
	$MotCleAgent=sha1(12345678);
	$AccesAgent='1'; 
	$ActifAgent='1';
	$agent=new agent($NomAgent,$PostnomAgent,$PrenomAgent,$NumeParcelAgent,$GenreAgent,$DateNaisAgent,$NNAgent,$TelAgent,$IdQualif,$IdNation,$IdFonct,$IdQuart,$MotCleAgent,$AccesAgent,$ActifAgent,$PhotoAgent);
	echo $agent->ajouteragent();
			
}
//idagentM
//ENREGISTREMENT DE LA MODIFICATION
if(isset($_POST['NomAgent']) AND isset($_GET['idagentModification']) AND !empty($_GET['idagentModification'])){

	//control
  $id=htmlspecialchars($_GET['idagentModification']); 

	$NomAgent=htmlspecialchars($_POST['NomAgent']); 
	$PostnomAgent=htmlspecialchars($_POST['PostnomAgent']); 
	$PrenomAgent=htmlspecialchars($_POST['PrenomAgent']); 
	$NumeParcelAgent=htmlspecialchars($_POST['NumeParcelAgent']); 
	$GenreAgent=htmlspecialchars($_POST['GenreAgent']); 
	$DateNaisAgent=htmlspecialchars($_POST['DateNaisAgent']); 
	$NNAgent=htmlspecialchars($_POST['NNAgent']); 
	$TelAgent=htmlspecialchars($_POST['TelAgent']); 
	$IdQualif=htmlspecialchars($_POST['Qualif']); 
	$IdNation=htmlspecialchars($_POST['Nation']); 
	$IdFonct=htmlspecialchars($_POST['Fonction']); 
	$IdQuart=$_POST['quart']; 

	$PhotoAgent='ok';
	$MotCleAgent=sha1(12345678);
	$AccesAgent='1'; 
	$ActifAgent='1';
	$agent=new agent($NomAgent,$PostnomAgent,$PrenomAgent,$NumeParcelAgent,$GenreAgent,$DateNaisAgent,$NNAgent,$TelAgent,$IdQualif,$IdNation,$IdFonct,$IdQuart,$MotCleAgent,$AccesAgent,$ActifAgent,$PhotoAgent);
	echo $agent->modifieragent($id);
			
}

 if(isset($_GET['id']) AND !empty($_GET['id']))
{
	$IdAgent=htmlspecialchars($_GET['id']);
	 echo agent::supprimeragent($IdAgent);
	
}
if(isset($_GET['md']) AND !empty($_GET['md']) AND isset($_GET['id']) AND !empty($_GET['id'])){
	$IdAgent=htmlspecialchars($_GET['id']);
	agent::modiferagent($IdAgent,$NomAgent, $PostnomAgent, $PrenomAgent, $NumeParcelAgent, $GenreAgent, $DateNaisAgent, $NNAgent, $TelAgent, $IdQualif, $IdNation, $IdFonct, $IdQuart, $MotCleAgent,$AccesAgent, $ActifAgent);
}

 //idclientMod
if (isset($_GET['idagentMod']) AND !empty($_GET['idagentMod'])) {
	include('../V/pages/Formulaireagent.php');
 	echo fagentfiltre($_GET['idagentMod']); 
 }
//AnnalerMod
if (isset($_GET['AnnalerMod']) AND !empty($_GET['AnnalerMod'])) {
	include('../V/pages/Formulaireagent.php');
	include('../M/adresse.class.php');
 	echo fagent(); 
 }