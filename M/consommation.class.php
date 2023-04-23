<?php

include('chaine.php');
include('prescription.class.php');
class consommation extends prescription {

    private $idConso;
    private $QuantConso;
    private $PuConso;
    private $idFact;
    private $idDesigServi;

    public static function ajouterconso($QuantConso,$PuConso,$idPrescript,$idDesigServi)
        {
            global $con;
                if($req=$con->exec('INSERT INTO `tconsommation`(`DateConso`, `QuantConso`, `PuConso`, `IdPrescript`, `IdDesigServi`) VALUES (Now(),'.$QuantConso.','.$PuConso.','.$idPrescript.','.$idDesigServi.')')){
                    return true;
                }else{
                    return false;
                }
        }
//ensemble des consommation
      public static function selectionnerconso(){
        global $con;
        //`DateConso`, `QuantConso`, `PuConso`, `IdPrescript`, `IdDesigServi`
        return $con->query("
            SELECT 
                f.IdFact as IdFact,
                f.DateElabFact as DateElabFact,
                
                d.IdDesigServi as IdDesigServi,
                d.DesigServi as DesigServi,
                
                cs.IdConso as IdConso,
                cs.DateConso as DateConso,
                cs.QuantConso as QuantConso,
                cs.PuConso as PuConso
                
            FROM tconsommation as cs
            INNER JOIN  tfacture as f
            ON cs.IdFact=f.IdFact
            
            INNER JOIN tdesignation as d
            ON cs.IdDesigServi=d.IdDesigServi
            
            ORDER BY cs.IdConso DESC
    ");
    }
   public static function modifierconso($id,$QuantConso,$PuConso,$idFact,$idDesigServi){
            global $con;
        $con->exec('UPDATE `tconsommation` SET `QuantConso`='.$QuantConso.',`PuConso`='.$PuConso.',`IdFact`='.$idFact.',`IdDesigServi`='.$idDesigServi.' WHERE `IdConso`='.$id);
    }
    public static function supprimerconso($id){

           global $con;
        if($con->exec('DELETE FROM `tconsommation` WHERE IdConso='.$id)){
            return true;
        }else{
            return false;
        }
    }

   
    public static function filtrerconso($var){
        global $con;
        return $con->query("
            SELECT 
                
                pre.IdPrescrip as IdPrescrip, 
                pre.Prescrip as Prescrip,
                
                d.IdDesigServi as IdDesigServi,
                d.DesigServi as DesigServi,
                
                cs.IdConso as IdConso,
                cs.DateConso as DateConso,
                cs.QuantConso as QuantConso,
                cs.PuConso as PuConso
                
            FROM tconsommation as cs
            INNER JOIN  tprescription as pre
            ON cs.IdPrescript = pre.IdPrescrip
            
            INNER JOIN tdesignation as d
            ON cs.IdDesigServi=d.IdDesigServi
            WHERE pre.IdPrescrip='".$var."'
            
            ORDER BY cs.IdConso DESC
    ");
    }
    public static function recupConso($var){
        global $con;
        return $con->query("
            SELECT 
          *
            FROM tconsommation as cs
            
            INNER JOIN tdesignation as d
            ON cs.IdDesigServi=d.IdDesigServi
            
            LEFT JOIN tprescription as pr 
            ON cs.IdPrescript=pr.IdPrescrip
            
            LEFT JOIN tsignevit as fc
            ON  pr.IdFiche=fc.IdFiche
            
            LEFT JOIN tclient as c
            ON  c.IdCli =fc.IdCli
            
            WHERE cs.IdConso='".$var."'
            
            ORDER BY cs.IdConso DESC
    ");
    }
    public function __destuct(){
    }
}


//