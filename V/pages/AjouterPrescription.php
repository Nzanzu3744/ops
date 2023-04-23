<?php
session_start();
if(isset($_SESSION['Agent'])){

include('header.php');


include('../../M/prescription.class.php');
include('Formulaireprescript.php');
?>
<section class="row" style="height:100%;">
<div class='col-6'>
        <div class="card-header " style="background-color: #4d4d4e; text-align:center; color: white">
                <h3 class="card-title">PRESCRIPTION</h3>
        </div>
        <div class="card card-widget widget-user" >
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                  <?php 
                  if(isset($_GET['idF']) AND !empty($_GET['idF'])){
                    $cli=new fiche();
                    $idF=htmlspecialchars($_GET['idF']);
                    $tab=$cli->filtrerfiche2($idF);
                    $client=$tab->fetch();
                  ?>
                  <h3 class="widget-user-username"><?php echo strtoupper($client['NomCli'].' '.$client['PostnomCli']);?></h3>
                  <h5 class="widget-user-desc"><?php echo $client['PrenomCli']?></h5>
                  
              </div>
                <?php
                }
                ?>

              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
              </div>
            </div>
<!-- -----------------------------------------FORMULAIRE------------------------------------------------------------->
          <div class="card-body" style="height: 570px; background-color: rgba(77, 77, 78, 0.6); color: white;" id="prescrptions">
            <?php
              echo frmprescription(); 
            ?>
            <span id="resultat"></span>
        </div>
  </div>	
<div class="col-6">
              <div class="card-header" style="background-color: #4d4d4e">
                <h3 class="card-title" style="color: white">FICHE</h3>
              </div>                
<!-- Tableux -->
              <div   class="table-responsive" style="height: 700px; background-color: rgba(77, 77, 78, 0.3); color: white;">
              <div class="row" style="text-align: center;">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-cross"></i> Oui Pour La santé, Clinique
                  </h4>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col" style="padding-left: 30px">
                  <address>
                    Avenu Gety Numero 54<br>
                    Telephone: +243970285551<br>
                    Email: ouipourlasate@gmai.com
                  </address>
                </div>
                <div class="col-sm-4 invoice-col offset-sm-4" >
                  <address>
                    <strong><?php echo (isset($_GET['idF']))?strtoupper($client['NomCli'].' '.$client['PostnomCli']):'';?></strong><br>
                    <?php echo (isset($_GET['idF']))?$client['NomQuart'].' '.$client['NomVille'].' '.$client['NomProv'].' '.$client['NomPays']:'';?><br>
                    <?php echo (isset($_GET['idF']))?'Telephon:'.$client['TelCli']:'';?> <br>
                  </address>
                </div>
              </div>
 <!--Fiche-->
              <div id="div-tab" class="col-12 table-responsive" style="height: 680px; background-color: rgba(77, 77, 78, 0.6); color: white;">
                    
                  <table class="table ">
                          <thead>
                            <tr>
                              
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
                              <?php
                                if(isset($_GET['idF'])){
                              ?>
                              <td><?php echo $client['IdFiche'];?></td>
                              <td><?php echo $client['DateElabFiche'];?></td>
                              <td><?php echo $client['TempFiche'];?></td>
                              <td><?php echo $client['RespFiche'];?></td>
                              <td><?php echo $client['PulsFiche'];?></td>
                              <td><?php echo $client['PoidFiche'];?></td>
                              <td><?php echo $client['TaFiche'];?></td>
                               <?php                                
                                }
                              ?>
                              
                            </tr>              
                        </tbody>
                      </table>
                   
                
                <div style="color:green; text-align: center">
                  <p  style="background-color:#f6f7f6; font-size: 20px;">Anamnese</strong><br>
                 </div> 
                 <?php echo $client['AnamFiche'];?>
                <div >
                  <div style="text-align: center; color: green">
                   <strong style="background-color:#f6f7f6"> Prescription </strong>
                 </div>
                    
                      <?php
                      $Prescrip=prescription::filtrerprescrip($_GET['idF']);
                      $cpt=1;
                      if(!empty($Prescrip)){
                    while($select=$Prescrip->fetch())
                          {
                        ?>
                             <tbody >
                                <tr>
                                  <th style="width:1%"> <?php echo $cpt.'-----------------------------------------</br>'; ?> </th>
                                  <td><p style="font-size: 20px"> <?php echo $select['Prescrip'].'</br>'?></p> </td>
                                
                                <td>
                                  
                                  <div class="row no-print">
                                      <div class="col-12">
                                         <a class="btn btn-info btn-xs" onclick="modifierpre('<?=$select['IdPrescrip']?>','<?=$client['IdFiche']?>')"><i class="fas fa-edit"></i>Modifier</a>
  <a class="btn btn-danger btn-xs float-right" target="_white" onclick="recIDPrescript('<?=$select['IdPrescrip']?>','<?=$client['IdFiche']?>')" id="SupFiche" ><i class="fas fa-trash"></i>Supprimer</a>
                                      </div>
                                  </div>
                                </td>
                                 </tr>
                              </tbody>
                            <?php
                            $cpt++;       
                         }
                       }
                         ?>
            
<!-- Fin fiche -->   
        </div>
<!-- Fin de mon tableau -->
</section>
<!--  -->
 <script type="text/javascript" src="../plugins/scriptprescipt.js"></script>

<?php
include('footer.php');  
}
if(!isset($_SESSION['Agent'])){
  header('location:login.php');
}
?>