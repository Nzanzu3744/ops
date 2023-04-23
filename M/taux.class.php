<?php
include('chaine.php');
class taux {
    private $id;
    private $pays;

    public function __construct(){
    }
        public static function ajoutertaux($taux){
            global $con;
            $req=$con->prepare('INSERT INTO `ttaux`(`Taux`) VALUES (?)');
            if($req->execute(array($taux))){
                return true;
            }else{
                return false;
            }
    }

    public static function selectionner_d_taux(){
        global $con;
        return $con->query("SELECT * FROM `ttaux` ORDER BY IdTaux DESC");
    }
    public static function recherchetaux($var){
        global $con;
        return $con->query("SELECT * FROM ttaux WHERE IdTaux='".$var."'");
    }
     public static function supprimetaux($var){
        global $con;
        return $con->exec('DELETE FROM ttaux WHERE IdTaux='.$var);
    }
    public function __destruct(){
    }
}


