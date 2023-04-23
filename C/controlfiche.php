
<?php
include('../M/fiche.class.php');
include('../V/pages/Formulairefiche.php');

if(isset($_GET['idCli'])){
	$tempFiche=htmlspecialchars($_POST['TempFiche']);
	$respFiche=htmlspecialchars($_POST['RespFiche']);
	$pulsFiche=htmlspecialchars($_POST['PulsFiche']);
	$poidFiche=htmlspecialchars($_POST['PoidFiche']);
	$taFiche=htmlspecialchars($_POST['TaFiche']);
	$anamFiche=$_POST['AnamFiche'];
	$idCli=htmlspecialchars($_GET['idCli']);
	$fiche= new fiche();
    echo $fiche->ajouterfiche($tempFiche,$respFiche,$pulsFiche,$poidFiche,$taFiche,$anamFiche,$idCli);
			
}
//idCliModif



if(isset($_GET['idsigM']) AND !empty($_GET['idsigM'])){
	 $tempFiche=htmlspecialchars($_POST['TempFiche']);
	 $respFiche=htmlspecialchars($_POST['RespFiche']);
	 $pulsFiche=htmlspecialchars($_POST['PulsFiche']);
	 $poidFiche=htmlspecialchars($_POST['PoidFiche']);
	 $taFiche=htmlspecialchars($_POST['TaFiche']);
	 $anamFiche=$_POST['AnamFiche'];

	$fiche= new fiche();

    echo $fiche->modifierfiche($_GET['idsigM'],$tempFiche,$respFiche,$pulsFiche,$poidFiche,$taFiche,$anamFiche);	
}
 if(isset($_GET['idfiche']) AND !empty($_GET['idfiche']))
{
	$IdFiche=htmlspecialchars($_GET['idfiche']);
	echo fiche::supprimerfiche($IdFiche);
}
if(isset($_GET['idfiche0202']) AND !empty($_GET['idfiche0202']) AND isset($_GET['idClient0202']) AND !empty($_GET['idClient0202'])){
	?>
	<!--  Control ya textearea yetu -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    $('.textarea').summernote()
  })
</script>
	</<?php
	echo fomrficheMod($_GET['idClient0202'],$_GET['idfiche0202']);
}
if (isset($_GET['Actualise009']) AND !empty($_GET['Actualise009'])) {
	?>
			<!--  Control ya textearea yetu -->
			<script src="../plugins/summernote/summernote-bs4.min.js"></script>
			<script>
			  $(function () {
			    $('.textarea').summernote()
			  })
			</script>
	<?php
	echo fomrfiche($_GET['Actualise009']);
}