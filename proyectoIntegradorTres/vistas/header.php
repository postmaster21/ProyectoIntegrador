<?php 
if (strlen(session_id())<1) {
    session_start();
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proyecto</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../public/css/bootstrap-select.min.css">

    <link rel="stylesheet" href="../public/css/bootstrap.min.css">

    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../public/img/favicon.ico">

    <!-- DataTables-->

    <link rel="stylesheet" href="../public/datatables/buttons.dataTables.min.css">
    <link rel="stylesheet" href="../public/datatables/jquery.dataTables.min.css">
    
    <link rel="stylesheet" href="../public/datatables/responsive.dataTables.min.css">

    <style type="text/css">
      #permisos, #imagenmuestra{
        display: none;
      }
    </style>

  </head>
  <body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Proyecto</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Proyecto</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  
                  <span class="hidden-xs">Bienvenido : <?php echo $_SESSION['nombre']; echo $_SESSION['user']['name']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="../ajax/usuario.php?op=salir" class="btn btn-primary btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>

            <?php 
            //var_dump($_SESSION);
            //if ($_SESSION['escritorio']==0)
            if (isset($_SESSION['escritorio']))
            {
              echo '<li>
              <a href="#" onclick="mostrar('.$_SESSION['idusuario'].')">
                <i class="fa fa-tasks"></i> <span>Ver Perfil</span>
              </a>
              
            </li>';
            }
            ?>
            
            
            
            
            
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>