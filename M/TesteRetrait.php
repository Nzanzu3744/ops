<?php
    include('retrait.class.php');
    
    $idretrait=4;
    $montant=2000;
    $idagent=4;

    $r= new retrait();

   // $r->ajouterretrait($montant,$idagent);
 

   $r->modifierretrait($idretrait,$montant,$idagent);

   // $r->supprimerretrait($idretrait);

   $tab=$r->selectionnerretrait();     

    // $tab=$r->rechercheretrait($idretrait);

    // $tab=$r->sommeretrait($idagent);
      while($sel=$tab->fetch())
          {
        echo 'Id :'.$sel['IdRetrait'].'; Date:  ';
        echo $sel['DateRetrait'].'; Montant= ';
        echo $sel['MontRetrait'].'  ,Id de l\'Agent= ';
        echo $sel['IdAgent'].' Nom= ';
        echo $sel['NomAgent'].' Postnom=  ';
        echo $sel['PostnomAgent'].' Prenom=  ';
        echo $sel['PrenomAgent'].' Genre :  ';
        echo $sel['GenreAgent'].' Date Nais=  ';
        echo $sel['DateNaisAgent'].' NN:  ';
        echo $sel['NNAgent'].' Telephone=  ';
        echo $sel['TelAgent'].'</br> ';        
        // echo $sel['Somme'].'</br> ';        
          }

      
