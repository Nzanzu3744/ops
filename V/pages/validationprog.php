<script type="text/javascript" src="../plugins/scriptfacture.js"></script>
<script type="text/javascript" src="../plugins/scriptprog.js"></script>
<?php
session_start();
if(isset($_SESSION['Agent'])){
include('header.php');

include('../../M/taux.class.php');
include('tableautaux.php');


include('../../M/programme.class.php');
include('tableauprog.php');


?>

<section class="row" style="height:730px;">
  <div class="col-12 row" id="section">
    <?php
    if(isset($_GET['idpres']) AND !empty($_GET['idpres'])){
      $idprescri=htmlspecialchars($_GET['idpres']);
      $tab=prescription::recprescript($idprescri);
      $pres=$tab->fetch();
    }
    ?>

     <div id="div1" class="col-sm-12 row" style="height: 710px; margin-left:20px">
        <div class="" style="background:white; color: black; width: 1470px">
          <div class="card-header" style="background-color: #4d4d4e">
                <h3 class="card-title" style="color: white">LISTE DE PROGRAMME NOS VALIDES</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="" id="" class="form-control float-right" placeholder="Recherche" onkeyup="Rec_Prog_Non_Valide($(this).val())">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default" for="RechClient"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>

              </div>
            <div id="tab_programmeNV" class="card-body table-responsive p-0 col-12" style=" height: 650px;">
                
                <?php
                // Je fait appel a ma fonction pour l'affichage d'ensemble des factures
                echo listeProgNV();
                    
                ?>
                
            </div>
      </div>
      </div>

                
                    

<!--  -->
</div>
</section>
<?php
include('footer.php');  
}
if(!isset($_SESSION['Agent'])){
  header('location:login.php');
}
?>
<!--  -->

 