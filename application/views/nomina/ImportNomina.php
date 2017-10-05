<div class="content-wrapper" >  
    <section class="content-header table_responsive">
        <table>
      <td><h1>Lista de Contratados</h1></td>
       <td width="25%">
          <form class='form-horizontal'>
           <button id="btn_ini" name="btn_ini" type="submit" class="btn btn-app btn-sm" title='exportar'>Descargar Plantilla<i class="glyphicon glyphicon-download-alt"></i><a href="nominas/assets/plantilla/PlantillaNomina.xlsx" download="PlantilladeNomina"></button></a>
        </form>     
       </td>
       <td>
          <form class='form-horizontal' name ='form3' id='form3' method='POST' action="<?php echo  site_url();?>nominalist/listnominas">
           <button id="btn_ini" name="btn_ini" value="Importar Nominas" type="submit" class="btn btn-app btn-xs" title='exportar' >Importar Nominas<i class="glyphicon glyphicon-import"></i></button>
        </form>     
       </td>
       </table>
       <br>
    <div class="row">
        <div class="col-xs-12">
            <div id="boxmodal1" class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Lista Nominas de contratos
                <small>Registro de datos de nomina</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" id="btnmodal1" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
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
        <td></td>
              
      <td><h5 class="tituloclientes" align="left"><font color="black">Limpiar</font></h5>
          <form class='form-horizontal' name ='form3' id='form3' method='POST' action="<?php echo  site_url();?>nominalist/listnominas">
           <button id="btn_ini" name="btn_ini" type="submit" class="btn btn-info btn-sm" title='exportar'  onclick="document.getElementById(form3).submit();"><i class="glyphicon glyphicon-refresh"></i></button>
        </form>     
       </td> 
       

    
</table>

 <br>
<table id="tabla_nominas" class="table_responsive row-border order-column" >
       <thead>
            <tr>
                <th>N°</th>
                <th>Nombres</th>
                <th>Apellido P</th>
                <th>Apellidos M</th> 
                <th>Supervisor</th>
                <th>Cadena</th>
                <th>Local</th>
                <th>Ciudad</th>
                <th>Rut</th>
                <th>Cargo del Trabajador</th>
                <th>C.O</th>
                <th>Tipo Contrato</th>
                <th>Fecha Inicio</th>
                <th>Fecha Termino</th>
                <th>Dias Trabajados</th>
                <th>Sueldo Base</th>
                <th>Sueldo Base Prop</th>
                <th>Gratificacion</th>
                <th>Bono Cualitativo</th>
                <th>Bono Cuantitativo</th>
                <th>Cumplimiento %</th>
                <th>Bonos</th>
                <th>N° Horas Extra</th>
                <th>Valor Horas Extras</th>
                <th>Aguinaldo</th>
                <th>Total Imponible</th>
                <th>Colacion</th>
                <th>Movilizacion</th>
                <th>Movilizacion Variable</th>
                <th>Viatico</th>
                <th>Total Haberes</th>
                <th>Descuento Previcional</th>
                <th>Sueldo Liquido</th>
                <th>SIS</th>
                <th>Mutual</th>
                <th>Seguro Cesantia</th>
                <th>Provision de Vacaciones</th>
                <th>Provision de Finiquito</th>
                <th>Banefe</th>
                <th>Total Costo Personal</th>
                <th>Comision Agencia</th>
                <th>Costo Final Cliente</th>
                </tr>
        </thead>
        
        <tbody>

       </tbody>
    </table>
</div>
        <div class="col-xs-12">
            <div class="btn-group"> 
                <a href="<?php echo base_url("nominalist/daNomina");?>"><button type="button" id="sig-btn" class="btn btn-primary">Ingresar</button> </a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
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