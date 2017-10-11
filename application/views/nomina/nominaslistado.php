<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<!--   <header class="main-header">

    <a href="../../index2.html" class="logo">
         <span class="logo-mini"><b>Pro</b>G</span>

      <span class="logo-lg"><b>Grupo</b>Progestion</span>

         </a>
</header> -->
  
<div class="content-wrapper" >  
    <section class="content-header table_responsive">
      <h1>Selecione la lista de nomina que quiere descargar</h1>
      <br>
    <div class="row">
        <div class="col-xs-12">
            <div id="boxmodal1" class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Lista Nominas de contratos
                <small>Registro de datos de nomina</small>
              </h3>
              <!-- tools box -->
              <!-- <div class="pull-right box-tools">
                <button type="button" id="btnmodal1" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div> -->
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
<table>   
       <td width="3%">
        </td> <td width="30%"><h5 class="tituloclientes" align="left"><font color="black">Buscar Clientes</font></h5>
        <form id="form1" name="form1" method="post" action="<?php echo  site_url();?>/nominalist/buscarCliente">
        <select id="clientes" name="clientes" style="width:200px" class="form-control" onchange="document.getElementById('form1').submit();">
            <option value="">Seleccione</option>
            <?php
                foreach ($clientes as $cl) {
                    echo "<option value='".$cl["id_cliente"]."'>".strtoupper($cl["cliente"])."</option>";}?>
        </select> 
        </form>
        </td>
         
       <td width="25%"><h5 class="titulousuarios" align="left"><font color="black">Limpiar</font></h5>
          <form class='form-horizontal' name ='form3' id='form3' method='POST' action="<?php echo  site_url();?>nominalist/listnominas">
           <button id="btn_ini" name="btn_ini" type="submit" class="btn btn-info btn-sm" title='exportar'  onclick="document.getElementById(form3).submit();"><i class="glyphicon glyphicon-refresh"></i></button>
        </form>     
       </td>

    
</table>

 <br>
