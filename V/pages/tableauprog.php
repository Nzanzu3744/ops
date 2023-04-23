<?php
function listeProg(){
$Acces=$_SESSION['Agent']['IdFonct'];
  $tab=programme::selectionnerprog();
  $cpt=0;
  while($Pro=$tab->fetch()){
    $cpt++;
    // echo $Pro['IdProg'];
  ?>

 <div class="col-12" style="font-size: 16px; padding: 2%; color: black; border: 1px solid black" id="<?=$Pro['IdProg']?>">
    <center><mark><?=$cpt?></mark></center>

    <?php include('TeteDoc.php');?>
    
      <div class="col-12" style="background: white">
        <div style="text-align: center">
          <p style=" font-size: 25px"><?=strtoupper('Programme N:'.$Pro['IdProg'].'/'. $Pro['DebProg'].'/'.$Pro['DebProg'])?></p>
       
       
        <p>
          <i>-----------------------------------------------------------------------------------------------------------------------------------------------------</i>
        </div>
      </p>
          <?='<a style="font-size:25px; color:green">'.'Objet :   '.$Pro['ObjProg'].'</a>'?>
          
          <?='<a style="font-size:25px">'.$Pro['Prog'].'</a>'?>


    
    <?php
      if($Acces==4){
      ?>
    <div style="" class="no-print">
      <a class="btn btn-success btn-xs" onclick="imprimer('<?=$Pro['IdProg']?>')">
          <i class="fas fa-pencil-print"></i>Imprimer
      </a>                   
      <a class="btn btn-success btn-xs" onclick="ModifProg('<?=$Pro['IdProg']?>')">
          <i class="fas fa-alt "></i>Modifier
      </a>
      <a class="btn btn-success btn-xs"  id="SupProg" onclick="jeton('<?=$Pro['IdProg']?>')">
          <i class="fas fa-alt "></i>Jeton
      </a>
      <a class="btn btn-danger btn-xs" onclick="sup_prog('<?=$Pro['IdProg']?>')" id="SupProg" >
          <i class="fas fa-trash"></i>Supprimer
      </a>
    </div>

</div>
  </div>

  <?php
}
}
}
function FiltrerProg($id){
  $Acces=$_SESSION['Agent']['IdFonct'];
  $cpt=0;
  $tab=programme::RechProg($id);
  while($Pro=$tab->fetch()){
    $cpt++;
  ?>
  
 <div class="col-12" style="font-size: 16px; padding: 2%; color: black; border: 1px solid black" id="<?=$Pro['IdProg']?>">
    <center><mark><?=$cpt?></mark></center>

    <?php include('TeteDoc.php');?>
    
      <div class="col-12" style="background: white">
        <div style="text-align: center">
          <p style=" font-size: 25px"><?=strtoupper('Programme N:'.$Pro['IdProg'].'/'. $Pro['DebProg'].'/'.$Pro['DebProg'])?></p>
       
       
        <p>
          <i>-----------------------------------------------------------------------------------------------------------------------------------------------------</i>
        </div>
      </p>
          <?='<a style="font-size:25px; color:green">'.'Objet :   '.$Pro['ObjProg'].'</a>'?>
          
          <?='<a style="font-size:25px">'.$Pro['Prog'].'</a>'?>


    
    <?php
      if($Acces==4){
      ?>
    <div style="" class="no-print">
      <a class="btn btn-success btn-xs" onclick="imprimer('<?=$Pro['IdProg']?>')">
          <i class="fas fa-pencil-print"></i>Imprimer
      </a>                   
      <a class="btn btn-success btn-xs"  onclick="ModifProg('<?=$Pro['IdProg']?>')" >
          <i class="fas fa-alt "></i>Modifier
      </a>
      <a class="btn btn-success btn-xs"  id="SupProg" onclick="jeton('<?=$Pro['IdProg']?>')">
          <i class="fas fa-alt "></i>Jeton
      </a>
      <a class="btn btn-danger btn-xs" onclick="sup_prog('<?=$Pro['IdProg']?>')" id="SupProg" >
          <i class="fas fa-trash"></i>Supprimer
      </a>
    </div>
    
</div>
  </div>

  <?php
}
}
}


function listeProgNV(){
  $tab=programme::selectProNoAp();
  $cpt=0;
  while($Pro=$tab->fetch()){
    $cpt++;
  ?>
  <div class="col-12" style="font-size: 16px; padding: 2%; color: black; border: 1px solid black" id="<?=$Pro['IdProg']?>">
    <center><mark><?=$cpt?></mark></center>

    <?php include('TeteDoc.php');?>
    
      <div class="col-12">
        <div style="text-align: center">
          <p style=" font-size: 25px"><?=strtoupper('Programme N:'.$Pro['IdProg'].'/'. $Pro['DebProg'].'/'.$Pro['DebProg'])?></p>
       
       
        <p>
          <i>-----------------------------------------------------------------------------------------------------------------------------------------------------</i>
        </div>
      </p>
          <?='<a style="font-size:25px; color:green">'.'Objet :   '.$Pro['ObjProg'].'</a>'?>
          
          <?='<a style="font-size:25px">'.$Pro['Prog'].'</a>'?>


      <a id="imp" class="btn btn-success btn-xs" onclick="imprimer('<?=$Pro['IdProg']?>')" >
          <i class="fas fa-pencil-print"></i>Imprimer
      </a>                   
      <a onclick="valider01(<?=$Pro['IdProg']?>)" class="btn btn-success btn-xs"  id="SupProg" >
          <i class="fas fa-alt "></i>Valider
      </a>
    </div>
  </div>

  <?php
}
}

function FiltrelisteProgNV($id){
  $tab=programme::FiltreProNoAp($id);
  $cpt=0;
  while($Pro=$tab->fetch()){
    $cpt++;
  ?>

 <div class="col-12" style="font-size: 16px; padding: 2%; color: black; border: 1px solid black" id="<?=$Pro['IdProg']?>">
    <center><mark><?=$cpt?></mark></center>

    <?php include('TeteDoc.php');?>
    
      <div class="col-12">
        <div style="text-align: center">
          <p style=" font-size: 25px"><?=strtoupper('Programme N:'.$Pro['IdProg'].'/'. $Pro['DebProg'].'/'.$Pro['DebProg'])?></p>
       
       
        <p>
          <i>-----------------------------------------------------------------------------------------------------------------------------------------------------</i>
        </div>
      </p>
          <?='<a style="font-size:25px; color:green">'.'Objet :   '.$Pro['ObjProg'].'</a>'?>
          
          <?='<a style="font-size:25px">'.$Pro['Prog'].'</a>'?>


      <a id="imp" class="btn btn-success btn-xs" onclick="imprimer('<?=$Pro['IdProg']?>')" >
          <i class="fas fa-pencil-print"></i>Imprimer
      </a>                   
      <a onclick="valider01(<?=$Pro['IdProg']?>)" class="btn btn-success btn-xs"  id="SupProg" >
          <i class="fas fa-alt "></i>Valider
      </a>
    </div>
  </div>

  <?php
}
}