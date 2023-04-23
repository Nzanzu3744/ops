<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ops_clinique</title>
   
 
  <meta name="viewport" content="width=device-width, initial-scale=1">


   <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Danger au script ci dessous -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
 
</head>
<body class=" ">
<!-- Site wrapper -->
<div class="wrapper" style="font-size: 18px">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
  </nav>

  
  <aside class="main-sidebar sidebar elevation-4">
    <!-- Logo -->
      <H5 style="margin-top: 5px;" >OUI POUR LA SANTE</H5>
    <!-- Sidebar -->
    <div class="sidebar" >
      <div class="">
          <?php
           //  echo "<img src='../../dist/img/logo.png'
           // class=' img-circle elevation-3";
          echo $_SESSION['Agent']['NomAgent'].' '.$_SESSION['Agent']['PostnomAgent'].' '.$_SESSION['Agent']['PrenomAgent'];

            ?>
      </div>

      <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<!-- RECEPTION -->
<?php
       $Autha=$_SESSION['Agent']['IdFonct'];

          if($Autha==2 || $Autha==4 || $Autha==5 || $Autha==1){

?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                RECEPTION
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="AjouterClient.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Patient</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="AjouterVisiteMalade.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visite</p>
                </a>
              </li>
            </ul>
          </li>
<?php
}

if($Autha==4 || $Autha==1 ){
?>
<!-- SERVICES -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                AGENT
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="AjouterAgent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agent</p>
                </a>
              </li>
              </ul>
          </li>  
  <?php

  }

  if($Autha==3){
  ?>
<!--CAISSE-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                CAISSE
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Ajouterrecu.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Ajouterretrait.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payement</p>
                </a>
              </li>
            </ul>
          </li>
<?php
  }

  if($Autha==1){
?>
<!--ADMINISTRATION-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                FACTURATION
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="AjouterFacture.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Facture</p>
                </a>
              </li>
            </ul>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Ajoutertaux.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Taux</p>
                </a>
              </li>
            </ul>
          </li>
          <?php
        }
        if($Autha==4 || $Autha==1){
          ?>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                PROGRAMMES.
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <?php
          
          if($Autha==4){

            ?>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="AjouterProg.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter Prog</p>
                </a>
              </li>
               
               <li class="nav-item">
                <a href="RapportProgramme.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rapport Prog.</p>
                </a>
              </li>
             
             <li class="nav-item">
                <a href="AjouterJeton.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jeton</p>
                </a>
              </li>
            </ul>
            <?php
          
          }
          if($Autha==1){

            ?>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="validationprog.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Non Validés</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                <a href="RapportProgramme.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rapport Prog.</p>
                </a>
              </li>
          <?php
        }
        if($Autha==4){
          ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                BASE DES DONNEES
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Ajouterfonction.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fonction</p>
                </a>
              </li>
            </ul>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Ajouterfonction.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Adresse</p>
                </a>
              </li>
            </ul>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Ajouterfonction.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Designation</p>
                </a>
              </li>
            </ul>
          </li>    
<?php
}
}
?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                SENSIBILISATEUR
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Interfaceagent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Balance</p>
                </a>
              </li>
            </ul>
          </li>
      </ul>
    </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"  >
    <!-- Content Header (Page header) -->
    <section class="content-header" style="background-color: rgba(0, 0, 0, 0.5); color: white; margin:0px;">
      <div class="container-fluid"  >
        <div class="row mb-1"> 
          <div class="col-sm-6">

            <h3>
              <?php echo strtoupper('<a style="color:green">'.$_SESSION['Agent']['NomFonct'].'</a>'); ?>
            </h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item" onclick="destruction()"><a href="login.php"><dev  style="background-color: red; color: white; margin:0px;">Déconnection</dev></a></li>
            </ol>
          </div>
        </div>
        <script type="text/javascript">
          function destruction(){
          $.ajax({
            type:"Get",
            url:"../../C/Deconnectio.php?Decon=1",
            success:function(serveur){
              if (serveur==true){
                document.location.href='login.php';
              }
            }
          });
        }
        </script>

  
