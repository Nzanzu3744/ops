<?php
include('chaine.php');
class programme {

        public static function ajouterprogramme($DebProg,$FinProg,$ObjProg,$Prog)
        {
                global $con;
                $req=$con->prepare('INSERT INTO `tprogramme`(DateProg,`DebProg`, `FinProg`, `ObjProg`, `Prog`) VALUES (Now(),?,?,?,?)');
                if($req->execute(array($DebProg,$FinProg,$ObjProg,$Prog))){
                    return  true;
                }else{
                    return false;
                }
        }
    
    
    public static function selectionnerprog(){
        global $con;
        return  $con->query('SELECT * FROM tprogramme        
        ORDER BY IdProg DESC
        ');
    }
     public static function selectProNoAp(){
        global $con;
        return  $con->query('SELECT * FROM tprogramme where Validation=0       
        ORDER BY IdProg DESC
        ');
    }
    //
    public static function FiltreProNoAp($id){
        global $con;
        return  $con->query('
            SELECT * FROM tprogramme WHERE Validation=0  AND IdProg="'.$id.'" OR ObjProg like "'.$id.'%" ORDER BY IdProg DESC');
    }
   public static function supprimerprog($id){
    global $con;
    if($con->exec('DELETE FROM tprogramme WHERE IdProg='.$id)){
        return true;
    }else{
        return false;
    }
   }
   public static function RechAgbyProg($idagent){
    global $con;
    return $con->query('
        SELECT *
        FROM tprogramme as tpro 
        INNER JOIN tjeton1 as tjet 
        ON tpro.IdProg=tjet.IdProg
        LEFT JOIN tagent as tag 
        ON tag.IdAgent=tjet.IdAgent
        WHERE tjet.IdAgent="'.$idagent.'"
        GROUP BY tpro.IdProg');
   }
    public static function RechProg($idprogram){
        global $con;
        return  $con->query("SELECT * FROM `tprogramme` WHERE DateProg like '%".$idprogram."%' OR IdProg=".$idprogram);
    }
     public static function modificationProg($idprogram,$DebProg,$FinProg,$ObjProg,$Prog){
        global $con;
          if($con->exec('UPDATE `tprogramme` SET `DebProg`="'.$DebProg.'",`FinProg`="'.$FinProg.'",`ObjProg`="'.$ObjProg.'",`Prog`="'.$Prog.'" WHERE IdProg='.$idprogram)){
            echo 1;
        }else{
            echo 0;
        }

    }
    public static function validation($idprogram){
        global $con;
          if($con->exec('UPDATE `tprogramme` SET `Validation`=1 WHERE IdProg='.$idprogram)){
            echo 1;
        }else{
            echo 0;
        }

    }


    public function __destuct(){
    }
}


