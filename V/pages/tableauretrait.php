<?php
//Pourscentage des agent sensibilisateur;
$pourc=(10/100);

$versement=0;
$retrait=0;
$solde=0;
function versement(){
  $sommever=0;
     $tab=versement::selectionnerPay();
     $compteur=0;

  while($Liste=$tab->fetch()){
    $tab_agent=agent::rechercheagent($Liste['IdAgent']);
    $tagent=$tab_agent->fetch();
      $sommever= $sommever+$Liste['MontVers'];
      $compteur++;

     if (!empty($Liste)) {
     ?>
    <div style=" font-family: timenewroman;background-color: rgba(77, 77, 78, 0.8); color: white; border:1px solid white" id="<?=$Liste['IdPay']?>">
      <img src="../dist/img/logo.png" class="float-right" style="height:68px; width: 80px; margin: 2px">
      <label style="color:white;background:green" class=" float-right " value="<?=$idPres?>" id="vers">Versement :<?=$Liste['IdPay']?></label>
      
        <p>ID : <?php echo $tagent['IdAgent'] ?>  Nom : <?php echo $tagent['NomAgent'] ?> Postnom : <?php echo $tagent['PostnomAgent'] ?> Prenom : <?php echo $tagent['PrenomAgent'] ?> </p>
        <div style="text-align: center; font-size: 14px;">
        <p>Client : <?php echo $Liste['IdCli'].' '.$Liste['NomCli'].'  '.$Liste['PostnomCli']."  ".$Liste['PrenomCli'].' Recu :'.$Liste['IdPrescrip'] ?> </p>
        
      </div>
       <table class="table">
        <thead >
          <tr>
            <th>N</th>
            <th>Date</th>
            <th>Montat</th>
            <th>Devise</th>
            <th>Taux</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
              <td><?php echo $compteur?></td>
              <td><?php echo $Liste['DatePay']?></td>
              <td><?php echo $Liste['MontVers']."$"?></td>
              <td><?php echo $Liste['Devise']?></td>
              <td><?php echo $Liste['Taux'].'.'?></td>
          </tr>
        </tfoot>                     
      </table>
      <button class="btn no-print" style="color:red" onclick="imprimer(<?=$Liste['IdPay']?>)"> Imprimer</button>
      </div>
    <?php
    }

  }
  ?>
   <div style="border:1px solid white; text-align: center;">
    <button style="background-color: rgba(255,255,255,0)" id="ver" value="<?=$sommever?>"><?php echo "<mark>Total Versé ".$sommever."$<mark>" ?></button>
  </div>
  <?php
}
//Recherche versement par agent
function Rechversement($idagent){
     $sommever=0;
     $tab=versement::filtrerPay($idagent);
     $compteur=0;

  while($Liste=$tab->fetch()){
    $tab_agent=agent::rechercheagent($Liste['IdAgent']);
    $tagent=$tab_agent->fetch();
    $sommever= $sommever+$Liste['MontVers'];
      $compteur++;

     if (!empty($Liste)) {
     ?>
    <div style=" font-family: timenewroman;background-color: rgba(77, 77, 78, 0.8); color: white;border:1px solid white" id="<?=$Liste['IdPay']?>">
      <img src="../dist/img/logo.png" class="float-right" style="height:68px; width: 80px; margin: 2px">
      <label style="color:white;background:green" class=" float-right " value="<?=$idPres?>" id="vers">Versement :<?=$Liste['IdPay']?></label>
      
        <p>ID : <?php echo $tagent['IdAgent'] ?>  Nom : <?php echo $tagent['NomAgent'] ?> Postnom : <?php echo $tagent['PostnomAgent'] ?> Prenom : <?php echo $tagent['PrenomAgent'] ?> </p>
        <div style="text-align: center; font-size: 14px;">
        <p>Client : <?php echo $Liste['IdCli'].' '.$Liste['NomCli'].'  '.$Liste['PostnomCli']."  ".$Liste['PrenomCli'].' Versement:'.$Liste['IdPay'].'  Recu :'.$Liste['IdPrescrip'] ?> </p>
        
      </div>
    
       <table class="table">
        <thead >
          <tr>
            <th>N</th>
            <th>Date</th>
            <th>Montat</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
              <td><?php echo $compteur?></td>
              <td><?php echo $Liste['DatePay']?></td>
              <td><?php echo $Liste['MontVers']."$"?></td>
          </tr>
        </tfoot>                     
      </table>
      <button class="btn no-print" style="color:red" onclick="imprimer(<?=$Liste['IdPay']?>)"> Imprimer</button>
      </div>
    <?php
    }
  }
  ?>
  <div style="border:1px solid white; text-align: center;">
    <button style="background-color: rgba(255,255,255,0)" value="<?=$sommever?>" id="ver">
      <?php echo "<mark style='font-size:40px'>Total Versé ".$sommever."$</mark>"?>
    </button>
  </div>
  <?php
}
//selectionnerretrait
function retrait(){
    $sommeret=0;
     $tab=retrait::selectionnerretrait();
     $compteur=0;

  while($Liste=$tab->fetch()){
    $tab_agent=agent::rechercheagent($Liste['IdAgent']);
    $tagent=$tab_agent->fetch();

      $compteur++;

     if (!empty($Liste)) {
     ?>
    <div style=" font-family: timenewroman;background-color: rgba(77, 77, 78, 0.8); color: white; border:1px solid white" id="<?=$compteur?>">
      <img src="../dist/img/logo.png" class="float-right" style="height:68px; width: 80px; margin: 2px">
      <label style="color:white;background:green" class=" float-right " value="<?=$idPres?>" id="vers">Retrait :<?=$Liste['IdRetrait']?></label>
      
        <p>ID : <?php echo $tagent['IdAgent'] ?>  Nom : <?php echo $tagent['NomAgent'] ?> Postnom : <?php echo $tagent['PostnomAgent'] ?> Prenom : <?php echo $tagent['PrenomAgent'] ?> </p>
    
       <table class="table">
        <thead >
          <tr>
            <th>N</th>
            <th>Code</th>
            <th>Date</th>
            <th>Montat</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
              <td><?php echo $compteur?></td>
              <td><?php echo $Liste['IdRetrait']?></td>
              <td><?php echo $Liste['DateRetrait']?></td>
              <td><?php echo $Liste['MontRetrait']."$"?></td>
          </tr>
        </tfoot>                     
      </table>
    </div>
    <?php
    }
     $sommeret=$sommeret+$Liste['MontRetrait'];
   }
     ?>
      <div style="border:1px solid white; text-align: center;">
        <button style="background-color: rgba(255,255,255,0)" id="ret" value="<?=$sommeret?>"><?php echo "Total Retrait ".$sommeret."$" ?>
        </button>
      </div>
     <?php
}
//selectionnerretrait
function Rechretrait($idagent){
      $sommeret=0;
     $tab=retrait::rechercheretrait($idagent);
     $compteur=0;

  while($Liste=$tab->fetch()){
    $tab_agent=agent::rechercheagent($Liste['IdAgent']);
    $tagent=$tab_agent->fetch();

      $compteur++;

     if (!empty($Liste)) {
     ?>
    <div style=" font-family: timenewroman;background-color: rgba(77, 77, 78, 0.8); color: white; border:1px solid white" id="<?=$compteur?>">
      <img src="../dist/img/logo.png" class="float-right" style="height:68px; width: 80px; margin: 2px">
      <label style="color:white;background:green" class=" float-right " value="<?=$idPres?>" id="vers">Retrait :<?=$Liste['IdRetrait']?></label>
      
        <p>ID : <?php echo $tagent['IdAgent'] ?>  Nom : <?php echo $tagent['NomAgent'] ?> Postnom : <?php echo $tagent['PostnomAgent'] ?> Prenom : <?php echo $tagent['PrenomAgent'] ?> </p>
    
       <table class="table table-respansive text-nowrap">
        <thead >
          <tr>
            <th>N</th>
            <th>Code</th>
            <th>Date</th>
            <th>Montat</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
              <td><?php echo $compteur?></td>
              <td><?php echo $Liste['IdRetrait']?></td>
              <td><?php echo $Liste['DateRetrait']?></td>
              <td><?php echo $Liste['MontRetrait']."$"?></td>
          </tr>
        </tfoot>                     
      </table>
      <button  style="color:red"  class="btn no-print" onclick="imprimer('<?=$compteur?>')">Imprimer</button>
      </div>
    <?php
    }
    $sommeret=$sommeret+$Liste['MontRetrait'];
  }
  ?>
  <div style="border:1px solid white; text-align: center;"><button style="background-color: rgba(255,255,255,0)" id="ret" value="<?=$sommeret?>"><?php echo "<mark style='font-size:40px'>Total Retrait ".$sommeret."$</mark>" ?></button></div>
  <?php
}

