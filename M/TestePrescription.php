<?php
    include('prescription.class.php');
        $id=1;
        $prescrip="Paracetamol 500mg................";
        $idFiche=1;

    $pr= new prescription();

    // $pr->ajouterprescip($prescrip,$idFiche);

   // $pr->modifierprescrip($id,$prescrip,$idFiche,$idFiche);
   // $pr->supprimerprescrip($id);
   // $tab=$pr->selectionnerprescrip();      
    // $tab=$pr->filtrerprescrip($idFiche);
    $tab=$pr->recprescript(63);
      while($sel=$tab->fetch())
          {
        echo "Client : ".$sel['IdCli'].' :';
        echo $sel['NomCli'].'   :';
        echo $sel['PostnomCli'].'   ';
        echo $sel['PrenomCli'].'|Fiche : ';
        echo $sel['IdFiche'].' IdPrescription: ';
        echo $sel['IdPrescrip'].' Enregistrement : le ';
        echo $sel['DateElabFiche'].' Prescription: ';
        echo $sel['IdPrescrip'].'  ';
        echo $sel['Prescrip'].' |</br>';
          }
      


