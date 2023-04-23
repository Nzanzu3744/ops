<?php
session_start();
if(isset($_SESSION['Agent'])){

include('header.php');

include('../../M/versement.class.php');
include('../../M/agent.class.php');
include('../../M/retrait.class.php');
include('../../M/programme.class.php');
include('tableauretrait.php');


?>

<section class="row" style="height:100%;">
	
	<div style="" class="col-12">
              <div class="card-header" style="background-color: #4d4d4e">
                <h5 class="card-title" style="color: white">RELEVE DE COMPTE</h5>
              </div>
              <div class="row" style="height: 730px">
                  <div id="" class="card-body table-responsive p-0 col-6" style="height: 700px;">
                    <?php
                    echo Rechversement($_SESSION['Agent']['IdAgent']);
                      // echo versement(); 
                    ?>
                  </div>
                  <div id="" class="card-body table-responsive p-0 col-6" style="height: 700px;">
                    <?php
                    // echo rechercheretrait(1);
                      echo Rechretrait($_SESSION['Agent']['IdAgent']);
                    ?>
                  </div>
              </div>
              <div style="text-align: center;">
                <?php
                  echo FiltrersoldeAgent($_SESSION['Agent']['IdAgent']);
                ?>
              </div>
              <!-- /.card-body -->
        </div>
</section>

<!--  -->
<script type="text/javascript" src="../plugins/scriptclient.js"></script>
<script type="text/javascript" src="../plugins/scriptadresse.js"></script>
<?php
include('footer.php');  
}
if(!isset($_SESSION['Agent'])){
  header('location:login.php');
}