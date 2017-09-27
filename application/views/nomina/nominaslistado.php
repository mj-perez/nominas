<!DOCTYPE html>
<html>
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
  
  <div class="content-wrapper">  
    <section class="content-header">
      <h1>
        Lista de Contratados
      </h1>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
<table>
    <div class="box-body"> 
       <td width="3%">
		</td> <td width="30%"><h5 class="tituloclientes" align="left"><font color="black">Buscar Clientes</font></h5>
		<form id="form1" name="form1" method="post" action="<?php echo  site_url();?>/nominalist/buscarCliente">
        <select id="clientes" name="clientes" style="width:200px" class="form-control" onchange="document.getElementById('form1').submit();">
        	<option value="">Seleccione</option>
        	<?php
	        	foreach ($clientes as $c) {
	        		echo "<option value='".$c["id_cliente"]."'>".strtoupper($c["cliente"])."</option>";
	        	}		
        	?>
        </select> 
		</form>
		</td>
		 <td width="25%"><h5 class="titulousuarios" align="left"><font color="black">Buscar Ejecutivos</font></h5>
		 <form id="form2" name="form2" method="post" action="<?php echo  site_url();?>nominalist/buscarUsuario">
         <select id="usuarios" name="usuarios" style="width:200px" class="form-control" onchange="document.getElementById('form2').submit();">
        	<option value="">Seleccione</option>
        	<?php
	        	foreach ($usuarios as $u) {
	        		echo "<option value='".$u["id_usuario"]."'>".strtoupper($u["usuario"])."</option>";
	        	}	
        	?>
        </select>
        </form>		
       </td>
       <td width="25%"><h5 class="titulousuarios" align="left"><font color="black">Limpiar Filtros</font></h5>
          <form class='form-horizontal' name ='form3' id='form3' method='POST' action="<?php echo  site_url();?>nominalist/listnominas">
           <button id="btn_ini" name="btn_ini" type="submit" class="btn btn-block btn-primary" title='exportar'  onclick="document.getElementById(form3).submit();"><i class="glyphicon glyphicon-refresh"></button></i>
        
        </form>     
       </td>    		
    </div>  
           
	</form>
 </table>

<div class="col-xl-12">
    <table id="tabla_nominas" class="stripe row-border order-column" >
  	   <thead>
            <tr> 
                <th>Rut</th>
                <th>Nombres Completo</th>
                <!-- <th>Apellido Pa</th>
                <th>Apellido Ma</th> -->
                <th>Estado del Contrato</th>
                <th>Cargo</th>
                <th>Tipo contrato</th>
                <th>Fecha Termino</th>
                <th>Fecha de Inicio</th>
                <th>Antiguedad</th>
                <th>Antiguedad Lineal</th>
                <th>Cliente</th>
                <th style="text-align: center;">Proyecto</th>
                <th>Coordinador</th>
                <th>Empresa</th>
                <th>Cadena</th>
                <th>Local</th>
                <th>Supervisor</th>
                <th>Días Trabajados</th>
                <th>Codigo Remuneracion(?)</th>
                <th>Categoría(?)</th>
                <th>Sueldo Base</th>
                <th>Sueldo Proporcional</th>
                <th>Gratificaciòn</th>
                <th>Bono Cualitativo</th>
                <th>Bono Cuantitativo</th>
                <th>Colacion</th>
                <th>Movilizacion</th>
                <th>AFP</th>
                <th>Isapre</th>
                <th>Forma de Pago</th>
                <th>Banco</th>
                <th>Nº de cuenta</th>
                <th>Bonos</th>
                <th>Vacaciones Proporcionales</th>
                <th>Horas Extras</th>
                <th>Valor horas extras</th>
                <th>Aguinaldo</th>
                <th>Total imponible</th>
                <th>Movilizacion variable</th>
                <th>Total haberes</th>
                <th>Viaticos</th>
                <th>Descuento previsional</th>
                <th>Descuento de SIS</th>
                <th>Descuento Mutual</th>
                <th>Descuento seguro de cesantia</th>
                <th>Fuero</th>
                <th>Sala de cuna</th>
                <th>Cargas Familiares</th>
                <th>Prestamo Caja</th>
                <th>Fecha nacimiento</th>
                <th>Nacionalidad</th>
                <th>Sexo</th>
                <th>Estado Civil</th>
                <th>Direccion</th>
                <th>Comuna</th>
                <th>Region</th>
                <th>Telefono Fijo</th>
                <th>Celular</th>
                <th>Mail</th>
                <th>Talla Pantalon</th>
                <th>Talla Polera</th>
                <th>Talla zapato</th>
                <th>Provicion vacaciones</th>
                <th>Provicion Finiquitos</th>
                <th>Total costo personal</th>
                <th>Comocion total agencia(?)</th>
                <th>Costo Cliente(?)</th>
                <th>Llegada full time (?)</th>
                <th>Llegada part time (?)</th>
                <th>Llegada supervisor</th>
                <th>Entrega Celular</th>
                <th>Documento Celular</th>
                <th>Entrega Tablet </th>
                <th>Documento Tablet </th>
                <th>Entrega Notebook</th>
                <th>Documento Notebook</th>
                <th>Entrega Credencial</th>
                <th>Documento Credencial</th>
                <th>Entrega Uniforme</th>
                <th>Documento Uniforme</th>
                <th>Entrega EPP (?)</th>
                <th>Documento EPP (?)</th>
                <th>Entrega Club 360</th>
                <th>Documento Club 360</th>
                <th>Entrega cloud</th>
                <th>Documento cloud</th>
                <th>Entega Intranet</th>
                <th>Documento Intranet</th>
                <th>Entrega Apenet</th>
                <th>Documento Apenet</th>
                <th>Observaciones Generales(?)</th>
                </tr>
        </thead>
        
