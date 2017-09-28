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
  
  <div class="content-wrapper">  
    <section class="content-header">
      <h1>Lista de Contratados</h1>
      <br>
    <div class="row">
    <div class="col-xs-12">
    <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Lista Nominas de contratos
                <small>Registro de datos de nomina</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form>
                <table>   
       <td width="3%">
        </td> <td width="30%"><h5 class="tituloclientes" align="left"><font color="black">Buscar Clientes</font></h5>
        <form id="form1" name="form1" method="post" action="<?php echo  site_url();?>/nominalist/buscarCliente">
        <select id="clientes" name="clientes" style="width:200px" class="form-control" onchange="document.getElementById('form1').submit();">
            <option value="">Seleccione</option>
            <?php
                foreach ($clientes as $c) {
                    echo "<option value='".$c["id_cliente"]."'>".strtoupper($c["cliente"])."</option>";}?>
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
           <button id="btn_ini" name="btn_ini" type="submit" class="btn btn-info btn-sm" title='exportar'  onclick="document.getElementById(form3).submit();"><i class="glyphicon glyphicon-refresh"></i></button>
        
        </form>     
       </td>            
    </div>  
           
    </form>
 </table>
 <br>
<table id="tabla_nominas" class="stripe row-border order-column" >
       <thead>
            <tr>
                <th></th> 
                <th>Rut</th>
                <th>Nombres Completo</th>
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
                <th>Cadena/Local</th>
                <!-- <th>Local</th> -->
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
                <td ><input id='chk-".$c['ID_Contrato']."' onclick='linea(".$c['ID_Contrato'].")' type='checkbox' value=''></td>
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
                
             <td><button type='button' class='btn btn-default' data-toggle='modal' data-target='#modal-default'><i class='glyphicon glyphicon-list-alt'></i></button></td>
                <td >Supervisor(?)</td>
                <td ><input type='text' id='txt-dt".$c['ID_Contrato']."' name='row-1-age' placeholder='Días Trabajados'></td>
                <td >Codigo Remuneracion</td>
                <td >Categoria(?)                        </td>
                <td >Sueldo Base                         </td>
                <td ><input type='text' id='txt-spro".$c['ID_Contrato']."' id='row-1-age' name='row-1-age' placeholder='(SB/30)*DT'></td>
                <td ><input type='text' id='txt-g".$c['ID_Contrato']."' name='row-1-age' placeholder='(SBP*0,25)'></td>
                <td ><input type='text' id='txt-bcl".$c['ID_Contrato']."' name='row-1-age' placeholder='(BCL/30)*DT'></td>
                <td ><input type='text' id='txt-bct".$c['ID_Contrato']."' name='row-1-age' placeholder='(BCT/30)*DT'></td>
                <td >Colacion                            </td>
                <td ><input type='text' id='txt-m".$c['ID_Contrato']."' name='row-1-age' placeholder='(MV/30)*DT'></td>
                <td >".strtoupper($c['afp'])."</td>
                <td >".strtoupper($c['Prevision_Salud'])."</td>
                <td >".strtoupper($c['fpago'])."</td>
                <td >".strtoupper($c['banco'])."</td>
                <td >".strtoupper($c['ncuenta'])."</td>
                <td >".strtoupper($c['vacaciones'])."</td>
                <td ><input type='text' id='txt-he".$c['ID_Contrato']."' name='row-1-age' placeholder='Horas Extras'></td>
                <td ><input type='text' id='txt-vhe".$c['ID_Contrato']."' name='row-1-age' placeholder='(0,007778*HE)*DT'></td>
                <td ><input type='text' id='txt-a".$c['ID_Contrato']."' name='row-1-age' placeholder='Aguinaldo'></td>
                <td ><input type='text' id='txt-timp".$c['ID_Contrato']."' name='row-1-age' placeholder='SBP+BCL+BCT+BN+VHE+AG'></td>
                <td ><input type='text' id='txt-mv".$c['ID_Contrato']."' name='row-1-age' placeholder='Movilizaion variable'></td>
                <td ><input type='text' id='txt-th".$c['ID_Contrato']."' name='row-1-age' placeholder='TIMP+COL+MV+MV'></td>
                <td ><input type='text' id='txt-v".$c['ID_Contrato']."' name='row-1-age' placeholder='Viaticos'></td>
                <td ><input type='text' id='txt-dp".$c['ID_Contrato']."' name='row-1-age' placeholder='Descuento Previcional'></td>
                <td ><input type='text' id='txt-ds".$c['ID_Contrato']."' name='row-1-age' placeholder='Descuento Sis'></td>
                <td ><input type='text' id='txt-dm".$c['ID_Contrato']."' name='row-1-age' placeholder='Descuento Mutual'></td>
                <td ><input type='text' id='txt-dsc".$c['ID_Contrato']."' name='row-1-age' placeholder='Descuento seguro de cesantia'></td>
                <td ><input type='checkbox' value=''></td>
                <td ><input type='checkbox' value=''></td>
                <td ><input type='number' id='txt-ncf".$c['ID_Contrato']."' name='row-1-age' placeholder='Numero de Cargas Familiares'></td>
                <td ><input type='number' id='txt-pcj".$c['ID_Contrato']."' name='row-1-age' placeholder='prestamoCajaChica'></td>
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
                <td ><input type='text' id='txt-pv".$c['ID_Contrato']."' name='row-1-age' placeholder='Provicion Vacaciones'></td>
                <td ><input type='text' id='txt-pf".$c['ID_Contrato']."' name='row-1-age' placeholder='Provicion Finiquito'></td>
                <td ><input type='text' id='txt-tcp".$c['ID_Contrato']."' name='row-1-age' placeholder='Total costo personal'></td>
                <td ><input type='text' id='txt-cta".$c['ID_Contrato']."' name='row-1-age' placeholder='Comicion totoal Agencia'></td>
                <td ><input type='text' id='txt-cc".$c['ID_Contrato']."' name='row-1-age' placeholder='CostoCliente??'></td>
                <td ><input type='text' id='txt-llt".$c['ID_Contrato']."' name='row-1-age' placeholder='Legada full time'></td>
                <td ><input type='text' id='txt-lpt".$c['ID_Contrato']."' name='row-1-age' placeholder='Llegada parti time'></td>
                <td ><input type='text' id='txt-ls".$c['ID_Contrato']."' name='row-1-age' placeholder='Llegada supervisor'></td>
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
                <td ><input type='text' id='txt-ls".$c['ID_Contrato']."' name='row-1-age' placeholder='Comentario y/u Observaciones'></td>
            </tr>";}?>
       </tbody>
    </table>
