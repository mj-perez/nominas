
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de nominas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <!--<link rel="stylesheet" href="assets/css/font-awesome.min.css">-->
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/css/skin-blue.min.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a class="logo">
      <img src="assets/img/logo-progestion2.png"></a>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
             <form method="post" action="login">
                      <li>Bienvenido(a) <strong  Style="color:#ffffff;"><?php echo $nombre;?></strong> </li>
                      <div class="nav__iniciar-sesion-next">
                        <button class="btn btn-default btn-flat" id="btn_ini"  type="submit" style="height:29px; width:125px text-align:center;">
                        CERRAR SESIÓN</button>
                      </div>
             </form>
         </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        <li><a href="nominalist/listNominas"><i class="fa fa-link"></i> <span>Lista de contratados</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Rutas</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>


  <div class="content-wrapper">
    <section class="content-header">
      <h1>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>
    <section class="content container-fluid">
    </section>
  </div>


  <div class="control-sidebar-bg"></div>
</div>



<!-- jQuery 3 -->
<script src="assets/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>

</body>
</html>