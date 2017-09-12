<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reporte de Coberturas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/nominas/assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/nominas/assets/css/font-awesome.min.css"> 
  <!-- Ionicons -->
  <link rel="stylesheet" href="/nominas/assets/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/nominas/assets/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/nominas/assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/nominas/assets/css/skin-blue.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="/nominas/assets/css/all.css">

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
	 <a class="logo">
      <img src="<?php echo  site_url(); ?>/assets/img/logo-progestion2.png"></a>
  </a>
    <nav class="navbar navbar-static-top">   
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
           <form class="" method="post" action="../login">
                      <li>Bienvenido(a) <strong  Style="color:#ffffff;"><?php echo $nombre;?></strong> </li>
                      <div class="nav__iniciar-sesion-next">
                        <button class="btn btn-default btn-flat" id="btn_ini"  type="submit" style="height:30px; width:80px text-align:center;" >
                        CERRAR SESIÓN</button>
                      </div>
             </form>
            </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu">
		<li class="header">Menu</li>
        <li><a href=""><i class="fa fa-link"></i> <span>Lista de contratados</span></a></li>
        <li>
          <a href="#"><i class="fa fa-link"></i> <span>Reporte de coberturas</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
        </li>
      </ul>
    </section>
  </aside>  
  <div class="content-wrapper">  
    <section class="content-header">
      <h1>
        Reporte de Coberturas
      </h1>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
