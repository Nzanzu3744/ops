<?php
    include('qualification.class.php');
    $id=8;
    $qualification="Aucun";
    $var='A2';
    
    $q= new qualification();
//    $q->ajouterqualif($qualification);
//    $q->modifierfonct($id,$qualification);
//    $q->supprimerqualif($id);
//    $tab=$q->selectionnerqualif();      
    $tab=$q->recherchequalif($var);
//    $tab=$v->leftfonct($var);
      while($sel=$tab->fetch())
          {
        echo $sel['IdQualif'].'   ';
        echo $sel['Qualif'].' </br> </br> ';
      
        
          }
      

