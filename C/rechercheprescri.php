<?php
include('../M/consommation.class.php');
include('../M/designation.class.php');
include('../v/pages/tableauprescri.php');

if (!empty($_GET['idfact']) AND isset($_GET['idfact']))
{
  $var=htmlspecialchars($_GET['idfact']);
  echo filtretabpresc($var);
}
 
if(empty($_GET['idfact']) OR !isset($_GET['idfact'])){
  echo tableauprescri();  
}
