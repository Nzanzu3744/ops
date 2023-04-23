<?php
include('chaine.php');
class versement {
    
            public static function  ajoueterVersement(){
                Global $con;
                $req=$con->prepare('INSERT INTO `tversement`(`DateVers`, `MontVers`, `IdPay`) VALUES (Now(),?,?)');
                $req->execute(array($dividente,$idpay));
            }
            
            public static function  filtrerPay($idagent){
                Global $con;
                return $con->query('
                    SELECT
                    tcli.IdCli as IdCli,
                    tcli.NomCli as NomCli ,
                    tcli.PostnomCli as PostnomCli,
                    tcli.PrenomCli as PrenomCli, 
                    tag.IdAgent  as IdAgent,
                    tpay.IdPay as IdPay,
                    tpay.DatePay as DatePay,
                    tpre.IdPrescrip as IdPrescrip,
                    tpay.Montat as Montat,

                    tdev.NomDevise as Devise,
                    
                    ttau.Taux as Taux,
                    
                    ((tpay.Montat/ttau.Taux)*0.10) as MontVers,
                    
                   
                    tpay.DatePay as DatePay

                    FROM tpayement as tpay 

                    INNER JOIN tconsommation as tcon 
                    ON tcon.IdConso=tpay.IdConso
                    INNER JOIN ttaux as ttau
                    ON tpay.IdTaux=ttau.IdTaux
                    INNER JOIN tdevise as tdev 
                    ON tdev.IdDevise=tpay.IdDevise
                    INNER JOIN tprescription as tpre
                    ON tpre.IdPrescrip=tcon.IdPrescript 
                    INNER JOIN tsignevit as tsig 
                    ON tsig.IdFiche=tpre.IdFiche 
                    INNER JOIN tclient as tcli 
                    ON tcli.IdCli=tsig.IdCli 
                    INNER JOIN tjeton1 as tjet 
                    ON tjet .IdJeton=tcli.IdJeton

                    INNER JOIN tagent as tag 
                    ON tjet .IdAgent=tag.IdAgent
                    
                    
                    WHERE tag.IdAgent="'.$idagent.'"

                    GROUP BY tpay.IdPay
                    
                    ORDER BY tpay.IdPay DESC
                    
        
            ');
            }
            public static function  selectionnerPay(){
                Global $con;
                return $con->query('
                    SELECT
                    tjet.IdAgent as IdAgent,
                    tcli.IdCli as IdCli,
                    tcli.NomCli as NomCli ,
                    tcli.PostnomCli as PostnomCli,
                    tcli.PrenomCli as PrenomCli, 
                    tag.IdAgent  as IdAgent,
                    tpay.IdPay as IdPay,
                    tpay.DatePay as DatePay,
                    tpre.IdPrescrip as IdPrescrip,
                    tpay.Montat as Montat,

                    tdev.NomDevise as Devise,
                    
                    ttau.Taux as Taux,
                    
                    ((tpay.Montat/ttau.Taux)*0.10) as MontVers,
                    
                   
                    tpay.DatePay as DatePay

                    FROM tpayement as tpay 

                    INNER JOIN tconsommation as tcon 
                    ON tcon.IdConso=tpay.IdConso
                    INNER JOIN ttaux as ttau
                    ON tpay.IdTaux=ttau.IdTaux
                    INNER JOIN tdevise as tdev 
                    ON tdev.IdDevise=tpay.IdDevise
                    INNER JOIN tprescription as tpre
                    ON tpre.IdPrescrip=tcon.IdPrescript 
                    INNER JOIN tsignevit as tsig 
                    ON tsig.IdFiche=tpre.IdFiche 
                    INNER JOIN tclient as tcli 
                    ON tcli.IdCli=tsig.IdCli 
                    INNER JOIN tjeton1 as tjet 
                    ON tjet .IdJeton=tcli.IdJeton

                    INNER JOIN tagent as tag 
                    ON tjet .IdAgent=tag.IdAgent
                    
                    GROUP BY tpay.IdPay

                    ORDER BY tpay.IdPay DESC                    

                    ');
            }
        }