<?php session_start();?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <title>Riesg0| Acceder</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Google Font: Open Sans -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,800,800italic">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300,700">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <!-- App CSS -->
  <link rel="stylesheet" href="assets/css/mvpready-admin.css">
  <link rel="stylesheet" href="assets/css/mvpready-flat.css">
  <!-- <link href="assets/css/custom.css" rel="stylesheet">-->

  <!-- Favicon -->
  <link rel="shortcut icon" href="favicon.ico">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>

<body class="account-bg">

  <header class="navbar navbar-inverse" role="banner">

    <div class="container">

      <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <i class="fa fa-cog"></i>
        </button>

        <a href="" class="navbar-brand navbar-brand-img">
          <img src="assets/img/logo.png" alt="Xploradata">
        </a>
      </div> <!-- /.navbar-header -->

    </div> <!-- /.container -->

  </header>

  <div class="account-wrapper">

    <div class="account-body">
    <img src="assets/img/logo2.png"  style="margin-top:-60px;">

      <h3>Bienvenido a Riesg0</h3>


      <h5>Por favor ingrese su usuario y password para acceder.</h5>

      <form class="form account-form" method="POST" action="home.php?page=login">


        <div class="form-group">
          <label for="login-username" class="placeholder-hidden">Usuario</label>
          <input type="text" class="form-control" id="login-username" name ="nick" placeholder="Username" tabindex="1">
        </div> <!-- /.form-group -->

        <div class="form-group">
          <label for="login-password" class="placeholder-hidden">Password</label>
          <input type="password" class="form-control" id="login-password" name ="clave" placeholder="Password" tabindex="2">
        </div> <!-- /.form-group -->

        

        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="4">
            Acceder &nbsp; <i class="fa fa-play-circle"></i>
          </button>
        </div> <!-- /.form-group -->

      </form>

      <?php 

      require_once('php/clases/app/notificaciones.class.php');
      $notificaciones=new Notificaciones();
      $notificaciones->Mensaje();
            ?>


    </div> <!-- /.account-body -->

    

  </div> <!-- /.account-wrapper -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Core JS -->
<script src="assets/js/libs/jquery-1.10.2.min.js"></script>
<script src="assets/js/libs/bootstrap.min.js"></script>

<!--[if lt IE 9]>
<script src="assets/js/libs/excanvas.compiled.js"></script>
<![endif]-->
<!-- App JS -->
<script src="assets/js/mvpready-core.js"></script>
<script src="assets/js/mvpready-admin.js"></script>

<!-- Plugin JS -->
<script src="assets/js/mvpready-account.js"></script>

 
</body>
</html>




