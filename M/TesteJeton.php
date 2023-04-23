<?php
    include('jeton.class.php');
    $nbr=2;
    $idJeto=1743;
    $idJeto1=1738;
    $idJeto2=1740;
    $idagent=2;
    $j= new jeton();
   // $imprimer=$j->ajouterjeton($nbr,$idagent);
   // echo ' De '.$imprimer[0].' a '.$imprimer[1];

   // $j->modifierjeton($idJeto1,$idJeto2,$idagent);

   // $j->supprimerjeton($idJeto1,$idJeto2);

   $tab=$j->selectionnerjeton();     

    // $tab=$j->recherchejeton($idJeto);

//     // $tab=$j->jetonbyagent($idagent);
      while($sel=$tab->fetch())
          {
        echo $sel['NumJeto'].'  IdAgent= ';
        echo $sel['IdAgent'].' Nom= ';
        echo $sel['NomAgent'].' Postnom=  ';
        echo $sel['PostnomAgent'].' Prenom=  ';
        echo $sel['PrenomAgent'].' Telephone=  ';
        echo $sel['TelAgent'].'</br> ';
        
          }

      
