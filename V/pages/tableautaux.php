<?php
function listeTaux(){
  ?>
<table class="table table-head-fixed text-nowrap">
                 <!--  <thead style="color: black">
                    <tr>
                      <th>N</th>
                      <th>Taux</th>                  
                                        
                    </tr>
                  </thead> -->
                  <tbody style="background-color: rgba(77, 77, 78, 0.3); color: white">
                    <?php
                    $tab=taux::selectionner_d_taux();
                    $cpt=1;
                    while ($sel=$tab->fetch()) 
                    {
                      ?>
                    <tr>
                        <td> <?php echo $cpt;?></td>                    
                        <td><?php echo'1 USD = '. $sel['Taux'].'CDF';?></td>
                      
                       
                    
                        <td style="color: black">
                              
                           <a class="btn btn-danger btn-xs" onclick="supprimerTaux('<?=$sel['IdTaux']?>')">
                              <i class="fas fa-trash">
                              </i>Sup
                          </a>
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
  


function listeFonct(){
  ?>
<table class="table table-head-fixed text-nowrap">
                 <!--  <thead style="color: black">
                    <tr>
                      <th>N</th>
                      <th>Taux</th>                  
                                        
                    </tr>
                  </thead> -->
                  <tbody style="background-color: rgba(77, 77, 78, 0.3); color: white">
                    <?php
                    $tab=fonction::selectionnerfonct();
                    $cpt=1;
                    while ($sel=$tab->fetch()) 
                    {
                      ?>
                    <tr>
                        <td> <?php echo $cpt;?></td>                    
                        <td><?php echo $sel['NomFonct'];?></td>
                      
                       
                    
                        <td style="color: black">
                              
                          <a class="btn btn-danger btn-xs" onclick="supprimerfonc('<?=$sel['IdFonct']?>')">
                              <i class="fas fa-trash">
                              </i>Sup
                          </a>
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