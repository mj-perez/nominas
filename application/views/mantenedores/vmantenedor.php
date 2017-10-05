<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
         <span class="logo-mini"><b>Pro</b>G</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Grupo</b>Progestion</span>
      <!-- mini logo for sidebar mini 50x50 pixels -->
         </a>
</header>
  
<div class="content-wrapper" >  
    <section class="content-header table_responsive">
    <div class="box-header">
		<h2 class="titulo" align="center"><font color="white">Mantenedor Bonos</font></h2>
	</div>

	<button type ="button" tittle="Agregar Bono" class="button" data-toggle='modal' class='sbtn btn-default' data-target='.bd-example-modal-lg'>Agregar Bono</button>
	<div class=" modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"> 
		<div class=" modal-dialog modal-lg">
			<div class="modal-content">
				<br>
				<h4 class="titulo" align="center">Nuevo Bono</h4>
				<br>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class='table-responsive'>
					<form class="form-horizontal" id="myform55" name="myform55" method="post" action="<?php echo  site_url();?>mantenedores/agreBono"> 
					<table class='table table-striped'  align='center'>
						<tr class="warning">
							<td width="20%">Nombre de Bono</td>
							<td><input width="30%"" class="" name="bono" id="bono" size="20" maxlength="200" type="text" required></td>
						</tr>
						<tr>
							<td><button class="button" type ="submit" tittle="agregar bono" onclick="document.getElementById('myform55').submit();" role="button">Agregar</button></td>
						</tr>		
					</table>
					</form>
				</div>
			</div>
		</div>
	</div> 
	

	
	<table>

		<form id="myform44" name="myform44" method="post" action="<?php echo  site_url();?>mantenedores/buscarVigencia">
		<div class="input-group"><h5 style="color:white;">Selecionar Vigencia</h5>
			<select id="filtro" name="filtro" onchange="document.getElementById('myform44').submit();">
				<option value=5>Seleccione...</option>
 				<option value=1>Vigente</option>
  				<option value=0>No Vigente</option>
			  	<option value=2>Todos</option>
			</select>
		</div>
		</form>
		</td>
	</table>

	<br>

	<div id="menu" class="menu">
	</div>
	<!-- Diseño table -->
	<div class="box">
            <div class="box-body">
				<table class="table table-bordered table-striped" id="example1">
					<thead>
						<tr>
							<th>ID Bono</th>
							<th>Nombre Bono</th>
							<th>Vigencia</th>
							<th>Editar</th>
							<th>Cambiar Vigencia</th>
						</tr>
					</thead>

<?php 
	foreach($listar as $m){
		if($m['vigencia']==1){$vigencia='Vigente';}else{$vigencia='No Vigente';}
		echo " 
				<tr class='warning'>
					<td>".$m['id_bono']."</td>
					<td>".$m['bono']."</td>
					<td>$vigencia</td>
					<td><button type ='button' title='Editar' class='sbtn btn-default btn-xs' data-toggle='modal' data-target='.bd-example-modal-lg3' onclick='abrirEdBono(".$m['id_bono'].");' role='button'>Editar</button></td>
					<td><button type ='button' class='sbtn btn-default btn-xs' title='Cambiar vigencia' onclick='estBono(".$m['id_bono'].",".$m['vigencia'].");'><span class='glyphicon glyphicon-pencil'></span></button></td>
				</tr>
			"
		;}
?>	
		</table> 
	</div>
	</div>

	<div class=" modal fade bd-example-modal-lg3" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog">
      		<div class="modal-content">
      			<div class="modal-header">
        		<h4 class="modal-title" align="center">Modificar Bono</h4>
       			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        		</div>
        		<div class="container">		
        		</div>
        		<div class="modal-body">
        			<div id="modiBono">
      		  		</div>                 
      		  	</div>
      	 	</div>
 		</div>	
 	</div>
 </section>
</div>
</div>
</body>
</html>