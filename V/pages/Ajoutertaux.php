<?php
session_start();
if(isset($_SESSION['Agent'])){

include('header.php');
include('tableautaux.php');
include('../../M/taux.class.php');
?>
	<div class=' col-6 offset-3' style="background-color: rgba(77, 77, 78, 0.3); color: white">
        <div class="card-header " style="background-color: #4d4d4e">
                <h3 class="card-title" style="color: white">TAUX</h3>
        </div>

        <div class="row" style="color:black">            
            <div class="form-group col-6" style="padding-bottom: 0px; margin-bottom: 0px;">
            <input type="text" class="form-control input-lg" id="taux1" name="taux1" placeholder="Taux"><br>
            <button class="btn btn-success offset-3"  onclick="enregistretaux($('#taux1').val())">
              Enregistrer
            </button>
            <input type="reset" class="btn btn-default" value='Annuler'>
      </div>
        
  <!--  -->
        <div id="div_taux" class="card-body table-responsive p-0 col-6" style="height: 500px;">
          <!-- Fanction tableau agent -->
          <?php 
          echo listeTaux();
          ?>
        </div>
	   </div>
</div>
<script type="text/javascript">

</script>
<script type="text/javascript" src="../plugins/scriptgeneral.js"></script>

<!--  -->
<?php
include('footer.php');
?>
<?php  
}
if(!isset($_SESSION['Agent'])){
  header('location:login.php');
}