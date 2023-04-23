<?php
function fProg(){
	?>
 <form role="form" id="formprog" enctype="multipart/form-data">
              <div class="row">
                  <div class="form-group col-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="ObjProg "> Objet</label>
                      <input type="textarea" class="form-control" id="ObjProg" name="ObjProg" placeholder="Nom">
                  </div>
                  <div class="form-group col-3" style="padding-bottom: 0px; margin-bottom: 0px;">
                    <label for="DebProg"> Date Debut</label>
                    <input type="date" class="form-control" id="DebProg" name="DebProg">
                  </div>
                  <div class="form-group col-3" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="FinProg"> Date Fin</label>
                      <input type="Date" class="form-control" id="FinProg" name="FinProg">
                  </div>
              </div>
                 
                  <div class="form-group" style="text-align: center;">
                      
                        <label style="text-align: center; border-radius: 25px; color: green;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " >PROGRAMME</label> 
                      <textarea class="textarea" class="form-control" id="Prog" name="Prog" max-rows="30" style="border:1px solid black; font-size: 14px;max-height:50px"></textarea>
                  
                  </div>
  					 <div class=" form-group  row"  style=" border: 1px solid transparent ; margin-top: 20px; padding: 2px;
  border-color: #c3c4c4;">
		  		            <button class="btn-success col-xs-4 col-sm-4 col-md-4 col-lg-4" id="ajouteprog" name="ajouteprog"> Enregistrer</button>
		  		           
		  		            <input type="reset" class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4 offset-sm-4" id="annuler" name="annuler" value="Annuler">       
		        </div>
            </form>
            <span id="resultat"></span>
<?php	
}
function fProgMod($id){
	$tab=programme::RechProg($id);
  	$Pro=$tab->fetch();
	?>
 <form role="form" id="formprog" enctype="multipart/form-data">
 	<button id="BtnIDProg" class="col-12 btn-xs" value="<?=$Pro['IdProg']?>" >ID: <?=$Pro['IdProg']?></button>
              <div class="row">
                  <div class="form-group col-6" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="ObjProg "> Objet</label>
                      <input type="textarea" class="form-control" id="ObjProg" name="ObjProg" value="<?=$Pro['ObjProg']?>" >
                  </div>
                  <div class="form-group col-3" style="padding-bottom: 0px; margin-bottom: 0px;">
                    <label for="DebProg"> Date Debut</label>
                    <input type="date" class="form-control" name="DebProg" id="DebProg"  value="<?=$Pro['DebProg']?>">
                  </div>
                  <div class="form-group col-3" style="padding-bottom: 0px; margin-bottom: 0px;">
                      <label for="FinProg"> Date Fin</label>
                      <input type="Date" class="form-control" value="<?=$Pro['FinProg']?>"  name="FinProg" id="FinProg">
                  </div>
              </div>
                 
                  <div class="form-group" style="text-align: center;">
                      
                        <label style="text-align: center; border-radius: 25px; color: green;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " >PROGRAMME</label> 
                      <textarea class="textarea" class="form-control" id="Prog" name="Prog" rows="30" style="border-radius: 30px; font-size: 14px;">
                      	<?=$Pro['Prog']?>
                      </textarea>
                  
                  </div>
  					 <div class=" form-group  row"  style=" border: 1px solid transparent ; margin-top: 20px; padding: 2px;
  border-color: #c3c4c4;">
		  		            <input type="button" class="btn-success col-xs-4 col-sm-4 col-md-4 col-lg-4" value="Modifier" onclick="modifierprog($('#BtnIDProg').val())">
		  		           
		  		            <input type="reset" class="btn-default col-xs-4 col-sm-4 col-md-4 col-lg-4 offset-sm-4" id="annuler" name="annuler" value="Annuler">       
		        </div>
            </form>
            <span id="resultat"></span>
<?php	
}


?>