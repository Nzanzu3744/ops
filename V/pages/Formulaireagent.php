<?php
function fagent(){
	?>
	<script type="text/javascript" src="../plugins/scriptadresse.js"></script>
	 <form role="form" id="formagent" enctype="multipart/form-data" style="">
              <div class="row" style="margin-bottom: 0px;">
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="NomAgent "> Nom</label>
                      <input type="text" class="form-control input-xs" id="NomAgent" name="NomAgent" placeholder="Nom">
                  </div>
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="PostnomAgent "> Postnom</label>
                      <input type="text" class="form-control" id="PostnomAgent" name="PostnomAgent" placeholder="Postnom">
                  </div>
              </div>
              <div class="row" style="margin-bottom: 0px;">
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                    <label for="PrenomAgent"> Prenom</label>
                    <input type="text" class="form-control" id="PrenomAgent" name="PrenomAgent" placeholder="Enter le Prenom ici">
                  </div>
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                    <label for="NNAgent"> NN</label>
                    <input type="text" class="form-control" id="NNAgent" name="NNAgent" placeholder="Enter le NN ici">
                  </div>
              </div>
                  <div class="row" style="margin-bottom: 0px;">
                    <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="TelAgent"> Tel</label>
                      <input type="Tel" class="form-control" id="TelAgent" name="TelAgent" placeholder="Enter Num Tel ici">
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
                  
                  <div class="row" style="margin-bottom: 0px;">
                    <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 2px;">
                      <label for="DateNaisAgent"> Date de Naissence</label>
                      <input type="Date" class="form-control" id="DateNaisAgent" name="DateNaisAgent" placeholder="Enter le date de naiss">
                    </div>
                    <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 2px;">
                      <label>Qualification</label>
                            <select class="form-control" name="Qualif">
                              <?php
                               $Qualif=qualification::selectionnerqualif();
                               while ($sel=$Qualif->fetch()) 
                               {
                              ?>
                              <option value="<?php echo $sel['IdQualif'];?>"><?Php echo $sel['Qualif'];?></option>
                              <?php
                               }
                              ?>
                            </select>
                    </div>
                    
                    <div class="form-group" style=" margin-bottom: 0px;text-align: center;margin-left: 15%;">
	                    <label for="PhotoAgent"> Photo</label>
	                    <input type="file" class="form-control" id="PhotoAgent" name="PhotoAgent" placeholder="Enter la Photo">
              		</div>
                  </div>

<!-- Adresse -->
                  <fieldset id="adresse" style=" border: 1px solid transparent ; border-color: #c3c4c4;  border-radius: 30px;"> 
              		  
              				<label style="text-align: center; border-radius: 25px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " > Adresse</label> 
                      
                      <div class="row" style="margin-bottom: 0px;">
                        <div class="form-group col-sm-6">
                          <label for="pays">Pays</label>
                          <select id="pays" class='form-control'  onchange="pays1($(this).val())">
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
	                        <select id="prov" class="form-control"  onchange="prov1($(this).val())">
	                          
	                        </select>
	                      </div>
                      </div>
                      <div class="row" style="margin-bottom: 0px;">    
                        <div class="form-group col-sm-6">
                          <label>Ville</label>
                          <select id="ville" class="form-control"  onchange="ville1($(this).val())">
                            
                          </select>
                        </div>
                        <div class="form-group col-sm-6">
                          <label>Quartier</label>
                          <select id="quart" class="form-control" name="quart">
                           
                          </select>
                        </div>
                      </div>
	                   <div class="form-group row col-xs-10 col-sm-10 col-md-10 col-lg-10 offset-sm-1">
		                    <input type="text" class="form-control" id="NumeParcelAgent" name="NumeParcelAgent" placeholder="Num Parcelle">		              
	                    </div>
	           </fieldset>
	           <div class="form-group row " style="padding-bottom: 0px; margin-bottom: 0px;">
	                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6 row">
	                    <label class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">Genre</label>
	                      <select class="form-control col-xs-7 col-sm-7 col-md-7 col-lg-7" name="GenreAgent">
	                        <option value="Aucun">Aucun</option>
                          <option value="Masculin">Masculin</option>
                          <option value="Feminin">Feminin</option>
	                      </select>
	                </div>
	                 <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6 row">
	                    <label class="form-group col-xs-5 col-sm-5 col-md-5 col-lg-5">Fonction</label>
	                      <select class="form-control col-xs-7 col-sm-7 col-md-7 col-lg-7" name="Fonction">
                          <?php 
                            $a=new fonction();
                            $tab=$a->selectionnerfonct();
                            while ($sel=$tab->fetch()) 
                            {
                          ?>
                             <option value=<?php echo '"'.$sel['IdFonct'].'"';?> > <?Php echo $sel['NomFonct'];?> </option>
                          <?php
                            }
                          ?>
                           
	                       
	                      </select>
	                </div>
	                </div>
                  
	                
  					 <div class=" form-group  row"  style=" border: 1px solid transparent ; margin-top: -10px; padding: 0px;
  border-color: #c3c4c4;">
		  		            <input type="button" class="btn-success col-xs-4 col-sm-4 col-md-4 col-lg-4" id="" name="" value="Enregistrer" onclick="ajouterAgent();">
		  		           
		  		            <input type="reset" class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4 offset-sm-4" id="annuler" name="annuler" value="Annuler">       
		        </div>
            </form>
<?php
}
//MODIFICATION AGENT
function fagentfiltre($chose){
	include('../M/adresse.class.php');
	$tag=agent::rechercheagent($chose);
	$InfAgent=$tag->fetch();
	?>

	<script type="text/javascript" src="../plugins/scriptadresse.js"></script>
	 <form role="form" id="formagent" enctype="multipart/form-data" style="">
	 	<button id="BtnIDagent" class="col-12 btn-xs" value="<?=$InfAgent['IdAgent']?>" >ID: <?=$InfAgent['IdAgent']?></button>
              <div class="row">
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="NomAgent "> Nom</label>
                      <input type="text" class="form-control input-xs" id="NomAgent" name="NomAgent" value="<?=$InfAgent['NomAgent']?>">
                  </div>
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="PostnomAgent "> Postnom</label>
                      <input type="text" class="form-control" id="PostnomAgent" name="PostnomAgent" value="<?=$InfAgent['PostnomAgent']?>">
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                    <label for="PrenomAgent"> Prenom</label>
                    <input type="text" class="form-control" id="PrenomAgent" name="PrenomAgent" value="<?=$InfAgent['PrenomAgent']?>">
                  </div>
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                    <label for="NNAgent"> NN</label>
                    <input type="text" class="form-control" id="NNAgent" name="NNAgent" value="<?=$InfAgent['NNAgent']?>">
                  </div>
              </div>
                  <div class="row">
                    <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="TelAgent"> Tel</label>
                      <input type="Tel" class="form-control" id="TelAgent" name="TelAgent" value="<?=$InfAgent['TelAgent']?>">
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
                  
                  <div class="row">
                    <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 2px;">
                      <label for="DateNaisAgent"> Date de Naissence</label>
                      <input type="Date" class="form-control" id="DateNaisAgent" name="DateNaisAgent" placeholder="Enter le date de naiss" value="<?=$InfAgent['TelAgent']?>">
                    </div>
                    <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 2px;">
                      <label>Qualification</label>
                            <select class="form-control" name="Qualif">
                              <?php
                               $Qualif=qualification::selectionnerqualif();
                               while ($sel=$Qualif->fetch()) 
                               {
                              ?>
                              <option value="<?php echo $sel['IdQualif'];?>"><?Php echo $sel['Qualif'];?></option>
                              <?php
                               }
                              ?>
                            </select>
                    </div>
                     <div class="form-group" style=" margin-bottom: 0px;text-align: center;margin-left: 15%;">
	                    <label for="PhotoAgent"> Photo</label>
	                    <input type="file" class="form-control" id="PhotoAgent" name="PhotoAgent" placeholder="Enter la Photo">
              		</div>
                  </div>

<!-- Adresse -->
                  <fieldset id="adresse" style=" border: 1px solid transparent ; border-color: #c3c4c4;  border-radius: 30px;"> 
              		  
              				<label style="text-align: center; border-radius: 25px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " > Adresse</label> 
                      
                      <div class="row">
                        <div class="form-group col-sm-6">
                          <label for="pays">Pays</label>
                          <select id="pays" class='form-control pays'  onchange="pays1($(this).val())">
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
	                        <select id="prov" class="form-control"  onchange="prov1($(this).val())">
	                          
	                        </select>
	                      </div>
                      </div>
                      <div class="row">    
                        <div class="form-group col-sm-6">
                          <label>Ville</label>
                          <select id="ville" class="form-control"  onchange="ville1($(this).val())">
                            
                          </select>
                        </div>
                        <div class="form-group col-sm-6">
                          <label>Quartier</label>
                          <select id="quart" class="form-control" name="quart">
                           
                          </select>
                        </div>
                      </div>
	                   <div class="form-group row col-xs-10 col-sm-10 col-md-10 col-lg-10 offset-sm-1">
		                    <input type="text" class="form-control" id="NumeParcelAgent" name="NumeParcelAgent" value='<?=$InfAgent['NumeParcelAgent']?>'>		              
	                    </div>
	           </fieldset>
	           <div class="form-group row " style="padding-bottom: 0px; margin-bottom: 0px;">
	                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6 row">
	                    <label class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">Genre</label>
	                      <select class="form-control col-xs-7 col-sm-7 col-md-7 col-lg-7" name="GenreAgent">
	                        <option value="Aucun">Aucun</option>
	                          <option value="Masculin">Masculin</option>
	                          <option value="Feminin">Feminin</option>
	                      </select>
	                </div>
	                 <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6 row">
	                    <label class="form-group col-xs-5 col-sm-5 col-md-5 col-lg-5">Fonction</label>
	                      <select class="form-control col-xs-7 col-sm-7 col-md-7 col-lg-7" name="Fonction">
                          <?php 
                            $a=new fonction();
                            $tab=$a->selectionnerfonct();
                            while ($sel=$tab->fetch()) 
                            {
                          ?>
                             <option value=<?php echo '"'.$sel['IdFonct'].'"';?> > <?Php echo $sel['NomFonct'];?> </option>
                          <?php
                            }
                          ?>
                           
	                       
	                      </select>
	                </div>
	                </div>
                  
	                
  					 <div class=" form-group  row"  style=" margin-bottom: 0px;border: 1px solid transparent ; margin-top: -10px; padding: 0px;
  border-color: #c3c4c4;">
		  		           <input type="button" class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4" id="btnmodifier" name="btnmodifier" onclick="EnregmodifierAgent($('#BtnIDagent').val())" value="Modifier">
		  		           
		  		            <input type="button"  class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4 offset-sm-4" id="annuler" name="annuler" onclick="annulerMod()" value="Annuler">    
		        </div>
            </form>
            <span id="resultat"></span>
<?php
}
?>