<?php
function listeVisite(){
  ?>
<table class="table table-head-fixed text-nowrap" style="background: white; color:black">
  <?php
      include('TeteDoc.php');
  ?>
                  <thead style="color: black">
                      <th>N</th>
            
                      <th>IDENTITE</th>
                      <th>ID</th>
                      <th>CAS</th>
                      <th>GENRE</th>
                      <th>DATE</th>
                      <th>FICHE</th>
                      <th>REMARQUE</th>
                      
                    </tr>
                  </thead>
                  <tbody style="">
                    <?php
                    $tab=visite::selectionnervisite();
                    $cpt=1;
                    while ($sel=$tab->fetch()) 
                    {

                      ?>
                    <tr>
                        <td> <?php echo $cpt;?></td>
                   
                        <td><?php echo $sel['NomCli'].'  '.$sel['PostnomCli'].'  '.$sel['PrenomCli'];?></td>
                         <td id="IdEnregMal"> <?php echo $sel['IdEnregMal'];?></td>
                        <td id=""><?php echo $sel['CasEnregMal'];?></td>
                        <td><?php echo $sel['GenreCli'];?></td>
                        <td><?php echo $sel['DateEnregMal'];?></td>
                        <td id=""><?php echo $sel['IdFiche'];?></td>
                        <td><?php echo $sel['RemEnregMal'];?></td>                       
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
function FiltreVisite($idVAr){
  ?>
<table class="table table-head-fixed text-nowrap" style="background: white; color:black">
  <?php
      include('TeteDoc.php');
  ?>
                  <thead style="color: black">
                      <th>N</th>
            
                      <th>IDENTITE</th>
                      <th>ID</th>
                      <th>CAS</th>
                      <th>GENRE</th>
                      <th>DATE</th>
                      <th>FICHE</th>
                      <th>REMARQUE</th>
                      
                    </tr>
                  </thead>
                  <tbody style="">
                    <?php
                    $tab=visite::Filtrervisite($idVAr);
                    $cpt=1;
                    while ($sel=$tab->fetch()) 
                    {

                      ?>
                    <tr>
                        <td> <?php echo $cpt;?></td>
                        
                        <td><?php echo $sel['NomCli'].'  '.$sel['PostnomCli'].'  '.$sel['PrenomCli'];?></td>
                         <td id="IdEnregMal"> <?php echo $sel['IdEnregMal'];?></td>
                        <td id=""><?php echo $sel['CasEnregMal'];?></td>
                        <td><?php echo $sel['GenreCli'];?></td>
                        <td><?php echo $sel['DateEnregMal'];?></td>
                        <td id=""><?php echo $sel['IdFiche'];?></td>
                        <td><?php echo $sel['RemEnregMal'];?></td>                       
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