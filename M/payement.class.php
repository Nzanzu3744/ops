<?php
include('chaine.php');

class payement {

    public static function ajouterpayement($IdConso,$Montat,$IdTaux,$IdDevise)
        {
        
        global $con;

        if($req=$con->exec('INSERT INTO `tpayement`(`DatePay`, `IdConso`, `Montat`, `IdTaux`, `IdDevise`) VALUES (NOW(),'.$IdConso.','.$Montat.','.$IdTaux.','.$IdDevise.')')){

            $idAgent=$con->query('SELECT * from tconsommation as cs INNER join tprescription as pre on pre.IdPrescrip=cs.IdPrescript INNER join tsignevit as ts on ts.IdFiche=pre.IdFiche INNER join tclient as tcli on tcli.IdCli=ts.IdCli INNER JOIN tjeton1 as tjet ON tcli.IdJeton=tjet.IdJeton WHERE cs.IdConso="'.$IdConso.'" GROUP by cs.IdConso');

                    $idAg=$idAgent->fetch();
                    $idAg['IdAgent'];

    
                    //Attention
                $telAgent=$con->query('SELECT * from tagent WHERE IdAgent='.$idAg['IdAgent']);

                $Ag=$telAgent->fetch();

                echo $NumRec=$Ag['TelAgent'];


                $taux=taux::recherchetaux($IdTaux);
                $t=$taux->fetch();
                $monverse=($Montat/$t['Taux']);

                $Text='M/Mm'.$Ag['IdAgent'].' '.$Ag['NomAgent'].' '.$Ag['PostnomAgent'].' Vous avez reussi '.$monverse.'$ de la part de OPS';
                include('MonSms.class.php');
                echo sms::Monsms('+243828409897',$NumRec,$Text);

            return true;
        }else{
            return false;
    }
        }
        public static function supprimerP($idPay){

           global $con;
        if($con->exec('DELETE FROM `tpayement` WHERE IdPay='.$idPay)){
            return true;
            breack;
        }else{
            return false;
        }
    }
    
   public function modifierpayer(){
        global $con;
        $this->_idPayer=$idPayer;
        $this->_tauxEch=$tauxEch;
        $this->_montat=$montat;
        $this->_idRecu=$idRecu;
        $this->_idDevise=$idDevise;
        $req=$con->prepare('UPDATE `tpayer` SET `TauxEch`=?,`Montat`=?,`IdRecu`=?,`IdDevise`=? WHERE `IdPayer`=?');
        $req->execute(array($tauxEch,$montat,$idRecu,$idDevise,$idPayer));
    }

   public static function p_recu(){
        global $con;
        return $con->query("
            SELECT 
            cl.IdCli as IdCli, 
            cl.NomCli as NomCli, 
            cl.PostnomCli as PostnomCli, 
            cl.PrenomCli as PrenomCli, 
            pre.IdPrescrip as IdPrescrip, 
            p.IdPay as IdPay, 
            p.DatePay as DatePay,
            p.Montat as Montat,
            t.IdTaux as IdTaux, 
            t.Taux as Taux,
            d.IdDevise as IdDevise,
            d.NomDevise as NomDevise,
            (Montat/Taux) as Total
            
            FROM tpayement as p 

            INNER join tconsommation as cs
            ON cs.IdConso=p.IdConso

            INNER join tprescription as pre
            on pre.IdPrescrip=cs.IdPrescript

            INNER join tsignevit as ts
            on ts.IdFiche=pre.IdFiche

            INNER join tclient as cl
            on cl.IdCli=ts.IdCli

            INNER JOIN ttaux as t 
            ON t.IdTaux=p.IdTaux 

            INNER JOIN tdevise as d 
            ON d.IdDevise=p.IdDevise 
            GROUP By p.IdPay
            ORDER by p.IdPay DESC
            ");
    }
    public static function filtrerpayement1($var){
        global $con;
        return $con->query("
            SELECT 
            cl.IdCli as IdCli, 
            cl.NomCli as NomCli, 
            cl.PostnomCli as PostnomCli, 
            cl.PrenomCli as PrenomCli, 
            pre.IdPrescrip as IdPrescrip, 
            p.IdPay as IdPay, 
            p.DatePay as DatePay,
            p.Montat as Montat,
            t.IdTaux as IdTaux, 
            t.Taux as Taux,
            d.IdDevise as IdDevise,
            d.NomDevise as NomDevise,
            (Montat/Taux) as Total
            
            FROM tpayement as p 

            INNER join tconsommation as cs
            ON cs.IdConso=p.IdConso

            INNER join tprescription as pre
            on pre.IdPrescrip=cs.IdPrescript

            INNER join tsignevit as ts
            on ts.IdFiche=pre.IdFiche

            INNER join tclient as cl
            on cl.IdCli=ts.IdCli

            INNER JOIN ttaux as t 
            ON t.IdTaux=p.IdTaux 

            INNER JOIN tdevise as d 
            ON d.IdDevise=p.IdDevise 
            
            WHERE p.IdPay='".$var."'");
    }
    public static function filtrerpayement($var){
        global $con;
        return $con->query("
            SELECT IdPay as IdPay, 
            p.DatePay as DatePay,
            p.Montat as Montat,
            t.IdTaux as IdTaux, 
            t.Taux as Taux,
            d.IdDevise as IdDevise,
            d.NomDevise as NomDevise,
            (Montat/Taux) as Total
            FROM tpayement as p 
            INNER JOIN ttaux as t 
            ON t.IdTaux=p.IdTaux 
            INNER JOIN tdevise as d 
            ON d.IdDevise=p.IdDevise 
            LEFT JOIN tconsommation AS c 
            ON c.IdConso=p.IdConso
            WHERE p.IdConso='".$var."'");
    }

    public function __destuct(){
    }
}