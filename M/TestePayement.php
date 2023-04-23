<?php
    include('payement.class.php');
        $idPayer=15;
        $montat=23435;
        $tauxEch=2000;
        $idRecu=5;
        $idDevise=2;
        $var=5;
  
    $pm=new payement();
    // $pm->ajouterpayement($montat,$tauxEch,$idRecu,$idDevise);
   // $pm->modifierpayer($idPayer,$montat,$tauxEch,$idRecu,$idDevise);
   // $pm->supprimerpayer($idPayer);

    //Attention la filtrerpayement($var) renvoi un table milti dimen t[0]=on la liste des payement par rapport a un recu et dans t[1] le total. 
   $tab=$pm->filtrerpayement($var);      
      while($sel=$tab[0]->fetch())
          {
          
        echo 'Num Recu :'.$sel['IdRecu'].'   au date de ';
        echo $sel['DateElabRecu'].' ; Montat : ';
      
        echo $sel['Montat'].'  à  :';
        echo $sel['NomDevise'].'______au taux de : ';
          
       echo $sel['TauxEch'].' -----qui donne = ';
       echo $sel['usd'].'$  </br>';
      
        
          }
          while($sel=$tab[1]->fetch()){ echo' TOTAL :'. $sel['Total'].'$';}
          

      

