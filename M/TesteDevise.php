<?php
    include('devise.class.php');

    $idDevise=10;
    //Consultation/Medicament/Laboratoire/Actes/Hospitalisation, Soins Infirmiers...
    $nomDevise="Z";
    $var='';

    $d= new devise();

   // $d->ajouterdevise($nomDevise);
    // $d->modifierdevise($idDevise,$nomDevise);
    // $d->supprimerdevise($idDevise);

   $tab=$d->selectionnerdevise();

      while($sel=$tab->fetch())
          {
        echo $sel['IdDevise'].'   ';       
        echo $sel['NomDevise'].'</br>';
        
          }