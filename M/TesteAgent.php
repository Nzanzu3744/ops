<?php
    include('agent.class.php');
    $id=14;
     $NomAgent="Kahindo";
     $PostnomAgent="Tsongo";
     $PrenomAgent="Joy";
     $NumeParcelAgent="19";
     $GenreAgent="Feminin";
     $DateNaisAgent="2006/10/20";
     $NNAgent="2236230984665";
     $TelAgent="0827028553";
     $IdQualif=2;
     $IdNation=5;
     $IdFonct=2;
     $IdQuart=6;
     $MotCleAgent="0909";
     $AccesAgent=1;
     $ActifAgent=1;
         $var="1";

    //Object
    $a= new agent($NomAgent, $PostnomAgent, $PrenomAgent, $NumeParcelAgent, $GenreAgent, $DateNaisAgent, $NNAgent, $TelAgent, $IdQualif, $IdNation, $IdFonct, $IdQuart, $MotCleAgent,$AccesAgent, $ActifAgent);
    $a->ajouteragent();
   // $a->modifieragent();
   // $tab=$a->supprimeragent($id);
    $tab=$a->selectionneragent();      
    // $tab=$a->rechercheagent($var);
      while($sel=$tab->fetch())
          {
        echo $sel['IdAgent'].'   ';
        echo $sel['NomAgent'].'   ';
        echo $sel['PostnomAgent'].'   ';
        echo $sel['PrenomAgent'].'   ';
        echo $sel['GenreAgent'].'   ';
        echo $sel['TelAgent'].'   ';
        echo $sel['DateNaisAgent'].' Parcelle :  ';
        echo $sel['NumeParcelAgent'].'   ';
        
          echo $sel['IdQuart'].'   ';
        echo $sel['NomQuart'].'  Tel: ';
      
        echo $sel['IdVille'].'   ';
        echo $sel['NomVille'].' ';
          
        echo $sel['IdProv'].'  ';
        echo $sel['NomProv'].'  ';
        
          
        echo $sel['IdPays'].'   Actif : ';
        echo $sel['ActifAgent'].' Acces : ';
        echo $sel['AccesAgent'].' ';
        echo $sel['NomPays'].' Fonct:';
        echo $sel['NomFonct'].'</br>';
        
          }
      // $a->modifieretat($id,$var);
        // echo '12345678'.sha1(12345678);
        // echo '</br> 87654321'.sha1(87654321);
    // echo MD5(1234);
