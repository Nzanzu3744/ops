<?php
session_start();
if(isset($_SESSION['Agent'])){

include('header.php');

include('../../M/prescription.class.php');
include('tableaufiche.php');
include('Formulairefiche.php');
?>

<section class="row" style="height:100%;">
<div class='col-6'>
        <div class="card-header " style="background-color: #4d4d4e; text-align:center; color: white">
                <h3 class="card-title">ENREGISTREMENT DES SIGNES VITAUX</h3>
        </div>
        <div class="card card-widget widget-user" style="background-color: rgba(77, 77, 78, 0.3); color: white; height: 210px">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                  <?php 
                  if(isset($_GET['id']) AND !empty($_GET['id'])){
                    $cli=new fiche();
                    $idclient=htmlspecialchars($_GET['id']);
                    $tab=$cli->rechercheclient($idclient);
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
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="widget-user-desc" id="idclient"><?php echo $client['IdCli']?></h5> 
                      <span class="description-text">Matricul</span>
                    </div>
                  </div>
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">DERNIERRE FICHE</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<!-- -----------------------------------------FORMULAIRE------------------------------------------------------------->
          <div class="card-body" style="background-color: rgba(77, 77, 78, 0.3); color: white;" id="frmfiche102">
            <?php
              echo fomrfiche($client['IdCli']);
            ?>
            <span id="resultat"></span>
            </div>
  </div>  
  <div class="col-6" style="">
          <div id="Entetefiche">
              <div class="card-header" style="background-color: #4d4d4e">
                <h3 class="card-title" style="color: white">FICHES DU PATIANT</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="RechF" id="RechF" class="form-control float-right" placeholder="Recherche" onkeyup="recherchefiche('<?=$client['IdCli']?>',$(this).val())">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default" for="RechF"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>                
<!-- Tableux -->
              <div   class="table-responsive" style="height: 680px; background-color: rgba(77, 77, 78, 0.3); color: white;">
              
 <!--Fiche-->
              <div id="div-tab" class="col-12 table-responsive">
                <?php
                echo mesfiches($client['IdCli']);
                ?>
          </div>
<!-- Fin fiche -->   
      
<!-- Fin de mon tableau -->
</section>
<!--  -->

<?php
include('footer.php');  
}
if(!isset($_SESSION['Agent'])){
  header('location:login.php');
}
?>