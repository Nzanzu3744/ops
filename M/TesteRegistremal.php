<?php
    include('registremal.class.php');
        $id=15;
        $casEnregMal=0;
        $remEnregMal=" ................";
        $idFiche=2;
        $date1="2021/09/19";
        $date2="2021/09/20";
        $var=1;
    $rm= new registremal();

    // $rm->enregistremal($casEnregMal,$remEnregMal,$idFiche);

   // $rm->modifiermal($id,$casEnregMal,$remEnregMal,$idFiche);
   // $rm->supprimerenregmal($id);
   // $tab=$rm->selectionnerenregmal();      
         
    // $tab=$rm->filtrerenregmal($date1,$date2);
    $tab=$rm->filtrerenregmal2($var);
      while($sel=$tab->fetch())
          {
        echo "Client : ".$sel['IdCli'].' :';
        echo $sel['NomCli'].'   :';
        echo $sel['PostnomCli'].'   ';
        echo $sel['PrenomCli'].'|Fiche : ';
        echo $sel['IdFiche'].' Enregistrement :  ';
        echo $sel['IdEnregMal'].'  ';
        echo $sel['DateEnregMal'].'  ';
        echo $sel['CasEnregMal'].'  ';
        echo $sel['RemEnregMal'].' |</br>';
          }
      
 // $d1="2021/01/01";
 // $d2="0000/00/01";
 // echo $d1."  -------  ".$d2;
 // echo ($d1+$d2);

