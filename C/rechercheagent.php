<?php
include('../M/agent.class.php');
include('../V/pages/tableauagent.php');
if(isset($_GET['RechAgent']) && !empty($_GET['RechAgent']))
{
  session_start();
  $Acces=$_SESSION['Agent']['IdFonct'];
  ?>                
     <table class="table table-head-fixed text-nowrap" style="background: white; color:black">
  <?php
      include('../v/pages/TeteDoc.php');
  ?>
                  <thead style="color: black">
                      <th>N</th>
                      <?php  
                          if($Acces==1){
                           ?>
                      <th>Acces</th>
                      <?php
                    }
                      ?>
                      <th>ID</th>
                      <th>Nom</th>
                      <th>Tel</th>
                      <th>NN</th>
                      <th>Date</th>
                      <th>Genre</th>
                      <th>Adresse</th>
                      <th>Qual</th>
                      <th>Fonction</th>
                      <th>Actif</th>
                      
                    </tr>
                  </thead>
                  <tbody style="">
                    <?php
                    $tab = agent::rechercheagent($_GET['RechAgent']);
                    $cpt=1;
                    while ($sel=$tab->fetch()) 
                    {

                      ?>
                    <tr>
                        <td> <?php echo $cpt;?></td>
                        
                         <?php  
                          if($Acces==1){
                           ?>
                        <td> 
                          <?php
                          if($sel['AccesAgent']==1){
                          ?>
                          
                            <input type="checkbox" name="acces"  data-bootstrap-switch checked >
                          <?php
                          }else{
                          ?>
                            <input type="checkbox" name="acces"  data-bootstrap-switch>
                          <?php
                          }
                          ?>
                        </td>
                        <?php 
                          }
                            
                          
                          ?>

                        <td id="IdAgent"> <?php echo $sel['IdAgent'];?></td>
                        <td id=""><?php echo $sel['NomAgent'].' '.$sel['PostnomAgent'].' '.$sel['PrenomAgent'];?></td>
                        <td><?php echo $sel['TelAgent'];?></td>
                        <td><?php echo $sel['NNAgent'];?></td>
                        <td><?php echo $sel['DateNaisAgent'];?></td>
                        <td><?php echo $sel['GenreAgent'];?></td>
                        <td><?php echo $sel['NumeParcelAgent'].'/'.$sel['NomQuart'].'/'.$sel['NomVille'].'/'.$sel['NomProv'].'/'.$sel['NomPays'].'.';?></td>
                        <td><?php echo $sel['Qualif'];?></td>
                        <td><?php echo $sel['NomFonct'];?></td>
                        <td><?php echo $sel['ActifAgent'];?></td>
                    
                        <td class="project-actions text-right no-print" style="color:black">
                          <?php
                            if($Acces==4){
                          ?>
                          <a class="btn btn-default btn-xs" id=""  onclick="creerjeton('<?=$sel['IdAgent']?>')">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Jeton
                          </a>
                          <?php
                        }
                          ?>
                          <a class="btn btn-default btn-xs" onclick="modifiAgent('<?=$sel['IdAgent']?>')">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Modifier
                          </a>
                          <a class="btn btn-danger btn-xs" onclick="recIDagent('<?=$sel['IdAgent']?>')" id="SupAgent" >
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
                    ?>
                
                  </tbody>
    </table>
<?php
}
if(empty($_GET['RechAgent'])){
  session_start();
    echo montab();      
}