function solde(){

  //Pourscentage appliqué
  Global $pourc;
//Les agents engages
$sensib=agent::selectionneragent();
$nombreSens=0;
while($ListSens=$sensib->fetch()){
$nombreSens++;
}

$NombreProg=0;
$prog=programme::selectionnerprog();
while($ListPro=$prog->fetch()){
$NombreProg++;
}
 ?>
<div style="font-family: timenewroman">
  <?php
  include('TeteDoc.php');
  ?>
  <a style="text-align: center;x">
    <H4> Rapport de compte Sur Le verssement et retrait des Agent Sensibilisateurs</H4>
  </a>
  <p style=" background: gray; color: white;">
  Le nombre total des agents sensibilisateurs a tout les programmes sont au nombre de :<?php echo ' '.$nombreSens?>, <br> Pour <?=$NombreProg.' '?> Programme(s) ou projet(s) de sensibilisation que nous presentons ci-dessous :
    
    <?php
    
    
      Global $versement;
      Global $retrait;
      Global $solde;
      $prog=programme::selectionnerprog();
      $NombreProg=1;
    while($ListPro=$prog->fetch()){
      ?>
        <div style="border:1px solid white; border: 1px solid black" id="<?=$ListPro['IdProg']?>">
          <p class="float-right" style="background-image:url('../dist/img/jeton1.png');height:68px; width: 80px; margin: 2px"></p>
          <?php

        echo '<a style="background:gray;color: green; margin-left:50%">'.$NombreProg++.'</a></br>';
        Echo 'Id du programme : <i style="color:red"> '.' '.$ListPro['IdProg'].'</i></br>';
        echo 'Date  d\'elaboration :'.' '.$ListPro['DateProg'].'</br>';
        echo '<a style="color:red">Objet :'.' '.$ListPro['ObjProg'].'</a></br>';
        echo 'Le Programme prevu pour : '.' '.$ListPro['DebProg'].' au : '.$ListPro['FinProg'].'</br>';
        echo  $ListPro['Prog'];

        //Nombrs Clients au programme
        echo 'Le Programme enregistre : <br>';

        //Nombre Agents au programme
        $NbrAgentAuProg= retrait::agentauprog($ListPro['IdProg']);
        $cpteur=0;
        while($NbrAgentAuProg->fetch()){
          $cpteur++;
        }

        echo 'a) '.' '.$cpteur.' Sensibilisateur(s):<br> ';
        $AgentAuProg= retrait::agentauprog($ListPro['IdProg']);
        $cpteur=1;
        while($listAgPro=$AgentAuProg->fetch()){
          echo '<i>'.$cpteur++;
          echo '. Id : '.$listAgPro['IdAgent'].' Noms : '.$listAgPro['NomAgent'].' '.$listAgPro['PrenomAgent'].' '.$listAgPro['PostnomAgent'].' '.$listAgPro['TelAgent'].'</i><br>';
        }
        $Nbrclient= retrait::clientProg($ListPro['IdProg']);
        $cpteur=0;
        while($Nbrclient->fetch()){
          $cpteur++;
        }
        echo "b) ".$cpteur.' Patient(s) :';
        //Ici le code m'a exige une nouvelle extentiation pour client au programme pour l'affichage du client ci haut on a tous simplement compte.
        $ClientAuProg= retrait::clientProg($ListPro['IdProg']);
        $cpt=0;

        $EntTotalDeclient=0;
        $SortTotalDeclient=0;
        while($listCliePro=$ClientAuProg->fetch()){
          $cpt++;
         ?>
                  <br><i><?=$cpt?>
                  <?='. id :'.$listCliePro['IdCli'].' Nom : '.$listCliePro['NomCli'].' '.$listCliePro['PostnomCli'].' '.$listCliePro['PrenomCli']?>
                  <?='Adresse '.$listCliePro['NomQuart'].' '.$listCliePro['NomVille'].' '.$listCliePro['NomProv'].' '.$listCliePro['NomPays']?>
                  <?='Tel :'.$listCliePro['TelCli']?>
                </i>
               
         <?php
         //Entree
         $rendement=retrait::rendement($listCliePro['IdCli']);
         $RClient=0;
         while($Rende=$rendement->fetch()){
          $RClient=$RClient+$Rende['Total'];
         }
         echo '<a style="color: red"><br>
         Entré(s) : $'.$RClient.'
         |Sensibilisateur : $'.($RClient*$pourc).'
         |Solde : '.($RClient-($RClient*$pourc)).'$</a>';
         //Ajoute sur les rendement des autres clients
            $EntTotalDeclient=$EntTotalDeclient+$RClient;


         
         
          //on calcule le montat total verse chez les different sensibilisateur
          $versement=$versement+($RClient*$pourc);
      }
      $Div=$EntTotalDeclient*$pourc;
       echo '<p style="color:white;background:gray; font-size:26px;text-align:center"><i>Entré :'.$EntTotalDeclient.'$   Dividente : '.$Div.'$ Solde : '.($EntTotalDeclient-$Div).'$</i></p>';
    ?>
      <button class="btn btn-default no-print" style="color:red" onclick="imprimer(<?=$ListPro['IdProg']?>)"> Imprimer</button>
        </div>
    </p>
    <?php
  }
  //Le retrait
         $retrait_de_son_sanib=retrait::selectionnerretrait();
          while($ListeR=$retrait_de_son_sanib->fetch()){
        // ici on calcule l'argent verse au sensi
            $retrait=$retrait+$ListeR['MontRetrait'];
          }
  
    ?>
</div>
<div style="height: 60px;" class="row" id="">
          <a style="text-align: center" class="col-12">Rapport Tout Les Programmes
          </a>
          <div style="height: 100%; width: 30%; margin-left: 5%;font-size: 25px; border:1px solid yellow" id="Vers">
          <!-- Versement -->
             <?php
                  echo'Versement Au Sens. :$ '.$versement;
              ?>
          </div>
          <div style="height: 100%; width: 30%; font-size: 25px;  border:1px solid green" id="">
          <!-- Solde -->
             <?php
                  echo 'Retirer Par Le Sens. :$'.$retrait;
              ?>
          </div>
          <div style="height: 100%; width: 30%; font-size: 25px;  border:1px solid red" id="">
          <!-- Solde -->
               <?php
                  echo 'Solde :$'.$solde=$versement-$retrait;
                ?>
          </div>
      
      </div>
    <?php
}
function Filtrersolde($idagentRec){
 //Pourscentage appliqué
  Global $pourc;
//Les agents engages
$sensib=agent::selectionneragent();
$nombreSens=0;
while($ListSens=$sensib->fetch()){
$nombreSens++;
}

$NombreProg=0;
$prog=programme::selectionnerprog();
while($ListPro=$prog->fetch()){
$NombreProg++;

}

 ?>




<div id="program" style="font-family: timenewroman">
  <?php
  include('TeteDoc.php');
  ?>
  <a style="text-align: center">
    <?php
    $table=agent::rechercheagent($idagentRec);
    $listAgent=$table->fetch();
    ?>
    <H3>SENSIBILISATEUR</H4>
    <br><h4><?='. Matricul :'.$listAgent['IdAgent'].' NomS : '.$listAgent['NomAgent'].' '.$listAgent['PostnomAgent'].' '.$listAgent['PrenomAgent']?>
                  <?='<br>Adresse :'.$listAgent['NomQuart'].' '.$listAgent['NomVille'].' '.$listAgent['NomProv'].' '.$listAgent['NomPays']?>
                  <?='Tel :'.$listAgent['TelAgent']?>
        </h4>
    
  </a>
  <p style=" background: gray; color: white;">
  Le nombre total des agents sensibilisateurs a tout les programmes sont au nombre de :<?php echo ' '.$nombreSens?>, <br> Pour <?=$NombreProg.' '?> programme(s) de sensibilisation que nous.
    
    <?php    
      Global $versement;
      Global $retrait;
      Global $solde;
      // Ici nous filtron contrairement avec le solde ci haut.
      $prog=programme::RechAgbyProg($idagentRec);
      $NombreProg=1;
    while($ListPro=$prog->fetch()){
      ?>
        <div style="border:1px solid white" id="<?=$ListPro['IdProg']?>">
          <p class="float-right" style="background-image:url('../dist/img/jeton1.png');height:68px; width: 80px; margin: 2px"></p>
          <?php

        echo '<a style="background:gray;color: green; margin-left:50%">'.$NombreProg++.'</a></br>';
        Echo 'Id du programme : <i style="color:red"> '.' '.$ListPro['IdProg'].'</i></br>';
        echo 'Date  d\'elaboration :'.' '.$ListPro['DateProg'].'</br>';
        echo '<a style="color:red">Objet :'.' '.$ListPro['ObjProg'].'</a></br>';
        echo 'Le Programme prevu pour : '.' '.$ListPro['DebProg'].' au : '.$ListPro['FinProg'].'</br>';
        echo  $ListPro['Prog'];

        //Nombrs Clients au programme
        echo 'Le Programme enregistre : <br>';

        //Nombre Agents au programme
        $NbrAgentAuProg= retrait::agentauprog($ListPro['IdProg']);
        $cpteur=0;
        while($NbrAgentAuProg->fetch()){
          $cpteur++;
        }

        echo 'a) '.' '.$cpteur.' Sensibilisateur(s) :<br> ';
        $AgentAuProg= retrait::agentauprog($ListPro['IdProg']);
        $cpteur=1;
        while($listAgPro=$AgentAuProg->fetch()){
          echo '<i>'.$cpteur++;
          echo '. Id : '.$listAgPro['IdAgent'].' Noms'.$listAgPro['NomAgent'].' '.$listAgPro['PrenomAgent'].' '.$listAgPro['PostnomAgent'].' '.$listAgPro['TelAgent'].'</i><br>';
        }
        $Nbrclient= retrait::clientProg($ListPro['IdProg']);
        $cpteur=0;
        while($Nbrclient->fetch()){
          $cpteur++;
        }
        echo "b) ".$cpteur.' Patient(s) :';
        //Ici le code m'a exige une nouvelle extentiation pour client au programme pour l'affichage du client ci haut on a tous simplement compte.
        $ClientAuProg= retrait::clientProg($ListPro['IdProg']);
        $cpt=0;

        $EntTotalDeclient=0;
        $SortTotalDeclient=0;
        while($listCliePro=$ClientAuProg->fetch()){
          $cpt++;
         ?>
                  <br><i><?=$cpt?>
                  <?='. id :'.$listCliePro['IdCli'].' Nom : '.$listCliePro['NomCli'].' '.$listCliePro['PostnomCli'].' '.$listCliePro['PrenomCli']?>
                  <?='Adresse '.$listCliePro['NomQuart'].' '.$listCliePro['NomVille'].' '.$listCliePro['NomProv'].' '.$listCliePro['NomPays']?>
                  <?='Tel :'.$listCliePro['TelCli']?>
                </i>
               
         <?php
         //Entree
         $rendement=retrait::rendement($listCliePro['IdCli']);
         $RClient=0;
         while($Rende=$rendement->fetch()){
          $RClient=$RClient+$Rende['Total'];
         }
         echo '<a style="color: red"><br>
         Entré(s) : $'.$RClient.'
         |Sensibilisateur : $'.($RClient*$pourc).'
         |Solde : '.($RClient-($RClient*$pourc)).'$</a>';
         //Ajoute sur les rendement des autres clients
            $EntTotalDeclient=$EntTotalDeclient+$RClient;


         
         //Le retrait
         $retrait_de_son_sanib=retrait::rechercheretrait($listCliePro['IdAgent']);
          while($ListeR=$retrait_de_son_sanib->fetch()){
        // ici on calcule l'argent verse au sensi
            $retrait=$retrait+$ListeR['MontRetrait'];
          }
          //on calcule le montat total verse chez les different sensibilisateur
          $versement=$versement+($RClient*$pourc);
      }
      $Div=$EntTotalDeclient*$pourc;
       echo '<p style="color:white;background:gray; font-size:26px;text-align:center"><i>Entré :'.$EntTotalDeclient.'$   Dividente : '.$Div.'$ Solde : '.($EntTotalDeclient-$Div).'$</i></p>';
    ?>
    <button class="btn btn-default no-print" style="color:red" onclick="imprimer(<?=$ListPro['IdProg']?>)"> Imprimer</button>
      
        </div>
    </p>
    <?php
  }    
    ?>
    
</div>
<!--  -->

<?php
    //Verssement
   
     $compteur=0;
     $sommeverAgent=0;
     $retraitAgent=0;
     $soldeAgent=0;
  $tab=versement::filtrerPay($idagentRec);
  while($Liste=$tab->fetch()){
    // $tab_agent=agent::rechercheagent($Liste['IdAgent']);
    // $tagent=$tab_agent->fetch();
    $sommeverAgent= $sommeverAgent+$Liste['MontVers'];
    }
    //Le retrait
   $retrait_de_son_sanib=retrait::rechercheretrait($idagentRec);
   while($ListeR=$retrait_de_son_sanib->fetch()){
   // ici on calcule l'argent verse au sensi
   $retraitAgent=$retraitAgent+$ListeR['MontRetrait'];
    }
    if($sommeverAgent>$retraitAgent){
    $soldeAgent=($sommeverAgent-$retraitAgent);
  }else{
    $soldeAgent=0;
  }
?>
      <div style="height: 60px;" class="row" id="program">
          <a style="text-align: center" class="col-12">COMPTE SENSIBILISATEUR
          </a>

          <div style="height: 100%; width: 30%; margin-left: 5%;font-size: 20px; border:1px solid yellow" >
            
          <!-- Versement -->
             <?php
                  echo'Versement au Sens. :$ '.$sommeverAgent;
              ?>
              <button id="Vers" value="<?=$sommeverAgent?>"></button>
          </div>
          <div style="height: 100%; width: 30%; font-size: 25px;  border:1px solid green" id="">
          <!-- Solde -->
             <?php

                  echo 'Retrait par Sens. :$ '.$retraitAgent;
              ?>
              <button id="Retrai" value="<?=$retraitAgent?>"></button>
          </div>
          <div style="height: 100%; width: 30%; font-size: 25px;  border:1px solid red" id="">
          <!-- Solde -->
               <?php
                  echo 'Solde :$ '.$soldeAgent;
                ?>
                <button id="Soldesolde" value="<?=$soldeAgent?>"></button>
          </div>
      
      </div>
    <?php
}






















