<?php

function listeClient(){
 
  $Acces=$_SESSION['Agent']['IdFonct'];
  ?>

<table class="table table-head-fixed text-nowrap" style="background: white; color:black">
  <?php
      include('TeteDoc.php');
  ?>
                  <thead style="color: black">
                    <tr>
                      <th>N</th>
                      <th>ID</th>
                      <th>Photo</th>
                      <th>Nom</th>
                      <th>Tel</th>
                      <th>Date</th>
                      <th>Nationalité</th>
                      <th>Genre</th>
                      <th>Adresse</th>
                    
                      
                    </tr>
                  </thead>
                  <tbody style="">
                    <?php
                    $tab=client::selectionnerclient();
                    $cpt=1;
                    while ($sel=$tab->fetch()) 
                    {

                      ?>
                    <tr>
                        <td> <?php echo $cpt;?></td>
                        
                        <td id="IdCli"> <?php echo $sel['IdCli'];?></td>
                        <td></td>
                        <td id=""><?php echo $sel['NomCli'].' '.$sel['PostnomCli'].' '.$sel['PrenomCli'];?></td>
                        <td><?php echo $sel['TelCli'];?></td>
                        <td><?php echo $sel['DateNaisCli'];?></td>
                        <td><?php echo $sel['NomNation'];?></td>
                        <td><?php echo $sel['GenreCli'];?></td>
                        <td><?php echo $sel['NumParcelCli'].'/'.$sel['NomQuart'].'/'.$sel['NomVille'].'/'.$sel['NomProv'].'/'.$sel['NomPays'].'.';?></td>                       
                       
                        
                        <td style="color: black" class="no-print">
                          <?php
                          if($Acces==2 ||$Acces==5 ){                          
                          ?>    
                          <a class="btn btn-default btn-xs" href="AjouterFiche.php?id=<?php echo $sel['IdCli'];?>" >
                              <i class="fas fa-pencil-alt">
                              </i>Fiche
                          </a>
                    <?php
                  }

                          if($Acces==2 || $Acces==5){                          
                          ?>
                  
                          <a class="btn btn-info btn-xs" onclick="modifierClient('<?=$sel['IdCli']?>')" >
                              <i class="fas fa-edit">
                              </i>
                              Modifier
                          </a>
                          <?php
                        }
                          if($Acces==1){                          
                          ?>
                          <a class="btn btn-danger btn-xs" onclick="recIDClient('<?=$sel['IdCli']?>')" id="SupClient" >
                              <i class="fas fa-trash">
                              </i>
                              Supprimer
                          </a>
                          <?php
                        }
                          ?>
                      </td>
                  </tr>
                        </td>
                    </tr>
                   <?php
                   $cpt++;
                  }    
                    ?>
                
                  </tbody>
                </table>

  <?php
}
  ?>