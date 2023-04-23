<script type="text/javascript" src="../plugins/scriptjeton.js"></script>
<script type="text/javascript" src="../plugins/scriptprog.js"></script>
<script type="text/javascript" src="../plugins/scriptagent.js"></script>

<?php
session_start();
if(isset($_SESSION['Agent'])){

include('header.php');
include('tableauagent.php');
include('tableaujeton.php');
include('tableauprog.php');
include('../../M/agent.class.php');
include('../../M/programme.class.php');


?>


<section class="row" style="height:80%;">
     <div id="div1" class="col-3" style="height:750px; background-color: rgba(77, 77, 78, 0.6); color: white">
        
              <div class="card-header" style="background-color: #4d4d4e">
                <h3 class="card-title" style="color: white">AGENTS</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 110px;">
                    <input type="text" name="Recherche" id="RechAgent" class="form-control float-right" placeholder="Recherche" onkeyup="rechercheagent($(this).val())">
                  </div>
                </div>

              </div>
              
              <div id="div_tab" class="card-body table-responsive p-0" style="height: 700px">
                <!-- Fanction tableau agent -->
                <?php 
                echo montab();
                ?>
              </div>
              <!-- /.card-body -->
        
     </div>
<!--  -->
      <div class="p-0 col-6" style="height: 100%; border: 1px solid #dedede; background-color: rgba(77, 77, 78, 0.6)">
        <div class=" row p-0">
          <div id="div_tab2" class="col-6 p-0" style="height: 6%;">
          <!-- Ici notre widget agent et place pour editer les jetons -->        
          </div>
          <div id="program" class="col-6 p-0" style="height: 6%;">
          <!-- Ici notre widget programme -->        
          </div>
      </div>
      <div id="div3" style="height:640px; background-color: rgba(77, 77, 78, 0.6); color: white;" class="card-body table-responsive p-0">
      <div id="div_tab_jet" style="margin-left: 10px;">
<!-- Affichage jeton -->
      </div>
    </div>
       
              <div>
              <!-- , -->
              <div class=" form-group  row"  style=" text-align: center;padding-left: 15%">
                  <button onclick="ajouterJetons($('#idAgent').val(),$('#IdProg').val(),$('#NbrJeto').val())" 
                     class=" btn btn-default  btn-xs col-3" id="jetonRrg" name="jetonRrg">
                   <i class="fas fa-edit"></i> Jeton </button>
                    <input type="text" class="form-control col-3" id="NbrJeto" name="NbrJeto" placeholder="Nombre des jetons">
                      <input type="reset" class="btn-default  col-3" id="annuler" name="annuler" value="Annuler">
                             
              </div>
              <div class="col-12" style="text-align: center; margin-top: 0px">
                  <button onclick="imprimer('div_tab_jet')" 
                     class=" btn btn-default  btn-xs" id="jetonRrg" name="jetonRrg">
                   <i class="fas fa-print"></i> Imprimer </button>
              </div>
              </div>
       
  </div>
<!--  -->


     <div id="div1" class="col-3" style="height: 100px; background-color: rgba(77, 77, 78, 0.6); color: white">
        
              <div class="card-header" style="background-color: #4d4d4e">
                <h3 class="card-title" style="color: white"> PROGRAMMES DE SENSIBILISATION</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 110px;">
                    <input type="text" name="Recherche" onkeyup="rech_prog($(this).val())" class="form-control float-right" placeholder="Recherche">
                  </div>
                </div>
                
              </div>
              
              <div id="div_tabprog" class="card-body table-responsive p-0" style="height: 700px;background: white">
                <!-- Fanction tableau agent -->
                <?php 
                echo listeProg();
                ?>
              </div>
              <!-- /.card-body -->
        
     </div>
     
</section>
<?php
include('footer.php');  
}
if(!isset($_SESSION['Agent'])){
  header('location:login.php');
}
?>