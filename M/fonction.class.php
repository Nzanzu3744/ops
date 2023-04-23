<?php
class fonction{
    private $id;
    private $fonction;
   
    public function __construct(){
        $id="";
        $fonction="";
    }
        public static function ajouterfonct($fonction){
            include('chaine.php');
            $req=$con->prepare('INSERT INTO `tfonction`(`NomFonct`) VALUES (?)');
            if($req->execute(array($fonction))){
                return true;
            }else{
                return false;
            }
    }
    
    public static function modifierfonct($id,$fonct){
        include('chaine.php');
        $con->exec('UPDATE `tfonction` SET`NomFonct`="'.$fonct.'" WHERE IdFonct='.$id);
    }
    public static function supprimerfonct($id){
        include('chaine.php');
        $con->exec('DELETE FROM `tfonction` WHERE IdFonct='.$id);
    }
   
    public static function selectionnerfonct(){
        include('chaine.php');
        return $con->query("SELECT * FROM tfonction ORDER BY IdFonct ASC");
    }
     public static function recherchefonct($var){
        include('chaine.php');
        return $con->query("SELECT * 
        FROM tfonction  
        
        WHERE IdFonct LIKE '%".$var."%' OR NomFonct LIKE '%".$var."%'
        
        ORDER BY IdFonct ASC
       ");
        
    }
    public function __destuct(){
    }
}


