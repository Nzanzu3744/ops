<?php
include('chaine.php');
class jeton{
    private $_idDevise;
    private  $_nomDevise;

    public function __construct(){
    }
        public static function ajouterjeton($idag,$idpro){
            global $con;
            
            $idjeto=$idag.$idpro;
            $req=$con->prepare('INSERT INTO `tjeton1`(`IdJeton`, `IdProg`, `IdAgent`, `DateJeton`) VALUES (?,?,?,NOW())');
            if($req->execute(array($idjeto,$idpro,$idag))){
                return true;
            }else{
                return false;
            }
        
    }
    
    // public static function modifierdevise($idDevise,$nomDevise){
    //     global $con;
    //     $con->exec('UPDATE `tdevise` SET `NomDevise`="'.$nomDevise.'" WHERE `IdDevise`='.$idDevise);
    // }
    // public static function supprimerdevise($idDevise){
    //     global $con;
    //     $con->exec('DELETE FROM `tdevise` WHERE IdDevise='.$idDevise);
    // }
    public static function selectionnerjeton(){
        global $con;
        return  $con->query('SELECT * FROM tdevise');
    }
    public static function Filterjeton($id){
        global $con;
        return  $con->query('SELECT * FROM tjeton1 WHERE IdJeton='.$id);
    }
    public function __destruct(){
    }
}


