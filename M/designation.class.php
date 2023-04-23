<?php
class designation{
    private $idDesigServi;
    private  $DesigServi;

    public function __construct(){
        $idDesigServi="";
        $DesigServi="";
    }
        public static function ajouterdesignation($desig){
            include('chaine.php');
            $req=$con->prepare('INSERT INTO `tdesignation`(DesigServi) VALUES (?)');
            $req->execute(array($desig));
    }
    
    public static function modifierdesig($idDesigServi,$DesigServi){
        include('chaine.php');
        $con->exec('UPDATE `tdesignation` SET `DesigServi`="'.$DesigServi.'" WHERE `IdDesigServi`='.$idDesigServi);
    }
    public static function supprimerdesig($idDesigServi){
        include('chaine.php');
        $con->exec('DELETE FROM `tdesignation` WHERE IdDesigServi='.$idDesigServi);
    }
    public static function selectionnerdesign(){
        include('chaine.php');
        return  $con->query('SELECT * FROM tdesignation ORDER BY IdDesigServi ASC');
    }
    public function __destruct(){
    }
}


