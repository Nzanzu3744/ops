<?php
function tabjeton($nbjt,$IdAgent,$idpro){
  //Aux ou on aura besoin d'afficher les info sur le client
  $tab=agent::rechercheagent($IdAgent);
  $id_ag=$tab->fetch();
  ?>
  <div class="row col-12" style="">
  <?php
  for ($compteur=1; $compteur<=$nbjt ;$compteur++) { 
  ?>
     <p style="background-image:url('../dist/img/jeton1.png');height:226px; width: 275px; margin: 2px">
      <label class="float-right" style="color: green; font-family: timenewroman; font-size: 20px; margin-top: 1px"><?php echo $id_ag['IdAgent'].$idpro ?></label>  
    </p>       
<?php
}
?>
  </div>
<?php
}
?>