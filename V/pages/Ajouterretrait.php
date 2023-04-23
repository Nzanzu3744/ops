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
 <div class="  col-4" onload="soldetotal($('#vers').val(),$('#ret').val());">
      <!-- Partie premiere -->
      <div class="card-header" style="background-color: #4d4d4e;color: white">
        <h3 class="card-title" style="color: white">VERSEMENT</h3>
      </div>
      <div id="div_versement" class="card-body table-responsive " style="height: 700px;background-color: rgba(77, 77, 78, 0.6); color: white;">
        
        <?php
        // Je fait appel a ma fonction pour l'affichage d'ensemble des vesement
          echo versement();   
        ?>
        
      </div>
      <button class="btn btn-default no-print" style="color:red" onclick="imprimer('div_versement')"> Imprimer</button>
</div> 
<div id="div_tab2" class=" col-4" style="background-color: rgba(77, 77, 78, 0.8);color: white; height: 750px">    
     <div style="height: 650px; border: 2px solid #dedede;" class="card-body table-responsive" id="RappoRetetVers" name='RappoRetetVers' >
      <!-- Solde -->
      <!-- Le 1 est la focntion ex: Sensibilisateur -->
      <?php
        echo solde();
      ?>
      </div>
      <div id="" style="height: 50px; margin-top: 30px;padding: 1px; border: 2px solid #dedede;  background-color: rgba(77, 77, 78, 0.5); color: white" class="row">
              
              <!--  -->
          <input type="text" name="Identagent" id="Identagent" class="form-control col-4" placeholder="Tapez le numero matriculagent Ici" onkeyup="rechversement($(this).val());rechretrait($(this).val());rechprog($(this).val())">

          
          <input type="text" class="form-control col-4" id="Mont" name="Mont" placeholder="Montant ici">
          <!--  -->
          <div class="col-4 row">
            <button style="margin: 2px" class="btn-success btn-sm" id="" name="" onclick="retrirer($('#Mont').val(),$('#Identagent').val(),$('#Soldesolde').val())">Retirer</button>
        </div>
        
           <!-- <button style="margin: 2px" class="btn-success btn-sm" id="" name="" onclick="retrirer($('#Mont').val(),$('#Identagent').val(),$('#Soldesolde').val(); alert($('#Mont').val()); alert($('#Identagent').val()); alert($('#Soldesolde').val())">Retirer</button> -->
        
      </div>
              <div id="resultat"></div>           
      
     </div>
     <div id="div1" class="col-4" style="height: 750px; background-color: rgba(77, 77, 78, 0.8); color: white; ">
      <div class="row">
         <div class="card-header" style="background-color: #4d4d4e">
                <h3 class="card-title" style="color: white">RETRAIT</h3>
          </div>
         
       </div>
          <div id="div_retrait" class="card-body table-responsive " style="height: 700px;">
            <!-- Fanction tableau agent -->
            <?php 
              echo retrait();
          
            ?>
          </div>
          <button class="btn btn-default no-print" style="color:red" onclick="imprimer('div_retrait')"> Imprimer</button>
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