function FiltrersoldeAgent($idagentRec){
    //Verssement
     $compteur=0;
     $sommeverAgent=0;
     $retraitAgent=0;
     $soldeAgent=0;
  $tab=versement::filtrerPay($idagentRec);
  while($Liste=$tab->fetch()){
    $sommeverAgent= $sommeverAgent+$Liste['MontVers'];
    }
    //Le retrait
   $retrait_de_son_sanib=retrait::rechercheretrait($idagentRec);
   while($ListeR=$retrait_de_son_sanib->fetch()){
   // ici on calcule l'argent verse au sensi
   $retraitAgent=$retraitAgent+$ListeR['MontRetrait'];
    }
    if($sommeverAgent>$retraitAgent){
    $soldeAgent=($sommeverAgent-$retraitAgent);
  }else{
    $soldeAgent=0;
  }
?>
      <div style="height: 60px; background: rgba(77,78,79,0.9);" class="row" id="program">
        
          <div style="height: 100%; width: 30%; margin-left: 5%;font-size: 20px; border:1px solid yellow" >
            
          <!-- Versement -->
             <?php
                  echo'RETRAIT : $ '.$sommeverAgent;
              ?>
              <button id="Vers" value="<?=$sommever?>"></button>
          </div>
          
          <div style="height: 100%; width: 30%; font-size: 25px;  border:1px solid red" id="">
          <!-- Solde -->
               <?php
                  echo 'SOLDE : $'.$soldeAgent;
                ?>
                <button id="Soldesolde" value="<?=$soldeAgent?>"></button>
          </div>
          <div style="height: 100%; width: 30%; font-size: 25px;  border:1px solid green" id="">
          <!-- Solde -->
             <?php

                  echo 'RETRAIT : $ '.$retraitAgent;
              ?>
              <button id="Retrai" value="<?=$retrait?>"></button>
          </div>
      
      </div>
    <?php
}