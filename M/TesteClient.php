<?php
    include('client.class.php');
    include('jeton.class.php');
        $id=1;
        $NomCli='dddddddddddddddddddddddd';
        $PostnomCli='Modif';
        $PrenomCli='Modif';
        $GenreCli='Modif';
        $NumParcelCli='100';
        $DateNaisCli='1998/05/10';
        $PhotoCli='tyufjkfngf/fhjjfd/kjd';
        $IdJeton='233';
        $TelCli='0078321310';
        $IdNation=1;
        $IdQuart=1;
        $IdJeton=133;

        $ActifCli=0;
        $AccesCli=1;
        $MotCleCli="1234";
        $PhotoCli="";
        

         $var="3";
    //Object
    $c= new client();
   //  // $c->ajouterclient($NomCli,$PostnomCli,$PrenomCli,$GenreCli,$NumParcelCli,$DateNaisCli,$TelCli,$PhotoCli,$IdJeton,$IdNation,$IdQuart,$ActifCli,$AccesCli,$MotCleCli);
   echo $c->modifierclient($id,$NomCli,$PostnomCli,$PrenomCli,$GenreCli,$NumParcelCli,$DateNaisCli,$TelCli,$PhotoCli,$IdJeton,$IdNation,$IdQuart);

   // // $c->supprimerclient($id);
    $tab=$c->selectionnerclient();      
    // $tab=$c->rechercheclient($var);
      while($sel=$tab->fetch())
          {
        echo $sel['IdCli'].'   ';
        echo $sel['NomCli'].'   ';
        echo $sel['PostnomCli'].'   ';
        echo $sel['PrenomCli'].'   ';
        echo $sel['GenreCli'].'   ';
        echo $sel['TelCli'].'   ';
        echo $sel['DateNaisCli'].' Parcelle :  ';
        echo $sel['NumParcelCli'].' photo : ';
        echo $sel['PhotoCli'].' |Jeto :  ';
        echo $sel['IdJeton'].'   ';
        
          echo $sel['IdQuart'].'   ';
        echo $sel['NomQuart'].'  Tel: ';
      
        echo $sel['IdVille'].'   ';
        echo $sel['NomVille'].' ';
          
        echo $sel['IdProv'].'  ';
        echo $sel['NomProv'].'Photo:  ';
        echo $sel['PhotoCli'].' Jeton : ';
        echo $sel['IdJeton'].'|  ';
        
          
        echo $sel['IdPays'].'   Actif : ';
        echo $sel['ActifCli'].' Acces : ';
        echo $sel['AccesCli'].'</br> ';
       
        
          }

         // $tab=jeton::Filterjeton(133);
      
         // $liste=$tab->fetch();
         // echo $liste['IdJeton'];
