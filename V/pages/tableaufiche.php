
<?php

function mafiche($idfiche,$idcli){
?>
  
<?php
   $cli=new fiche();
  $tab=$cli->rechercheclient($idcli);
  $client=$tab->fetch();
  ?>
        <div class="row" style="text-align: center;" id="fiche">
                <div class="row" style="text-align: center;">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-cross"></i> Oui Pour La santé, Clinique
                  </h4>
                </div>
              </div>
             
                <div class="row">
                  <address class="col-4">
                    Avenu Gety Numero 54<br>
                    Telephone: +243970285551<br>
                    Email: ouipourlasate@gmai.com

                  </address>
               
                <!-- <img src="../dist/img/logo.png" class="col-2 offset-1" style="height: 100px"> -->
                
                  <address class="col-4 offset-4">
                    <strong><?php echo strtoupper($client['NomCli'].' '.$client['PostnomCli']);?></strong><br>
                    <?php echo $client['NomQuart'].' '.$client['NomVille'].' '.$client['NomProv'].' '.$client['NomPays'];?><br>
                    <?php echo 'Telephon:'.$client['TelCli'];?> <br>
                  </address>
                
              </div>
  <div class="col-12 table-responsive">
                  <div id="fonct_tab">
                    <?php
                      $fiche=fiche::filtrerfiche($idfiche,$idcli);
                      ?>
                  </div>
                  <?php
                  $cpt=1;
                    while($select=$fiche->fetch())
                          {
                            ?>
                  <table class="table " id="">
                          <thead style="background-color: rgba(77, 77, 78, 0.8); color: white;">
                            <tr>
                              <th>N</th>
                              <th>IdFiche</th>
                              <th>Date</th>
                              <th>Temperature</th>
                              <th>Respuration</th>
                              <th>Pulsation</th>
                              <th>Poid</th>
                              <th>TA</th>
                              
                            </tr>
                          </thead>
                          <tbody style="background-color: rgba(77, 77, 78, 0.5); color: white; margin-top: -9px">
                            <tr>
                              <td><?php echo $cpt;?></td>
                              <td><?php echo $select['IdFiche'];?></td>
                              <td><?php echo $select['DateElabFiche'];?></td>
                              <td><?php echo $select['TempFiche'];?></td>
                              <td><?php echo $select['RespFiche'];?></td>
                              <td><?php echo $select['PulsFiche'];?></td>
                              <td><?php echo $select['PoidFiche'];?></td>
                              <td><?php echo $select['TaFiche'];?></td>
                              
                            </tr>              
                        </tbody>
                      </table>
                      <div class="row">
                <div class="col-6">
                <div style="color:green; text-align: center">
                  <label><strong>Anamnese</strong></label><br>
                 </div> 
                 <?php echo $select['AnamFiche'];?>
                </div>
                <div class="col-6">
                  <div style="text-align: center; color: green">
                   <strong> Prescription </strong>
                 </div>
                    
                      <?php
                        $prescri=prescription::filtrerprescrip($idfiche); 
                        $cpt=1;     
                        while($sel=$prescri->fetch())
                          {
                            ?>
                             <tbody>
                                <tr>
                                  <th style="width:1%"><?php echo $cpt.'-------------------------------------------------------------------------------------- '; ?></th>
                                  <td><?php echo $sel['Prescrip'].'</br>'?></td>
                                </tr>
                              </tbody>
                            <?php
                            $cpt++;       
                         }
                         ?>
                    
                 
                </div>
              </div>
              <div class="row no-print">
                <div class="col-12">
                 <a class="btn btn-info btn-xs " onclick="imprimer('fiche')"></i>Imprumer
                  </a>
                 <a class="btn btn-info btn-xs " onclick="modifFiche(<?php echo $select['IdFiche'].','.$client['IdCli'];?>)">
                      <i class="fas fa-alt"></i>Modifier
                  </a>
                  <?php
                     $acces=$_SESSION['Agent']['IdFonct'];
                    if($acces==2){
                  ?>
                   <a class="btn btn-info btn-xs " href="AjouterPrescription.php?idF=<?php echo $select['IdFiche'];?>" >
                      <i class="fas fa-pencil-alt"></i>Prescrire
                  </a>
                   <?php
                 }
                   ?>
                  <a class="btn btn-danger btn-xs float-right" target="_white" onclick="recIDFiche('<?=$select['IdFiche']?>','<?=$client?>')" id="SupFiche" ><i class="fas fa-trash"></i>Supprimer</a>
                </div>
              </div>
                      <?php                        
                      $cpt++;
                      }
                    ?>  
            </div>
            <?php
}

