<?php
function mafacture($idpres){
     $presc=prescription::recprescript($idpres);
     $liste=$presc->fetch();
      $idPres=$liste['IdPrescrip'];
     $Totaux=0;
     if (!empty($idPres)) {
     ?>
     <div style="" id="facture">
     <div style=" font-family: timenewroman;background-color: rgba(77, 77, 78, 0.8); color: white;">
      <label class="6">ID : <?php echo $liste['IdCli'] ?></label>
      <button class="6 float-right " value="<?=$idPres?>" id="idpres">PRESCRIPT: <?php echo $idPres?></button>
      <label class="col-3">Nom : <?php echo $liste['NomCli'] ?></label>
      <label class="col-3">Postnom : <?php echo $liste['PostnomCli'] ?></label>
      <label class="col-3">Prenom : <?php echo $liste['PrenomCli'] ?></label>
    </div>
       <table class="table">
                  <thead >
                    <tr>
                      <th>N</th>
                      <th>ID</th>
                      <th>Designations</th>
                      <th>Qtes</th>
                      <th>Pu</th>
                      <th>PT</th>
                      <th style="color:red">Montat</th>
                      <th style="color:red">Taux</th>
                      <th style="color:red">Devise</th>
                      <th style="color:red">Tot Paye</th>
                      <th style="color:red">Reste a Paye</th>
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
                        echo '<td>'.$sel['DesigServi'].'</td>';
                        echo '<td>'.$sel['QuantServi'].'</td>';
                        echo '<td>'.$sel['PuDesigServi'].'</td>';
                        echo '<td>'.$sel['PuDesigServi']*$sel['QuantServi'].'$</td>';
                        echo '<th class="project-actions text-right">';
                         include('../M/payement.class.php');
                         $pay=payement::filtrerpayement($sel['IdConso']);
                        $lst=$pay->fetch();
                        echo '<td style="color:red">'.$lst['Montat'].'</td>';
                        echo '<td style="color:red">'.$lst['Taux'].'</td>';
                        echo '<td style="color:red">'.$lst['NomDevise'].'</td>';
                        echo '<td style="color:red">'.$lst['Total'].'</td>';
                         echo '<th> <a tyle="" class="btn btn-danger btn-xs col-2 no-print" onclick="suprimerconso('.$liste['IdPrescrip'].','.$sel['IdConso'].')" id="supconso" ><i class="fas  fa-trash"></i>Sup</a>
                      </th>';

                      $pay=payement::filtrerpayement($sel['IdConso']);
                       while($lst=$pay->fetch()){
                        echo 'XXX';
                       }                                     
                        $Totaux=$Totaux+$sel['PuDesigServi']*$sel['QuantServi'];
                        echo '</tr>
                  </tfoot>';

                  $compteur++;
                      }
                      }
                      ?>
                      </tfoot>                     
              </table>
              
              <?php
                echo '<strong style="color:white; font-size:20px; margin-top:10px;" class="col-2"> Totaux : '. $Totaux .'$</strong>';  
                       //margin-left:60%;
                echo '<a class="btn btn-success btn-xs col-2 no-print"  onclick="imprimer(\'facture\')" id="" ><i class="fas  fa-print"></i>imprimer
                      </a>';
                echo '<a tyle="" class="btn btn-success btn-xs col-2 no-print" onclick="recupfact('.$idPres.')" id="payer" ><i class="fas  fa-edit"></i>Payer
                      </a>';     
   
                 echo '<a tyle="" class="btn btn-success btn-xs col-2 no-print" onclick="modifierfact('.$idPres.')" id="modifierfact" ><i class="fas  fa-edit"></i>Modifier
                      </a>';
                 echo '<a tyle="" class="btn btn-success btn-xs col-2 no-print" onclick="valider()" id="modifierfact" ><i class="fas fa-edit"></i>Valider
                      </a>';                   
                                    
              }
              }
              ?>    
            </div>
              <?php
//Ma fonction pour recuperation des facture sans distinction du client
function mesfacture(){
     $presc=prescription::prescriptfact();
     while($liste=$presc->fetch()){
      $idPres=$liste['IdPrescrip'];
     $Totaux=0;
     ?>
     <div style="">
    <div style=" font-family: timenewroman;background-color: rgba(77, 77, 78, 0.8); color: white;">
      <label class="2">ID : <?php echo $liste['IdCli'] ?></label>
      <label class="col-3">Nom : <?php echo $liste['NomCli'] ?></label>
      <label class="col-3">Postnom : <?php echo $liste['PostnomCli'] ?></label>
      <label class="col-3">Prenom : <?php echo $liste['PrenomCli'] ?></label>
    </div>
       <table class="table">
                  <thead >
                    <tr>
                      <th>N</th>
                      <th>Id_Conso</th>
                      <th>Designations</th>
                      <th>Qtes</th>
                      <th>Pu</th>
                      <th>PT</th>
                      <th style="color:red">Montat</th>
                      <th style="color:red">Taux</th>
                      <th style="color:red">Devise</th>
                      <th style="color:red">Tot Paye</th>
                      <th style="color:red">Reste a Paye</th>
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
                        echo '<td>'.$sel['DesigServi'].'</td>';
                        echo '<td>'.$sel['QuantServi'].'</td>';
                        echo '<td>'.$sel['PuDesigServi'].'</td>';
                        echo '<td>'.$sel['PuDesigServi']*$sel['QuantServi'].'$</td>';
                        include('../M/payement.class.php');
                        $pay=payement::filtrerpayement($sel['IdConso']);
                        $lst=$pay->fetch();
                        echo '<td style="color:red">'.$lst['Montat'].'</td>';
                        echo '<td style="color:red">'.$lst['Taux'].'</td>';
                        echo '<td style="color:red">'.$lst['NomDevise'].'</td>';
                        echo '<td style="color:red">'.$lst['Total'].'</td>';
                       

                        echo '<th class="project-actions text-right">
                      </th>';
                      
                        $Totaux=$Totaux+$sel['PuDesigServi']*$sel['QuantServi'];
                        echo '</tr> 
                        </tfoot>';
                      
                  $compteur++;
                      }
                      }
                      ?>
                      </tfoot>                     
              </table>
              
              <?php
               echo '<strong style="color:white; font-size:20px; margin-top:10px;" class="col-2"> Totaux : '. $Totaux .'$</strong>';  
                       //margin-left:60%;
                echo '<a class="btn btn-success btn-xs col-2 no-print"  onclick="imprimer(\'facture\')" id="" ><i class="fas  fa-print"></i>imprimer
                      </a>';
                echo '<a tyle="" class="btn btn-success btn-xs col-2 no-print" onclick="recupfact('.$idPres.')" id="payer" ><i class="fas  fa-edit"></i>Payer
                      </a>';     
   
                 echo '<a tyle="" class="btn btn-success btn-xs col-2 no-print" onclick="modifierfact('.$idPres.')" id="modifierfact" ><i class="fas  fa-edit"></i>Modifier
                      </a>';
                 echo '<a tyle="" class="btn btn-success btn-xs col-2 no-print" onclick="valider()" id="modifierfact" ><i class="fas fa-edit"></i>Valider
                      </a>';                      
                  
                      ?>
              </div>
                      <label class="col-12" style="color: white; margin-top:-10px; font-size: 23px">--------------------------------------------------</label>
                      <?php
              }
}