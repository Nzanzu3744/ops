<?php
session_start();
if(isset($_SESSION['Agent'])){

include('header.php');
include('../../M/programme.class.php');
include('tableauprog.php');
include('FormulaireProg.php');
?>
<script type="text/javascript" src="../plugins/scriptprog.js"></script>
<section class="row" style="height:100%;">
	<div class='col-6' style="background-color: rgba(77, 77, 78, 0.3); color: white">
        <div class="card-header " style="background-color: #4d4d4e">
                <h3 class="card-title">ELABORATION PROGRAMME</h3>
  </div>
  <div id="fprogramme" style="max-height:200px">
        <?php
          echo fProg();
        ?> 
  </div>           
  </div>         
	
	<div class="col-6">
              <div class="card-header" style="background-color: #4d4d4e">
                <h3 class="card-title" style="color: white">LISTE DE PROGRAMMES</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" onkeyup="rech_prog($(this).val())" name="" id="" class="form-control float-right" placeholder="Recherche">
                    
                  </div>
                </div>
              </div>
              
              <div id="div_tabprog" class="card-body table-responsive p-0" style="height: 700px; background: white">
                <?php
                 echo listeProg();
                ?>
              </div>
              <!-- /.card-body -->
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