<table id="tabla_nominas" class="stripe row-border order-column" >
       <thead>
            <tr>
                <!-- <th><input type='checkbox' onclick="marcar(this);" value=''></th>  -->
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
                <th>Codigo Remuneracion</th>
                <th>Categoría</th>
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
                <th>Bonos</th>
                <th>Horas Extras</th>
                <th>Valor horas extras</th>
                <th>Aguinaldo</th>
                <th>Total imponible</th>
                <th>Movilizacion variable</th>
                <th>Viaticos</th>
                <th>Total haberes</th>
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
                <th>Comocion total agencia</th>
                <th>Costo Cliente</th>
                <th>Llegada full time </th>
                <th>Llegada part time </th>
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
                <th>Entrega EPP </th>
                <th>Documento EPP </th>
                <th>Entrega Club 360</th>
                <th>Documento Club 360</th>
                <th>Entrega cloud</th>
                <th>Documento cloud</th>
                <th>Entega Intranet</th>
                <th>Documento Intranet</th>
                <th>Entrega Apenet</th>
                <th>Documento Apenet</th>
                <th>Observaciones Generales</th>
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
             <td><button type='button' class='btn btn-default' data-toggle='modal' data-target='#modal-default'><i class='glyphicon glyphicon-list-alt'></i></button></td>
                <td >Supervisor</td>
                <td ><input type='text' id='txt-dt".$c['ID_Contrato']."' onblur='calculo(".$c['ID_Contrato'].")'  value='30' placeholder='Días Trabajados' disabled></td>
                <td >Codigo Remuneracion</td>
                <td >Categoria                        </td>
                <td >".strtoupper($c['Sueldo_Base'])."<input type='hidden' value='".strtoupper($c['Sueldo_Base'])."' id='inp-sb".$c['ID_Contrato']."'></td>
                <td ><label id='txt-spro".$c['ID_Contrato']."'></td>
                <td ><label id='txt-g".$c['ID_Contrato']."'></td>
                <td >".strtoupper($c['Bono_Cualitativo'])."<input type='hidden' value='".strtoupper($c['Bono_Cualitativo'])."' id='txt-bcl".$c['ID_Contrato']."'></td>
                <td >".strtoupper($c['Bono_Cuantitativo'])."<input type='hidden' value='".strtoupper($c['Bono_Cuantitativo'])."' id='txt-bct".$c['ID_Contrato']."'></td>
                <td >".strtoupper($c['Colacion'])."<input type='hidden' value='".strtoupper($c['Colacion'])."' id='txt-cl".$c['ID_Contrato']."'></td>
                <td >".strtoupper($c['Movilizacion'])."<input type='hidden' value='".strtoupper($c['Movilizacion'])."' id='txt-m".$c['ID_Contrato']."'></td>
                <td >".strtoupper($c['afp'])."</td>
                <td >".strtoupper($c['Prevision_Salud'])."</td>
                <td >".strtoupper($c['fpago'])."</td>
                <td >".strtoupper($c['banco'])."</td>
                <td >".strtoupper($c['ncuenta'])."</td>
                <td >".strtoupper($c['vacaciones'])."</td>                
                <td><button type='button' class='btn btn-default' data-toggle='modal' data-target='#modal-bonos' onclick='buscarbonos(".$c['ID_Cliente'].")'><i class='glyphicon glyphicon-list-alt'></i></button></td>
                <td ><input type='text' id='txt-he".$c['ID_Contrato']."' onblur='calculoHE(".$c['ID_Contrato'].")' placeholder='Horas Extras' disabled></td>
                <td ><label id='txt-vhe".$c['ID_Contrato']."' disabled></td>
                <td ><input type='text' id='txt-a".$c['ID_Contrato']."' onblur='calculo(".$c['ID_Contrato'].")' placeholder='Aguinaldo' disabled></td>
                <td ><label id='txt-timp".$c['ID_Contrato']."' disabled></td>
                <td ><input type='text' id='txt-mv".$c['ID_Contrato']."'  placeholder='Movilizaion variable' disabled></td>
                <td ><input type='text' id='txt-v".$c['ID_Contrato']."' onblur='calculoTH(".$c['ID_Contrato'].")' placeholder='Viaticos' disabled></td>
                <td ><label id='txt-th".$c['ID_Contrato']."' disabled></td>
                <td >11,44%</td>
                <td >1,41%</td>
                <td >1,8%</td>
                <td >3,0%</td>
                <td ><input type='checkbox' value=''></td>
                <td ><input type='checkbox' value=''></td>
                <td ><input type='number' id='txt-ncf".$c['ID_Contrato']."' name='row-1-age' placeholder='Numero de Cargas Familiares' disabled></td>
                <td ><input type='number' id='txt-pcj".$c['ID_Contrato']."' name='row-1-age' placeholder='prestamoCajaChica' disabled></td>
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
                <td ><label id='txt-pv".$c['ID_Contrato']."' placeholder='Provicion Vacaciones' disabled ></td>
                <td ><label id='txt-pf".$c['ID_Contrato']."' placeholder='Provicion Finiquito' disabled></td>
                <td ><input type='text' id='txt-tcp".$c['ID_Contrato']."' name='row-1-age' placeholder='Total costo personal' disabled></td>
                <td ><input type='text' id='txt-cta".$c['ID_Contrato']."' name='row-1-age' placeholder='Comicion totoal Agencia' disabled></td>
                <td ><input type='text' id='txt-cc".$c['ID_Contrato']."' name='row-1-age' placeholder='Costo Cliente' disabled></td>
                <td ><input  type='datetime-local'  id='txt-llt".$c['ID_Contrato']."' placeholder='Legada full time' disabled></td>
                <td ><input type='datetime-local' id='txt-lpt".$c['ID_Contrato']."' placeholder='Llegada parti time' disabled></td>
                <td ><input type='datetime-local' id='txt-ls".$c['ID_Contrato']."' placeholder='Llegada supervisor' disabled></td>
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
                <td ><input type='text' id='txt-co".$c['ID_Contrato']."' name='row-1-age' placeholder='Comentario y/u Observaciones' disabled></td>
            </tr>";}?><a href="<?php echo base_url("menu/index");?>">
       </tbody>
    </table>
