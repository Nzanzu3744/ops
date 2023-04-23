<?php
include('province.class.php');
class ville extends province{
    private $id;
    private $ville;
    private $idprov;
    private $idpays;
    public function __construct(){
        $id="";
        $ville="";
        $province="";
        $idpays="";
    }
        public function ajouterville($ville,$idprov){
            include('chaine.php');
            $req=$con->prepare('INSERT INTO `tville`(`NomVille`, `IdProv`) VALUES (?,?)');
            $req->execute(array($ville,$idprov));
    }
    
    public function modifierville($id,$ville,$idprov){
        include('chaine.php');
        $con->exec('UPDATE `tville` SET`NomVille`="'.$ville.'",`IdProv`="'.$idprov.'" WHERE IdVille='.$id);
    }
    public function supprimerville($id){
        include('chaine.php');
        $con->exec('DELETE FROM `tville` WHERE IdVille='.$id);
    }
    public function selectionnerville(){
        include('chaine.php');
        return  $con->query('SELECT 
        vl.IdVille as IdVille,
        vl.NomVille as NomVille,
        pr.IdProv as IdProv,
        pr.NomProv as NomProv,
        py.IdPays as IdPays,
        py.NomPays as NomPays
        FROM tville as vl
        INNER JOIN tprovince as pr
        ON pr.IdProv =vl.IdProv
        INNER JOIN tpays as py
        ON pr.IdPays =py.IdPays
        ORDER BY IdPays ASC');
    }
    public function rechercheville($var){
        include('chaine.php');
        return $con->query("SELECT *
        FROM tville as vl
        INNER JOIN tprovince as pr
        ON pr.IdProv =vl.IdProv
        INNER JOIN tpays as py
        ON pr.IdPays =py.IdPays
        WHERE pr.IdProv='".$var."'
        ORDER BY vl.NomVille ASC");
    }
    public function leftville($var){
        include('chaine.php');
        return $con->query("SELECT
        q.IdQuart as IdQuart, 
        q.NomQuart as NomQuart, 
        vl.IdVille as IdVille, 
        vl.NomVille as NomVille 
        FROM tville as vl 
        LEFT JOIN tquartier as q 
        ON vl.IdVille =q.IdVille 
        
        WHERE vl.IdVille LIKE '%".$var."%' OR vl.NomVille LIKE '%".$var."%'
        
        ORDER BY IdVille ASC
       ");
    }
    public function __destuct(){
    }
}


