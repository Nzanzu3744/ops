<!-- <?php
include('../M/programme.class.php');
include('../V/pages/tableauprog.php');
if(isset($_GET['RechClient']) && !empty($_GET['RechClient']))
{
  session_start();
  $varrech=htmlspecialchars($_GET['RechClient']);
  ?>                
   <table class="table table-head-fixed text-nowrap">
                  <thead style="color: black;">
                    <tr>
                      <th>N</th>
                      <th>Acces</th>
                      <th>ID</th>
                      <th>Photo</th>
                      <th>Nom</th>
                      <th>Tel</th>
                      <th>Date</th>
                      <th>Nationalité</th>
                      <th>Genre</th>
                      <th>Adresse</th>
                      <th>Actif</th>
                      
                    </tr>
                  </thead>
                  <tbody style="background-color: rgba(77, 77, 78, 0.3); color: white">
                    <?php
                    if($tab=client::rechercheclient($varrech)){
                    $cpt=1;
                    while ($sel=$tab->fetch()) 
                    {

                      ?>
                    <tr>
                        <td> <?php echo $cpt;?></td>
                        
                        <td> 
                          <?php
                          if($sel['AccesCli']==1){
                          ?>
                            <input type="checkbox" name="acces"  data-bootstrap-switch checked >'
                          <?php
                          }else{
                          ?>
                            <input type="checkbox" name="acces"  data-bootstrap-switch>
                          <?php
                          }
                          ?>
                        <td id="IdCli"> <?php echo $sel['IdCli'];?></td>
                        <td></td>
                        <td id=""><?php echo $sel['NomCli'].' '.$sel['PostnomCli'].' '.$sel['PrenomCli'];?></td>
                        <td><?php echo $sel['TelCli'];?></td>
                        <td><?php echo $sel['DateNaisCli'];?></td>
                        <td><?php echo $sel['NomNation'];?></td>
                        <td><?php echo $sel['GenreCli'];?></td>
                        <td><?php echo $sel['NumParcelCli'].'/'.$sel['NomQuart'].'/'.$sel['NomVille'].'/'.$sel['NomProv'].'/'.$sel['NomPays'].'.';?></td>                       
                        <td><?php echo $sel['ActifCli'];?></td>
                    
                        <td class="project-actions text-right">
                          <a class="btn btn-danger btn-xs" onclick="Sensibilise('<?=$sel['IdCli']?>')" id="SensClient" >
                              <i class="fas fa-pencil-alt">
                              </i>
                              Sensibilisé
                          </a>
              
                          <a class="btn btn-default btn-xs" href="AjouterFiche.php?id=<?php echo $sel['IdCli'];?>" >
                              <i class="fas fa-pencil-alt">
                              </i>Fiche
                          </a>
                          <a class="btn btn-info btn-xs" >
                              <i class="fas fa-edit">
                              </i>
                              Modifier
                          </a>
                          <a class="btn btn-danger btn-xs" onclick="recIDClient('<?=$sel['IdCli']?>')" id="SupClient" >
                              <i class="fas fa-trash">
                              </i>
                              Supprimer
                          </a>
                      </td>
                  </tr>
                        </td>
                    </tr>
                   <?php
                   $cpt++;
                  }    
                }
                    ?>
                
                  </tbody>
   </table>
<?php
}
if(empty($_GET['RechClient'])){
  session_start();
    listeClient();
              
}