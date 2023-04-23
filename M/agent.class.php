<?php
include('fonction.class.php');
include('qualification.class.php');
include('nationalite.class.php');
include('chaine.php');
class agent {
    private static  $id;
    private static  $var;
    private static  $NomAgent;
    private static  $PostnomAgent;
    private static  $PrenomAgent;
    private static  $PhotoAgent;
    private static  $NumeParcelAgent;
    private static  $GenreAgent;
    private static  $DateNaisAgent;
    private static  $NNAgent;
    private static  $TelAgent;
    private static  $IdQualif;
    private static  $IdNation;
    private static  $IdFonct;
    private static  $IdQuart;
    private static  $MotCleAgent;
    private static  $AccesAgent;
    private static  $ActifAgent;

    public function __construct($NomAgent,$PostnomAgent,$PrenomAgent,$NumeParcelAgent,$GenreAgent,$DateNaisAgent,$NNAgent,$TelAgent,$IdQualif,$IdNation,$IdFonct,$IdQuart,$MotCleAgent,$AccesAgent,$ActifAgent,$PhotoAgent){
    self::$PhotoAgent=$PhotoAgent;
     self::$NomAgent=$NomAgent;
     self::$PostnomAgent=$PostnomAgent;
     self::$PrenomAgent=$PrenomAgent;
     self::$NumeParcelAgent=$NumeParcelAgent;
     self::$GenreAgent=$GenreAgent;
     self::$DateNaisAgent=$DateNaisAgent;
     self::$NNAgent=$NNAgent;
     self::$TelAgent=$TelAgent;
     self::$IdQualif=$IdQualif;
     self::$IdNation=$IdNation;
     self::$IdFonct=$IdFonct;
     self::$IdQuart=$IdQuart;
     self::$MotCleAgent=$MotCleAgent;
     self::$AccesAgent=$AccesAgent;
     self::$ActifAgent=$ActifAgent;
    }
        public static function ajouteragent()
        {
            include('chaine.php');
            $req=$con->prepare('INSERT INTO `tagent`(`NomAgent`, `PostnomAgent`, `PrenomAgent`, `NumeParcelAgent`, `GenreAgent`,                `DateNaisAgent`, `NNAgent`, `TelAgent`, `IdQualif`, `IdNation`, `IdFonct`, `IdQuart`, `MotCleAgent`,`AccesAgent`,`ActifAgent`,PhotoAgent) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
            if($req->execute(array(self::$NomAgent,self::$PostnomAgent,self::$PrenomAgent,self::$NumeParcelAgent,self::$GenreAgent,self::$DateNaisAgent,self::$NNAgent,self::$TelAgent,self::$IdQualif,self::$IdNation,self::$IdFonct,self::$IdQuart,self::$MotCleAgent,self::$AccesAgent,self::$ActifAgent,self::$PhotoAgent))){
                return true;
            }else{
                return false;
            }

        }
    
    public function modifieragent($id)
    {
        include('chaine.php');
        self::$id=$id;

            if($con->exec('UPDATE `tagent` SET `NomAgent`="'.self::$NomAgent.'",`PostnomAgent`="'.self::$PostnomAgent.'",`PrenomAgent`="'.self::$PrenomAgent.'",`NumeParcelAgent`="'.self::$NumeParcelAgent.'",`GenreAgent`="'.self::$GenreAgent.'",`DateNaisAgent`="'.self::$DateNaisAgent.'",`NNAgent`="'.self::$NNAgent.'",`TelAgent`="'.self::$TelAgent.'",`PhotoAgent`="'.self::$PhotoAgent.'",`IdQualif`="'.self::$IdQualif.'",`IdNation`="'.self::$IdNation.'",`IdFonct`="'.self::$IdFonct.'",`IdQuart`="'.self::$IdQuart.'",`ActifAgent`="'.self::$ActifAgent.'",`AccesAgent`="'.self::$AccesAgent.'",`MotCleAgent`="'.self::$MotCleAgent.'" WHERE  `IdAgent`='.self::$id)){
                echo 1;
            }else{
                echo 0;
            }
        

    }
    public static function modifieretat($id)
    {
        global $con;
        self::$id=$id;
        $etat=null;
        $etat=$con->query('SELECT ActifAgent FROM tagent WHERE IdAgent='.self::$id);
        $MonEtat=$etat->fetch();
        if($MonEtat['ActifAgent']==0){
            $con->exec('UPDATE `tagent`SET`ActifAgent`=1 WHERE `IdAgent`='.self::$id);
            
        }else{
            $con->exec('UPDATE `tagent`SET`ActifAgent`=0 WHERE `IdAgent`='.self::$id);

        } 
    }
    public static function supprimeragent($id){
        include('chaine.php');
        self::$id=$id;
        if($con->exec('DELETE FROM `tagent` WHERE IdAgent='.self::$id)){
            return true;
        }else{
            return false;
        }
    }
    public static function selectionneragent(){
        include('chaine.php');
        return  $con->query('SELECT 
		
        a.IdAgent as IdAgent,
        a.NomAgent as NomAgent, 
        a.PostnomAgent as PostnomAgent, 
        a.PrenomAgent as PrenomAgent, 
        a.NumeParcelAgent as NumeParcelAgent,
        a.GenreAgent as GenreAgent, 
        a.DateNaisAgent as DateNaisAgent, 
        a.NNAgent as NNAgent, 
        a.TelAgent as TelAgent, 
        a.MotCleAgent as MotCleAgent,
        a.AccesAgent as AccesAgent,
        a.ActifAgent as ActifAgent,
        
        q.IdQuart as IdQuart,
        q.NomQuart as NomQuart,
       vl.IdVille as IdVille,
        vl.NomVille as NomVille,
        pr.IdProv as IdProv,
        pr.NomProv as NomProv,
        py.IdPays as IdPays,
        py.NomPays as NomPays,
        n.IdNation as  IdNation,
        n.NomNation as NomNation,
        f.IdFonct as IdFonct,
        f.NomFonct as NomFonct,
        ql.IdQualif as IdQualif,
        ql.Qualif as Qualif
        FROM tagent as a
        
        INNER JOIN tquartier as q
        ON q.IdQuart =a.IdQuart
        INNER JOIN tville as vl
        ON q.IdVille =vl.IdVille
        INNER JOIN tprovince as pr
        ON vl.IdProv =pr.IdProv
        INNER JOIN tpays as py
        ON pr.IdPays =py.IdPays
        
        INNER JOIN tnationalite as n
        ON a.IdNation= n.IdNation
        
         INNER JOIN tfonction as f
        ON f.IdFonct =a.IdFonct
        
         INNER JOIN tqualification as ql
        ON ql.IdQualif =a.IdQualif
        
        ORDER BY IdAgent DESC');
    }
    //connexion
    public static function connexion($var){
        self::$var=$var;
        global $con;
        return $con->query("SELECT 
        
        a.IdAgent as IdAgent,
        a.NomAgent as NomAgent, 
        a.PostnomAgent as PostnomAgent, 
        a.PrenomAgent as PrenomAgent, 
        a.NumeParcelAgent as NumeParcelAgent,
        a.GenreAgent as GenreAgent, 
        a.DateNaisAgent as DateNaisAgent, 
        a.NNAgent as NNAgent, 
        a.TelAgent as TelAgent, 
        a.PhotoAgent as PhotoAgent, 
        a.MotCleAgent as MotCleAgent,
        a.AccesAgent as AccesAgent,
        a.ActifAgent as ActifAgent,

        f.IdFonct as IdFonct,
        f.NomFonct as NomFonct
       
        FROM tagent as a
        
       
        
         INNER JOIN tfonction as f
        ON f.IdFonct =a.IdFonct
        
        WHERE a.IdAgent=".self::$var);
    }

    public static function rechercheagent($var){
        self::$var=$var;
        global $con;
        return $con->query("SELECT 
		
        a.IdAgent as IdAgent,
        a.NomAgent as NomAgent, 
        a.PostnomAgent as PostnomAgent, 
        a.PrenomAgent as PrenomAgent, 
        a.NumeParcelAgent as NumeParcelAgent,
        a.GenreAgent as GenreAgent, 
        a.DateNaisAgent as DateNaisAgent, 
        a.NNAgent as NNAgent, 
        a.TelAgent as TelAgent, 
        a.PhotoAgent as PhotoAgent, 
        a.MotCleAgent as MotCleAgent,
        a.AccesAgent as AccesAgent,
        a.ActifAgent as ActifAgent,
        
        q.IdQuart as IdQuart,
        q.NomQuart as NomQuart,
       vl.IdVille as IdVille,
        vl.NomVille as NomVille,
        pr.IdProv as IdProv,
        pr.NomProv as NomProv,
        py.IdPays as IdPays,
        py.NomPays as NomPays,
        n.IdNation as  IdNation,
        n.NomNation as NomNation,
        f.IdFonct as IdFonct,
        f.NomFonct as NomFonct,
        ql.IdQualif as IdQualif,
        ql.Qualif as Qualif
        FROM tagent as a
        
        INNER JOIN tquartier as q
        ON q.IdQuart =a.IdQuart
        INNER JOIN tville as vl
        ON q.IdVille =vl.IdVille
        INNER JOIN tprovince as pr
        ON vl.IdProv =pr.IdProv
        INNER JOIN tpays as py
        ON pr.IdPays =py.IdPays
        
        INNER JOIN tnationalite as n
        ON a.IdNation= n.IdNation
        
         INNER JOIN tfonction as f
        ON f.IdFonct =a.IdFonct
        
         INNER JOIN tqualification as ql
        ON ql.IdQualif =a.IdQualif
        WHERE a.IdAgent='".self::$var."' OR a.NomAgent LIKE '%".self::$var."%' OR a.PostnomAgent LIKE '%".self::$var."%' OR a.PrenomAgent LIKE '%".self::$var."%'
        ORDER BY NomAgent ASC
       ");
    }
    function RechAgByFont($IdFonct){
        Global $con;
        return $con->query('
            SELECT * FROM `tagent` as tag
            INNER JOIN tfonction AS tfo 
            ON tag.IdFonct=tfo.IdFonct
            where  tag.IdFonct="'.$IdFonct.'"
            ');
    }
    public function __destuct(){
    }
}


