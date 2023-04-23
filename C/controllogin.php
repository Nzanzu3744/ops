<?php
session_start();


include('../M/agent.class.php');
//Matricul Cle
if(isset($_POST['Matricul']) AND !empty($_POST['Matricul']) AND isset($_POST['Cle']) AND !empty($_POST['Cle'])){

	$Id01=htmlspecialchars($_POST['Matricul']);
	$key=sha1(htmlspecialchars($_POST['Cle']));
	$tab = agent::connexion($Id01);
	if($Info=$tab->fetch()){
		if($Info['MotCleAgent']==$key){
			if($Info['AccesAgent']==1){
				$_SESSION['Agent']=$Info;

				agent::modifieretat($Info['IdAgent']);
				echo $_SESSION['Agent']['NomFonct'].' '.$_SESSION['Agent']['NomAgent'].'  '.$_SESSION['Agent']['PostnomAgent'].' Vous étés Connecté.';
				
		
				//Connexion reussi
			}else{//Acces 
				echo "vous n'avez pas acces pour le moment veuillez contacté l IT";
			}
		}else{//Cle Incorect
			echo ' Coordonnes incorect';
		}
	}else{
		echo 'Aucune Information';
		} 
	}else{
			//Aucune Info
		echo 'Veuillez remplir les champs avant de vous connecter !';
	}

	//$_SESSION['IdAgent']['IdAgent'] 