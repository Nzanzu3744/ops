<?php
class contrat{

    private $idContrat;
    private $debContrat;
    private $finContrat;
    private $rompu;
    private $idAgent;


   
    public function __construct(){
        $idContrat="";
        $debContrat="";
        $finContrat="";
        $rompu="";
        $idAgent="";
    }
        public function ajoutercontrat($debContrat,$finContrat,$idAgent,$rompu){
            include('chaine.php');
                $req=$con->exec('INSERT INTO `tcontrat`(`DebContrat`, `FinContrat`, `IdAgent`,`Rompu`)VALUES ("'.$debContrat.'","'.$finContrat.'",'.$idAgent.','.$rompu.')');
            } 
        public function modifierretrait($idRetrait,$montRetrait,$idAgent){
            include('chaine.php');
            $req=$con->prepare('UPDATE `tretrait` SET `DateRetrait`=NOW(),`MontRetrait`=?,`IdAgent`=? WHERE `IdRetrait`=?');
            $req->execute(array($montRetrait,$idAgent,$idRetrait));
        }
    public function supprimerretrait($idRetrait){
        include('chaine.php');
                $con->exec('DELETE FROM `tretrait` WHERE IdRetrait='.$idRetrait);
    }
    public function selectionnercontrat(){
        include('chaine.php');
        return  $con->query('SELECT
                c.IdContrat as IdContrat,
                c.DebContrat as DebContrat,
                c.FinContrat as FinContrat,
                c.Rompu as Rompu,
                a.IdAgent as IdAgent,
                a.NomAgent as NomAgent, 
                a.PostnomAgent as PostnomAgent, 
                a.PrenomAgent as PrenomAgent, 
                a.GenreAgent as GenreAgent, 
                a.DateNaisAgent as DateNaisAgent, 
                a.NNAgent as NNAgent, 
                a.TelAgent as TelAgent
            FROM tcontrat as c 
 
            INNER JOIN tagent as a 
            ON c.IdAgent=a.IdAgent
 
            ORDER by DebContrat Desc
            ');
    }
    public function recherchecontrat($var){
        include('chaine.php');
        return $con->query("
            SELECT 
                c.IdContrat as IdContrat,
                c.DebContrat as DebContrat,
                c.FinContrat as FinContrat,
                c.Rompu as Rompu,
                a.IdAgent as IdAgent,
                a.IdAgent as IdAgent,
                a.NomAgent as NomAgent, 
                a.PostnomAgent as PostnomAgent, 
                a.PrenomAgent as PrenomAgent, 
                a.GenreAgent as GenreAgent, 
                a.DateNaisAgent as DateNaisAgent, 
                a.NNAgent as NNAgent, 
                a.TelAgent as TelAgent
            FROM tcontrat as c 
 
            INNER JOIN tagent as a 
            ON c.IdAgent=a.IdAgent
 
            WHERE a.IdAgent=$var

            ORDER by DebContrat Desc
            ");         
    }
  
     public function sommeretrait($var){
        include('chaine.php');
        return $con->query("
            SELECT 
                SUM(MontRetrait) as Somme 
                FROM `tretrait`
                WHERE IdAgent=$var
            ");
    }
    public function __destuct(){
    }
}


