<?php
 function tableauprescri(){
     $tab=prescription::nouvprescripti();
                    $cpt=1;
                    while ($sel=$tab->fetch()) 
                    {
                      ?>
                  <div style="border: 1px white dashed; padding-bottom: 30px">
                    <div class="row" style="background-color: rgba(77, 77, 78, 0.8); color: white; padding: 2px">
                      <p class="col-2">N:<?php echo $cpt;?></p>
                      <p class="col-2 float-right">ID : <?php echo $sel['IdCli'];?></p>
                      <p class="col-12">Nom: <?php echo $sel['NomCli'].' '.$sel['PostnomCli'].' '.$sel['PrenomCli'];?></p>
                      <a class="row">
                      <p class="col-6">Tel: <?php echo $sel['TelCli'];?></p>
                      <p class="col-6">Genre : <?php echo $sel['GenreCli'];?></p>
                      <p>Adresse :<?php echo $sel['NumParcelCli'].'/'.$sel['NomQuart'].'/'.$sel['NomVille'].'/'.$sel['NomProv'].'/'.$sel['NomPays'].'.';?></p> 
                      </a>                   
                   </div>
                   <?php
                   $cpt++;
                   ?>
                    <table class="table">
                          <thead >
                            <tr>
                              <th style="text-align: center; font-family: timenewroman;">PRESCRIPTION</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td  style="font-family: timenewroman; font-size: 15px;"><?php echo $sel['Prescrip'];?></td>
                            </tr>              
                        </tbody>
                      </table>
                      <a style="color: black" class="btn btn-default btn-xs float-right" id="facturation" onclick="recidpresc('<?=$sel["IdPrescrip"]?>')">
                        <i class="fas fa-pencil-alt"></i>Facturer
                      </a>
                    </div>
                      <div style="padding-bottom: 5px;" ></div>
                <?php
                  }
                  
 }            
 function filtretabpresc($var){
     $tab=prescription::rechprescriptnonfacture($var);
                    $cpt=1;
                    while ($sel=$tab->fetch()) 
                    {
                      ?>
                  <div style="border: 1px white dashed; padding-bottom: 30px">
                    <div class="row" style="background-color: rgba(77, 77, 78, 0.8); color: white; padding: 2px">
                      <p class="col-2">N:<?php echo $cpt;?></p>
                      <p class="col-2 float-right">ID : <?php echo $sel['IdCli'];?></p>
                      <p class="col-12">Nom: <?php echo $sel['NomCli'].' '.$sel['PostnomCli'].' '.$sel['PrenomCli'];?></p>
                      <a class="row">
                      <p class="col-6">Tel: <?php echo $sel['TelCli'];?></p>
                      <p class="col-6">Genre : <?php echo $sel['GenreCli'];?></p>
                      <p>Adresse :<?php echo $sel['NumParcelCli'].'/'.$sel['NomQuart'].'/'.$sel['NomVille'].'/'.$sel['NomProv'].'/'.$sel['NomPays'].'.';?></p> 
                      </a>                   
                   </div>
                   <?php
                   $cpt++;
                   ?>
                    <table class="table">
                          <thead >
                            <tr>
                              <th style="text-align: center; font-family: timenewroman;">PRESCRIPTION</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td  style="font-family: timenewroman; font-size: 15px;"><?php echo $sel['Prescrip'];?></td>
                            </tr>              
                        </tbody>
                      </table>
                      <a style="color: black" class="btn btn-default btn-xs float-right" id="facturation" onclick="recidpresc('<?=$sel["IdPrescrip"]?>')">
                        <i class="fas fa-pencil-alt"></i>Facturer
                      </a>
                    </div>
                      <div style="padding-bottom: 5px;" ></div>
                <?php
                  }
                  
 }                 