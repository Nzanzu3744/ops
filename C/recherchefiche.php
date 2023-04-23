<?php
include('../M/prescription.class.php');
include('../V/pages/tableaufiche.php');

if (!empty($_GET['idfic']) AND isset($_GET['idfic']) ){
  $idfiche=htmlspecialchars($_GET['idfic']); 
  $idCli=htmlspecialchars($_GET['idCli']);
  session_start();                    
      echo mafiche($idfiche,$idCli);
    ?>               
<?php
}elseif (empty($_GET['idfic'])){
	session_start();  
  echo mesfiches($_GET['idCli']);

}