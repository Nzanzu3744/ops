<?php

class adresse{
  
    public static function ajoutervisite($quart,$idville){
            include('chaine.php');
            $req=$con->prepare('INSERT INTO `tquartier`(`NomQuart`,`IdVille`) VALUES (?,?)');
            $req->execute(array($quart,$idville));
    }
    
    public  static function modifierquart($id,$quart,$idville){
        include('chaine.php');
        $con->exec('UPDATE `tquartier` SET`NomQuart`="'.$quart.'",`IdVille`="'.$idville.'" WHERE IdQuart='.$id);
    }
    public static function supprimerquart($id){
        include('chaine.php');
        $con->exec('DELETE FROM `tquartier` WHERE IdQuart='.$id);
    }
    public static function selectionnerquart(){
        include('chaine.php');
        return  $con->query('
            SELECT * 
            FROM tregistremal as treg 
            INNER JOIN tsignevit as tsig 
            ON treg.IdFiche=tsig.IdFiche
            ORDER BY IdEnregMal DESC');
    }
    public static function recherchequart($var){
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
        FROM tquartier as q
        INNER JOIN tville as vl
        ON q.IdVille =vl.IdVille
        INNER JOIN tprovince as pr
        ON vl.IdProv =pr.IdProv
        INNER JOIN tpays as py
        ON pr.IdPays =py.IdPays
         WHERE vl.IdVille= '".$var."'
        ORDER BY IdQuart ASC");
    }
    public function __destuct(){
    }
}


