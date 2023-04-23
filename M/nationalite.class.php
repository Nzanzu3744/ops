<?php
class nationalite{
    private $id;
    private $nationalite;
   
    public function __construct(){
        $id="";
        $nationalite="";
    }
        public static function ajouternation($nationalite){
            include('chaine.php');
            $req=$con->prepare('INSERT INTO `tnationalite`(`NomNation`) VALUES (?)');
            $req->execute(array($nationalite));
    }
    
    public static function modifiernation($id,$nationalite){
        include('chaine.php');
        $con->exec('UPDATE `tnationalite` SET`NomNation`="'.$nationalite.'" WHERE IdNation='.$id);
    }
    public static function supprimernation($id){
        include('chaine.php');
        $con->exec('DELETE FROM `tnationalite` WHERE IdNation='.$id);
    }
   
    public static function selectionnernation(){
        include('chaine.php');
        return $con->query("SELECT * FROM tnationalite ORDER BY IdNation ASC");
    }
     public static function recherchenation($var){
        include('chaine.php');
        return $con->query("SELECT * 
        FROM tnationalite  
        
        WHERE IdNation LIKE '%".$var."%' OR NomNation LIKE '%".$var."%'
        
        ORDER BY IdNation ASC
       ");
        
    }
    public function __destuct(){
    }
}


