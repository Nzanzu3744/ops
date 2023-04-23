<?php
include('chaine.php');
class recu{
 
   private $_idRecu;
   private $_dateElabRecu;
   private $_motifRecu;
   private $_idFact;

    public function __construct(){
        $this->_idRecu="";
		$this->_dateElabRecu="";
		$this->_motifRecu="";
		$this->_idFact="";
    }
        public function ajouterrecu($motifRecu,$idFact){
            global $con;
            $req=$con->prepare('INSERT INTO `trecu`(DateElabRecu,motifRecu,idFact)VALUES (NOW(),?,?)');
            $req->execute(array($motifRecu,$idFact));
    }
    
    public function modifierrecu($idRecu,$motifRecu,$idFact){
        global $con;
        $con->exec('UPDATE `trecu` SET `MotifRecu`="'.$motifRecu.'",`IdFact`='.$idFact.' WHERE IdRecu=3');
    }
    public function supprimerrecu($idRecu){
        global $con;
        $con->exec('DELETE FROM `trecu` WHERE `IdRecu`='.$idRecu);
    }
    public function selectionnerrecu(){
        global $con;
        return  $con->query('
            SELECT  
              r.IdRecu as IdRecu,
              r.DateElabRecu as DateElabRecu,
              r.MotifRecu as MotifRecu,
             
              c.IdCli as IdCli, 
              c.NomCli as NomCli, 
              c.PostnomCli as PostnomCli, 
              c.PrenomCli as PrenomCli, 
              c.TelCli as TelCli, 
              c.NumParcelCli as NumParcelCli,
              c.GenreCli as GenreCli,
              
              ft.IdFact as IdFact,
              ft.DateElabFact as DateElabFact,             
              
              q.NomQuart as NomQuart,
              v.NomVille as NomVille,
              p.NomProv as NomProv,
              py.NomPays as NomPays
              
            FROM trecu as r
            
            INNER JOIN tfacture as ft 
            ON r.IdFact =ft.IdFact

            INNER JOIN tprescription as pr 
            ON ft.IdFact =pr.IdPrescrip
            
            INNER JOIN tfiche as fc
            ON pr.IdFiche =fc.IdFiche
            INNER JOIN tclient as c 
            ON fc.IdCli =c.IdCli
            INNER JOIN tquartier as q
            ON q.IdQuart =c.IdQuart
            INNER JOIN tville as v
            ON q.IdVille =v.IdVille
            INNER JOIN tprovince as p
            ON v.IdProv =p.IdProv
            INNER JOIN tpays as py
            ON p.IdPays =py.IdPays


            ORDER BY DateElabRecu DESC');
    }
    //Ici nou filtrons par rapport a l'Id de la recu ou le nom du client. 
    public function filtrerrecu($var){
        include('chaine.php');
        
        return $con->query("
          SELECT  
               r.IdRecu as IdRecu,
              r.DateElabRecu as DateElabRecu,
              r.MotifRecu as MotifRecu,
             
              c.IdCli as IdCli, 
              c.NomCli as NomCli, 
              c.PostnomCli as PostnomCli, 
              c.PrenomCli as PrenomCli, 
              c.TelCli as TelCli, 
              c.NumParcelCli as NumParcelCli,
              c.GenreCli as GenreCli,
              
              ft.IdFact as IdFact,
              ft.DateElabFact as DateElabFact,             
              
              q.NomQuart as NomQuart,
              v.NomVille as NomVille,
              p.NomProv as NomProv,
              py.NomPays as NomPays
              
            FROM trecu as r
            
            INNER JOIN tfacture as ft 
            ON r.IdFact =ft.IdFact

            INNER JOIN tprescription as pr 
            ON ft.IdFact =pr.IdPrescrip
            
            INNER JOIN tfiche as fc
            ON pr.IdFiche =fc.IdFiche
            INNER JOIN tclient as c 
            ON fc.IdCli =c.IdCli
            INNER JOIN tquartier as q
            ON q.IdQuart =c.IdQuart
            INNER JOIN tville as v
            ON q.IdVille =v.IdVille
            INNER JOIN tprovince as p
            ON v.IdProv =p.IdProv
            INNER JOIN tpays as py
            ON p.IdPays =py.IdPays 

            WHERE r.IdRecu='".$var."' OR c.NomCli LIKE '%".$var."%'

            ORDER BY DateElabRecu DESC  
         ");
    }
    public function __destuct(){
    }
}


