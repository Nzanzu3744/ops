<script type="text/javascript" src="../plugins/scriptagent.js"></script>
<?php
session_start();

if(isset($_SESSION['Agent'])){

include('header.php');
include('tableauagent.php');
include('Formulaireagent.php');
include('../../M/agent.class.php');

?>

<section class="row" style="height:860px;">
	<div class='col-3' style="background-color: rgba(77, 77, 78, 0.3); color: white">
        <div class="card-header " style="background-color: #4d4d4e">
                <h3 class="card-title" style="color: white">OPERATION SUR AGENT</h3>
        </div>            
          <div id="frmagent1">            
           <?php
              include('../../M/adresse.class.php');
            echo fagent();
           ?>
            <span id="resultat"></span>
            </div>
           
	</div>
	
	<div class="col-9">
        
              <div class="card-header" style="background-color: #4d4d4e">
                <h3 class="card-title" style="color: white">LISTE DES AGENTS</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="Recherche" id="RechAgent" class="form-control float-right" placeholder="Recherche" onkeyup="rechercheagent($(this).val())">
                  </div>
                </div>
              </div>
              
              <div id="div_tab" class="card-body table-responsive p-0" style="height: 695px;">
                <!-- Fanction tableau agent -->
                <?php 
                echo montab();
                ?>
              </div>
              <!-- /.card-body -->
         <button onclick="imprimer('div_tab')" class="fas fa-print btn-success float-right " style="width: 100px; height: 25px"></button>
	</div>
</section>

<!--  -->
<?php
include('footer.php');  
}
if(!isset($_SESSION['Agent'])){
  header('location:login.php');
}