<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
      <h2>Nominas ingresadas<small>1.0&nbsp;&nbsp;&nbsp;</small> </h2>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url("login/menu");?>"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li class="active"><a href="#">Nominas ingresadas</li>
      </ol>
      
    </section>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Monthly Recap Report</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Lista de Nominas Aprobada</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <table id="tabla" class="display nowrap" cellspacing="0" width="100%">
                      <thead>
                              <tr>
                                <th>Usuario</th>
                                <th>Cliente</th>
                                <th>Estado</th>
                                <th>Fecha Ingreso</th>
                              </tr>
                      </thead>
                      <tbody>
                        <?php 
                        foreach($mnominasaprobadas as $c) {
echo "     
            <tr>  
              <td>".$c['Usuario']."</td>
              <td>".$c['Cliente']."</td> 
              <td>".$c['EstadoNomina']."</td>
              <td>".$c['FechaRegistro']."</td>

              
            </tr>";
        } ?>
                      </tbody>
                    </table>

                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Total costo personal por Cliente</strong>
                  </p>
                  <?php foreach ($totalesAprobadoPorCliente as $ta ) {
                    echo "
                 
                  <div class='progress-group'>
                    <span class='progress-text'>".$ta['nombreCliente']."</span>
                    <span class='progress-number'><b>Total Costo Personal: &nbsp;</b>$ &nbsp;".number_format($ta['TotalCostoPersonal'])."</span>

                    <div class='progress sm'>
                      <div class='progress-bar progress-bar-aqua' style='width: 100%'></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                   "; }?>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                    <h5 class="description-header"><?php echo $totalesAprobadoGenerales["Ncontratos"]; ?></h5>
                    <span class="description-text">N° de Contratos</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                    <h5 class="description-header">$ &nbsp;<?php echo number_format($totalesAprobadoGenerales["TotalHaberes"]); ?></h5>
                    <span class="description-text">TOTAL Haberes</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                    <h5 class="description-header">$ &nbsp;<?php echo number_format($totalesAprobadoGenerales["TotalImponible"]); ?></h5>
                    <span class="description-text">TOTAL Imponible</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                    <h5 class="description-header">$ &nbsp;<?php echo number_format($totalesAprobadoGenerales["TotalCostoPersonal"]); ?></h5>
                    <span class="description-text">TotalCostoPErsonal</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>



<script type="text/javascript">
  
  $(document).ready(function() {
    var table = $('#tabla').DataTable( {
      searching   : true,  
      info        : true,
      lengthMenu : [[5, 15, 25,50, -1], [5,15, 25, 50, "All"]],
      buttons: [
                'csv', 'excel', 'pdf', 'print', 'reset', 'reload'
            ],
      scrollX     : true,
      autoWidth   : true,
     
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
<style type="text/css">
  
   div.dataTables_wrapper {
        width: auto;
        height: auto;
        margin: 2 auto;
    }

</style>