<?php
session_start();
$Acces=$_SESSION['Agent']['IdFonct'];

if(isset($_SESSION['Agent'])){

include('header.php');
include('../../M/client.class.php');
include('tableauclient.php');
include('Formulaireclient.php');

?>

<section class="row" style="height:100%;">
  <?php
  if($Acces==2 || $Acces==5){
  ?>
	<div class='col-3' style="background-color: rgba(77, 77, 78, 0.3); color: white">
        <div class="card-header " style="background-color: #4d4d4e">
                <h3 class="card-title">OPERATION SUR CLIENT</h3>
        </div>
        <div id="frmclient1">            
           <?php
               
              include('../../M/adresse.class.php');
              echo fclient(); 
            
           ?>
         </div>
           <!--  <span id="resultat"></span> -->
	</div>
	<?php
}
  ?>
	<div class="col-9">
              <div class="card-header" style="background-color: #4d4d4e">
                <h3 class="card-title" style="color: white">LISTE DE CLIENTS</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="Recherche" id="RechClient" class="form-control float-right" placeholder="Recherche">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default" for="RechClient"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>

              </div>

              
              <div id="div_tab" class="card-body table-responsive p-0" style="height: 700px;">
                <?php
                
                  echo listeClient();
                ?>
              </div>
              <button onclick="imprimer('div_tab')" class="fas fa-print btn-success float-right " style="width: 100px; height: 25px"></button>
              <!-- /.card-body -->
        </div>


</section>

<!--  -->
<script type="text/javascript" src="../plugins/scriptclient.js"></script>
<?php
include('footer.php');  
}
if(!isset($_SESSION['Agent'])){
  header('location:login.php');
}
?>