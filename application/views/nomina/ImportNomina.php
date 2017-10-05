<div class="content-wrapper" >  
    <section class="content-header table_responsive">
        <table>
      <td><h1>Lista de Contratados</h1></td>
       <td width="25%">
          <td><a class="btn btn-app" href="/nominas/assets/plantilla/PlantillaNomina.xlsx" download="PlantilladeNomina">
                <i class="glyphicon glyphicon-download-alt" href=""></i> Descargar Plantilla
              </a></td>
        </form>     
       </td>
        <td>
          <form id="formu2" class="bus" action="<?php echo  site_url();?>nominalist/agregarnominamasiva" method="POST" enctype="multipart/form-data">       
          <label for="excel" class="label label-primary">
          <i class="glyphicon glyphicon-download-alt" href=""></i> Importar Nomina
          </label>
          <input type="file" id="excel" name="excel" onchange="formato('#excel');" />
       
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
          <?php 
            if(isset($nombre2)){
              $contador= count($nombre2);

              echo "<div class='alert alert-info'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='close' <span aria-hidden='true'>&times;</span></button>
                      <strong>".$nombre.": </strong> Usted a agregado ".$contador." nominas.
                    </div>";
             for ($i=0; $i < $contador; $i++) {               
               echo"<tr>
                <td>".$numeroNomina[$i]."</td>
                <td>".$nombre2[$i]."</td>
                <td>".$ApellidoP[$i]."</td>
                <td>".$ApellidoM[$i]."</td>
                <td>".$rut[$i]."</td>
                <td>".$supervisor[$i]."</td>
                <td>".$cadena[$i]."</td>
                <td>".$local[$i]."</td>
                <td>".$ciudad[$i]."</td>
                <td>".$cargo[$i]."</td>
                <td>".$co[$i]."</td>
                <td>".$tipo_contrato[$i]."</td>
                <td>".$inicio[$i]."</td>
                <td>".$termino[$i]."</td>
                <td>".$diastrab[$i]."</td>
                <td>".$sueldobase[$i]."</td>
                <td>".$sueldobaseprop[$i]."</td>
                <td>".$gratifica[$i]."</td>
                <td>".$bonocual[$i]."</td>
                <td>".$bonocuan[$i]."</td>
                <td>".$cumplimiento[$i]."</td>
                <td>".$bonos[$i]."</td>
                <td>".$horaextras[$i]."</td>
                <td>".$valorextras[$i]."</td>
                <td>".$aguinaldo[$i]."</td>
                <td>".$total_impo[$i]."</td>
                <td>".$colacion[$i]."</td>
                <td>".$movi[$i]."</td>
                <td>".$movi_adi[$i]."</td>
                <td>".$viatico[$i]."</td>
                <td>".$total_haber[$i]."</td>
                <td>".$desc_provi[$i]."</td>
                <td>".$sueldo_liquido[$i]."</td>
                <td>".$sis[$i]."</td>
                <td>".$mutual[$i]."</td>
                <td>".$seg_cesantia[$i]."</td>
                <td>".$provi_vacaciones[$i]."</td>
                <td>".$provi_finiquito[$i]."</td>
                <td>".$banefe[$i]."</td>
                <td>".$total_costo[$i]."</td>
                <td>".$comision[$i]."</td>
                <td>".$costocliente[$i]."</td>
                </tr>";
             }
            }
          ?>
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
.label-primary {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}

.label-primary:focus,
.label-primary:hover {
    background-color: green;
    }

input[type="file"] {
    display: none;
}

/* The close button */
.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
    color: black;
}
</style>
</body>
<script type="text/javascript">

    function formato(excel){
        if($(excel).val()!=''){
            var f=($(excel).val().substring($(excel).val().lastIndexOf("."))).toLowerCase();
            var validar=true;
            if(f==".xls" || f==".xlsx"){ validar=true;} else {validar=false;}
            if(validar==false){
                alert("El formato de archivo no corresponde, adjunte uno con extensión .xls o .xlsx");
                document.getElementById("excel").value="";
            }else if(validar==true){
                document.getElementById("formu2").submit();  
            }

        }
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