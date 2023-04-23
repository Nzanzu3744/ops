<?php
class pays{
    private $id;
    private $pays;
    public function __construct(){
        $id="";
        $pays="";
    }
        public function ajouterpays($pays){
            include('chaine.php');
            $req=$con->prepare('INSERT INTO `tpays`(`NomPays`) VALUES (?)');
            $req->execute(array($pays));
    }
    
    public function modifierpays($id,$pays){
        include('chaine.php');
        $con->exec('UPDATE `tpays` SET `NomPays`="'.$pays.'"WHERE IdPays='.$id);
    }
    public function supprimerpays($id){
        include('chaine.php');
        $con->exec('DELETE FROM `tpays` WHERE IdPays='.$id);
    }
    public function selectionnerpays(){
        include('chaine.php');
        return  $con->query('SELECT * FROM tpays ORDER BY IdPays ASC');
    }
    public function recherchepays($var){
        include('chaine.php');
        return $con->query("SELECT * FROM tpays WHERE IdPays LIKE '%".$var."%' OR NomPays LIKE '%".$var."%'  ORDER BY idPays ASC");
    }
     public function leftpays($var){
        include('chaine.php');
        return $con->query("SELECT 
        q.IdQuart as IdQuart,
        q.NomQuart as NomQuart,
       vl.IdVille as IdVille,
        vl.NomVille as NomVille,
        pr.IdProv as IdProv,
        pr.NomProv as NomProv,
        py.IdPays as IdPays,
        py.NomPays as NomPays
        FROM tpays as py
        LEFT JOIN tprovince as pr
        ON pr.IdPays =py.IdPays
        LEFT JOIN tville as vl
        ON pr.IdProv =vl.IdProv
        LEFT JOIN tquartier as q
        ON vl.IdVille =q.IdVille
        WHERE py.IdPays LIKE '%".$var."%' OR py.NomPays LIKE '%".$var."%'
        ORDER BY IdPays ASC
        ");
    }
    public function __destruct(){
    }
}


