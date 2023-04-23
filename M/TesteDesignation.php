<?php
    include('designation.class.php');

    $idDesigServi=8;
    //Consultation/Medicament/Laboratoire/Actes/Hospitalisation, Soins Infirmiers...
    $DesigServi="Soins Infirmiers";
    $var='';

    $d= new designation();

   // $d->ajouterdesignation($DesigServi);
    // $d->modifierdesig($idDesigServi,$DesigServi);
    // $d->supprimerdesig($idDesigServi);

   $tab=$d->selectionnerdesign();

      while($sel=$tab->fetch())
          {
        echo $sel['IdDesigServi'].'   ';       
        echo $sel['DesigServi'].'</br>';
        
          }