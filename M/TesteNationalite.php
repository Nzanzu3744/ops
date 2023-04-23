<?php
    include('nationalite.class.php');
    $id=1;
    $nationalite="Rwandaise";
    $var='Rw';
    
    $n= new nationalite();
//    $n->ajouternation($nationalite);
//    $n->modifiernation($id,$nationalite);
//    $n->supprimernation($id);
//    $tab=$n->selectionnernation();      
//    $tab=$n->recherchenation($var);
    $tab=$n->leftnation($var);
      while($sel=$tab->fetch())
          {
        echo $sel['IdNation'].'   ';
        echo $sel['NomNation'].' </br> </br> ';
      
        
          }
      

