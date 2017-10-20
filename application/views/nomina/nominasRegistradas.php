<div class="content-wrapper">
  <section class="content">
  <h1>Historico de Nominas</h1>
  <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Estado de registro de Nominas</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <p class="text-center">
                     <h2><strong>Lista de Nominas</strong></h2>
                    </p>
                    <br>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <table id="tabla" class="display nowrap" cellspacing="0" width="100%">
                      <thead>
                              <tr>
                                
                                <th>Usuario</th>
                                <th>Cliente</th>
                                <th>Estado</th>
                                <th>Fecha Ingreso</th>
                                <th>Detalle</th>
                                
                              </tr>
                      </thead>
                      <tbody>
                        <?php 
            foreach($NominaIngresadaPorUsuario as $c) 
                {
echo "     
            <tr>
              <td>".$c['id_NominasR']."</td>
              <td>".$c['Cliente']."</td> 
              <td>".$c['EstadoNomina']."</td>
              <td>".$c['FechaRegistro']."</td>
              <td>
                <form action='".site_url()."nominalist/exportardetalle?Usuario=".$c['ID_Usuario']."' method='POST'>
                <input type='hidden'name='Usuario' value='".$c['ID_Usuario']."'>
                  <button type='submit' class='btn btn-success'>
                  <i class='fa fa-file-excel-o'></i>&nbsp;Exportar Detalle
                  </button>
                </form></td>
            </tr>";
        } ?>
                      </tbody>
                    </table>
                    </div>
                    <!-- /.chart-responsive -->
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
                      <h5 class="description-header">$35,210.43</h5>
                      <span class="description-text">TOTAL REVENUE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                      <h5 class="description-header">$10,390.90</h5>
                      <span class="description-text">TOTAL COST</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                      <h5 class="description-header">$24,813.53</h5>
                      <span class="description-text">TOTAL PROFIT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block">
                      <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">GOAL COMPLETIONS</span>
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
  </section>
</div>
<script type="text/javascript">




   $('#datepicker').datepicker({
      autoclose: true
    });
  
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
<style type="text/css">
  td {

    font-size:20px;

}
</style>
