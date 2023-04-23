<?php
include('pays.class.php');
class province extends pays{
    private $id;
    private $province;
    private $idpays;
    public function __construct(){
        $id="";
        $province="";
    }
        public function ajouterprov($province,$idpays){
            include('chaine.php');
            $req=$con->prepare('INSERT INTO tprovince(NomProv,IdPays) VALUES (?,?)');
            $req->execute(array($province,$idpays));
    }
    
    public function modifierprov($id,$province,$idpays){
        include('chaine.php');
        $con->exec('UPDATE `tprovince` SET`NomProv`="'.$province.'",`IdPays`="'.$idpays.'" WHERE IdProv='.$id);
    }
    public function supprimerprov($id){
        include('chaine.php');
        $con->exec('DELETE FROM `tprovince` WHERE IdProv='.$id);
    }
    public function selectionnerprov(){
        include('chaine.php');
        return  $con->query('SELECT 
        pr.IdProv as IdProv,
        pr.NomProv as NomProv,
        py.IdPays as IdPays,
        py.NomPays as NomPays
        FROM tprovince as pr
        INNER JOIN tpays as py
        ON pr.IdPays =py.IdPays
        ORDER BY IdPays ASC');
    }
    public function rechercheprov($var){
        include('chaine.php');
        return $con->query("SELECT 
        pr.IdProv as IdProv,
        pr.NomProv as NomProv,
        py.IdPays as IdPays,
        py.NomPays as NomPays
        FROM tprovince as pr
        INNER JOIN tpays as py
        ON pr.IdPays=py.IdPays
        WHERE py.IdPays='".$var."'
        ORDER BY NomProv ASC");
    }
    public function leftprov($var){
        include('chaine.php');
        return $con->query("SELECT
        q.IdQuart as IdQuart,
        q.NomQuart as NomQuart,
       vl.IdVille as IdVille,
        vl.NomVille as NomVille,
        pr.IdProv as IdProv,
        pr.NomProv as NomProv
        
        FROM tprovince as pr
    
        LEFT JOIN tville as vl
        ON pr.IdProv =vl.IdProv
        LEFT JOIN tquartier as q
        ON vl.IdVille =q.IdVille
     
        WHERE pr.IdProv LIKE '%".$var."%' OR pr.NomProv LIKE '%".$var."%'
     
        ORDER BY IdProv ASC
        
        ");
    }
    
    public function __destuct(){
    }
}


