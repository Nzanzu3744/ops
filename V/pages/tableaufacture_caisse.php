<?php

function mafacture($idpres){
      include('../M/payement.class.php');
     $presc=prescription::recprescript($idpres);
          while($liste=$presc->fetch()){
      $idPres=$liste['IdPrescrip'];
     $Totaux=0;
     ?>
     <div style="">
      <?php
      include('TeteDoc.php');
      ?>
    <div style=" font-family: timenewroman;background-color: rgba(77, 77, 78, 0.8); color: white;">
      <label class="2">ID : <?php echo $liste['IdCli'] ?></label>
      <label class="col-3">Nom : <?php echo $liste['NomCli'] ?></label>
      <label class="col-3">Postnom : <?php echo $liste['PostnomCli'] ?></label>
      <label class="col-3">Prenom : <?php echo $liste['PrenomCli'] ?></label>
      <label class="col-3">Facture: <?php echo $liste['IdPrescrip'] ?></label>

    </div>
       <table class="table">
      
                  <thead >
                    <tr>
                      <th>N</th>
                      <th>ID_Cons</th>
                      <th>Date</th>
                      <th>Designations</th>
                      <th>Qt</th>
                      <th>Pu</th>
                      <th>PT</th>
                      <th>RP</th>
                    </tr>
                  </thead>
                  <tfoot style="font-family: timenewroman; ">
                      <?php
                      $ConstFact=consommation::filtrerconso($idPres);
                      if (!empty($ConstFact)){
          
                      $compteur=1;
                      while($sel=$ConstFact->fetch()){

                        $pay=payement::filtrerpayement($sel['IdConso']);
                        $totalpay=0;
                        while($lst=$pay->fetch()){
                            $totalpay=($totalpay+$lst['Total']);
                        }
                        //`DateConso`, `QuantConso`, `PuConso`
                        $totalconso=$sel['PuConso']*$sel['QuantConso'];
                        echo '<tfoot>
                    <tr>';
                        echo '<td>'.$compteur.'</td>';
                        echo '<td>'.$sel['IdConso'].'</td>';
                        echo '<td>'.$sel['DateConso'].'</td>';
                        echo '<td>'.$sel['DesigServi'].'</td>';
                        echo '<td>'.$sel['QuantConso'].'</td>';
                        echo '<td>'.$sel['PuConso'].'$</td>';
                        echo '<td>'.$totalconso.'$</td>';
                        echo '<td >'.($totalconso-$totalpay).'$</td>';
                        
                        echo '<td> <a class="btn btn-success btn-xs no-print" onclick="recupfact('.$sel['IdConso'].')" id="payer" ><i class="fas  fa-edit"></i>
                      </a>
                      </td>';
                      
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
               echo '<strong style="color:white; font-size:20px; margin-top:10px;" class="col-2"> Totaux : '. $Totaux .'$</strong>';  
                       //margin-left:60%;                
                   

                      ?>
              </div>
                      <label class="col-12" style="color: white; margin-top:-10px; font-size: 23px">--------------------------------------------------</label>
                      <?php
            } 
            } 
//Ma fonction pour recuperation des facture sans distinction du client
function mesfacture(){

     $presc=prescription::prescriptfact();
     while($liste=$presc->fetch()){
      $idPres=$liste['IdPrescrip'];
     $Totaux=0;
     ?>
     <div style="">
      <?php
      include('TeteDoc.php');
      ?>
    <div style=" font-family: timenewroman;background-color: rgba(77, 77, 78, 0.8); color: white;">
      <label class="2">ID : <?php echo $liste['IdCli'] ?></label>
      <label class="col-3">Nom : <?php echo $liste['NomCli'] ?></label>
      <label class="col-3">Postnom : <?php echo $liste['PostnomCli'] ?></label>
      <label class="col-3">Prenom : <?php echo $liste['PrenomCli'] ?></label>
      <label class="col-3">Facture: <?php echo $liste['IdPrescrip'] ?></label>

    </div>
       <table class="table">
                  <thead >
                    <tr>
                      <th>N</th>
                      <th>ID_Cons</th>
                      <th>Date</th>
                      <th>Designations</th>
                      <th>Qt</th>
                      <th>Pu</th>
                      <th>PT</th>
                      <th>RP</th>
                    </tr>
                  </thead>
                  <tfoot style="font-family: timenewroman; ">
                      <?php
                      $ConstFact=consommation::filtrerconso($idPres);
                      if (!empty($ConstFact)){
          
                      $compteur=1;
                      while($sel=$ConstFact->fetch()){
                        //ici nous verifie le reste a paye
                        // include('../M/payement.class.php');
                        $pay=payement::filtrerpayement($sel['IdConso']);
                        $totalpay=0;
                        while($lst=$pay->fetch()){
                            $totalpay=($totalpay+$lst['Total']);
                        }
                        $totalconso=$sel['PuConso']*$sel['QuantConso'];
                        echo '<tfoot>
                    <tr>';
                        echo '<td>'.$compteur.'</td>';
                        echo '<td>'.$sel['IdConso'].'</td>';
                        echo '<td>'.$sel['DateConso'].'</td>';
                        echo '<td>'.$sel['DesigServi'].'</td>';
                        echo '<td>'.$sel['QuantConso'].'</td>';
                        echo '<td>'.$sel['PuConso'].'$</td>';
                        echo '<td>'.$totalconso.'$</td>';
                        

                        echo '<td style="color:red">'.($totalconso-$totalpay).'$</td>';
                       echo '<td> <a class="btn btn-success btn-xs no-print" onclick="recupfact('.$sel['IdConso'].')" id="payer" ><i class="fas  fa-edit"></i>
                      </a>
                      </td>';
                      
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
               echo '<strong style="color:white; font-size:20px; margin-top:10px;" class="col-2"> Totaux : '. $Totaux .'$</strong>';  
                       //margin-left:60%;                
                   

                      ?>
              </div>
                      <label class="col-12" style="color: white; margin-top:-10px; font-size: 23px">--------------------------------------------------</label>
                      <?php
            } 
            } 
function maconso($idpres){
     $presc=consommation::recupConso($idpres);
     $liste=$presc->fetch();
      $idPres=$liste['IdPrescrip'];
     $Totaux=0;
     if (!empty($idPres)) {
     ?>
     <div style="" id="facture">
     <div style=" font-family: timenewroman;background-color: rgba(78, 78, 78, 0.8); color: white;">
      <p class="2">ID Client : <?php echo $liste['IdCli'] ?></p>
      <button class="float-right " value="<?=$idPres?>" id="idpres">Facture: <?php echo $idPres?></button>
      <p> Nom: <?php echo $liste['NomCli'] ?>, PostNom : <?php echo $liste['PostnomCli'] ?>
        Prenom : <?php echo $liste['PrenomCli'] ?>
      </p>
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
              <th>RP</th>
            </tr>
          </thead>
          <tfoot style="font-family: timenewroman; ">
              <?php

              $compteur=1;
              
                echo '<tfoot>
            <tr>';
                $totalconso=($liste['PuConso']*$liste['QuantConso']);
                echo '<td>'.$compteur.'</td>';
                echo '<td><button id="IdConso" value="'.$liste['IdConso'].'">'.$liste['IdConso'].'</button></td>';
                echo '<td>'.$liste['DesigServi'].'</td>';
                echo '<td>'.$liste['QuantConso'].'</td>';
                echo '<td>'.$liste['PuConso'].'</td>';
                echo '<td>'.$totalconso.'$</td>';
                include('../M/payement.class.php');
                 $pay=payement::filtrerpayement($liste['IdConso']);
                $totalpay=0;
                while($lst=$pay->fetch()){
                    $totalpay=($totalpay+$lst['Total']);
                }
                 echo '<td><button style="color:red" id="reste" value="'.($totalconso-$totalpay).'">'.($totalconso-$totalpay).'$</button></td>
                 
              </th>';
              
              ?>
              </tfoot>                     
           </table>
              </div>
              <?php 
                
               
                                    
              }
            
              ?>    
            </div>
              <?php
                }
     
function listerRecu(){
     $payement=payement::p_recu();
     $Totaux=0;
     $compteur=0;
     while ($liste=$payement->fetch()) {
      $compteur++;
      $idcons= $liste['IdPrescrip'];
      ?>
      <div style="border: 1px solid white" id="<?=$liste['IdPay']?>">
        <?php
      include('TeteDoc.php');
  ?>
    <p class="2">ID Client : <?php echo $liste['IdCli'] ?></p>
      <button class="float-right " value="<?=$idPres?>" id="idpres">Facture: <?php echo $liste['IdPrescrip'] ?></button>
      <button class="float-right " value="<?=$idPres?>" id="idpres">Recu: <?php echo $liste['IdPay'] ?></button>
      <p> Nom: <?php echo $liste['NomCli'] ?>, PostNom : <?php echo $liste['PostnomCli'] ?>
        Prenom : <?php echo $liste['PrenomCli'] ?>
     </p>

       <table>
                  <thead >
                    <tr>
                      <th style="color:red">N</th>
                      <th >Date</th>
                      <th >Montat</th>
                      <th >Taux</th>
                      <th >Devise</th>
                      <th >USD</th>
                      <th >Options</th>
                    </tr>
                  </thead>
                  <tfoot style="font-family: timenewroman; ">
                  <?php          
                        echo '<tfoot>
                    <tr>';
                        echo '<td style="color:red">'.$compteur.'</td>';
                        echo '<td>'.$liste['DatePay'].'</td>';
                        echo '<td >'.$liste['Montat'].'</td>';
                        echo '<td >'.$liste['Taux'].'</td>';
                        echo '<td >'.$liste['NomDevise'].'</td>';
                        echo '<td >'.$liste['Total'].'$</td>';
                        echo '<td> <a tyle="" class="btn btn-success btn-xs  no-print" onclick="modifierfact()" id="modifierfact" ><i class="fas  fa-edit"></i>
                      </a></td>';

                       echo '<td ><a  tyle="color:black" class="btn btn-warning btn-xs no-print" onclick="imprimer('.$liste['IdPay'].')" ><i class="fas fa-print"></i>
                      </a></td>';

                      echo '<td ><a  tyle="" class="btn btn-danger btn-xs no-print" onclick="supprimerpay('.$liste['IdPay'].','.$idcons.')" id="sup" ><i class="fas fa-trash"></i>
                      </a></td>'; 
                            
                        echo '</tr> 
                        </tfoot>';                   
                      ?>
                      </tfoot>                     
              </table>
              </div>
              <?php
        }
}
//filtre par rapport de Id Payement
function recu($var){
     $payement=payement::filtrerpayement1($var);
     $Totaux=0;
     $compteur=0;
     while ($liste=$payement->fetch()) {
      $compteur++;
      $idcons= $liste['IdPrescrip'];
    
      include('TeteDoc.php');
      ?>
      <div style="border: 1px solid white">
    <p class="2">ID Client : <?php echo $liste['IdCli'] ?></p>
      <button class="float-right " value="<?=$idPres?>" id="idpres">Facture: <?php echo $liste['IdPrescrip'] ?></button>
      <button class="float-right " value="<?=$idPres?>" id="idpres">Recu: <?php echo $liste['IdPay'] ?></button>
      <p> Nom: <?php echo $liste['NomCli'] ?>, PostNom : <?php echo $liste['PostnomCli'] ?>
        Prenom : <?php echo $liste['PrenomCli'] ?>
     </p>

       <table>
                  <thead >
                    <tr>
                      <th style="color:red">N</th>
                      <th >Date</th>
                      <th >Montat</th>
                      <th >Taux</th>
                      <th >Devise</th>
                      <th >USD</th>
                      <th >Options</th>
                    </tr>
                  </thead>
                  <tfoot style="font-family: timenewroman; ">
                  <?php          
                        echo '<tfoot>
                    <tr>';
                        echo '<td style="color:red">'.$compteur.'</td>';
                        echo '<td>'.$liste['DatePay'].'</td>';
                        echo '<td >'.$liste['Montat'].'</td>';
                        echo '<td >'.$liste['Taux'].'</td>';
                        echo '<td >'.$liste['NomDevise'].'</td>';
                        echo '<td >'.$liste['Total'].'$</td>';
                        echo '<td> <a tyle="" class="btn btn-success btn-xs  no-print" onclick="modifierfact()" id="modifierfact" ><i class="fas  fa-edit"></i>
                      </a></td>';
                      echo '<td ><a  tyle="" class="btn btn-danger btn-xs no-print" onclick="supprimerpay('.$liste['IdPay'].','.$idcons.')" id="sup" ><i class="fas fa-trash"></i>
                      </a></td>'; 
                            
                        echo '</tr> 
                        </tfoot>';                   
                      ?>
                      </tfoot>                     
              </table>
              </div>
              <?php
        }
}
//Par rapport de la consommation
function MonRecu($idcons){
  include('../M/payement.class.php');
     $payement=payement::filtrerpayement($idcons);
     $Totaux=0;
     ?>
       <table>
                  <thead >
                    <tr>
                      <th >N</th>
                      <th >Date</th>
                      <th >Montat</th>
                      <th >Taux</th>
                      <th >Devise</th>
                      <th >USD</th>
                      <th >Options</th>
                    </tr>
                  </thead>
                  <?php
                  $compteur=0;
                  while($liste=$payement->fetch()){
                  ?>
                  <tfoot style="font-family: timenewroman; ">
                  <?php          
                      $compteur++;
                        echo '<tfoot>
                    <tr>';
                        echo '<td>'.$compteur.'</td>';
                        echo '<td>'.$liste['DatePay'].'</td>';
                        echo '<td >'.$liste['Montat'].'</td>';
                        echo '<td >'.$liste['Taux'].'</td>';
                        echo '<td >'.$liste['NomDevise'].'</td>';
                        echo '<td >'.$liste['Total'].'$</td>'; 
                         echo '<td> <a tyle="" class="btn btn-success btn-xs  no-print" onclick="modifierfact()" id="modifierfact" ><i class="fas  fa-edit"></i>
                      </a></td>';
                      echo '<td ><a  tyle="" class="btn btn-danger btn-xs no-print" onclick="supprimerpay('.$liste['IdPay'].','.$idcons.')" id="sup" ><i class="fas fa-trash"></i>
                      </a></td>';                  
                        echo '</tr> 
                        </tfoot>';
                      }
                    
                      ?>
                      </tfoot>                     
              </table>
              <?php
}