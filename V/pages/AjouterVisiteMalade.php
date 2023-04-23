<?php
session_start();

$Acces=$_SESSION['Agent']['IdFonct'];

if(isset($_SESSION['Agent'])){

include('header.php');
include('../../M/client.class.php');
include('tableauvisite.php');
include('Formulairevisite.php');
include('../../M/visite.class.php');

?>

<section class="row" style="height:100%;">
   <?php
  if($Acces==2 || $Acces==5){
  ?>
	<div class='col-6' style="background-color: rgba(77, 77, 78, 0.4); color: white">
        <div class="card-header " style="background-color: #4d4d4e">
                <h3 class="card-title">REGISTRE PATIENT</h3>
        </div>
        <div id="frmclient1">            
           <?php
              include('../../M/adresse.class.php');
              echo fvisite(); 
           ?>
         </div>
            <span id="resultat"></span>
	</div>
  <?php
}
  ?>
	
	<div class="col-6">
              <div class="card-header" style="background-color: #4d4d4e">
                <h3 class="card-title" style="color: white">LISTE DE VISITE PATIENT</h3>

                <div class="card-tools row">
                  <button class="btn btn-success no-print btn-xs" onclick="imprimer('div_tab_vi')">Imprimer</button>
                  <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="Recherche" id="RechVisite" class="form-control float-right" placeholder="Recherche" onkeyup="RechVisite($(this).val());">
                  </div>
                </div>
              </div>
              
              <div id="div_tab_vi" class="card-body table-responsive p-0" style="height: 700px;">
                <?php
                
                  echo listeVisite();
                  
                ?>

              </div>

              <!-- /.card-body -->
        </div>
</section>

<!--  -->
<script type="text/javascript" src="../plugins/scriptvisite.js"></script>
<?php
include('footer.php');  
}
if(!isset($_SESSION['Agent'])){
  header('location:login.php');
}