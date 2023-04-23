<?php
include('chaine.php');

include('nationalite.class.php');
class client {
   private $id;
   private $NomCli;
   private $PostnomCli;
   private $PrenomCli;
   private $PhotoCli;
   private $IdJeton;
   private $GenreCli;
   private $NumParcelCli;
   private $DateNaisCli ;
   private $TelCli  ;
   private $IdNation    ;
   private $IdQuart;
   private $ActifCli   ;
   private $AccesCli  ;
   private $MotCleCli;

    public function __construct(){
       
    }
        public static function ajouterclient($NomCli,$PostnomCli,$PrenomCli,$GenreCli,$NumParcelCli,$DateNaisCli,$TelCli,$PhotoCli,$IdJeton,$IdNation,$IdQuart,$ActifCli,$AccesCli,$MotCleCli)
        {
                global $con;
                $req=$con->prepare('INSERT INTO `tclient`(`NomCli`, `PostnomCli`, `PrenomCli`, `GenreCli`, `NumParcelCli`, `DateNaisCli`, `TelCli`, `PhotoCli`, `IdJeton`, `IdNation`, `IdQuart`, `ActifCli`, `AccesCli`, `MotCleCli`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
                if($req->execute(array($NomCli,$PostnomCli,$PrenomCli,$GenreCli,$NumParcelCli,$DateNaisCli,$TelCli,$PhotoCli,$IdJeton,$IdNation,$IdQuart,$ActifCli,$AccesCli,$MotCleCli))){
                    return true;
                }else{
                    return false;
                }
        }
    
    public static function modifierclient($id,$NomCli,$PostnomCli,$PrenomCli,$GenreCli,$NumParcelCli,$DateNaisCli,$TelCli,$PhotoCli,$IdJeton,$IdNation,$IdQuart)
    {
            global $con;
            if($con->exec('UPDATE `tclient` SET `NomCli`="'.$NomCli.'",`PostnomCli`="'.$PostnomCli.'",`PrenomCli`="'.$PrenomCli.'",`GenreCli`="'.$GenreCli.'",`NumParcelCli`="'.$NumParcelCli.'",`DateNaisCli`="'.$DateNaisCli.'",`TelCli`="'.$TelCli.'",`PhotoCli`="'.$PhotoCli.'",`IdJeton`="'.$IdJeton.'",`IdNation`="'.$IdNation.'",`IdQuart`="'.$IdQuart.'" WHERE IdCli='.$id)){
                return 1;
            }else{
                return 1;
            }
    }
    public function modifieretat($id)
    {
        include('chaine.php');
        self::$id=$id;
        $etat=null;
        $con-exec('SELECT ActifCli FROM tclient');
        if($data=$con->fetch()){
            $etat=$data['ActifCli'];
        }
        if($etat==0){
            $con->exec('UPDATE `tagent`SET`ActifCli`=1 WHERE `IdCli`='.$id);
        }else{
            $con->exec('UPDATE `tagent`SET`ActifCli`=0 WHERE `IdCli`='.$id);
        } 
    }
    public static function supprimerclient($id){
            global $con;
            if($con->exec('DELETE FROM `tclient` WHERE IdCli='.$id)){
                return true;
            }
            else{
                return false;
            }
    }
    public static function selectionnerclient(){
        global $con;
        return  $con->query('SELECT
            c.IdCli as IdCli,
            c.NomCli as NomCli,
            c.PostnomCli as PostnomCli,
            c.PrenomCli as PrenomCli,
            c.GenreCli as GenreCli,
            c.NumParcelCli as NumParcelCli,
            c.DateNaisCli as DateNaisCli,
            c.TelCli as TelCli,
            c.PhotoCli as PhotoCli,
            c.IdJeton as IdJeton,
            c.IdNation as IdNation,
            c.IdQuart as IdQuart,
            c.ActifCli as ActifCli,
            c.AccesCli as AccesCli,
            c.MotCleCli as MotCleCli,
            
            q.IdQuart as IdQuart,
            q.NomQuart as NomQuart,
           vl.IdVille as IdVille,
            vl.NomVille as NomVille,
            pr.IdProv as IdProv,
            pr.NomProv as NomProv,
            py.IdPays as IdPays,
            py.NomPays as NomPays,
            
            n.IdNation as  IdNation,
            n.NomNation as NomNation
        
        
        FROM tclient as c
        
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
        
        ORDER BY IdCli DESC
        ');
    }
    public static function rechercheclient($var)
    {
        global $con;
        return $con->query("SELECT 
		
            c.IdCli as IdCli,
            c.NomCli as NomCli,
            c.PostnomCli as PostnomCli,
            c.PrenomCli as PrenomCli,
            c.GenreCli as GenreCli,
            c.NumParcelCli as NumParcelCli,
            c.DateNaisCli as DateNaisCli,
            c.TelCli as TelCli,
            c.IdNation as IdNation,
            c.IdJeton as IdJeton,
            c.IdQuart as IdQuart,
            c.ActifCli as ActifCli,
            c.AccesCli as AccesCli,
            c.MotCleCli as MotCleCli,
            
            q.IdQuart as IdQuart,
            q.NomQuart as NomQuart,
           vl.IdVille as IdVille,
            vl.NomVille as NomVille,
            pr.IdProv as IdProv,
            pr.NomProv as NomProv,
            py.IdPays as IdPays,
            py.NomPays as NomPays,
            
            n.IdNation as  IdNation,
            n.NomNation as NomNation
        
        
        FROM tclient as c
        
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
        
        WHERE c.IdCli='".$var."' OR c.NomCli LIKE '%".$var."%' OR c.PostnomCli LIKE '%".$var."%' OR c.PrenomCli LIKE '%".$var."%'
        ORDER BY NomCli ASC
        
       ");
    }
    public function __destuct(){
    }
}


