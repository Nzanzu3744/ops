<?php
    include('recu.class.php');
      
    $idRecu="";
	$motifRecu="Recu motif Soin";
	$var="Kah";

    $r= new recu();
    // $r->ajouterrecu($motifRecu,$idFact);
   // $r->modifierrecu($idRecu,$motifRecu,$idFact);
   // $r->supprimerrecu($idRecu);
   // $tab=$r->selectionnerrecu();      
    $tab=$r->filtrerrecu($var);
      while($sel=$tab->fetch())
          {
        echo "IdRecu: ".$sel['IdRecu'].' Date Recu:';
        echo $sel['DateElabRecu'].'   MotifRecu:';
        echo $sel['MotifRecu'].'  |Client:';
        echo $sel['IdCli'].'   :';
        echo $sel['NomCli'].'   :';
        echo $sel['PostnomCli'].'   ';
        echo $sel['PrenomCli'].'|Facture : ';
        echo $sel['IdFact'].' Enregistrement : le ';
        echo $sel['DateElabFact'].'  ';
        echo $sel['IdPrescrip'].'  ';
        echo $sel['Prescrip'].' |</br>';
          }
      


