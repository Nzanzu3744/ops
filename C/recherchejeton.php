<?php
include('../M/agent.class.php');
include('../M/jeton.class.php');
include('../V/pages/tableaujeton.php');
if(isset($_GET['RechJeton']) && !empty($_GET['RechJeton']))
{
  $VarRch=htmlspecialchars($_GET['RechJeton']);
  ?>                
    <table class="table table-head-fixed text-nowrap">
                  <thead style="color: black">
                    <tr>
                      <th>N</th>
                      <th>Jeton</th>
                      <th>ID</th>
                      <th>Nom</th>
                      <th>Genre</th>
                      <th>Tel</th>
                      <th>Fonction</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $tab=jeton::recherchejeton($VarRch);
                    $cpt=1;
                    while ($sel=$tab->fetch()) 
                    {

                      ?>
                    <tr>
                        <td> <?php echo $cpt;?></td>
                        
                        <td id="NumJeto" style="color:red; font-family: timenewroman;"> <?php echo $sel['NumJeto'];?></td>
                        <td id="IdAgent"> <?php echo $sel['IdAgent'];?></td>
                        <td id="" style=" font-family: timenewroman;"><?php echo $sel['NomAgent'].' '.$sel['PostnomAgent'].' '.$sel['PrenomAgent'];?></td>
                        <td ><?php echo $sel['GenreAgent'];?></td>
                        <td style="font-family: timenewroman;"><?php echo $sel['TelAgent'];?></td>
                        <td><?php echo $sel['NomFonct'];?></td>
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
if(empty($_GET['RechJeton'])){
    echo tabjeton();     
}
