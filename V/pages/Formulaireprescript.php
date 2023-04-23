<?php
function frmprescription(){
	?>
		<form role="form" id="formpresc" enctype="multipart/form-data">
            
              <div class="mb-3">
                <textarea class="textarea" placeholder="Champs de prescription" name="prescript" id="prescript">            
                </textarea>
              </div>
            <div class="row">
                <input type="submit" class="btn-success col-xs-2 col-sm-2 col-md-2 col-lg-2" onclick="ajouterPrescription('<?=$_GET['idF'];?>',$('#prescript').val())" id="" name="" value="Enregistrer">     
                <input type="reset" class="btn-default col-xs-2 col-sm-2 col-md-2 col-lg-2 offset-sm-8" id="annuler" name="annuler" value="Annulerr">    
            </div>   
          
          </form>

	<?php
}

function frmprescriptionModif($idp,$idFiche){
	$tab=prescription::filtrerprescription11($idp);
	$Presc=$tab->fetch();
	?>
		<form role="form" id="formpresc" enctype="multipart/form-data">
            
              <div class="mb-3">
                <textarea class="textarea" placeholder="Champs de prescription" name="prescript" id="prescript"><?=$Presc['Prescrip']?>            
                </textarea>
              </div>
            <div class="row">
                <input type="button" class="btn-default col-xs-2 col-sm-2 col-md-2 col-lg-2" onclick="modifiermaint('<?=$idp?>','<?=$idFiche?>',$('#prescript').val())" id="" name="" value="Modifier">     
                <input type="reset" class="btn-default col-xs-2 col-sm-2 col-md-2 col-lg-2 offset-sm-8" id="annuler" name="annuler" value="Annulerr">    
            </div>   
          
          </form>

	<?php
}