</div>
        <div class="col-xs-12">
            <div class="btn-group"> 
                <a href="<?php echo base_url("nominalist/daNomina");?>"><button type="button" id="sig-btn" class="btn btn-primary">Descargar</button> </a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<!-- </div></div></div></div></div></div></div> -->
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
                <p>Horario: <form id="form2" name="form2" method="post" action="<?php echo  site_url();?>nominalist/buscarUsuario">
                    <select id="usuarios" name="usuarios" style="width:130px" class="form-control" onchange="document.getElementById('form2').submit();"> 
                        <option value="">Seleccione</option> 
                        <?php foreach ($usuarios as $u) {echo "<option value='".$u["id_usuario"]."'>".strtoupper($u["usuario"])."</option>"; } ?>
                    </select>
                    </form>
                </p>
                </label>
            </div>
            <div class="col-xs-3">
                <label>
                    <p>Jornada:
                    <form id="form2" name="form2" method="post" action="<?php echo  site_url();?>nominalist/buscarUsuario"> 
                    <select id="usuarios" name="usuarios" style="width:130px" class="form-control" onchange="document.getElementById('form2').submit();"> 
                        <option value="">Seleccione</option> 
                        <?php foreach ($usuarios as $u) {echo "<option value='".$u["id_usuario"]."'>".strtoupper($u["usuario"])."</option>";}?>
                    </select>
                    </form>
                    </p>
                </label>
            </div>
            <div class="col-xs-3">
                <label> 
                    <p>Local:
                        <form id="form2" name="form2" method="post" action="<?php echo  site_url();?>nominalist/buscarUsuario"> 
                            <select id="usuarios" name="usuarios" style="width:130px" class="form-control" onchange="document.getElementById('form2').submit();"> 
                                <option value="">Seleccione</option> 
                                <?php foreach ($usuarios as $u) {echo "<option value='".$u["id_usuario"]."'>".strtoupper($u["usuario"])."</option>"; } ?> 
                            </select>
                        </form>
                    </p>
                </label>
            </div>
            <div class="col-xs-3">
                <label> 
                    <p>Cadena:
                        <form id="form2" name="form2" method="post" action="<?php echo  site_url();?>nominalist/buscarUsuario">
                            <select id="usuarios" name="usuarios" style="width:130px" class="form-control" onchange="document.getElementById('form2').submit();"> 
                                <option value="">Seleccione</option> 
                                <?php foreach ($usuarios as $u) {echo "<option value='".$u["id_usuario"]."'>".strtoupper($u["usuario"])."</option>";}?>
                            </select>
                        </form>
                    </p>
                </label>
            </div> 
            <br>
            <br>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>Cancelar</button>
                <a href="<?php echo base_url("menu/index");?>"><button type='button' class='btn btn-primary'>Ingresar</button></a>

              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

<div class='modal fade' id='modal-bonos' >
</div>


</section>
</div>
</div>
<style type="text/css">
      th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        width: auto; 
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

function marcar(source) 
    {
        checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
        for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
        {
            if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
            {
                checkboxes[i].checked=source.checked  ;
                 //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
            }else{

            }
        }
    }

