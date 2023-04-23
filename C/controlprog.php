<?php
include('../M/programme.class.php');
include('../V/pages/tableauprog.php');
include('../V/pages/FormulaireProg.php');


if(!empty($_POST['ObjProg']) AND !empty($_POST['Prog']) AND !empty($_POST['DebProg']) AND !empty($_POST['DebProg']) AND !isset($_GET['idModiF'])){
	$DebProg=htmlspecialchars($_POST['DebProg']);
	$FinProg=htmlspecialchars($_POST['FinProg']);
	$ObjProg=htmlspecialchars($_POST['ObjProg']);
	$Prog=$_POST['Prog']; 
    echo programme::ajouterprogramme($DebProg,$FinProg,$ObjProg,$Prog);	
}
if(!empty($_POST['ObjProg']) AND !empty($_POST['Prog']) AND !empty($_POST['DebProg']) AND !empty($_POST['DebProg']) AND isset($_GET['idModiF']) AND !empty($_GET['idModiF'])){
	$idprogram=htmlspecialchars($_GET['idModiF']);
	$DebProg=htmlspecialchars($_POST['DebProg']);
	$FinProg=htmlspecialchars($_POST['FinProg']);
	$ObjProg=htmlspecialchars($_POST['ObjProg']);
	$Prog=$_POST['Prog']; 
    echo programme::modificationProg($idprogram,$DebProg,$FinProg,$ObjProg,$Prog);	
}
//supp
 if(isset($_GET['id_sup']) AND !empty($_GET['id_sup']))
{
	$id_sup=htmlspecialchars($_GET['id_sup']);
	echo programme::supprimerprog($id_sup);
}
//Valider 
if(isset($_GET['id_val']) AND !empty($_GET['id_val']))
{
	$id_val=htmlspecialchars($_GET['id_val']);
	echo programme::validation($id_val);
}
//rech
 if(isset($_GET['idpro_rech']) AND !empty($_GET['idpro_rech']))
{
	$idpro_rech=htmlspecialchars($_GET['idpro_rech']);
	session_start();
	echo FiltrerProg($idpro_rech);
}else if(isset($_GET['idpro_rech']) AND empty($_GET['idpro_rech'])){
	session_start();
	echo listeProg();
}
//
if(isset($_GET['idproNon_rech']) AND !empty($_GET['idproNon_rech']))
{
	$idproNon_rech=htmlspecialchars($_GET['idproNon_rech']);
	session_start();
	echo FiltrelisteProgNV($idproNon_rech);
}else if(isset($_GET['idproNon_rech']) AND empty($_GET['idproNon_rech'])){
	session_start();
	echo listeProgNV();
}
//id_ModProg
if(isset($_GET['id_ModProg']) AND !empty($_GET['id_ModProg']))
{
	?>
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    $('.textarea').summernote()
  })
</script>
<?php

	$id_ModProg=htmlspecialchars($_GET['id_ModProg']);
	
	echo fProgMod($id_ModProg);
}else if(isset($_GET['id_ModProg']) AND empty($_GET['id_ModProg'])){
	?>
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    $('.textarea').summernote()
  })
</script>
<?php
	echo fProg();
}