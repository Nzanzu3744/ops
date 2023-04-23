<?php
session_start();
if(isset($_SESSION['Agent'])){

include('header.php');

include('../../M/consommation.class.php');
include('../../M/designation.class.php');
include('tableaufacture.php');
include('tableauprescri.php');
?>

<section class="row" style="height:100%;">
  <div class="col-12 row" id="section">
    <?php
    if(isset($_GET['idpres']) AND !empty($_GET['idpres'])){
      $idprescri=htmlspecialchars($_GET['idpres']);
      $tab=prescription::recprescript($idprescri);
      $pres=$tab->fetch();
    }
    ?>
     <div id="div1" class="col-sm-4">
      <!-- Partie premiere -->
              <div class="card-header" style="background-color: #4d4d4e;color: white">
                <h3 class="card-title" style="color: white">FACTURES</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="Recherche" id="RechFact" class="form-control float-right" placeholder="Recherche" onkeyup="rechercheFact($(this).val())">
                  </div>
                </div>
              </div>
              
              <div id="div_tab1" class="card-body table-responsive p-0" style="height: 700px;background-color: rgba(77, 77, 78, 0.6); color: white;">
                
                <?php
                // Je fait appel a ma fonction pour l'affichage d'ensemble des factures
                    echo mesfacture();  
                ?>
                
            </div>
            <a tyle="color:white;" class="btn btn-default btn-xs col-3 offset-sm-1 float-right no-print" onclick="imprimer('div_tab1')" id="" ><i class="fas  fa-print"></i>imprimer
                </a>

        </div>              
  
     

    <div id="div2" style="height: 100%;" class="col-sm-4">
      <div id="facture" style="height: 600px; border: 2px solid #d2d2d2; " class="table table-responsive">
        <!-- Ci haut Identification -->

        <!-- Affichage facture proprement dite -->
          <div id="factedit" style="background-color: rgba(77, 77, 78, 0.8); color: white;">
            
          </div>
        <!-- ci haut Affichage facture proprement dite -->
      </div>
      <div id="" style="height: 20%; border: 2px solid #4d4d4e; background-color: white " class="">
        <form role="form" enctype="multipart/form-data" id="formconsom">
           <div class="row">
                 <div class="form-group col-sm-4" style="text-align: center">
                    <label>Designation</label>
                     <select class="form-control" name="cons" id="cons">
                      <option value="0">Aucun</option>
                        <?php
                          $desi=designation::selectionnerdesign();
                          while ($sel=$desi->fetch()) 
                          {
                        ?>
                        <option value="<?php echo $sel['IdDesigServi'];?>"><?Php echo $sel['DesigServi'];?></option>
                        <?php
                          }
                        ?>
                      </select>
                    </div>
                  <div class="form-group col-sm-4" style="padding-bottom: 0px; margin-bottom: 0px; text-align: center">
                      <label for="Quant">Quantité</label>
                      <input type="text" class="form-control" id="Quant" name="Quant" placeholder="Quantité">
                  </div>
                  <div class="form-group col-sm-4" style="padding-bottom: 0px; margin-bottom: 0px; text-align: center">
                      <label for="Pu">Prix Uni:</label>
                      <input type="text" class="form-control" id="Pu" name="Pu" placeholder="Prix Uni">
                  </div>
              </div>
              <div>
              
              <div class=" form-group  row"  style=" text-align: center; padding-left: 10%; border-radius: 40%">
                <input type="submit" onclick="ajouterConsom($('#Quant').val(),$('#Pu').val(),$('#idpres').val(),$('#cons').val())" 
                     class="btn-success  col-3" id="" name="" value="Enregistrer">
                      <input type="reset" class="btn-default  col-3 offset-sm-5" id="annuler" name="annuler" value="Annuler">
                      <div id="resultat"></div>       
              </div>
              </div>
        </form>
      </div>
    </div>
    <div id="div3" class="col-4">
              <div class="card-header" style="background-color: #4d4d4e">
                <h3 class="card-title" style="color: white">PRESCRIPTION</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="Recherche" id="RechPres" class="form-control float-right" placeholder="Recherche" onkeyup="Rechprescri($(this).val())">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default" for="RechClient"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              
              <div id="div_tab" class="card-body table-responsive" style="max-height: 700px; background-color: rgba(77, 77, 78, 0.5); color: white;">
                
                   <?php
                    echo tableauprescri();
                   ?>
                  
            </div>
        </div>
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
<script type="text/javascript" src="../plugins/scriptfacture.js"></script>

 