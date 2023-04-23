
<script type="text/javascript" src="../plugins/scriptadresse.js"></script>

<?php

function fclientfiltre($chose){
  include('../M/adresse.class.php');
  $tabcl=client::rechercheclient($chose);
  $InfCli=$tabcl->fetch();
  ?>
  <!-- <script type="text/javascript" src="../plugins/scriptclient.js"></script>
  <script type="text/javascript" src="../plugins/scriptadresse.js"></script> -->
   <form role="form" id="formclient" enctype="multipart/form-data">
    <button id="BtnIDcli" class="col-12 btn-xs" value="<?=$InfCli['IdCli']?>" >ID: <?=$InfCli['IdCli']?></button>
              <div class="row">

                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="NomClient "> Nom</label>
                      <input type="text" class="form-control input-xs" id="NomClient" name="NomClient" placeholder="Nom" value="<?=$InfCli['NomCli']?>">
                  </div>
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="PostnomCli"> Postnom</label>
                      <input type="text" class="form-control" id="PostnomClient" name="PostnomClient" value="<?=$InfCli['PostnomCli']?>">
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                    <label for="PrenomClient"> Prenom</label>
                    <input type="text" class="form-control" id="PrenomClient" name="PrenomClient" value="<?=$InfCli['PrenomCli']?>">
                  </div>
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="TelClient"> Tel</label>
                      <input type="Tel" class="form-control" id="TelClient" name="TelClient" value="<?=$InfCli['TelCli']?>">
                    </div>
              </div>
              <div class="row">
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                    <label for="PrenomClient">Photo </label>
                    <input type="file" class="form-control" id="PhotoCli" name="PhotoCli" value="<?=$InfCli['PHotoCli']?>">
                  </div>
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="Jeton"> Jeton</label>
                      <input type="text" class="form-control" id="Jeton" name="Jeton" value="<?=$InfCli['IdJeton']?>" onkeyup="verifierjeton($(this).val())">
                    </div>
              </div>
                  <div class="row">
                    <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 2px;">
                      <label for="DateNaisClient"> Date de Naissence</label>
                      <input type="Date" class="form-control" id="DateNaisClient" name="DateNaisClient" value="<?=$InfCli['DateNaisCli']?>">
                    </div>
                    <div class="form-group col-sm-6">
                            <label>Nationnalité</label>
                            <select class="form-control" name="Nation">
                              <?php
                               $nati=nationalite::selectionnernation();
                               while ($sel=$nati->fetch()) 
                               {
                              ?>
                              <option value="<?php echo $sel['IdNation'];?>"><?Php echo $sel['NomNation'];?></option>
                              <?php
                               }
                              ?>
                            </select>
                    </div>
                  </div>
                  <div class="form-group" style="text-align: center;">
                      <label class="form-group " style="margin-bottom:0px;" >Genre</label>
                        <select class="form-control col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-sm-2" name="GenreClient" style="margin-top:0px;">
                          <option value="Aucun">Aucun</option>
                          <option value="Masculin">Masculin</option>
                          <option value="Feminin">Feminin</option>
                        </select>
                  </div>

<!-- Adresse -->
                 <fieldset id="adresse" style=" border: 1px solid transparent ; border-color: #c3c4c4;  border-radius: 30px;"> 
                    
                      <label style="text-align: center; border-radius: 25px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " > Adresse</label> 
                      
                      <div class="row">
                        <div class="form-group col-sm-6">
                          <label for="pays">Pays</label>
                          <select id="pays" class='form-control pays' onchange="pays1($(this).val())">
                            <option value=""> Aucun </option>
                            <?php

                             $liste=$adresse=adresse::selectionnerpays();
                             while ($sel=$liste->fetch()) 
                             {
                            ?>
                            <option value="<?php echo $sel['IdPays']?>"><?Php echo $sel['NomPays'];?></option>
                            <?php
                             }
                            ?>
                          </select>
                        </div>
                        <div class="form-group col-sm-6">
                          <label>Province</label>
                          <select id="prov" class="form-control" onchange="prov1($(this).val())">
                            
                          </select>
                        </div>
                      </div>
                      <div class="row">    
                        <div class="form-group col-sm-6">
                          <label>Ville</label>
                          <select id="ville" class="form-control" onchange="ville1($(this).val())">
                            
                          </select>
                        </div>
                        <div class="form-group col-sm-6">
                          <label>Quartier</label>
                          <select id="quart" class="form-control" name="Quartier">
                           
                          </select>
                        </div>
                      </div>
                     <div class="form-group row col-xs-10 col-sm-10 col-md-10 col-lg-10 offset-sm-1">
                        <input type="text" class="form-control" id="NumParcelClient" name="NumParcelClient" value="<?=$InfCli['NumParcelCli']?>">                 
                      </div>
             </fieldset>                 
                  
             <div class=" form-group  row"  style=" border: 1px solid transparent ; margin-top: 20px; padding: 2px;
  border-color: #c3c4c4;">
                      <input type="button" class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4" id="btnmodifier" name="btnmodifier" onclick="EnregmodifierClient($('#BtnIDcli').val())" value="Modifier">
                     
                      <input type="button"  class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4 offset-sm-4" id="annuler" name="annuler" onclick="annulerMod()" value="Annuler">
            </div>
            </form>
  <?php
}

