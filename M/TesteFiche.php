<?php
    include('fiche.class.php');
        $idFiche=54;
        $tempFiche="100000";
        $respFiche="100/21";
        $pulsFiche="212/12";
        $poidFiche="23";
        $taFiche="128";
        $anamFiche="Le.......,";
        $idCli=1;
        $var='Tc';
    
    $f= new fiche();
    // $f->ajouterfiche($tempFiche,$respFiche,$pulsFiche,$poidFiche,$taFiche,$anamFiche,$idCli);
   $f->modifierfiche($idFiche,$tempFiche,$respFiche,$pulsFiche,$poidFiche,$taFiche,$anamFiche);
   // $f->supprimerfiche($idFiche);
   $tab=$f->selectionnerfiche();      
   // $tab=$f->filtrerfiche(36);      
    // $tab=$f->rechercherfiche($idCli);
      while($sel=$tab->fetch())
          {
        echo $sel['IdFiche'].'   Date d\'enregistrement :';
        echo $sel['DateElabFiche'].'   |Temperature :';
        echo $sel['TempFiche'].'  |RespFiche: ';
        echo $sel['RespFiche'].'  |PulsFiche:';
        echo $sel['PulsFiche'].'   |PoidFiche :';
        echo $sel['PoidFiche'].'  |TaFiche :';
        echo $sel['TaFiche'].'  |AnamFiche:';
        echo $sel['AnamFiche'].' IdCli: ';
        echo $sel['IdCli'].' NomCli: ';
        echo $sel['NomCli'].'  PostnomCli:';
        echo $sel['PostnomCli'].'</br>';
        
          }
      

