<?php
function tabSens(){
  ?>
  <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr style="color: black; text-align: center">
                      <th>N</th>
                      <th>Jeton</th>
                      <th class="col-3">Identinté Client</th>
                      <th  class="col-3">Identinté Agent</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody style="background-color: rgba(77, 77, 78, 0.3); color: white">
                    <?php
                    $tab=registrejeton::selectionnerenregjeton();
                    $cpt=1;
                    while ($sel=$tab->fetch()) 
                    {

                      ?>
                    <tr>
                        <td> <?php echo $cpt;?></td>
                        
                        <td id="IdJetonEnreg" style="color: red; font-family: timenewroman; font-style: 20px"> <?php echo $sel['IdJetonEnreg'];?></td>
                        <td id="" style=" font-family: timenewroman;"><?php echo $sel['NomCli'].' '.$sel['PostnomCli'].' '.$sel['PrenomCli'].' '.$sel['GenreCli'];?></td>
                        
                        <td id="" style=" font-family: timenewroman;"><?php echo $sel['NomAgent'].' '.$sel['PostnomAgent'].' '.$sel['PrenomAgent'].' '.$sel['GenreAgent'];?></td>
    
                        <td><?php echo $sel['DateEnreg'];?></td>
                        <td style="color: black">
                           
                          <a class="btn btn-default btn-xs" >
                              <i class="fas fa-pencil-alt">
                              </i>
                              Modifier
                          </a>
                          <a class="btn btn-danger btn-xs" onclick="suppri('<?=$sel['IdJetonEnreg']?>')">
                              <i class="fas fa-trash">
                              </i>
                              Supprimer
                          </a>
                        </td>
                  </tr>
                        
                    </tr>
                   <?php
                   $cpt++;
                  }    
                    ?>
                
                  </tbody>
  </table>
<?php
}
function tabrechregjeto($var){
  ?>
   <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr style="color: black; text-align: center">
                      <th>N</th>
                      <th>Jeton</th>
                      <th class="col-3">Identinté Client</th>
                      <th  class="col-3">Identinté Agent</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody style="background-color: rgba(77, 77, 78, 0.3); color: white">
                    <?php
                    $tab=registrejeton::rechercheenregjeton($var);
                    $cpt=1;
                    while ($sel=$tab->fetch()) 
                    {

                      ?>
                    <tr>
                        <td> <?php echo $cpt;?></td>
                        
                        <td id="NumJeto" style="color: red; font-family: timenewroman; font-style: 20px"> <?php echo $sel['IdJetonEnreg'];?></td>
                        <td id="" style=" font-family: timenewroman;"><?php echo $sel['NomCli'].' '.$sel['PostnomCli'].' '.$sel['PrenomCli'].' '.$sel['GenreCli'];?></td>
                        
                        <td id="" style=" font-family: timenewroman;"><?php echo $sel['NomAgent'].' '.$sel['PostnomAgent'].' '.$sel['PrenomAgent'].' '.$sel['GenreAgent'];?></td>
    
                        <td><?php echo $sel['DateEnreg'];?></td>
                        <td>
                          <a class="btn btn-default btn-xs" >
                              <i class="fas fa-pencil-alt">
                              </i>
                              Modifier
                          </a>
                          <a class="btn btn-danger btn-xs" onclick="suppri('<?=$sel['IdJetonEnreg']?>')">
                              <i class="fas fa-trash">
                              </i>
                              Supprimer
                          </a>
                        </td>
                  </tr>
                        
                    </tr>
                   <?php
                   $cpt++;
                  }    
                    ?>
                
                  </tbody>
  </table>
<?php
}
