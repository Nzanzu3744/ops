<?php
// Nous recuperons l'id du patient ou client sensibilisé on click
if(isset($_GET['id_Client']) AND !empty($_GET['id_Client']) ){
  include('../M/client.class.php');
	$id_Client=htmlspecialchars($_GET['id_Client']);
	$tab=client::rechercheclient($id_Client);
	if(!empty($tab)){
		$sel=$tab->fetch();
		?>
		<div class="card card-widget widget-user" style="background-color: rgba(77, 77, 77, 0.8); margin: 20px; font-size: 20px; color: white">
              <div class="widget-user-header">
                  <h3 class="widget-user-username"><?php echo strtoupper($sel['NomCli'].' '.$sel['PostnomCli']);?></h3>
                  <h5 class="widget-user-desc"><?php $sel['PrenomCli'];?></h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="../dist/img/user1-128x128.jpg" alt="Icon Agent">
              </div>
          </div>
        <div style="text-align: center">
          <button style="background-color: rgba(255, 255, 255, 0.1); font-size: 20px; color: red" id="idClient" name="idClient" value="<?=$sel['IdCli'];?>"><?php echo 'Client ID :'.$sel['IdCli'];?>
          </button>
      	</div>
		<?php
	}
}
// Nous recuperons l'id du sensibilisateur au keyup
if(isset($_GET['Num_J'])AND !empty($_GET['Num_J'])){
  include('../M/agent.class.php');
  $idagent=htmlspecialchars($_GET['Num_J']);
  $tab=agent::rechercheagent($idagent);
  if(!empty($tab)){
    $sel=$tab->fetch();
    ?>
    <div class="card card-widget widget-user" style="background-color: rgba(77, 77, 77, 0.8); font-size: 20px; color: white">
              <div class="widget-user-header">
                  <h3 class="widget-user-username"><?php echo strtoupper($sel['NomAgent'].' '.$sel['PostnomAgent']);?>
                  </h3>
                  <h5 class="widget-user-desc"><?php $sel['PrenomAgent'];?></h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="../dist/img/user1-128x128.jpg" alt="Icon Agent">
              </div>
          </div>
        <div style="text-align: center">
          <button style="background-color: rgba(255, 255, 255, 0.1); font-size: 20px; color: red" id="idAgent" name="idAgent" value="<?=$sel['IdAgent'];?>"><?php echo 'Agent ID :'.$sel['IdAgent'];?>
          </button>
        </div>
    <?php
  }
}
//id_Agent='+id+'Nombrejet='+nombre Num_Jeton IdClient
 if(isset($_GET['Num_Jeton']) AND !empty($_GET['Num_Jeton']))
{
  include('../M/registrejeton.class.php');
	echo  $Num_Jeton=htmlspecialchars($_GET['Num_Jeton']);
  echo $Client=htmlspecialchars($_GET['Client']);
  //Nous faisons appel a notre classe enregistrement jeton
	echo registrejeton::enregistrerjeton($Client,$Num_Jeton);
	
}
if (isset($_GET['id_enr']) AND !empty($_GET['id_enr'])){
  include('../M/registrejeton.class.php');
  $sup=htmlspecialchars($_GET['id_enr']);
  echo registrejeton::supprimerenregjeton($sup);
}