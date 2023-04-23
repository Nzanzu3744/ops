<?php
include('../M/prescription.class.php');

if (!empty($_GET['var']) AND isset($_GET['var'])){
  $idpres=htmlspecialchars($_GET['var']);
  $prescript=prescription::rechprescriptnonfacture($idpres);                     
  $cpt=1;
  if($prescript!=''){
    while ($sel=$prescript->fetch()) 
        {
                   $cpt++;
                   ?>
                   <div style="border: 1px white dashed; padding-bottom: 30px; padding: 3px;" >
                   <div class="row col-12" style="background-color: rgba(77, 77, 78, 0.8); color: white;">
                      <p class="col-2">N:<?php echo $cpt;?></p>
                      <p class="col-2 float-right">ID : <?php echo $sel['IdCli'];?></p>
                      <p class="col-12">Nom: <?php echo $sel['NomCli'].' '.$sel['PostnomCli'].' '.$sel['PrenomCli'];?></p>
                      <a class="row">
                      <p class="col-6">Tel: <?php echo $sel['TelCli'];?></p>
                      <p class="col-6">Genre : <?php echo $sel['GenreCli'];?></p>
                      <p>Adresse :<?php echo $sel['NumParcelCli'].'/'.$sel['NomQuart'].'/'.$sel['NomVille'].'/'.$sel['NomProv'].'/'.$sel['NomPays'].'.';?></p> 
                      </a>                   
                   </div>
                    <table class="table">
                          <thead style="">
                            <tr style="text-align: center; font-family: timenewroman;">
                              <th>PRESCRIPTION</th>
                            </tr>
                          </thead>
                          <tbody style="">
                            <tr>
                              <td style="font-family: timenewroman; font-size: 15px;"><?php echo $sel['Prescrip'];?></td>
                            </tr>              
                        </tbody>
                      </table>
                        <a class="btn btn-default btn-xs float-right" target="_white" href="AjouterFacture.php?idpres=<?=$sel['IdPrescrip']?>" id="facturation" ><i class="fas fa-pencil-alt"></i>Facturer</a>
                    </div>
                    <div style="margin-bottom: 6px;"></div>
                <?php
                  }
                   }  
                  }  
                ?>
