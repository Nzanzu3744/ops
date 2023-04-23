<?php
//Ici on affiche la facture pour son edition
function mafacture($idpres){
     $presc=prescription::recprescript($idpres);
     while($liste=$presc->fetch()){
      $idPres=$liste['IdPrescrip'];
     $Totaux=0;
     if (!empty($idPres)) {
     ?>
     <div id="imprimerFac">
       <?php
        include('TeteDoc.php');
        ?>
     <div style=" font-family: timenewroman;background-color: rgba(77, 77, 78, 0.8); color: white;">
      <label class="6">ID : <?php echo $liste['IdCli'] ?></label>
      <button class="6 float-right " value="<?=$idPres?>" id="facture">Facture_<?php echo $idPres?></button>
      <label class="col-3">Nom : <?php echo $liste['NomCli'] ?></label>
      <label class="col-3">Postnom : <?php echo $liste['PostnomCli'] ?></label>
      <label class="col-3">Prenom : <?php echo $liste['PrenomCli'] ?></label>
    </div>
       <table class="table">
                  <theader>
                    <tr>
                      <th>N</th>
                      <th>ID</th>
                      <th>Date</th>
                      <th>Designations</th>
                      <th>Qtes</th>
                      <th>Pu</th>
                      <th>PT</th>
                    </tr>
                  </theader>
                  <tfooter style="font-family: timenewroman; ">
                      <?php
                      $ConstFact=consommation::filtrerconso($idPres);
                      if (!empty($ConstFact)){
          
                      $compteur=1;
                      while($sel=$ConstFact->fetch()){
                      echo'<tr>';
                        echo '<td>'.$compteur.'</td>';
                        echo '<td>'.$sel['IdConso'].'</td>';
                        echo '<td>'.$sel['DateConso'].'</td>';
                        echo '<td>'.$sel['DesigServi'].'</td>';
                        echo '<td>'.$sel['QuantConso'].'</td>';
                        echo '<td>'.$sel['PuConso'].'</td>';
                        echo '<td>'.$sel['PuConso']*$sel['QuantConso'].'$</td>';
                        echo '<th class="project-actions text-right">';
                         echo '<td> 
                         <a tyle="" class="no-print btn-danger btn -xs col-2 " onclick="suprimerconso('.$liste['IdPrescrip'].','.$sel['IdConso'].')" id="supconso" ><i class="fas  fa-trash"></i>Sup</a>
                      </td>';
                                       
                         $Totaux=$Totaux+$sel['PuConso']*$sel['QuantConso'];
                        echo '</tr>
                  </tfooter>';

                  $compteur++;
                      }
                      }
                      ?>
                      </tfoot>                     
              </table>
              
              <?php
                echo '<a class="col-2"> Totaux : '.$Totaux.'$</a>';  

                echo '<a class="btn no-print btn-xs col-2 "  onclick="imprimer(\'imprimerFac\')" id="" ><i class="fas  fa-print"></i>imprimer
                      </a>';
                echo '<a tyle="" class="btn no-print btn-xs col-2 " onclick="recupfact('.$idPres.')" id="payer" ><i class="fas  fa-edit"></i>Payer
                      </a>';     
   
                 echo '<a tyle="" class="btn no-print btn-xs col-2 " onclick="modifierfact('.$idPres.')" id="modifierfact" ><i class="fas  fa-edit"></i>Modifier
                      </a>';
                 echo '<a tyle="" class="btn no-print btn-xs col-2 " onclick="valider()" id="modifierfact" ><i class="fas fa-edit"></i>Valider
                      </a>';                       
              }
              ?>
            </div>
              <?php
              }
          
                }