<div class='modal fade' id='modal-default'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span></button>
                <h4 class='modal-title'>Informacion de Local y Cadena</h4>
              </div>
              <div class='modal-body'>
                 <div class="col-xs-3">
                <label>
                <p>Región:<form id="form2" name="form2" method="post" action="<?php echo  site_url();?>nominalist/buscarUsuario">
         <select id="usuarios" name="usuarios" style="width:130px" class="form-control" onchange="document.getElementById('form2').submit();">
            <option value="">Seleccione</option>
            <?php
                foreach ($usuarios as $u) {
                    echo "<option value='".$u["id_usuario"]."'>".strtoupper($u["usuario"])."</option>";
                }   
            ?>
        </select>
</p></form></div></label><div class="col-xs-3"><label>
                <p>Comuna:<form id="form2" name="form2" method="post" action="<?php echo  site_url();?>nominalist/buscarUsuario">
         <select id="usuarios" name="usuarios" style="width:130px" class="form-control" onchange="document.getElementById('form2').submit();">
            <option value="">Seleccione</option>
            <?php
                foreach ($usuarios as $u) {
                    echo "<option value='".$u["id_usuario"]."'>".strtoupper($u["usuario"])."</option>";
                }   
            ?>
        </select>
</p></form></div></label><div class="col-xs-3">


<label>
                <p>Local:<form id="form2" name="form2" method="post" action="<?php echo  site_url();?>nominalist/buscarUsuario">
         <select id="usuarios" name="usuarios" style="width:130px" class="form-control" onchange="document.getElementById('form2').submit();">
            <option value="">Seleccione</option>
            <?php
                foreach ($usuarios as $u) {
                    echo "<option value='".$u["id_usuario"]."'>".strtoupper($u["usuario"])."</option>";
                }   
            ?>
        </select>
