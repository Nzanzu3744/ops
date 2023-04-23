<?php
include('chaine.php');
class visite {
 

        public static function ajoutervisite($nv,$rem,$fich){
            global $con;
            $req=$con->prepare('INSERT INTO `tregistremal` (`DateEnregMal`, `CasEnregMal`, `RemEnregMal`, `IdFiche`) VALUES (NOW(),?,?,?)');
            if($req->execute(array($nv,$rem,$fich))){
                return 1;
            }else{
                return 0;
            }
    }
    
    public static function selectionnervisite(){
        include('chaine.php');
        return  $con->query('SELECT * FROM
                tregistremal as treg 
                INNER JOIN tsignevit as tsi 
                ON tsi.IdFiche=treg.IdFiche

                INNER JOIN tclient as tcli 
                ON tcli.IdCli=tsi.IdCli
        ORDER BY treg.IdEnregMal DESC');
    }
    public static function Filtrervisite($var){
        include('chaine.php');
        return  $con->query('
            SELECT * FROM
                tregistremal as treg 
                INNER JOIN tsignevit as tsi 
                ON tsi.IdFiche=treg.IdFiche

                INNER JOIN tclient as tcli 
                ON tcli.IdCli=tsi.IdCli
                WHERE IdEnregMal="'.$var.'" OR NomCli like "%'.$var.'%" OR PostnomCli like "%'.$var.'%" OR PrenomCli like "%'.$var.'%"
                OR DateEnregMal like "'.$var.'%"
        ORDER BY treg.IdEnregMal DESC');
    }
}
    