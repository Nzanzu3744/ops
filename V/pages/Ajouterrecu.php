
<?php
session_start();
if(isset($_SESSION['Agent'])){

include('header.php');


// include('tableaurecu.php');
include('tableaufacture_caisse.php');
include('../../M/consommation.class.php');
include('../../M/devise.class.php');
include('../../M/payement.class.php');
?>
<!-- <script type="text/javascript" src="../plugins/scriptfacture.js"></script> -->
<script type="text/javascript" src="../plugins/scriptagent.js"></script>
<script type="text/javascript" src="../plugins/scriptrecu.js"></script>
<section class="row" style="height:100%;">
    <?php
    if(isset($_GET['idpres']) AND !empty($_GET['idpres'])){
      $idprescri=htmlspecialchars($_GET['idpres']);
      $tab=prescription::recprescript($idprescri);
      $pres=$tab->fetch();
    }
    ?>
    <div id="div1" class="col-4" style="height: 750px; background-color: rgba(77, 77, 78, 0.8); color: white; border: 2px solid #dedede">
         <div class="card-header" style="background-color: #4d4d4e">
                <h3 class="card-title" style="color: white">LISTE DES RECUS</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 300px;">
                    <input type="text" name="Rrecu" id="Rrecu" class="form-control float-right" placeholder="Recherche" onkeyup="rechercheR($(this).val())">
                    
                  </div>
                </div>
              </div>
              <div id="div_t" class="card-body table-responsive " style="height: 700px;">
                <!-- Fanction tableau agent -->
                <?php 

                echo listerRecu();
                ?>
              </div>
               <button onclick="imprimer('div_t')" class="fas fa-print btn-success float-left " style="width: 100px; height: 25px"></button>
     </div>



  




     <div id="div_tab2" class=" col-4" style="background-color: rgba(77, 77, 78, 0.8);;color: white">
      <div class="card-header" style=" text-align: center">
                <h3 class="card-title" style="color: white">RECU</h3>
      </div>    
     <div style="height: 150px; border: 2px solid #dedede;" id="recu" class="card-body table-responsive">
     <!-- ici liste recu -->

      </div>
      
      
       <div style="height: 400px;" >
          <div id="ajouterrecu" class="card-body table-responsive " >
         <!-- ici liste recu -->

          </div>
       </div>
     
      
      <div id="" style="height: 150px; border: 2px solid #dedede;  background-color: rgba(77, 77, 78, 0.8); color: white" class="">
        <form class="" role="form" enctype="multipart/form-data" id="formconsom">

            <div class="row" style="padding: 0px; text-align: center;">
               <div class="form-group col-6">
                   <label for="NbrJeto">Montant</label>
                    <input type="text" class="form-control" id="Mont" name="Mont" placeholder="Montant ici">
              </div>
              <div class="form-group col-3">
                <label for="devise" class="">Devise</label>
                   <select class="form-control btn-sx" id="devise">
                    <?php
                    $tab=devise::selectionnerdevise();
                    while($listedev=$tab->fetch()){
                    ?>
                     <option value="<?=$listedev['IdDevise']?>"><?php echo $listedev['NomDevise'];?> </option>
                     <?php
                      }
                     ?>
                   </select>
                   
               </div>
               <div class="col-3" style="margin-top: 7%">
                  <button class="btn-sx btn-success" id="AjouterMt" value="" onclick="comparer($('#Mont').val(),$('#reste').val(),$('#IdConso').val(),$('#devise').val());afficherecu($('#IdConso').val())">
                   Ajouter
                  </button>
            </div>
          </div>
            <div>
              
            <div class=" form-group  row"  style=" text-align: center; padding-left: 10%; border-radius: 40%">
              <!-- ajouterMontat(mt,dev,fact) -->
                      <button 
                     class="btn-default  col-3" id="jetonenreg" name="jetonenreg" onclick="actual_LF_RC()">
                   Actualiser
                      </button>
                      <input type="reset" class="btn-default  col-3 offset-sm-5" id="annuler" name="annuler" value="Annuler">
              <div id="alerter"></div>
              </div>

              </div>
        </form>

      </div>

     </div>


<div id="div1" class="  col-sm-4">
      <!-- Partie premiere -->
              <div class="card-header" style="background-color: #4d4d4e;color: white">
                <h3 class="card-title" style="color: white">FACTURES</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="Recherche" id="RechFact" class="form-control float-right" placeholder="Recherche" onkeyup="rechercheFact($(this).val())">
                  </div>
                </div>
              </div>
              
              <div id="div_tab1" class="card-body table-responsive " style="height: 700px;background-color: rgba(77, 77, 78, 0.6); color: white;">
                
                <?php
                // Je fait appel a ma fonction pour l'affichage d'ensemble des factures
                    echo mesfacture();  
                ?>
                
            </div>
        </div>
</section>

<!--  -->
<?php
include('footer.php');  
}
if(!isset($_SESSION['Agent'])){
  header('location:login.php');
}
?>