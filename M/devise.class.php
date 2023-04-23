<?php
include('chaine.php');
class devise{
    private $_idDevise;
    private  $_nomDevise;

    public function __construct(){
    }
        public function ajouterdevise($idDevise){
            global $con;
            $req=$con->prepare('INSERT INTO `tdevise`(NomDevise) VALUES (?)');
            $req->execute(array($idDevise));
    }
    
    public static function modifierdevise($idDevise,$nomDevise){
        global $con;
        $con->exec('UPDATE `tdevise` SET `NomDevise`="'.$nomDevise.'" WHERE `IdDevise`='.$idDevise);
    }
    public static function supprimerdevise($idDevise){
        global $con;
        $con->exec('DELETE FROM `tdevise` WHERE IdDevise='.$idDevise);
    }
    public static function selectionnerdevise(){
        global $con;
        return  $con->query('SELECT * FROM tdevise');
    }
    public function __destruct(){
    }
}


