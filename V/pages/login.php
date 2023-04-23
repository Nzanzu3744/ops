<?php
session_start();
unset($_SESSION['Agent']);
session_destroy();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OPS_Clinique</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

</head>
  <body style="background-image:url('../dist/img/photo6.jpg'); ">
    <div style="padding-top: 10%">
    <div style="text-align: center; margin-bottom: 100px ">
      <h1 style="font-family: algerian; font-size: 90px; color: white; background:rgba(0,255,0,0.1); ">CLINIQUE OUI  POUR LA SANSTE</h1>
    
        <CENTER style="font-family: timenewroman" class="">
          <img src="../dist/img/logo.png" style="height: 200px; width: 220px"><br>
         
        </CENTER>
    </div>
      <div class="card col-sm-8 offset-sm-2 " style="padding: 0px; background: rgba(0,255,0,0.2); color:white">
          <div class="card-header"  style="background-color: #4d4d4e;text-align: center margin-left: 0px;margin-right: 0px; margin-top: 20px">
             <h3 class="card-title col-sm-8 offset-sm-4" style="color: white;">CONNECTEZ VOUS ICI</h3>
          </div>
          <form class="form-horizontal" id="Login" role="form"> 
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="Matricul" class="col-sm-2 col-form-label"  required>Matricul</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="Matricul"name="Matricul"  maxlength="4" placeholder="Matricul ici" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Cle" class="col-sm-2 col-form-label">Mot de Passe</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" maxlength="8" id="Cle" name='Cle' placeholder="Mot de passe ici" required>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <input type="button" id="envoi" name="envoi" class="btn btn-success" value='Connexion'>
                    <button type="reset" class="btn btn-default float-right">Annuler</button>
                  </div>
          </form>
          <div id="messages" style=" color: red; text-align: center">
          </div>
    </div>
  </div>
  <!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#envoi').click(function(e){
    var Matricul  = encodeURIComponent( $('#Matricul').val() );
    var Cle = encodeURIComponent( $('#Cle').val() );

    if ( Matricul != "" && Cle != "" ){
      // alert(1);
        $.ajax({
            type:'POST',
            url:'../../C/controllogin.php',
            data: $('#Login').serialize(),
            success:function(serveur){
              alert(serveur);
              document.location.href='acceuil.php';
              }
            });
      }else if(Matricul == "" && Cle != ""){
      $('#Matricul').addClass('is-invalid').removeClass('is-valid');
      alert("Merci d'avoir Rempli les differents Champs de saisi.");
    }else if( Matricul != "" && Cle == ""){
       $('#Cle').addClass('is-invalid').removeClass('is-valid');
       alert("Merci d'avoir Rempli les differents Champs de saisi.");
    }else {
      $('#Matricul').addClass('is-invalid').removeClass('is-valid');
      $('#Cle').addClass('is-invalid').removeClass('is-valid');
      alert("Merci d'avoir Rempli les differents Champs de saisi.");
    }                                                                                                                                     
});
  $('#Matricul').click(function(){
  $('#Matricul').removeClass('is-invalid');
  });

  $('#Cle').click(function(){
    $('#Cle').removeClass('is-invalid');
  });
});
</script>
</body>
</html>