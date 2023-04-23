<?php
include('client.class.php');
class fiche extends client{

    public function __construct(){
            $idFiche="";
            $tempFiche="";
            $respFiche="";
            $pulsFiche="";
            $poidFiche="";
            $taFiche="";
            $anamFiche="";
            $idCli="";
    }
        public static function ajouterfiche($tempFiche,$respFiche,$pulsFiche,$poidFiche,$taFiche,$anamFiche,$idCli){
            include('chaine.php');
            $req=$con->prepare('INSERT INTO `tsignevit`(`DateElabFiche`,`TempFiche`, `RespFiche`, `PulsFiche`, `PoidFiche`, `TaFiche`, `AnamFiche`, `IdCli`) VALUES (NOW(),?,?,?,?,?,?,?)');
            if($req->execute(array($tempFiche,$respFiche,$pulsFiche,$poidFiche,$taFiche,$anamFiche,$idCli))){
                return true;
            }else{
                return false;
            }
    }
    
    public static function modifierfiche($IdFiche,$TempFiche,$RespFiche,$PulsFiche,$PoidFiche,$TaFiche,$AnamFiche){
        include('chaine.php');
        if($con->exec('UPDATE `tsignevit` SET `TempFiche`="'.$TempFiche.'",`RespFiche`="'.$RespFiche.'",`PulsFiche`="'.$PulsFiche.'",`PoidFiche`="'.$PoidFiche.'",`TaFiche`="'.$TaFiche.'",`AnamFiche`="<p>'.$AnamFiche.'</p>" WHERE `IdFiche`='.$IdFiche )){
            return true;
        }else{
            return false;
        }
    }
    public static function supprimerfiche($idFiche){
        include('chaine.php');
        if($con->exec('DELETE FROM `tsignevit` WHERE IdFiche='.$idFiche))
        {
            return true;
        }else{
            return false;
        }
    }
    public static function selectionnerfiche(){
        include('chaine.php');
        return  $con->query('
        SELECT 
            f.IdFiche as IdFiche,
            f.DateElabFiche as DateElabFiche,
            f.TempFiche as TempFiche,
            f.RespFiche as RespFiche,
            f.PulsFiche as PulsFiche,
            f.PoidFiche as PoidFiche,
            f.TaFiche as TaFiche,
            f.AnamFiche as AnamFiche,
            f.IdCli as IdCli,
            c.NomCli as NomCli,
            c.PostnomCli as PostnomCli
            
         FROM `tsignevit` as f 
         
         INNER JOIN tclient as c 
         ON f.IdCli =c.IdCli 
         
         ORDER BY DateElabFiche DESC');
    }
    public static function rechercherfiche($var){
        include('chaine.php');
        return $con->query('
            SELECT 
                f.IdFiche as IdFiche, 
                f.DateElabFiche as DateElabFiche, 
                f.TempFiche as TempFiche, 
                f.RespFiche as RespFiche, 
                f.PulsFiche as PulsFiche, 
                f.PoidFiche as PoidFiche, 
                f.TaFiche as TaFiche,
                f.AnamFiche as AnamFiche, 
                c.IdCli as IdCli, 
                c.NomCli as NomCli, 
                c.PostnomCli as PostnomCli 
            FROM `tsignevit` as f 
            INNER JOIN tclient as c 
            ON f.IdCli=c.IdCli

            WHERE f.IdCli="'.$var.'" OR c.NomCli LIKE "%'.$var.'%" 

            ORDER BY DateElabFiche DESC
         ');
    }
    
    public static function filtrerfiche($fic,$cli){
        include('chaine.php');
        return $con->query('
            SELECT 
                f.IdFiche as IdFiche, 
                f.DateElabFiche as DateElabFiche, 
                f.TempFiche as TempFiche, 
                f.RespFiche as RespFiche, 
                f.PulsFiche as PulsFiche, 
                f.PoidFiche as PoidFiche, 
                f.TaFiche as TaFiche,
                f.AnamFiche as AnamFiche, 
                c.IdCli as IdCli, 
                c.NomCli as NomCli, 
                c.PostnomCli as PostnomCli, 
                c.PrenomCli as PrenomCli,
                c.TelCli as TelCli,

                q.NomQuart as NomQuart,
               
                vl.NomVille as NomVille,
               
                pr.NomProv as NomProv,
               
                py.NomPays as NomPays               
               
            FROM `tsignevit` as f 
            INNER JOIN tclient as c 
            ON f.IdCli=c.IdCli
            INNER JOIN tquartier as q
            ON q.IdQuart =c.IdQuart
            INNER JOIN tville as vl
            ON q.IdVille =vl.IdVille
            INNER JOIN tprovince as pr
            ON vl.IdProv =pr.IdProv
            INNER JOIN tpays as py
            ON pr.IdPays =py.IdPays
            
            INNER JOIN tnationalite as n
            ON c.IdNation= n.IdNation

            WHERE f.IdFiche="'.$fic.'" AND c.IdCli="'.$cli.'"

            ORDER BY DateElabFiche DESC
         ');
    }
    //Affichage de prescription de la fiche sur ajouterprescription
    public static function filtrerfiche2($fic){
        include('chaine.php');
        return $con->query('
            SELECT 
                f.IdFiche as IdFiche, 
                f.DateElabFiche as DateElabFiche, 
                f.TempFiche as TempFiche, 
                f.RespFiche as RespFiche, 
                f.PulsFiche as PulsFiche, 
                f.PoidFiche as PoidFiche, 
                f.TaFiche as TaFiche,
                f.AnamFiche as AnamFiche, 
                c.IdCli as IdCli, 
                c.NomCli as NomCli, 
                c.PostnomCli as PostnomCli, 
                c.PrenomCli as PrenomCli,
                c.TelCli as TelCli,

                q.NomQuart as NomQuart,
               
                vl.NomVille as NomVille,
               
                pr.NomProv as NomProv,
               
                py.NomPays as NomPays               
               
            FROM `tsignevit` as f 
            INNER JOIN tclient as c 
            ON f.IdCli=c.IdCli
            INNER JOIN tquartier as q
            ON q.IdQuart =c.IdQuart
            INNER JOIN tville as vl
            ON q.IdVille =vl.IdVille
            INNER JOIN tprovince as pr
            ON vl.IdProv =pr.IdProv
            INNER JOIN tpays as py
            ON pr.IdPays =py.IdPays
            
            INNER JOIN tnationalite as n
            ON c.IdNation= n.IdNation

            WHERE f.IdFiche="'.$fic.'"

            ORDER BY DateElabFiche DESC
         ');
    }
    public function __destuct(){
    }
}


