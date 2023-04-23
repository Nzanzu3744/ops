<?php
    include('ville.class.php');
    $id=6;
    $ville="Bunia";
    $idprov=3;
    $var='Bunia';
    
    $v= new ville();
    $v->ajouterville($ville,$idprov);
//    $v->modifierville($id,$ville,$idprov);
//    $v->supprimerville($id);
   // $tab=$v->selectionnerville();      
   $tab=$v->rechercheville($ville);
    // $tab=$v->leftville($var);
      while($sel=$tab->fetch())
          {
        echo $sel['IdQuart'].'   ';
        echo $sel['NomQuart'].'   ';
      
        echo $sel['IdVille'].'   ';
        echo $sel['NomVille'].' </br> ';
          
       echo $sel['IdProv'].'  ';
       echo $sel['NomProv'].'  ';
       echo $sel['IdPays'].'  ';
       echo $sel['NomPays'].'</br>';
        
          }
      