//Ma fonction pour recuperation des factures avec filtrage
    function editefacture($idpres){
     $presc=prescription::recprescript($idpres);
     $liste=$presc->fetch();
      $idPres=$liste['IdPrescrip'];
     $Totaux=0;
     if (!empty($idPres)) {
     ?>
     <div style="" id="factureedit">
       <?php
        include('TeteDoc.php');
        ?>
     <div style=" font-family: timenewroman;background-color: rgba(77, 77, 78, 0.8); color: white;">
      <label class="6">ID : <?php echo $liste['IdCli'] ?></label>
      <button class="6 float-right " value="<?=$idPres?>" id="idpres">Facture_ <?php echo $idPres?></button>
      <label class="col-3">Nom : <?php echo $liste['NomCli'] ?></label>
      <label class="col-3">Postnom : <?php echo $liste['PostnomCli'] ?></label>
      <label class="col-3">Prenom : <?php echo $liste['PrenomCli'] ?></label>
    </div>
       <table class="table">
        
                  <thead >
                    <tr>
                      <th>N</th>
                      <th>ID</th>
                      <th>Date</th>
                      <th>Designations</th>
                      <th>Qtes</th>
                      <th>Pu</th>
                      <th>PT</th>
                    </tr>
                  </thead>
                  <tfoot style="font-family: timenewroman; ">
                      <?php
                      $ConstFact=consommation::filtrerconso($idPres);
                      if (!empty($ConstFact)){
          
                      $compteur=1;
                      while($sel=$ConstFact->fetch()){
                        echo '<tfoot>
                    <tr>';
                        echo '<td>'.$compteur.'</td>';
                        echo '<td>'.$sel['IdConso'].'</td>';
                        echo '<td>'.$sel['DateConso'].'</td>';
                        echo '<td>'.$sel['DesigServi'].'</td>';
                        echo '<td>'.$sel['QuantConso'].'</td>';
                        echo '<td>'.$sel['PuConso'].'</td>';
                        echo '<td>'.$sel['PuConso']*$sel['QuantConso'].'$</td>';
                        echo '<th class="project-actions text-right">';
                         echo '<th> <a tyle="" class="no-print btn  no-print btn -danger no-print btn -xs col-2 " onclick="suprimerconso('.$liste['IdPrescrip'].','.$sel['IdConso'].')" id="supconso" ><i class="fas  fa-trash"></i>Sup</a>
                      </th>';
                                       
                        $Totaux=$Totaux+$sel['PuConso']*$sel['QuantConso'];
                        echo '</tr>
                  </tfoot>';

                  $compteur++;
                      }
                      }
                      ?>
                      </tfoot>                     
              </table>
              
              <?php
                echo '<a style="color:black; font-size:20px; margin-top:10px;" class="col-2"> Totaux : '. $Totaux .'$</a>';  
                       //margin-left:60%;
                echo '<a class="no-print btn  no-print btn - no-print btn -xs col-2 "  onclick="imprimer(\'factureedit\')" id="" ><i class="fas  fa-print"></i>imprimer
                      </a>';
                echo '<a tyle="" class="no-print btn  no-print btn - no-print btn -xs col-2 " onclick="recupfact('.$idPres.')" id="payer" ><i class="fas  fa-edit"></i>Payer
                      </a>';     
   
                 echo '<a tyle="" class="no-print btn  no-print btn - no-print btn -xs col-2 " onclick="modifierfact('.$idPres.')" id="modifierfact" ><i class="fas  fa-edit"></i>Modifier
                      </a>';
                 echo '<a tyle="" class="no-print btn  no-print btn - no-print btn -xs col-2 " onclick="valider()" id="modifierfact" ><i class="fas fa-edit"></i>Valider
                      </a>';                   
                                    
              }
            
              ?>    
            </div>
              <?php
                }
//Ma fonction pour recuperation des factures sans filtrage
function mesfacture(){
     $presc=prescription::prescriptfact();
     ?>
       <div id="imprifact2">
          <?php
         while($liste=$presc->fetch()){
          $idPres=$liste['IdPrescrip'];
         $Totaux=0;
         ?>
      <div id="<?=$idPres?>">
         <?php
        include('TeteDoc.php');
        ?>
        <div style=" font-family: timenewroman;background-color: rgba(77, 77, 78, 0.8); color: white;">
          
          <button class="float-right " value="<?=$idPres?>" id="facture">Facture : <?php echo $idPres?></button>
          <label class="">ID : <?php echo $liste['IdCli'] ?></label>
          <label class="">Nom : <?php echo $liste['NomCli'] ?></label>
          <label class="">Postnom : <?php echo $liste['PostnomCli'] ?></label>
          <label class="">Prenom : <?php echo $liste['PrenomCli'] ?></label>
        </div>
           <table class="table">

                      <thead >
                        <tr>
                          <th>N</th>
                          <th>Id_Cons</th>
                          <th>Date</th>
                          <th>Designations</th>
                          <th>Qtes</th>
                          <th>Pu</th>
                          <th>PT</th>
                        </tr>
                      </thead>
                      <tfoot style="font-family: timenewroman; ">
                          <?php
                          $ConstFact=consommation::filtrerconso($idPres);
                          if (!empty($ConstFact)){
              
                          $compteur=1;
                          while($sel=$ConstFact->fetch()){

                            echo '<tfoot>
                        <tr>';
                            echo '<td>'.$compteur.'</td>';
                            echo '<td>'.$sel['IdConso'].'</td>';
                            echo '<td>'.$sel['DateConso'].'</td>';
                            echo '<td>'.$sel['DesigServi'].'</td>';
                            echo '<td>'.$sel['QuantConso'].'</td>';
                            echo '<td>'.$sel['PuConso'].'</td>';
                            echo '<td>'.$sel['PuConso']*$sel['QuantConso'].'$</td>';
                            echo '<th class="project-actions text-right">
                          </th>';
                          
                            $Totaux=$Totaux+$sel['PuConso']*$sel['QuantConso'];
                            echo '</tr> 
                            </tfoot>';
                          
                      $compteur++;
                          }
                          }
                          ?>
                          </tfoot>                     
                  </table>
 <?php
                echo '<strong class="col-2"> Totaux : '. $Totaux .'$</strong>';  
                       //margin-left:60%;
                echo '<a class="no-print btn  no-print btn - no-print btn -xs col-2 "  onclick="imprimer('.$idPres.')" id="" ><i class="fas  fa-print"></i>imprimer
                      </a>';
                echo '<a tyle="" class="no-print btn  no-print btn - no-print btn -xs col-2 " onclick="recupfact('.$idPres.')" id="payer" ><i class="fas  fa-edit"></i>Payer
                      </a>';     
   
                 echo '<a tyle="" class="no-print btn  no-print btn - no-print btn -xs col-2 " onclick="modifierfact('.$idPres.')" id="modifierfact" ><i class="fas  fa-edit"></i>Modifier
                      </a>';
                 echo '<a tyle="" class="no-print btn  no-print btn - no-print btn -xs col-2 " onclick="valider()" id="modifierfact" ><i class="fas fa-edit"></i>Valider</a>'

                 ?>
              </div>
              <?php                                         
              }
            
              ?>    
            </div>
              <?php
                }