<?php
include('fiche.class.php');
class prescription extends fiche{
  private $idPrescrip;
  private $prescrip;
  private $idFiche;
    public function __construct(){
    }
        public static function ajouterprescrip($idFiche,$prescrip){
            global $con;
            $req=$con->prepare('INSERT INTO `tprescription`(`Prescrip`, `IdFiche`) VALUES (?,?)');
            $req->execute(array($prescrip,$idFiche));
    }
    public static function filtrerprescription11($id){
        include('chaine.php');
        return $con->query('SELECT * FROM tprescription WHERE IdPrescrip='.$id);
    }
    public static function modifierprescrip($id,$prescrip){
        include('chaine.php');
    if($con->exec('UPDATE `tprescription` SET `Prescrip`="'.$prescrip.'" WHERE `IdPrescrip`='.$id)){
        return true;
       }else{
        return false;
       }
    }
    public static function supprimerprescrip($id){
        include('chaine.php');
        if($con->exec('DELETE FROM tprescription WHERE IdPrescrip='.$id)){
          return true;
        }else{
          return false;
        }
    }

    public static function selectionnerprescrip(){
        include('chaine.php');
        return  $con->query('
            SELECT 
              c.IdCli as IdCli, 
              c.NomCli as NomCli, 
              c.PostnomCli as PostnomCli, 
              c.PrenomCli as PrenomCli, 
              f.IdFiche as IdFiche, 
              f.DateElabFiche as DateElabFiche,
              pr.IdPrescrip as IdPrescrip, 
              pr.Prescrip as Prescrip 
            FROM tprescription as pr 
            INNER JOIN tsignevit as f 
            ON pr.IdFiche =f.IdFiche 

            INNER JOIN tclient as c 
            ON f.IdCli =c.IdCli 

            ORDER BY IdPrescrip DESC');
    }
     //Ici nous filtrons par rapport de la prescription. 
    public static function recprescript($var){
        include('chaine.php');
        return $con->query("
            SELECT 
                pre.IdPrescrip as IdPrescrip, 
                pre.Prescrip as Prescrip,
                f.IdFiche as IdFiche, 
                f.DateElabFiche as DateElabFiche, 
                c.IdCli as IdCli, 
                c.NomCli as NomCli, 
                c.PostnomCli as PostnomCli, 
                c.PrenomCli as PrenomCli,
                c.GenreCli as GenreCli,
            c.NumParcelCli as NumParcelCli,
                c.TelCli as TelCli,
                q.NomQuart as NomQuart,
                vl.NomVille as NomVille,
                pr.NomProv as NomProv,
                py.NomPays as NomPays               
               
            FROM tprescription as pre 
            INNER JOIN tsignevit as f
            ON f.IdFiche=pre.IdFiche
                        
            INNER JOIN tclient as c 
            ON f.IdCli=c.IdCli
            
            INNER JOIN tquartier as q
            ON q.IdQuart =c.IdQuart
            INNER JOIN tville as vl
            ON q.IdVille =vl.IdVille
            INNER JOIN tprovince as pr
            ON vl.IdProv =pr.IdProv
            INNER JOIN tpays as py
            ON pr.IdPays =py.IdPays
             WHERE pre.IdPrescrip='".$var."' OR c.NomCli LIKE '%".$var."%' OR c.PrenomCli LIKE '%".$var."%' OR c.PostnomCli LIKE '%".$var."%' 

            ORDER BY pre.IdPrescrip DESC  
         ");
    }
    //Ici nou filtrons par rapport aux fiches. 
    public static function filtrerprescrip($var){
        include('chaine.php');
        return $con->query("
            SELECT 
              c.IdCli as IdCli, 
              c.NomCli as NomCli, 
              c.PostnomCli as PostnomCli, 
              c.PrenomCli as PrenomCli, 
              f.IdFiche as IdFiche, 
                f.DateElabFiche as DateElabFiche, 
                f.TempFiche as TempFiche, 
                f.RespFiche as RespFiche, 
                f.PulsFiche as PulsFiche, 
                f.PoidFiche as PoidFiche, 
                f.TaFiche as TaFiche,
                f.AnamFiche as AnamFiche,
              pr.IdPrescrip as IdPrescrip, 
              pr.Prescrip as Prescrip 
            FROM tprescription as pr 
            INNER JOIN tsignevit as f 
            ON pr.IdFiche =f.IdFiche 

            INNER JOIN tclient as c 
            ON f.IdCli =c.IdCli 

            WHERE f.IdFiche=".$var."

            ORDER BY IdPrescrip DESC  
         ");
    }
    //ici noue filtrons des prescription qui n'ont pas etes facturées
    public static function prescriptfact(){
       include('chaine.php');
       //`DateConso`, `QuantConso`, `PuConso`, `IdPrescript`, `IdDesigServi`
       return $con->query("
            SELECT
                co.IdConso as IdConso,
                co.DateConso as DateConso,
                co.QuantConso as QuantConsoce,
                co.PuConso as PuConsose,
              
                pre.IdPrescrip as IdPrescrip, 
                pre.Prescrip as Prescrip,
                f.IdFiche as IdFiche, 
                f.DateElabFiche as DateElabFiche, 
                c.IdCli as IdCli, 
                c.NomCli as NomCli, 
                c.PostnomCli as PostnomCli, 
                c.PrenomCli as PrenomCli,
                c.GenreCli as GenreCli,
                c.NumParcelCli as NumParcelCli,
                c.TelCli as TelCli,
                q.NomQuart as NomQuart,
                vl.NomVille as NomVille,
                pr.NomProv as NomProv,
                py.NomPays as NomPays               
               
            FROM tprescription as pre
            LEFT JOIN tconsommation as co
            ON co.IdPrescript=pre.IdPrescrip
            
            INNER JOIN tsignevit as f
            ON f.IdFiche=pre.IdFiche
            
            INNER JOIN tclient as c 
            ON f.IdCli=c.IdCli
            
            INNER JOIN tquartier as q
            ON q.IdQuart =c.IdQuart
            INNER JOIN tville as vl
            ON q.IdVille =vl.IdVille
            INNER JOIN tprovince as pr
            ON vl.IdProv =pr.IdProv

            INNER JOIN tpays as py
            ON pr.IdPays =py.IdPays
             where co.IdConso IS not null
             GROUP by pre.IdPrescrip
            ORDER BY pre.IdPrescrip DESC");
    }
    //ici noue filtrons des prescription qui n'ont pas etes facturées
    public static function nouvprescripti(){
       include('chaine.php');
       return $con->query("
            SELECT
                co.IdConso as IdConso,
                co.DateConso as DateConso,
                co.QuantConso as QuantConsoce,
                co.PuConso as PuConsose,
              
                pre.IdPrescrip as IdPrescrip, 
                pre.Prescrip as Prescrip,
                f.IdFiche as IdFiche, 
                f.DateElabFiche as DateElabFiche, 
                c.IdCli as IdCli, 
                c.NomCli as NomCli, 
                c.PostnomCli as PostnomCli, 
                c.PrenomCli as PrenomCli,
                c.GenreCli as GenreCli,
                c.NumParcelCli as NumParcelCli,
                c.TelCli as TelCli,
                q.NomQuart as NomQuart,
                vl.NomVille as NomVille,
                pr.NomProv as NomProv,
                py.NomPays as NomPays               
               
            FROM tprescription as pre
            LEFT JOIN tconsommation as co
            ON co.IdPrescript=pre.IdPrescrip
            
            INNER JOIN tsignevit as f
            ON f.IdFiche=pre.IdFiche
            
            INNER JOIN tclient as c 
            ON f.IdCli=c.IdCli
            
            INNER JOIN tquartier as q
            ON q.IdQuart =c.IdQuart
            INNER JOIN tville as vl
            ON q.IdVille =vl.IdVille
            INNER JOIN tprovince as pr
            ON vl.IdProv =pr.IdProv

            INNER JOIN tpays as py
            ON pr.IdPays =py.IdPays
             where co.IdPrescript is null

            ORDER BY pre.IdPrescrip DESC");
    }
    //ici noue filtrons des prescription qui n'ont pas etes facturées avec une recherche par id, nom postnon ou prenom de du client.
    public static function rechprescriptnonfacture($var){
       include('chaine.php');
       return $con->query("
             SELECT
                co.IdConso as IdConso,
                co.QuantConso as QuantConsoce,
                co.PuConso as PuConsose,
              
                pre.IdPrescrip as IdPrescrip, 
                pre.Prescrip as Prescrip,
                f.IdFiche as IdFiche, 
                f.DateElabFiche as DateElabFiche, 
                c.IdCli as IdCli, 
                c.NomCli as NomCli, 
                c.PostnomCli as PostnomCli, 
                c.PrenomCli as PrenomCli,
                c.GenreCli as GenreCli,
                c.NumParcelCli as NumParcelCli,
                c.TelCli as TelCli,
                q.NomQuart as NomQuart,
                vl.NomVille as NomVille,
                pr.NomProv as NomProv,
                py.NomPays as NomPays               
               
            FROM tprescription as pre
            LEFT JOIN tconsommation as co
            ON co.IdPrescript=pre.IdPrescrip
            
            INNER JOIN tsignevit as f
            ON f.IdFiche=pre.IdFiche
            
            INNER JOIN tclient as c 
            ON f.IdCli=c.IdCli
            
            INNER JOIN tquartier as q
            ON q.IdQuart =c.IdQuart
            INNER JOIN tville as vl
            ON q.IdVille =vl.IdVille
            INNER JOIN tprovince as pr
            ON vl.IdProv =pr.IdProv

            INNER JOIN tpays as py
            ON pr.IdPays =py.IdPays
             where co.IdPrescript is null
            AND c.IdCli='".$var."' OR c.NomCli LIKE '%".$var."%' OR c.PostnomCli LIKE '%".$var."%' OR c.PrenomCli LIKE '%".$var."%'

            ORDER BY pre.Prescrip DESC");
    }
    public function __destuct(){
    }
}


