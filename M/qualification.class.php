<?php
class qualification{
    private $id;
    private $qualification;
   
    public function __construct(){
        $id="";
        $qualification="";
    }
        public function ajouterqualif($qualification){
            include('chaine.php');
            $req=$con->prepare('INSERT INTO `tqualification`(`Qualif`) VALUES (?)');
            $req->execute(array($qualification));
    }
    
    public function modifierfonct($id,$qualification){
        include('chaine.php');
        $con->exec('UPDATE `tqualification` SET`Qualif`="'.$qualification.'" WHERE IdQualif='.$id);
    }
    public function supprimerqualif($id){
        include('chaine.php');
        $con->exec('DELETE FROM `tqualification` WHERE IdQualif='.$id);
    }
   
    public function selectionnerqualif(){
        include('chaine.php');
        return $con->query("SELECT * FROM tqualification ORDER BY IdQualif ASC");
    }
     public function recherchequalif($var){
        include('chaine.php');
        return $con->query("SELECT * 
        FROM tqualification  
        
        WHERE IdQualif LIKE '%".$var."%' OR Qualif LIKE '%".$var."%'
        
        ORDER BY IdQualif ASC
       ");
        
    }
    public function __destuct(){
    }
}