</p></form></div></label><div class="col-xs-3"><label>
                <p>Cadena:<form id="form2" name="form2" method="post" action="<?php echo  site_url();?>nominalist/buscarUsuario">
         <select id="usuarios" name="usuarios" style="width:130px" class="form-control" onchange="document.getElementById('form2').submit();">
            <option value="">Seleccione</option>
            <?php
                foreach ($usuarios as $u) {
                    echo "<option value='".$u["id_usuario"]."'>".strtoupper($u["usuario"])."</option>";
                }   
            ?>
        </select>
</p>
                </label></div>
                <br>
                 <br>
                <h3>Días de Trabajo:</h3>
                
                <table  class="stripe row-border order-column">
                    <thead>
                    <tr>
                        <th width="10%" align="center">Lunes</th>
                        <th width="10%" align="center">Martes</th> 
                        <th width="10%" align="center">Miercoles</th>
                        <th width="10%" align="center">Jueves</th>
                        <th width="10%" align="center">Viernes</th>
                        <th width="10%" align="center">Sabado</th>
                        <th width="10%" align="center">Domingo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" align="center" class="minimal"></td>
                        <td><input type="checkbox" align="center" class="minimal"></td>
                        <td><input type="checkbox" align="center" class="minimal"></td>
                        <td><input type="checkbox" align="center" class="minimal"></td>
                        <td><input type="checkbox" align="center" class="minimal"></td>
                        <td><input type="checkbox" align="center" class="minimal"></td>
                        <td><input type="checkbox" align="center" class="minimal"></td>
                    </tr>
                </tbody>
                </table>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>Cancelar</button>
                <button type='button' class='btn btn-primary'>Ingresar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


 <div class="col-xs-12">
    <div class="btn-group">
        <!-- <form class='form-horizontal' name ='form3' id='form3' method='POST' action="<?php echo  site_url();?>nominalist/exportardatos"> 
            <button id="btn_ini" name="btn_ini" type="submit" class="btn btn-success " title='exportar'  onclick="document.getElementById(form3).submit();"><i class="fa fa-file-excel-o"></i> Exportar</button> 
        </form> -->
    </div>
        <div class="btn-group"> 
        <button type="button" id="sig-btn" class="btn btn-primary">Siguiente</button> 
        </form>
    </div>






</form>
</div>
</div>
</div>

<div class="box box-info collapsed-box">
            <div class="box-header ">
              <h3 class="box-title">Listado de Bonos
                <small>Registro de Bonos</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools ">
                <button type="button" class="btn btn-info btn-sm disabled" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form>
                <table id="exa" class="display" cellspacing="0" width="100%">
      <thead>

            <tr>
                <th>Rut</th>
                <th>Nombre Completo</th> 
                <th>Cargo</th>
                <?php 
                foreach ($bono as $b) {
                    echo"<th>".strtoupper($b['Bono'])."</th>
                
                 ";}?>
                </tr>
        </thead>
        <tbody>
            <?php  foreach ($contratos as $c) {
                # code...
            echo"
            <tr>
                <td>".strtoupper($c['rut'])."</td>
                <td>".strtoupper($c['Nombre_Concatenar'])."</td>
                <td>".strtoupper($c['cargo'])."</td>";
            foreach ($bono as $b) {
                    echo"<td><input type='text' value=''></td>
                
                 ";}
            echo"</tr>
            ";}?>
        </tbody> 
</table>
<form class='form-horizontal' name ='form3' id='form3' method='POST' action="<?php echo  site_url();?>nominalist/ingresarnominas"> <button type="button" class="btn btn-primary">Ingresar Nomina</button> </form>
        
      </form>
    </div>
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
<script>
    
 $(document).ready(function() {
    var table = $('#exa').DataTable( {
      searching   : true,  
      info        : true,
      lengthMenu : [[5, 15, 25,50, -1], [5,15, 25, 50, "All"]],
      buttons: [
                'csv', 'excel', 'pdf', 'print', 'reset', 'reload'
            ],
      scrollX     : true,
      autoWidth   : true,
      fixedColumns:   {
            leftColumns: 4
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
<script type="text/javascript">
    
    $("#sig-btn").click(function(){
    if( $(this).is(':checked') ) alert("checked");
});



$("#checked").onclick( function(){
   if( $(this).is(':checked') ) {
        alert("chechgdked");
    }else{
        alert("unchecked");
   }
});


$(document).ready(function() {
    var table = $('#dias').DataTable( {
      
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
