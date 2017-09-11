<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de Nominas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/css/blue.css">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
<b>Sistema de Nominas</b> 
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingrese Usuario y Contraseña</p>
    <form id="login" method="post" action="menu">
      <div class="form-group">
        <input type="text" id="txt_usuario" name="txt_usuario" class="form-control" placeholder="Usuario">
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="txt_contra" name="txt_contra" class="form-control" placeholder="Contraseña">
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
		   <button id="btn_ini" name="btn_ini" type="submit" onclick="login();" class="form-control btn btn-primary">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="assets/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/js/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  

</script>

</body>
</html>