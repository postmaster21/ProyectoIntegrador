<?php

  session_start();

  require_once('../vendor/autoload.php');
  require_once('../App/Auth/Auth.php');

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/bootstrap-social.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
   
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../pulic/css/blue.css">


  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="row">
        <?php if (Auth::isLogin()): ?>

          <script language="Javascript">
              
              location.href='usuario.php';
          </script>

        <?php else: ?>
        <?php
            Auth::getUserAuth();
        ?>
        
          <div class="col-md-8">
              <a href="?login=Facebook" class="btn btn-block btn-social btn-facebook"><span class="fa fa-facebook"></span> Inicia sesion con Facebook</a>
              <a href="?login=Google" class="btn btn-block btn-social btn-google"><span class="fa fa-google"></span> Inicia sesion con Google</a>
              
          </div>

          <?php endif; ?>
      </div>

      <div class="login-box-body">
        <p class="login-box-msg"></p>
        <form method="post" id="frmAcceso">
          <div class="form-group has-feedback">
            <input type="text" id="logina" name="logina" class="form-control" placeholder="Usuario">
            <span class="fa fa-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="clavea" name="clavea" class="form-control" placeholder="Password">
            <span class="fa fa-key form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
             
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-success btn-block btn-flat">Ingresar</button>
            </div><!-- /.col -->
          </div>
        </form>

       
        

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->


    <script src="../public/js/jquery-3.1.1.min.js"></script>

    <script src="../public/js/bootstrap.min.js"></script>

    <script src="../public/js/bootbox.min.js"></script>
    <script type="text/javascript" src="scripts/login.js"></script>




  </body>
</html>
