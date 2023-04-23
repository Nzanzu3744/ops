

<?php

function fvisite(){
	?>
	<script type="text/javascript" src="../plugins/scriptadresse.js"></script>
	 <form role="form" id="formclient" enctype="multipart/form-data">
             
           
              <div class="row">
               <div class="form-group col-sm-6">
                  <label>Cas</label>
                  <select class="form-control" name="Nation" id="Nation">
                    <option value="Nouveau_Cas"> Nouveau Cas</option>
                    <option value="Ancien_Cas">Ancien Cas</option>
                  </select>
                </div>
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="Fiche"> Fiche</label>
                      <input type="text" class="form-control" id="Fiche" name="Fiche" placeholder="Fiche" onkeyup="verifierfiche($(this).val())">
                  </div>

              
                  </div>
                  <div class="form-group col-sm-12 p-0" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="Fiche"> Fiche</label>
                      <textarea class="form- textarea" id="Rem" name="Rem" placeholder="Remarque"></textarea>
                  </div>
  					 <div class=" form-group  row"  style=" border: 1px solid transparent ; margin-top: 20px; padding: 2px;
  border-color: #c3c4c4;">
		  		            <input type="button" class="btn-success col-xs-4 col-sm-4 col-md-4 col-lg-4" id="btnclient" name="btnclient" onclick="ajoutervisite($('#Nation').val(),$('#Rem').val(),$('#Fiche').val())" value="Enregistrer"> 
		  		           
		  		            <input type="reset" class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4 offset-sm-4" id="annuler" name="annuler" value="Annuler">       
		        </div>
            </form>
	<?php
}

/// MODIFIER
/*function fvisitefiltre($chose){
	include('../M/adresse.class.php');
	$tabcl=client::rechercheclient($chose);
	$InfCli=$tabcl->fetch();
	?>*/
	 // <form role="form" id="formclient" enctype="multipart/form-data">
	 //  <div class="row">
  //                 <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
  //                   <label for="PrenomClient">Photo </label>
  //                   <input type="text" class="form-control" id="IdCli" name="IdCli" placeholder="">
  //                 </div>
  //                 <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
  //                     <label for="Fiche"> Fiche</label>
  //                     <input type="text" class="form-control" id="Fiche" name="Fiche" placeholder="Fiche" onkeyup="verifierjeton($(this).val())">
  //                   </div>
              
  //                 </div>
  //            <div class=" form-group  row"  style=" border: 1px solid transparent ; margin-top: 20px; padding: 2px;
  // border-color: #c3c4c4;">
  //                     <button class="btn-success col-xs-4 col-sm-4 col-md-4 col-lg-4" id="btnclient" name="btnclient" onclick=""> Enregistrer</button>
                     
  //                     <input type="reset" class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4 offset-sm-4" id="annuler" name="annuler" value="Annuler">       
  //           </div>
  //           </form>
	// <?php
//}