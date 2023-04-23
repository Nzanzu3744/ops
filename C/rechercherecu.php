<?php
include('../M/recu.class.php');
include('../M/payement.class.php');
include('../M/devise.class.php');
include('../V/pages/tableaufacture_caisse.php');
if(isset($_GET['idpay']) && !empty($_GET['idpay']))
{
  $var=htmlspecialchars($_GET['idpay']);
  echo recu($var);
}
 
if(empty($_GET['idpay'])){
     echo listerRecu();    
}

