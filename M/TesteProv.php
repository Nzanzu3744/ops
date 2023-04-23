<?php
    include('province.class.php');
    $id=9;
    $prov='Ituri';
    $idpays=1;
    $var="Ituri";
    $p= new province();
//    $p->ajouterprov($prov,$idpays);
//    $p->modifierprov($id,$prov,$idpays);
//    $p->supprimerprov(8);
   $tab=$p->selectionnerprov();   
//    $tab=$p->rechercheprov($prov);
        // $tab=$p->leftprov($var);

      while($sel=$tab->fetch())
          {
        echo $sel['IdQuart'].'   ';
        echo $sel['NomQuart'].'   ';
        echo $sel['IdVille'].'   ';
        echo $sel['NomVille'].'   ';
        echo $sel['IdProv'].'   ';
        echo $sel['NomProv'].' </br> ';
//        echo $sel['NomPays'].'</br>';
        
          }
      

