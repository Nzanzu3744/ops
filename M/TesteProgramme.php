<?php
    include('programme.class.php');
        $id=2;
        $DebProg="2001/02/02";
        $FinProg="2001/02/02";
        $ObjProg="Obj";
        $Prog="Pro";
       $tab=programme::RechAgbyProg(1);
       while($list=$tab->fetch()){
            echo $lis['IdPro'];
            echo $lis['Prog'];

       }

       // echo programme::ajouterprogramme($DebProg,$FinProg,$ObjProg,$Prog);
   // $c->modifierclient($id,$NomCli,$PostnomCli,$PrenomCli,$GenreCli,$NumParcelCli,$DateNaisCli,$TelCli,$IdNation,$IdQuart,$ActifCli,$AccesCli,$MotCleCli);
   // $c->supprimerclient($id);
    //$tab=$c->selectionnerclient();      
    // $tab=$c->rechercheclient($var);
      // while($sel=$tab->fetch())
      //     {
      //   echo $sel['IdCli'].'   ';
      //   echo $sel['NomCli'].'   ';
      //   echo $sel['PostnomCli'].'   ';
      //   echo $sel['PrenomCli'].'   ';
      //   echo $sel['GenreCli'].'   ';
      //   echo $sel['TelCli'].'   ';
      //   echo $sel['DateNaisCli'].' Parcelle :  ';
      //   echo $sel['NumParcelCli'].'   ';
        
      //     echo $sel['IdQuart'].'   ';
      //   echo $sel['NomQuart'].'  Tel: ';
      
      //   echo $sel['IdVille'].'   ';
      //   echo $sel['NomVille'].' ';
          
      //   echo $sel['IdProv'].'  ';
      //   echo $sel['NomProv'].'  ';
        
          
      //   echo $sel['IdPays'].'   Actif : ';
      //   echo $sel['ActifCli'].' Acces : ';
      //   echo $sel['AccesCli'].'</br> ';
       
        
         // }
      

