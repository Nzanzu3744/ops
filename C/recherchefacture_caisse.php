<?php
include('../M/consommation.class.php');
include('../M/designation.class.php');
include('../V/pages/tableaufacture_caisse.php');
if (!empty($_GET['var']) AND isset($_GET['var'])){
  $Fact=htmlspecialchars($_GET['var']);
    mafacture($Fact);
  }
  if(empty($_GET['var'])){
  	include('../M/payement.class.php');
    mesfacture();
  }
 ?>
  