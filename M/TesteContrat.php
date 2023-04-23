<?php
    include('contrat.class.php');
    
        $idContrat="1";
        $debContrat="2021/09/01";
        $finContrat="2021/12/22";
        $rompu=1;
        $idAgent=1;

    $c= new contrat();

   // $c->ajoutercontrat($debContrat,$finContrat,$idAgent,$rompu);
 

   // $r->modifierretrait($idretrait,$montant,$idagent);

   // $r->supprimerretrait($idretrait);

   $tab=$c->selectionnercontrat();     

    // $tab=$c->recherchecontrat($idAgent);

      while($sel=$tab->fetch())
          {
        echo 'Id :'.$sel['IdContrat'].'; Date Debit:  ';
        echo $sel['DebContrat'].'; Date Fin: ';
        echo $sel['FinContrat'].'  ,Rompu = ';
        echo $sel['Rompu'].'  ||||,Id de l\'Agent= ';
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

      
