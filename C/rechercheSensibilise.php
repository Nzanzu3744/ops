<?php
include('../M/agent.class.php');
include('../V/pages/tableausensib.php');
include('../M/registrejeton.class.php');
if(isset($_GET['id_agent']) && !empty($_GET['id_agent']))
{
  $VarRch=htmlspecialchars($_GET['id_agent']);  
     echo tabrechregjeto($VarRch);               
}
if(empty($_GET['id_agent'])){
    echo tabSens();    
}
