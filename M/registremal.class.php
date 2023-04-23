<?php

class registremal{
   private $idEnregMal;
   private $dateEnregMal;
   private $casEnregMal;
   private $remEnregMal;
   private $idFiche;
    public function __construct(){
        $idEnregMal="";
        $dateEnregMal="";
        $casEnregMal="";
        $remEnregMal="";
        $idFiche="";
    }
        public function enregistremal($casEnregMal,$remEnregMal,$idFiche){
            include('chaine.php');
            $req=$con->prepare('INSERT INTO `tregistremal`(`DateEnregMal`, `CasEnregMal`, `RemEnregMal`, `IdFiche`) VALUES (NOW(),?,?,?)');
            $req->execute(array($casEnregMal,$remEnregMal,$idFiche));
    }
    
    public function modifiermal($id,$casEnregMal,$remEnregMal,$idFiche){
        include('chaine.php');
        $con->exec('UPDATE `tregistremal` SET `CasEnregMal`='.$casEnregMal.',`RemEnregMal`="'.$remEnregMal.'",`IdFiche`='.$idFiche.' WHERE IdEnregMal='.$id);
    }
    public function supprimerenregmal($id){
        include('chaine.php');
        $con->exec('DELETE FROM `tregistremal` WHERE IdEnregMal='.$id);
    }
    public function selectionnerenregmal(){
        include('chaine.php');
        return  $con->query('
            SELECT 
            c.IdCli as IdCli,
            c.NomCli as NomCli,
            c.PostnomCli as PostnomCli,
            c.PrenomCli as PrenomCli,
            
            f.IdFiche as IdFiche,
            
            rm.IdEnregMal as IdEnregMal,
            rm.DateEnregMal as DateEnregMal,
            rm.casEnregMal as CasEnregMal,
            rm.RemEnregMal as RemEnregMal
            
         FROM tregistremal as rm 
         
         INNER JOIN tfiche as f 
         ON rm.IdFiche =f.IdFiche 
         
         INNER JOIN tclient as c 
         ON f.IdCli =c.IdCli
         
        
         ORDER BY DateEnregMal DESC');
    }
    public function filtrerenregmal($date1,$date2){
        include('chaine.php');
        return $con->query("
                              SELECT 
                   c.IdCli as IdCli, 
                   c.NomCli as NomCli, 
                   c.PostnomCli as PostnomCli, 
                   c.PrenomCli as PrenomCli, 
                   f.IdFiche as IdFiche, 
                   rm.IdEnregMal as IdEnregMal, 
                   rm.DateEnregMal as DateEnregMal, 
                   rm.casEnregMal as CasEnregMal, 
                   rm.RemEnregMal as RemEnregMal 
                FROM tregistremal as rm 
                INNER JOIN tfiche as f 
                ON rm.IdFiche =f.IdFiche 
                INNER JOIN tclient as c 
                ON f.IdCli =c.IdCli 
                WHERE DateEnregMal 
                BETWEEN '".$date1."' AND DATE_ADD('".$date2."', INTERVAL 1 DAY) 
                ORDER BY DateEnregMal DESC  
         ");
    }
    //Filtre par rapport au matricul de du client
    public function filtrerenregmal2($var){
        include('chaine.php');
        return $con->query("
                              SELECT 
                   c.IdCli as IdCli, 
                   c.NomCli as NomCli, 
                   c.PostnomCli as PostnomCli, 
                   c.PrenomCli as PrenomCli, 
                   f.IdFiche as IdFiche, 
                   rm.IdEnregMal as IdEnregMal, 
                   rm.DateEnregMal as DateEnregMal, 
                   rm.casEnregMal as CasEnregMal, 
                   rm.RemEnregMal as RemEnregMal 
                FROM tregistremal as rm 
                INNER JOIN tfiche as f 
                ON rm.IdFiche =f.IdFiche 
                INNER JOIN tclient as c 
                ON f.IdCli =c.IdCli 
                WHERE c.IdCli='".$var."' 
                 
                ORDER BY DateEnregMal DESC  
         ");
    }
    public function __destuct(){
    }
}