function calculo(id) {
    var dt = parseInt($("#txt-dt"+id).val());
    var sb = parseInt($("#inp-sb"+id).val());
    var spro = (sb/30)*dt;
    var sprosd = spro.toFixed(2);
    $("#txt-spro"+id).text(sprosd);
    var gr = spro*0.25;
    var grsd = gr.toFixed(2);
    $("#txt-g"+id).text(grsd);
    var he = $("#txt-he"+id).val();
    var dt = $("#txt-dt"+id).val();
    var vhe = (he*0.007778)*dt;
    var vhesd = vhe.toFixed(2);
    $("#txt-vhe"+id).text(vhesd);
    var ag = parseInt($("#txt-a"+id).val());
    var bct = parseInt($("#txt-bcl"+id).val());
    var bcl = parseInt($("#txt-bct"+id).val());
    var timp = parseInt(sprosd)+parseInt(ag)+parseInt(bcl)+parseInt(bct)+parseInt(vhesd);
    $("#txt-timp"+id).text(timp);
 }

 function calculoHE(id) {
    //calculo valor horas extras
    var he = $("#txt-he"+id).val();
    var dt = $("#txt-dt"+id).val();
    var vhe = (he*0.007778)*dt;
    var vhesd = vhe.toFixed(2);
    $("#txt-vhe"+id).text(vhesd);

 }

 function calculoTH(id) {
    var he = $("#txt-he"+id).val();
    var dt = $("#txt-dt"+id).val();
    var vhe = (he*0.007778)*dt;
    var vhesd = vhe.toFixed(0);
    var dt = parseInt($("#txt-dt"+id).val());
    var sb = parseInt($("#inp-sb"+id).val());
    var spro = (sb/30)*dt;
    var sprosd = spro.toFixed(0);
    var ag = parseInt($("#txt-a"+id).val());
    var bct = parseInt($("#txt-bcl"+id).val());
    var bcl = parseInt($("#txt-bct"+id).val());
    var timp = parseInt(sprosd)+parseInt(ag)+parseInt(bcl)+parseInt(bct)+parseInt(vhesd);
    var mv = $("#txt-mv"+id).val();
    var cl = $("#txt-cl"+id).val();
    var m = $("#txt-m"+id).val();
    var v = $("#txt-v"+id).val();
    var thb = parseInt(mv)+parseInt(v)+parseInt(cl)+parseInt(m)+parseInt(timp);
    $("#txt-th"+id).text(thb);
    var pf = thb/12;
    $("#txt-pf"+id).text(pf);
    var pv = (timp/30)*1.75;
    var pvsd = pv.toFixed(0);
    $("#txt-pv"+id).text(pvsd);
 }

 // function CalculoPF(id) {

 //    var he = $("#txt-he"+id).val();
 //    var dt = $("#txt-dt"+id).val();
 //    var vhe = (he*0.007778)*dt;
 //    var vhesd = vhe.toFixed(2);
 //    var dt = parseInt($("#txt-dt"+id).val());
 //    var sb = parseInt($("#inp-sb"+id).val());
 //    var spro = (sb/30)*dt;
 //    var sprosd = spro.toFixed(2);
 //    var ag = parseInt($("#txt-a"+id).val());
 //    var bct = parseInt($("#txt-bcl"+id).val());
 //    var bcl = parseInt($("#txt-bct"+id).val());
 //    var timp = parseInt(sprosd)+parseInt(ag)+parseInt(bcl)+parseInt(bct)+parseInt(vhesd);
 //    var mv = $("#txt-mv"+id).val();
 //    var cl = $("#txt-cl"+id).val();
 //    var m = $("#txt-m"+id).val();
 //    var v = $("#txt-v"+id).val();
 //    var thb = parseInt(mv)+parseInt(v)+parseInt(cl)+parseInt(m)+parseInt(timp);
    
 // }

function buscarbonos(id){
    $.ajax({
            url: "http://localhost/nominas/nominalist/listarbonos",
            type: "POST",
            data: "id="+id, 
            success: function(data) {
           $("#modal-bonos").html(data);  
           // $("#modal-bonos").modal('show');
             // alert(data);
              }
        });
}


    
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
      scroll: true,
    
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
    if( $(this).is(':button') ) {
        $('#btnmodal1').attr('disabled', !this.button);
        $("#boxbono").show(); 
        $('#btnbono').removeAttr('collapse', !this.div);
        alert("Nominas Ingresadas"); 
    }
});


// $().ready(function(){
//      $('#btnbono').attr('disabled', !this.button);
//      $('#btnbono').removeAttr('collapse', !this.div);
// });


// $('#chk-').click( function(){
//    if( $(this).is(':checked') ) {
//         alert('chechgdked');
//     }else{
//         alert('unchecked');
//    }
// });



<?php foreach ($contratos as $c) { echo"
    $('#chk-".$c["ID_Contrato"]."').click( function(){
   if( $(this).is(':checked') ) {
        $('#txt-dt".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-spro".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-g".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-bcl".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-bct".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-m".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-he".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-vhe".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-a".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-timp".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-mv".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-th".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-v".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-dp".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-ds".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-dm".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-dsc".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-ncf".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-pcj".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-pv".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-pf".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-tcp".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-cta".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-cc".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-llt".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-lpt".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-ls".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
        $('#txt-co".$c["ID_Contrato"]."').removeAttr('disabled', !this.text);
    }else{
    $('#txt-dt".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-spro".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-g".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-bcl".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-bct".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-m".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-he".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-vhe".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-a".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-timp".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-mv".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-th".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-v".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-dp".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-ds".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-dm".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-dsc".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-ncf".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-pcj".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-pv".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-pf".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-tcp".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-cta".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-cc".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-llt".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-lpt".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-ls".$c["ID_Contrato"]."').attr('disabled', !this.text);
        $('#txt-co".$c["ID_Contrato"]."').attr('disabled', !this.text);
          }
});
";}?>

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
