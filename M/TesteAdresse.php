<?php
    include('adresse.class.php');
    $id=12;
    $quart="Lumumba";
    $idville=8;
    
    $a= new adresse();
//    $a->ajouterquart($quart,$idville);
//    $a->modifierquart($id,$quart,$idville);
//    $a->supprimerquart($id);
//    $tab=$a->selectionnerquart();      
    $tab=$a->recherchequart($id);
      while($sel=$tab->fetch())
          {
        echo $sel['IdQuart'].'   ';
        echo $sel['NomQuart'].'  ';
        echo $sel['IdVille'].'   ';
        echo $sel['NomVille'].'  ';
        echo $sel['IdProv'].'  ';
        echo $sel['NomProv'].'  ';
        echo $sel['IdPays'].'  ';
        echo $sel['NomPays'].'</br>';
        
          }
      

