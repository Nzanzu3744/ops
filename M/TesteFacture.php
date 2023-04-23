<?php
    include('facture.class.php');
      
      $idFact=7;
      $idPrescrip="1";
      $var=2;

    $f= new facture();
    // $f->ajouterfacture($idPrescrip);
   // $f->modifierfacture($idFact,$idPrescrip);
   // $f->supprimerfacture($idFact);
   // $tab=$f->selectionnerfacture();      
   // $tab=$f->recFacturePrescr($var);      
   $tab=$f->filtrerfacturecons($var);      
    // $tab=$f->filtrerfacture($var);
      while($sel=$tab->fetch())
          {
            echo 'IdFacture:'.$sel['IdFact'].'</br>';
            echo 'IdConso:'.$sel['IdConso'].'</br>';
        // echo "IdFacture: ".$sel['IdFact'].' |Client:';
        // echo $sel['NomCli'].'   :';
        // echo $sel['PostnomCli'].'   ';
        // echo $sel['PrenomCli'].'|Fiche : ';
        // echo $sel['IdFiche'].' Enregistrement : le ';
        // echo $sel['DateElabFiche'].' Prescription: ';
        // echo $sel['IdPrescrip'].'  ';
        // echo $sel['Prescrip'].' |</br>';
          }
      