<table>
    <div class="box-body"> 
       <td width="3%">
		</td> <td width="30%"><h5 class="titulocoberturas" align="left"><font color="black">Buscar x</font></h5>
		<form id="form4" name="form4" method="post"> <!--action="<!--?php echo  site_url();?>/x/x">-->
        <select id="x" name="x" style="width:200px" class="form-control" onchange="document.getElementById('form4').submit();">
        	<option value="">Seleccione</option>
        	<!--?php
	        	foreach ($clientes as $c) {
	        		echo "<option value='".$c["id_cliente"]."'>".strtoupper($c["cliente"])."</option>";
	        	}		
        	?-->
        </select> 
		</form>
		</td>
		 <td width="25%"><h5 class="titulousuarios" align="left"><font color="black">Buscar Ejecutivos</font></h5>
		 <form id="form5" name="form5" method="post"> <!--action="<!--?php echo  site_url();?>x/x">-->
         <select id="x" name="x" style="width:200px" class="form-control" onchange="document.getElementById('form5').submit();">
        	<option value="">Seleccione</option>
        	<!--?php
	        	foreach ($usuarios as $u) {
	        		echo "<option value='".$u["id_usuario"]."'>".strtoupper($u["usuario"])."</option>";
	        	}	
        	?-->
        </select>
        </form>		
       </td>		
    </div>  
         <!--<td width="30%"><form class='form-horizontal' name ='form3' id='form3' method='POST' action="<?php echo  site_url();?>nominalist/exportardatos">
		   <button id="btn_ini" name="btn_ini" type="submit" class="form-control btn btn-primary" style="width: 70%" title='exportar'  onclick="document.getElementById(form3).submit();">Exportar a Excel</button>
		  </td>
	</form>-->
 </table>
 <div class="table-responsive" style= "width: 100%; height: 10%; overflow: scroll; padding: 2%">
    <table id="tabla_coberturas" class="table table-bordered table-striped" align="center">
    	<tr> 
    		<th>Nº</th><th>CLIENTE</th><th>HOLDING</th><th>CADENA</th>
    		<th>LOCAL</th><th>COD.LOCAL CLIENTE</th><th>COD.LOCAL CADENA</th><th>DIRECCIÓN</th>
    		<th>COMUNA</th><th>REGIÓN</th><th>PROMOTOR</th><th>REPONEDOR</th>
    		<th>VENDEDOR</th><th>GESTOR</th><th>XN</th>
    	</tr>
		
		

    	<!--?php
    		foreach($contratos as $c) {
    			echo "<tr>";
    			echo "<td>".$c['Estado_Actual']."</td><td>".strtoupper($c['egrupo'])."</td><td>".strtoupper($c['cliente'])."</td>";
    			echo "<td>".strtoupper($c['nombre_proyecto'])."</td><td>".strtoupper($c['responsable'])."</td><td>".strtoupper($c['rut'])."</td>";
    			echo "<td>".strtoupper($c['nombres'])."</td><td>".strtoupper($c['ap_paterno'])."</td><td>".strtoupper($c['ap_materno'])."</td>";
    			echo "<td>".strtoupper($c['Fecha_Nacimiento'])."</td><td>".strtoupper($c['sexo'])."</td><td>".strtoupper($c['Nacionalidad'])."</td>";
    			echo "<td>".strtoupper($c['Estado_Civil'])."</td><td>".strtoupper($c['Direccion'])."</td><td>".strtoupper($c['comuna'])."</td>";
    			echo "<td>".strtoupper($c['region'])."</td><td>".strtoupper($c['fijo'])."</td><td>".strtoupper($c['celular'])."</td>";
    			echo "<td>".strtoupper($c['email'])."</td><td>".strtoupper($c['talla_pantalon'])."</td><td>".strtoupper($c['talla_polera'])."</td>";
    			echo "<td>".strtoupper($c['talla_calzado'])."</td><td>".strtoupper($c['cargo'])."</td><td>".strtoupper($c['cadena'])."</td>";
    			echo "<td>".strtoupper($c['local'])."</td><td>".strtoupper($c['tipo_contrato'])."</td><td>".strtoupper($c['Fecha_Termino'])."</td>";
    			echo "<td>".strtoupper($c['Antiguedad'])."</td><td>".strtoupper($c['Antiguedad_lineal'])."</td><td>".strtoupper($c['vacaciones'])."</td>";
    			echo "<td>".strtoupper($c['afp'])."</td><td>".strtoupper($c['Prevision_Salud'])."</td><td>".strtoupper($c['fpago'])."</td>";
    			echo "<td>".strtoupper($c['banco'])."</td><td>".strtoupper($c['ncuenta'])."</td>";
    			echo "<td><input type='radio' name='rd_entcelular' value='1'>SI
    					<input type='radio' name='rd_entcelular' value='0'>NO</td>";
    			echo "<td><input type='radio' name='rd_enttablet' value='1'>SI
    					<input type='radio' name='rd_enttablet' value='0'>NO</td>";
    			echo "<td><input type='radio' name='rd_entnote' value='1'>SI
    					<input type='radio' name='rd_entnote' value='0'>NO</td>";
    			echo "<td><input type='radio' name='rd_entcredencial' value='1'>SI
    					<input type='radio' name='rd_entcredencial' value='0'>NO</td>";
    			echo "<td><input type='radio' name='rd_entuniforme' value='1'>SI
    					<input type='radio' name='rd_entuniforme' value='0'>NO</td>";
    			echo "<td><input type='radio' name='rd_entepp' value='1'>SI
    					<input type='radio' name='rd_entepp' value='0'>NO</td>";
    			echo "<td><input type='radio' name='rd_entclub360' value='1'>SI
    					<input type='radio' name='rd_entclub360' value='0'>NO</td>";
    			echo "<td><input type='radio' name='rd_entcloud' value='1'>SI
    					<input type='radio' name='rd_entcloud' value='0'>NO</td>";
    			echo "<td><input type='radio' name='rd_entintranet' value='1'>SI
    					<input type='radio' name='rd_entintranet' value='0'>NO</td>";
    			echo "<td><input type='radio' name='rd_entapenet' value='1'>SI
    					<input type='radio' name='rd_entapenet' value='0'>NO</td>";
    			echo "<td><input type='text' name='txt_cargas'></td>";
    			echo "<td><select>
    					<option value=''>Seleccione</option>
    					<option value='Maternal'>MATERNAL</option>
    					<option value='Sindical'>SINDICAL</option>
    					<option value='Otro'>OTRO</option>
    					</select></td>";
    			echo "<td><input type='radio' name='rd_entcelular' value='1'>SI
    					<input type='radio' name='rd_entcelular' value='0'>NO</td>";
    			echo "<td><input type='radio' name='rd_salacuna' value='1'>SI
    					<input type='radio' name='rd_salacuna' value='0'>NO</td>";
    			echo "<td><textarea name='txt_obs_general'></textarea></td>";
    			echo "</tr>";
    		}			
    	?-->

    </table>
</div>
</div>
</div>
	
<!-- jQuery 3 -->
<script src="/nominas/assets/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/nominas/assets/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="/nominas/assets/js/jquery.dataTables.min.js"></script>
<script src="/nominas/assets/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/nominas/assets/js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/nominas/assets/js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/nominas/assets/js/adminlte.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="/nominas/assets/js/icheck.min.js"></script>
<!-- AdminLTE for demo purposes 
<script src="../../dist/js/demo.js"></script>-->
<!-- page script -->
<script>
  $(function () {
    $('#tabla_coberturas').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
	
	 $('input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
	
  })
</script>
</body>
</html>