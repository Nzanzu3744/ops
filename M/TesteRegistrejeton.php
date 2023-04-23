<?php
    include('registrejeton.class.php');
        $id=1;
        $idCli=3;
        $numJeto=1743;
        $var="KAh";
    
    $r= new registrejeton();
    registrejeton::enregistrerjeton($idCli,$numJeto);
   // $r->modifierenregjeton($id,$idCli,$numJeto);
   // $r->supprimerenregjeton($id);
   $tab=$r->selectionnerenregjeton();      
    // $tab=$r->rechercheenregjeton($var);
    // $tab=$r->rechercheagent($idCli);
      while($sel=$tab->fetch())
          {
        echo $sel['IdJetonEnreg'].'   Date d\'enregistrement :';
        echo $sel['DateEnreg'].'   |Num jeton:';
        echo $sel['NumJeto'].'  IdAgent: ';
        echo $sel['IdAgent'].'  Nom Agent:';
        echo $sel['NomAgent'].'   ';
        echo $sel['PostnomAgent'].'  ';
        echo $sel['PrenomAgent'].'  ';
        echo $sel['GenreAgent'].' IdCli: ';
        echo $sel['IdCli'].' NomCli: ';
        echo $sel['NomCli'].'  ';
        echo $sel['PostnomCli'].'  ';
        echo $sel['PrenomCli'].'  ';
        echo $sel['GenreCli'].' </br> ';
        
          }
      