<tbody>
<?php

foreach($contratos as $c) {
echo "     
            <tr>
                <td style='font-size:80%;'>".strtoupper($c['rut'])."</td>
                <td style='text-align:left;'>".strtoupper($c['Nombre_Concatenar'])."</td>
                <td >".$c['Estado_Actual']." </td>
                <td >".strtoupper($c['cargo'])."</td>
                <td >".strtoupper($c['tipo_contrato'])." </td>
                <td >".strtoupper($c['Fecha_Termino'])." </td>
                <td >".strtoupper($c['Fecha_Inicio'])."</td>
                <td >".strtoupper($c['Antiguedad'])."</td>
                <td >".strtoupper($c['Antiguedad_lineal'])."</td>
                <td >".strtoupper($c['cliente'])."</td>
                <td >".strtoupper($c['nombre_proyecto'])."</td>
                <td >".strtoupper($c['responsable'])."</td>
                <td >".strtoupper($c['egrupo'])."</td>
                <td >".strtoupper($c['cadena'])."</td>
                <td >".strtoupper($c['local'])."</td>
                <td >Supervisor(?)</td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='Días Trabajados'></td>
                <td >Codigo Remuneracion</td>
                <td >Categoria(?)                        </td>
                <td >Sueldo Base                         </td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='(SB/30)*DT'></td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='(SBP*0,25)'></td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='(BCL/30)*DT'></td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='(BCT/30)*DT'></td>
                <td >Colacion                            </td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='(MV/30)*DT'></td>
                <td >".strtoupper($c['afp'])."</td>
                <td >".strtoupper($c['Prevision_Salud'])."</td>
                <td >".strtoupper($c['fpago'])."</td>
                <td >".strtoupper($c['banco'])."</td>
                <td >".strtoupper($c['ncuenta'])."</td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='Bonos(?)'></td>
                <td >".strtoupper($c['vacaciones'])."</td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='Horas Extras'></td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='(0,007778*HE)*DT'></td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='Aguinaldo'></td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='SBP+BCL+BCT+BN+VHE+AG'></td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='Movilizaion variable'></td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='TIMP+COL+MV+MV'></td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='Viaticos'></td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='Descuento Previcional'></td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='Descuento Sis'></td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='Descuento Mutual'></td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='Descuento seguro de cesantia'></td>
                <td ><input type='checkbox' value=''></td>
                <td ><input type='checkbox' value=''></td>
                <td ><input type='number' id='row-1-age' name='row-1-age' placeholder='Numero de Cargas Familiares'></td>
                <td ><input type='number' id='row-1-age' name='row-1-age' placeholder='prestamoCajaChica'></td>
                <td >".strtoupper($c['Fecha_Nacimiento'])."</td>
                <td >".strtoupper($c['Nacionalidad'])."</td>
                <td >".strtoupper($c['sexo'])."</td>
                <td >".strtoupper($c['Estado_Civil'])."</td>
                <td >".strtoupper($c['Direccion'])."</td>
                <td >".strtoupper($c['comuna'])."</td>
                <td >".strtoupper($c['region'])."</td>
                <td >".strtoupper($c['fijo'])."</td>
                <td >".strtoupper($c['celular'])."</td>
                <td >".strtoupper($c['email'])."</td>
                <td >".strtoupper($c['talla_pantalon'])."</td>
                <td >".strtoupper($c['talla_polera'])."</td>
                <td >".strtoupper($c['talla_calzado'])."</td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='Provicion Vacaciones'></td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='Provicion Finiquito'></td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='Total costo personal'></td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='Comicion totoal Agencia'></td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='CostoCliente??'></td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='Legada full time'></td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='Llegada parti time'></td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='Llegada supervisor'></td>
                <td ><input type='checkbox' value=''></td>
                <td ><input type='file' value=''></td>
                <td ><input type='checkbox' value=''></td>
                <td ><input type='file' value=''></td>
                <td ><input type='checkbox' value=''></td>
                <td ><input type='file' value=''></td>
                <td ><input type='checkbox' value=''></td>
                <td ><input type='file' value=''></td>
                <td ><input type='checkbox' value=''></td>
                <td ><input type='file' value=''></td>
                <td ><input type='checkbox' value=''></td>
                <td ><input type='file' value=''></td>
                <td ><input type='checkbox' value=''></td>
                <td ><input type='file' value=''></td>
                <td ><input type='checkbox' value=''></td>
                <td ><input type='file' value=''></td>
                <td ><input type='checkbox' value=''></td>
                <td ><input type='file' value=''></td>
                <td ><input type='checkbox' value=''></td>
                <td ><input type='file' value=''></td>
                <td ><input type='text' id='row-1-age' name='row-1-age' placeholder='Comentario y/u Observaciones'></td>
            </tr>";}?>
        </tbody>
    </table>
    <br>
    <div class="col-xs-12">
    <div class="btn-group">
        <form class='form-horizontal' name ='form3' id='form3' method='POST' action="<?php echo  site_url();?>nominalist/exportardatos"> 
            <button id="btn_ini" name="btn_ini" type="submit" class="btn btn-success " title='exportar'  onclick="document.getElementById(form3).submit();"><i class="fa fa-file-excel-o"></i> Exportar</button> 
        </form>
    </div>
        <div class="btn-group"> 
        <form class='form-horizontal' name ='form3' id='form3' method='POST' action="<?php echo  site_url();?>nominalist/ingresarnominas"> <button type="button" class="btn btn-primary">Ingresar Nomina</button> 
        </form>
    </div>
</div>
<br>
<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>



<style type="text/css">
      th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        width: 1000px;
        margin: 0 auto;
    }
td {
    cursor: pointer;
    font-size:80%;
   width: 1px;
   text-align: center;
}
tr {
   font-size:90%;
   width: 1px;
   text-align: center;
}
</style>
</body>



<script type="text/javascript">
    
 $(document).ready(function() {
    var table = $('#tabla_nominas').DataTable( {
      searching   : true,  
      info        : true,
      lengthMenu : [[5, 15, 25,50, -1], [5,15, 25, 50, "All"]],
      buttons: [
                'csv', 'excel', 'pdf', 'print', 'reset', 'reload'
            ],
      scrollX     : true,
      autoWidth   : true,
      fixedColumns:   {
            leftColumns: 3
        },
        "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
    } );
} );
    
</script>
