<?php

class registrejeton{
   private $idJetonEnreg;
   private $idCli;
   private $numJeto;

    public function __construct(){
    }
        public static function enregistrerjeton($idCli,$IdAgent){
            include('chaine.php');
            //IdJetonEnreg  IdCli   IdAgent DateEnreg

            if($req=$con->query('INSERT INTO `tregistrejeton`(`IdCli`,`IdAgent`,`DateEnreg`) VALUES ("'.$idCli.'","'.$IdAgent.'",NOW())')){
                return true;
            }else{
                return false;
            }
    }
    
    public static function modifierenregjeton($id,$idCli,$idAgent){
        include('chaine.php');
        $con->exec('UPDATE tregistrejeton SET IdCli='.$idCli.',NumJeto='.$idAgent.' WHERE IdJetonEnreg='.$id);
    }
    public static function supprimerenregjeton($id){
        include('chaine.php');
        if($con->exec('DELETE FROM tregistrejeton WHERE IdJetonEnreg='.$id)){
            return true;
        }else{
            return false;
        }
    }
    public static function selectionnerenregjeton(){
        include('chaine.php');
        return  $con->query('
       SELECT 
            r.IdJetonEnreg as IdJetonEnreg,
            r.DateEnreg as DateEnreg,
            a.IdAgent as IdAgent,
            a.NomAgent as NomAgent,
            a.PostnomAgent as PostnomAgent,
            a.PrenomAgent as PrenomAgent,
            a.GenreAgent as GenreAgent,
            c.IdCli as IdCli,
            c.NomCli as NomCli,
            c.PostnomCli as PostnomCli,
            c.PrenomCli as PrenomCli,
            c.GenreCli as GenreCli
         FROM `tregistrejeton` as r 
         INNER JOIN tclient as c 
         ON r.IdCli =c.IdCli 
         INNER JOIN tagent as a 
         ON r.IdAgent =a.IdAgent 
         ORDER BY IdJetonEnreg DESC');
    }

    public static function rechercheenregjeton($var){
        include('chaine.php');
        return $con->query(" SELECT 
            r.IdJetonEnreg as IdJetonEnreg,
            r.DateEnreg as DateEnreg,
            a.IdAgent as IdAgent,
            a.NomAgent as NomAgent,
            a.PostnomAgent as PostnomAgent,
            a.PrenomAgent as PrenomAgent,
            a.GenreAgent as GenreAgent,
            c.IdCli as IdCli,
            c.NomCli as NomCli,
            c.PostnomCli as PostnomCli,
            c.PrenomCli as PrenomCli,
            c.GenreCli as GenreCli
         FROM `tregistrejeton` as r 
         INNER JOIN tclient as c 
         ON r.IdCli =c.IdCli 
         INNER JOIN tagent as a 
         ON r.IdAgent =a.IdAgent 
        
         WHERE a.IdAgent ='".$var."' OR a.NomAgent LIKE '%".$var."%' OR a.PostnomAgent LIKE '%".$var."%' OR a.PrenomAgent LIKE '%".$var."%'
         ORDER BY IdJetonEnreg DESC
         ");
    }
    public static function RechReg($var){
        include('chaine.php');
        return $con->query(" SELECT 
            r.IdJetonEnreg as IdJetonEnreg,
            r.DateEnreg as DateEnreg,
            a.IdAgent as IdAgent,
            a.NomAgent as NomAgent,
            a.PostnomAgent as PostnomAgent,
            a.PrenomAgent as PrenomAgent,
            a.GenreAgent as GenreAgent,
            c.IdCli as IdCli,
            c.NomCli as NomCli,
            c.PostnomCli as PostnomCli,
            c.PrenomCli as PrenomCli,
            c.GenreCli as GenreCli
         FROM `tregistrejeton` as r 
         INNER JOIN tclient as c 
         ON r.IdCli =c.IdCli 
         INNER JOIN tagent as a 
         ON r.IdAgent =a.IdAgent 
        
         WHERE r.IdCli ='".$var."'");
    }
    
    public function __destuct(){
    }
}


