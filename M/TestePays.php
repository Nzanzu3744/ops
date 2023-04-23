<?php
    include('pays.class.php');
    $idpays=1;    
    $pays='rdc';
    $var='rdc';
    $p= new pays();
//    $p->ajouterpays($pays);
    //$p->modifierpays($idpays,$pays);
    //$p->supprimerpays(8);

//    $tab=$p->selectionnerpays();
     $tab=$p->recherchepays($pays);
    // $tab=$p->leftpays($var);
      while($sel=$tab->fetch())
          {
        echo $sel['IdQuart'].'   ';
        echo $sel['NomQuart'].'   ';
        echo $sel['IdVille'].'   ';
        echo $sel['NomVille'].'   ';
        echo $sel['IdProv'].'   ';
        echo $sel['NomProv'].'   ';
        echo $sel['IdPays'].'   ';
        echo $sel['NomPays'].'</br>';
        
          }