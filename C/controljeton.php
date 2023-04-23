<?php
include('../M/agent.class.php');
include('../M/jeton.class.php');
include('../M/programme.class.php');
include('../V/pages/tableaujeton.php');
//Affiche l'agent selectionner
if(isset($_GET['id_Agent1']) AND !empty($_GET['id_Agent1'])){
    $ida=htmlspecialchars($_GET['id_Agent1']);
    $tab=agent::rechercheagent($ida);
    $agent=$tab->fetch();
  ?>
  <div style="text-align: center; color: white">                
      <h6 class="col-8"><?php echo strtoupper($agent['NomAgent'].' '.$agent['PostnomAgent'].' '.$agent['PrenomAgent']);?>
        
      </h6>
      <button id="idAgent" style="background-color: rgba(77, 77, 78, 0.0); color:white" class="widget-user-desc"
      value="<?=$agent['IdAgent']?>"><?php echo $agent['IdAgent']?></button>
  
     <img style="width: 50px; height: 50px" class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
     </div>
<?php
}
//Ajoute le jetont idAg idPo Nombrejet
if (isset($_GET['idAg']) AND !empty($_GET['idAg']) AND isset($_GET['idPo']) AND !empty($_GET['idPo'])  AND isset($_GET['Nombrejet']) AND !empty($_GET['Nombrejet']) ){
  $idAg=htmlspecialchars($_GET['idAg']);
  $Nombrejet=htmlspecialchars($_GET['Nombrejet']);
  $idPo=htmlspecialchars($_GET['idPo']);
  echo jeton::ajouterjeton($idAg,$idPo);
  echo tabjeton($Nombrejet,$idAg,$idPo);
} 

//afficeh le programme selectionner
if (isset($_GET['idprogre']) AND !empty($_GET['idprogre'])) {
  $idprogre=htmlspecialchars($_GET['idprogre']);
    $tab=programme::RechProg($idprogre);
    $prog=$tab->fetch();
  ?>
  
    <a style="font-family: timenewroman; color: white">
      Programme Numéro <?=' '.$prog['IdProg'].'</br> Objet: '.$prog['ObjProg'].'</br>Allant du '. $prog['DebProg'].' au '.$prog['DebProg']?>
      <button id="IdProg" style="background-color: rgba(77, 77, 78, 0.0);" class="widget-user-desc"
      value="<?=$prog['IdProg']?>">
      </button>
      </a>
 
<?php
}