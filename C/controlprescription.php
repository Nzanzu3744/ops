

<?php
include('../M/prescription.class.php');
include('../V/pages/Formulaireprescript.php');


if(isset($_GET['idFiche']) AND isset($_GET['Pres'])){
	$idFiche=htmlspecialchars($_GET['idFiche']); 
	echo prescription::ajouterprescrip($_GET['idFiche'],$_GET['Pres']);			
}

 if(isset($_GET['idPres']) AND !empty($_GET['idPres']))
{
	$idPres=htmlspecialchars($_GET['idPres']);
	echo prescription::supprimerprescrip($idPres);
}
//REcuperation
if (isset($_GET['idpremode']) AND !empty($_GET['idpremode'])) {
	?>
		<!--  Control ya textearea yetu -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    $('.textarea').summernote()
  })
</script>
	<?php
 	echo frmprescriptionModif($_GET['idpremode'],$_GET['Idfiche']);		
}
//Modification proprement dite
if (isset($_GET['Prescription']) AND !empty($_GET['Prescription']) ) {
	?>
		<!--  Control ya textearea yetu -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    $('.textarea').summernote()
  })
</script>

	<?php
	echo prescription::modifierprescrip($_GET['idpres'],$_GET['Prescription']);
}

