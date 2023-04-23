<?php

include('../V/pages/tableauretrait.php');
include('../M/versement.class.php');
include('../M/retrait.class.php');
include('../M/agent.class.php');
include('../M/chaine.php');
include('../M/registrejeton.class.php');
include('../M/programme.class.php');
//vertot  rettot
if(isset($_GET['vertot']) AND isset($_GET['rettot'])){
	$vers=$_GET['vertot'];
	$ret=$_GET['rettot'];
	$solde=$vers-$ret;
	?>
	<div style="height: 100%; width: 30%; margin-left: 5%; border:1px solid white" id="Vers">
          <!-- vers -->
          <p> Total Versement : <?=$vers.'$'?>
          </div>
    <div style="height: 100%; width: 30%; ;  border:1px solid green" id="Retr">
          <!-- ret -->
          <p> Total Versement : <?=$ret.'$'?>
    </div>
    <div style="height: 100%; width: 30%;  border:1px solid red" id="">
          <!-- Solde -->
          <p> Solde :'<?=$solde.'$'?></p>;
    </div>
	<?php
}
if(isset($_GET['idagentV']) AND !empty($_GET['idagentV'])){
	$idagent1=htmlspecialchars($_GET['idagentV']);
	echo Rechversement($idagent1);
}
if(isset($_GET['idagentV']) AND empty($_GET['idagentV'])){
	echo versement();
}
if (isset($_GET['idagentR']) AND !empty($_GET['idagentR'])) {
	$idagent2=htmlspecialchars($_GET['idagentR']);
	echo Rechretrait($idagent2);
}
if(isset($_GET['idagentR']) AND empty($_GET['idagentR'])){
	 echo retrait();
}
//Mont    Identagent  solde
if(isset($_GET['Mont']) AND isset($_GET['Identagent']) AND !empty($_GET['Mont']) AND !empty($_GET['Identagent']) AND isset($_GET['solde']) AND !empty($_GET['solde']) ){
	$Mont=htmlspecialchars($_GET['Mont']);
	$Identagent=htmlspecialchars($_GET['Identagent']);
	$solde=htmlspecialchars($_GET['solde']);
	if($solde>=$Mont){
		echo retrait::ajouterretrait($Mont,$Identagent);
	}
}
if(isset($_GET['numag']) AND !empty($_GET['numag']) ){
	$idag=htmlspecialchars($_GET['numag']);
	echo Filtrersolde($idag);
}
if(isset($_GET['numag']) AND empty($_GET['numag'])){
	echo solde();
}
//////////////////////////////////////////////////////////////////
// if(isset($_GET['numag']) AND !empty($_GET['numag'])){
// 	$idfo=htmlspecialchars($_GET['idfonct']);
// 	$idag=htmlspecialchars($_GET['numag']);
// 	echo Filtrersolde($idfo,$idag);
// }
// if(isset($_GET['numag']) AND empty($_GET['numag'])){
// 	echo solde();
// }
