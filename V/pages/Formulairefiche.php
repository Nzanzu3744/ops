<?php 
function fomrfiche($iclient){
	?>
	<script type="text/javascript" src="../plugins/scriptfiche.js"></script>
		<form role="form" id="formfiche" enctype="multipart/form-data">
              <div class="row" style="text-align: center;">
                  <div class="form-group col-sm-4" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="TempFiche ">Temp.Fiche</label>
                      <input type="text" class="form-control input-xs" id="TempFiche" name="TempFiche" placeholder='Temperature' >
                  </div>
                  <div class="form-group col-sm-4" style="padding-bottom: 0px; margin-bottom: 2px;">
                      <label for="TaFiche"> TA</label>
                      <input type="text" class="form-control" id="TaFiche" name="TaFiche" placeholder="TA">
                    </div>
                  <div class="form-group col-sm-4" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="RespFiche"> Respiration</label>
                      <input type="text" class="form-control" id="RespFiche" name="RespFiche" placeholder="Respiration">
                  </div>
                  
              </div>
              <div class="row">
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                    <label for="PulsFiche"> Pulsation</label>
                    <input type="text" class="form-control" id="PulsFiche" name="PulsFiche" placeholder="Pulsation">
                  </div>
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="PoidFiche"> Poid</label>
                      <input type="text" class="form-control" id="PoidFiche" name="PoidFiche" placeholder="Poid">
                    </div>
              </div>
              
                      <label style="text-align: center; border-radius: 25px; color: green;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " > ANAMNESE</label> 
                      <textarea class="textarea" class="form-control" id="AnamFiche" name="AnamFiche" rows="5" placeholder="Anamse" style="border-radius: 30px; font-size: 14px"></textarea>
                      
                              
                  
             <div class=" form-group  row"  style=" border: 1px solid transparent ; margin-top: 20px; padding: 2px;
  border-color: #c3c4c4;">
                      <input type="button"  onclick="ajouterFiche('<?=$iclient?>')" class="btn-success col-xs-4 col-sm-4 col-md-4 col-lg-4" id="" name="" value="Enregistrer">
                     
                      <input type="reset" class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4 offset-sm-4" id="annuler" name="annuler" value="Annulerr">       
            </div>
            </form>

	<?php
}


function fomrficheMod($iclient,$idfiche){
	 $fiche=fiche::filtrerfiche($idfiche,$iclient);
	 $list0202=$fiche->fetch();
	?>
	<script type="text/javascript" src="../plugins/scriptfiche.js"></script>
		<form role="form" id="formfiche" enctype="multipart/form-data">
              <div class="row" style="text-align: center;">
                  <div class="form-group col-sm-4" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="TempFiche ">Temp.Fiche</label>
                      <input type="text" class="form-control input-xs" id="TempFiche" name="TempFiche" value="<?=$list0202['TempFiche']?>">
                  </div>
                  <div class="form-group col-sm-4" style="padding-bottom: 0px; margin-bottom: 2px;">
                      <label for="TaFiche"> TA</label>
                      <input type="text" class="form-control" id="TaFiche" name="TaFiche" value="<?=$list0202['TaFiche']?>">
                    </div>
                  <div class="form-group col-sm-4" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="RespFiche"> Respiration</label>
                      <input type="text" class="form-control" id="RespFiche" name="RespFiche" value="<?=$list0202['RespFiche']?>">
                  </div>
                  
              </div>
              <div class="row">
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                    <label for="PulsFiche"> Pulsation</label>
                    <input type="text" class="form-control" id="PulsFiche" name="PulsFiche" value="<?=$list0202['PulsFiche']?>">
                  </div>
                  <div class="form-group col-sm-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="PoidFiche"> Poid</label>
                      <input type="text" class="form-control" id="PoidFiche" name="PoidFiche"  value="<?=$list0202['PoidFiche']?>">
                    </div>
              </div>
              <div>
                      <label style="text-align: center; border-radius: 25px; color: green;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " > ANAMNESE</label> 
                      <textarea class="form-control textarea" id="AnamFiche" name="AnamFiche" rows="6" cols="120" style="border-radius: 30px; font-size: 14px"><?php echo $list0202['AnamFiche'];?></textarea>
                      
                              
                  
             
            </form>
            <div class=" form-group  row"  style=" border: 1px solid transparent ; margin-top: 20px; padding: 2px;
  border-color: #c3c4c4;">
                      <input type="button"  onclick="Modifierfiche('<?=$idfiche?>','<?=$iclient?>')" class="btn-success col-xs-4 col-sm-4 col-md-4 col-lg-4" id="" name="" value="Modifier">
                     
                      <input type="reset" class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4 offset-sm-4" id="annuler" name="annuler" value="Annuler">       
            </div>

	<?php
}
