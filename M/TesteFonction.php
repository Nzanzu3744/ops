<?php
    include('fonction.class.php');
    $id=1;
    $fonct="Administrateur";
    $var='Adm';
    
    $f= new fonction();
//    $f->ajouterfonct($fonct);
//    $f->modifierfonct($id,$fonct);
//    $f->supprimerfonct($id);
//    $tab=$f->selectionnerfonct();      
//    $tab=$f->recherchefonct($var);
    $tab=$v->leftfonct($var);
      while($sel=$tab->fetch())
          {
        echo $sel['IdFonct'].'   ';
        echo $sel['NomFonct'].' </br>  ';
      
        
          }
      

