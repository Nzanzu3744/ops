<?php
session_start();
if(isset($_SESSION['Agent'])){

include('header.php');
include('tableautaux.php');
include('../../M/fonction.class.php');
?>
  <div class=' col-6 offset-3' style="background-color: rgba(77, 77, 78, 0.3); color: white">
        <div class="card-header " style="background-color: #4d4d4e">
                <h3 class="card-title" style="color: white">FONCTION</h3>
        </div>

        <div class="row" style="color:black">            
            <div class="form-group col-6" style="padding-bottom: 0px; margin-bottom: 0px;">
            <input type="text" class="form-control input-lg" id="fonct" name="fonct" placeholder="Fonction"><br>
            <button class="btn btn-success offset-3"  onclick="enregistrefonct($('#fonct').val())">
              Enregistrer
            </button>
            <input type="reset" class="btn btn-default" value='Annuler'>
            </button>
      </div>
        
  <!--  -->
        <div id="div_fonct" class="card-body table-responsive p-0 col-6" style="height: 500px;">
          <!-- Fanction tableau agent -->
          <?php 
          echo listeFonct();
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