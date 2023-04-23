<?php
session_start();
if(isset($_SESSION['Agent'])){
include('header.php');	
?>
<div style="margin-top: 5%; margin-left: 5%; color: white; text-align: center; font-size: 60px; height:700px;background:rgba(0,255,0,0.2)">
	<h1 style="font-family: algerian; font-size: 100px">Oui pour la santé OPS</h1>
	
	 <div style="">
		<?php
		if($_SESSION['Agent']['IdFonct']==1){
			echo "Bienvenu au service d Adminitraction"; 
		}if($_SESSION['Agent']['IdFonct']==2){
			echo "Bienvenu au service de Consultation"; 
		}if($_SESSION['Agent']['IdFonct']==3){
			echo "Bienvenu au service de caisse"; 
		}if($_SESSION['Agent']['IdFonct']==4){
			echo "Bienvenu au service Commercial"; 
		}if($_SESSION['Agent']['IdFonct']==5){
			echo "Bienvenu au service Cher Reception"; 
		}if($_SESSION['Agent']['IdFonct']==6){
			echo "Bienvenu Cher Sensibilisateur"; 
		}
		?>
		 <H1 style="" > <?php echo strtoupper( $_SESSION['Agent']['NomAgent'].' '.$_SESSION['Agent']['PostnomAgent'].' '.$_SESSION['Agent']['PrenomAgent']);?>
	 </H1>
	</div>
</div>
<?php
include('footer.php');	
}
if(!isset($_SESSION['Agent'])){
	header('location:login.php');
}
?>