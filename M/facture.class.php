<?php

class facture{
 
    private $idFact;
    private $dateElabFact;
    private $idPrescrip;

    public function __construct(){
        $idFact="";
        $dateElabFact="";
        $idPrescrip="";
    }
        public static function ajouterfacture($idPrescrip){
            include('chaine.php');
            $req=$con->prepare('INSERT INTO `tfacture`(`DateElabFact`, `IdPrescrip`)VALUES (NOW(),?)');
            $req->execute(array($idPrescrip));
    }
    
    public static function modifierfacture($idFact,$idPrescrip){
        include('chaine.php');
        $con->exec('UPDATE tfacture SET IdPrescrip='.$idPrescrip.' WHERE IdFact='.$idFact);
    }
    public static function supprimerfacture($idFact){
        include('chaine.php');
        if($con->exec('DELETE FROM `tfacture` WHERE `IdFact`='.$idFact)){
          return true;
        }else{
          return false;
        }
    }
    public static function selectionnerfacture(){
        include('chaine.php');
        return  $con->query('
            SELECT 
              ft.IdFact as IdFact,
              ft.DateElabFact as DateElabFact,
              c.IdCli as IdCli, 
              c.NomCli as NomCli, 
              c.PostnomCli as PostnomCli, 
              c.PrenomCli as PrenomCli, 
              f.IdFiche as IdFiche, 
              f.DateElabFiche as DateElabFiche,
              pr.IdPrescrip as IdPrescrip, 
              pr.Prescrip as Prescrip 
            FROM tfacture as ft
            
            INNER JOIN tprescription as pr 
            ON pr.IdPrescrip =ft.IdPrescrip 
            
            INNER JOIN tfiche as f 
            ON pr.IdFiche =f.IdFiche 

            INNER JOIN tclient as c 
            ON f.IdCli =c.IdCli 


            ORDER BY DateElabFact DESC');
    }
     //Ici nou filtrons par rapport des Id de la dela prescription. 
    public static function recFacturePrescr($var){
        include('chaine.php');
        return $con->query("
            SELECT 
              ft.IdFact as IdFact, 
              ft.DateElabFact as DateElabFact, 
              pr.IdPrescrip as IdPrescrip, 
              pr.Prescrip as Prescrip 
            FROM tfacture as ft 
            LEFT JOIN tprescription as pr 
            ON pr.IdPrescrip =ft.IdPrescrip

            WHERE pr.IdPrescrip='".$var."' 
            ORDER BY DateElabFact DESC  
         ");
    }
    //Ici nou filtrons par rapport des Id de la facture ou le nom du client. 
    public static function filtrerfacture($var){
        include('chaine.php');
        return $con->query("
            SELECT 
              ft.IdFact as IdFact, 
              ft.DateElabFact as DateElabFact, 
              c.IdCli as IdCli, 
              c.NomCli as NomCli, 
              c.PostnomCli as PostnomCli, 
              c.PrenomCli as PrenomCli, 
              f.IdFiche as IdFiche, 
              f.DateElabFiche as DateElabFiche, 
              pr.IdPrescrip as IdPrescrip, 
              pr.Prescrip as Prescrip 
            FROM tfacture as ft 
            INNER JOIN tprescription as pr 
            ON pr.IdPrescrip =ft.IdPrescrip 
            INNER JOIN tfiche as f 
            ON pr.IdFiche =f.IdFiche 
            INNER JOIN tclient as c 
            ON f.IdCli =c.IdCli 

            WHERE ft.IdFact='".$var."' OR c.NomCli like '%".$var."%' OR c.PostnomCli like '%".$var."%' OR c.PrenomCli like '%".$var."%' 
            ORDER BY DateElabFact DESC  
         ");
      }
        //Ici nou filtrons par rapport l'un d' Id de la consommationou  de la facture. 
    public static function filtrerfacturecons($var){
        include('chaine.php');
        return $con->query("
            SELECT 
              ft.IdFact as IdFact, 
              con.IdConso as IdConso
            FROM tfacture as ft 
            LEFT JOIN tconsommation as con 
            ON con.IdFact =ft.IdFact 
            WHERE con.IdConso='".$var."'"
           );
    }
    public function __destuct(){
    }
}