function mesfiches($cl){
   $cli=new fiche();
  $tab=$cli->rechercheclient($cl);
  $client=$tab->fetch();
  ?>
 
 
                  <div id="">
                    <?php
                      $fiche=fiche::rechercherfiche($cl);
                      ?>
                  </div>
                  <?php
                  $cpt=1;
                    while($select=$fiche->fetch())
                          {

                            ?>
            <div class="col-12 table-responsive" id="fiche">
                 <div class="row" style="text-align: center;">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-cross"></i> Oui Pour La santé, Clinique
                  </h4>
                </div>
              </div>
             
                <div class="row">
                  <address class="col-4">
                    Avenu Gety Numero 54<br>
                    Telephone: +243970285551<br>
                    Email: ouipourlasate@gmai.com

                  </address>
               
                <!-- <img src="../dist/img/logo.png" class="col-2 offset-1" style="height: 100px"> -->
                
                  <address class="col-4 offset-4">
                    <strong><?php echo strtoupper($client['NomCli'].' '.$client['PostnomCli']);?></strong><br>
                    <?php echo $client['NomQuart'].' '.$client['NomVille'].' '.$client['NomProv'].' '.$client['NomPays'];?><br>
                    <?php echo 'Telephon:'.$client['TelCli'];?> <br>
                  </address>
                
              </div>
                  <table class="table " style="background-color: rgba(77, 77, 78, 0.7); color: white;">
                          <thead>
                            <tr>
                              <th>N</th>
                              <th>IdFiche</th>
                              <th>Date</th>
                              <th>Temperature</th>
                              <th>Respuration</th>
                              <th>Pulsation</th>
                              <th>Poid</th>
                              <th>TA</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><?php echo $cpt;?></td>
                              <td><?php echo $select['IdFiche'];?></td>
                              <td><?php echo $select['DateElabFiche'];?></td>
                              <td><?php echo $select['TempFiche'];?></td>
                              <td><?php echo $select['RespFiche'];?></td>
                              <td><?php echo $select['PulsFiche'];?></td>
                              <td><?php echo $select['PoidFiche'];?></td>
                              <td><?php echo $select['TaFiche'];?></td>
                              
                            </tr>              
                        </tbody>
                  </table>
                      <div class="row" style="background-color: rgba(77, 77, 78, 0.3); color: white; margin-top: -21px;">
                <div class="col-6">
                <div style="color:green; text-align: center">
                  <label><strong>Anamnese</strong></label><br>
                 </div> 
                 <?php echo $select['AnamFiche'];?>
                </div>
                <div class="col-6">
                  <div style="text-align: center; color: green">
                   <strong> Prescription </strong>
                 </div>
                    
                      <?php
                        $prescri=prescription::filtrerprescrip($select['IdFiche']); 
                        $cpt=1;     
                        while($sel=$prescri->fetch())
                          {
                            ?>
                             <tbody>
                                <tr>
                                  <th style="width:1%"><?php echo $cpt.'-------------------------------------------------------------------------------------- '; ?></th>
                                  <td><?php echo $sel['Prescrip'].'</br>'?></td>
                                </tr>
                              </tbody>
                            <?php
                            $cpt++;       
                         }
                         ?>
              </div>
              </div>
  <!-- Mes boutons de suppression/impression/Modification -->
              <div class="row no-print">
                <div class="col-12">
                 <a class="btn btn-info btn-xs "  onclick="imprimer('fiche')">
                      <i class="fas fa-print"></i>Imprumer
                  </a>
                  
                   <a class="btn btn-info btn-xs " onclick="modifFiche(<?php echo $select['IdFiche'].','.$client['IdCli'];?>)">
                      <i class="fas fa-alt"></i>Modifier
                  </a>
                  <?php
                     $acces=$_SESSION['Agent']['IdFonct'];
                    if($acces==2){
                  ?>
                   <a class="btn btn-info btn-xs " href="AjouterPrescription.php?idF=<?php echo $select['IdFiche'];?>" >
                      <i class="fas fa-pencil-alt"></i>Prescrire
                  </a>
                  <?php
                    }
                  ?>
 <a class="btn btn-danger btn-xs float-right" target="_white" onclick="recIDFiche('<?php echo $select['IdFiche'];?>','<?php echo $client['IdCli'];?>')" id="SupFiche" ><i class="fas fa-trash"></i>Supprimer</a>
                </div>
              </div>

                      <?php                        
                      $cpt++;
                      ?>
                       </div>
                       <?php
                      }
                     
           
          }
            ?>