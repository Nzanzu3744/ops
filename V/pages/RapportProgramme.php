<?php
session_start();
if(isset($_SESSION['Agent'])){

include('header.php');

include('tableauretrait.php');
include('../../M/versement.class.php');
include('../../M/retrait.class.php');
include('../../M/agent.class.php');
include('../../M/programme.class.php');
include('../../M/chaine.php');
include('../../M/registrejeton.class.php');;
?>
<!-- <script type="text/javascript" src="../plugins/scriptfacture.js"></script> -->
<script type="text/javascript" src="../plugins/scriptagent.js"></script>
<script type="text/javascript" src="../plugins/scriptretrait.js"></script>
<section class="row" style="height:100%;">
    <?php
    $versement=0;
    $retrait=0;
    $solde=0;
    if(isset($_GET['idpres']) AND !empty($_GET['idpres'])){
      $idprescri=htmlspecialchars($_GET['idpres']);
      $tab=prescription::recprescript($idprescri);
      $pres=$tab->fetch();
    }
    ?>
<div id="div_tab2" class=" col-12" style="color: white; height: 750px; background: white; color:black">    
     <div style="height: 650px; border: 2px solid #dedede;" class="card-body table-responsive" id="RappoRetetVers" name='RappoRetetVers' >
      <!-- Solde -->
      <!-- Le 1 est la focntion ex: Sensibilisateur -->
      <?php
        echo solde();
      ?>
      </div>
      <div class="row">
            <div class="col-6">
              <label> Recherche Par Agent</label>
                <input type="text" name="Identagent" id="Identagent" class="form-control" placeholder="Tapez le numero matriculagent Ici" onkeyup="rechversement($(this).val());rechretrait($(this).val());rechprog($(this).val())">      
            </div>
            <div class="col-6">
              <label> Recherche Par Agent</label>
                <input type="text" name="Identagent" id="Identagent" class="form-control" placeholder="Tapez le numero matriculagent Ici" onkeyup="rechversement($(this).val());rechretrait($(this).val());rechprog($(this).val())">      
            </div>
    </div>
              <div id="resultat"></div>           
      
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