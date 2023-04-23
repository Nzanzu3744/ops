<?php
    include('consommation.class.php');
    $id=5;
    $quantServi=100000000;
    $puDesigServi=100;
    $idFact=1;
    $idDesigServi=1;
    $var=4;
    
    $c= new consommation();
    $c->ajouterconso($quantServi,$puDesigServi,$idFact,$idDesigServi);
   // $c->modifierconso($id,$quantServi,$puDesigServi,$idFact,$idDesigServi);
   // $c->supprimerconso($id);
   $tab=$c->selectionnerconso();      
   // $tab=$c->filtrerconso($var);      

      while($sel=$tab->fetch())
          {
        // echo 'Num Fact :'.$sel['IdPrescript'].'   au date de ';
        // echo $sel['DateElaPrescript'].' ; Num Designation : ';
      
        echo $sel['IdDesigServi'].'  Service :';
        echo $sel['DesigServi'].' Num conso: ';
          
       echo $sel['IdConso'].' Quantité: ';
       echo $sel['QuantServi'].' au prix de ';
       echo $sel['PuDesigServi'].'$  </br>';
      
        
          }
      