function fclient(){
	?>

	 <form role="form" id="formclient" enctype="multipart/form-data">
              <div class="row">
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="NomClient "> Nom</label>
                      <input type="text" class="form-control input-xs" id="NomClient" name="NomClient" placeholder="Nom">
                  </div>
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="PostnomCli"> Postnom</label>
                      <input type="text" class="form-control" id="PostnomClient" name="PostnomClient" placeholder="Postnom">
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                    <label for="PrenomClient"> Prenom</label>
                    <input type="text" class="form-control" id="PrenomClient" name="PrenomClient" placeholder="Enter le Prenom ici">
                  </div>
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="TelClient"> Tel</label>
                      <input type="Tel" class="form-control" id="TelClient" name="TelClient" placeholder="Enter Num Tel ici">
                    </div>
              </div>
              <div class="row">
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                    <label for="PrenomClient">Photo </label>
                    <input type="file" class="form-control" id="PhotoCli" name="PhotoCli" placeholder="">
                  </div>
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="Jeton"> Jeton</label>
                      <input type="text" class="form-control" id="Jeton" name="Jeton" placeholder="Jeton" onkeyup="verifierjeton($(this).val())">
                    </div>
              </div>
                  <div class="row">
                    <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 2px;">
                      <label for="DateNaisClient"> Date de Naissence</label>
                      <input type="Date" class="form-control" id="DateNaisClient" name="DateNaisClient" placeholder="Enter le date de naiss">
                    </div>
                    <div class="form-group col-sm-6">
                            <label>Nationnalité</label>
                            <select class="form-control" name="Nation">
                              <?php
                               $nati=nationalite::selectionnernation();
                               while ($sel=$nati->fetch()) 
                               {
                              ?>
                              <option value="<?php echo $sel['IdNation'];?>"><?Php echo $sel['NomNation'];?></option>
                              <?php
                               }
                              ?>
                            </select>
                    </div>
                  </div>
                  <div class="form-group" style="text-align: center;">
                      <label class="form-group " style="margin-bottom:0px;" >Genre</label>
                        <select class="form-control col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-sm-2" name="GenreClient" style="margin-top:0px;">
                          <option value="Aucun">Aucun</option>
                          <option value="Masculin">Masculin</option>
                          <option value="Feminin">Feminin</option>
                        </select>
                  </div>

<!-- Adresse -->
                 <fieldset id="adresse" style=" border: 1px solid transparent ; border-color: #c3c4c4;  border-radius: 30px;"> 
                    
                      <label style="text-align: center; border-radius: 25px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " > Adresse</label> 
                      
                      <div class="row">
                        <div class="form-group col-sm-6">
                          <label for="pays">Pays</label>
                          <select id="pays" class='form-control pays' onchange="pays1($(this).val())">
                            <option value=""> Aucun </option>
                            <?php

                             $liste=$adresse=adresse::selectionnerpays();
                             while ($sel=$liste->fetch()) 
                             {
                            ?>
                            <option value="<?php echo $sel['IdPays']?>"><?Php echo $sel['NomPays'];?></option>
                            <?php
                             }
                            ?>
                          </select>
                        </div>
                        <div class="form-group col-sm-6">
                          <label>Province</label>
                          <select id="prov" class="form-control" onchange="prov1($(this).val())">
                            
                          </select>
                        </div>
                      </div>
                      <div class="row">    
                        <div class="form-group col-sm-6">
                          <label>Ville</label>
                          <select id="ville" class="form-control" onchange="ville1($(this).val())">
                            
                          </select>
                        </div>
                        <div class="form-group col-sm-6">
                          <label>Quartier</label>
                          <select id="quart" class="form-control" name="Quartier">
                           
                          </select>
                        </div>
                      </div>
                     <div class="form-group row col-xs-10 col-sm-10 col-md-10 col-lg-10 offset-sm-1">
                        <input type="text" class="form-control" id="NumParcelClient" name="NumParcelClient" placeholder="Num Parcelle">                 
                      </div>
             </fieldset>                 
	                
  					 <div class=" form-group  row"  style=" border: 1px solid transparent ; margin-top: 20px; padding: 2px;
  border-color: #c3c4c4;">
		  		            <button class="btn-success col-xs-4 col-sm-4 col-md-4 col-lg-4" id="btncl" name="btncl" onclick="ajouterClient()"> Enregistrer</button>
		  		           
		  		            <input type="reset" class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4 offset-sm-4" id="annuler" name="annuler" value="Annuler">       
		        </div>
             <span id="resultat"></span>
            </form>
	<?php
}
?>
<!-- <script type="text/javascript" src="../plugins/scriptclient.js"></script> -->
