<?php
include('chaine.php');
class retrait{

    private $idRetrait;
    private $dateRetrait;
    private $montRetrait;
    private $idAgent;

   
    public function __construct(){
        $idRetrait="";
        $dateRetrait="Naw";
        $montRetrait="";
        $idAgent="";
    }
        public function ajouterretrait($montRetrait,$idAgent){
            global $con;
                if($con->exec('INSERT INTO `tretrait`(`DateRetrait`, `MontRetrait`, `IdAgent`) VALUES (NOW(),'.$montRetrait.','.$idAgent.')')){
                    return true;
                }else{
                    return false;
                }
            } 
        public static function modifierretrait($idRetrait,$montRetrait,$idAgent){
            include('chaine.php');
            $req=$con->prepare('UPDATE `tretrait` SET `DateRetrait`=NOW(),`MontRetrait`=?,`IdAgent`=? WHERE `IdRetrait`=?');
            $req->execute(array($montRetrait,$idAgent,$idRetrait));
        }
    public static function supprimerretrait($idRetrait){
        include('chaine.php');
                $con->exec('DELETE FROM `tretrait` WHERE IdRetrait='.$idRetrait);
    }
    public static function selectionnerretrait(){
        include('chaine.php');
        return  $con->query('SELECT 
                r.IdRetrait as IdRetrait,
                r.MontRetrait as MontRetrait,
                
                r.DateRetrait as DateRetrait,
                a.IdAgent as IdAgent,
                a.NomAgent as NomAgent, 
                a.PostnomAgent as PostnomAgent, 
                a.PrenomAgent as PrenomAgent, 
                a.GenreAgent as GenreAgent, 
                a.DateNaisAgent as DateNaisAgent, 
                a.NNAgent as NNAgent, 
                a.TelAgent as TelAgent
            FROM tretrait as r 
 
            INNER JOIN tagent as a 
            ON r.IdAgent=a.IdAgent
 
            ORDER by DateRetrait Desc');
    }
    public static function rechercheretrait($var){
        include('chaine.php');
        return $con->query("
            SELECT 
                r.IdRetrait as IdRetrait,
                r.MontRetrait as MontRetrait,
                r.DateRetrait as DateRetrait,
                a.IdAgent as IdAgent,
                a.NomAgent as NomAgent, 
                a.PostnomAgent as PostnomAgent, 
                a.PrenomAgent as PrenomAgent, 
                a.GenreAgent as GenreAgent, 
                a.DateNaisAgent as DateNaisAgent, 
                a.NNAgent as NNAgent, 
                a.TelAgent as TelAgent
            FROM tretrait as r 
 
            INNER JOIN tagent as a 
            ON r.IdAgent=a.IdAgent
 
            WHERE a.IdAgent=$var

            ORDER by DateRetrait Desc");         
    }
    
    //  public function sommeretrait($var){
    //     include('chaine.php');
    //     return $con->query("
    //         SELECT 
    //             SUM(MontRetrait) as Somme 
    //             FROM `tretrait`
    //             WHERE IdAgent=$var
    //         ");
    // }
     
 public static function agentauprog($idprog){
        include('chaine.php');
        return $con->query("SELECT * FROM `tagent` as tag 
                INNER JOIN tjeton1 as tjet 
                ON tjet.IdAgent=tag.IdAgent
                LEFT JOIN tprogramme as tpro 
                ON tpro.IdProg=tjet.IdProg

                WHERE tpro.IdProg='".$idprog."'

                GROUP BY tag.IdAgent");
    }
   public static function clientProg($var){
        global $con;
        return $con->query('
            SELECT * FROM tclient as tcli 
             INNER JOIN tquartier as q
            ON q.IdQuart =tcli.IdQuart
            INNER JOIN tville as vl
            ON q.IdVille =vl.IdVille
            INNER JOIN tprovince as pr
            ON vl.IdProv =pr.IdProv
            INNER JOIN tpays as py
            ON pr.IdPays =py.IdPays     
            LEFT JOIN tjeton1 as tjet 
            ON tjet.IdJeton=tcli.IdJeton

            LEFT JOIN tprogramme as tpro
            ON tpro.IdProg=tjet.IdProg



            WHERE tjet.IdJeton IS not null AND tpro.IdProg="'.$var.'"

            GROUP by tcli.IdCli'
        );
    }
    public static function rendement($var){
        global $con;
        return $con->query('
                        SELECT 
            tjet.IdJeton as IdJeton,
            tcli.IdCli as IdCli, 
            tcli.NomCli as NomCli, 
            tcli.PostnomCli as PostnomCli, 
            tcli.PrenomCli as PrenomCli, 
            tpre.IdPrescrip as IdPrescrip,  
            tpay.DatePay as DatePay,
            tpay.Montat as Montat,
            
            ttau.Taux as Taux,
           
            tdev.NomDevise as NomDevise,
            
            (Montat/Taux) as Total
            FROM tclient as tcli 
            INNER JOIN tquartier as q
            ON q.IdQuart =tcli.IdQuart
            INNER JOIN tville as vl
            ON q.IdVille =vl.IdVille
            INNER JOIN tprovince as pr
            ON vl.IdProv =pr.IdProv
            INNER JOIN tpays as py
            ON pr.IdPays =py.IdPays     
            LEFT JOIN tjeton1 as tjet 
            ON tjet.IdJeton=tcli.IdJeton

            LEFT JOIN tprogramme as tpro
            ON tpro.IdProg=tjet.IdProg

            INNER join tsignevit as tsig
            on tsig.IdCli=tcli.IdCli
            
            INNER join tprescription as tpre
            on tpre.IdFiche=tsig.IdFiche
            
            INNER join tconsommation as tcos
            ON tcos.IdPrescript=tpre.IdPrescrip

            INNER join tpayement as tpay
            on tpay.IdConso=tcos.IdConso

            INNER JOIN ttaux as ttau 
            ON tpay.IdTaux=ttau.IdTaux
            
            INNER JOIN tdevise as tdev 
            ON tpay.IdDevise=tdev.IdDevise

            WHERE tjet.IdJeton IS not null AND tcli.IdCli="'.$var.'"

            ORDER by Total ASC
            ');
    }
    public function __destuct(){
    }
}


