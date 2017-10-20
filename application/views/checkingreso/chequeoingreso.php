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
    <section class="content">   
   <div class='box box-default'>
        <div class='box-header with-border'>
          <h3 class='box-title'>Filtros</h3>

          <div class='box-tools pull-right'>
            <button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
            <button type='button' class='btn btn-box-tool' data-widget='remove'><i class='fa fa-remove'></i></button>
          </div>
        </div>
        <div class='box-body'>
          <div class='row'>
            <div class='col-md-4'>
              <div class='form-group'>
                <label>Usuario</label>
                <select class='form-control select2';'>
                   <option value="">Seleccione</option>
          
              <?php foreach ($chequenominaingresada as $t)  {
                    echo "<option value='".$t["Usuario"]."'>".strtoupper($t["Nombre"])."</option>";
                  }?>
        </select> 
              </div>
              </div>
              <div class='col-md-4'>
              <div class='form-group'>
                <label>Cliente</label>
                <select id='clientes' name='clientes'  class="form-control select2">
            <option value="">Seleccione</option>
          
              <?php foreach ($chequenominaingresada as $t)  {
                    echo "<option value='".$t["ID_Cliente"]."'>".strtoupper($t["nombrecliente"])."</option>";
                  }?>
        </select> 
        
              </div>
              </div>
              <div class='col-md-4'>
              <div class='form-group'>
                <label>Fecha</label>
                <div class='input-group date'>
                  <div class='input-group-addon'>
                    <i class='fa fa-calendar'></i>
                  </div>
                  <input type='text' class='form-control pull-right' id='datepicker'>
                </div>
                <!-- /.input group -->
              </div>
              </div>
            

              
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class='box-footer'>
          <a href=''></a>
        </div>
      </div>
      <!--  -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h1 class="title">Chequeo de nominas Ingresadas </h1>
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">
                    <strong>Lista de nominas ingresadas</strong>
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
                                <th>Detalle</th>
                                <th>Accion</th>
                              </tr>
                      </thead>
                      <tbody>
                        <?php 
            foreach($chequenominaingresada as $c) 
                {
echo "     
            <tr>
              <td>".$c['Usuario']."</td>
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
              <td>
                <div class='btn-group-vertical '>
                      <button type='button' class='btn btn-info' data-toggle='modal' data-target='#tallModal'><i class='fa fa-check'></i>&nbsp;Aprobado</button>
                      <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#reprobarNomina' onclick='reprobarNomina(\"$c[id_NominasR]\")'><i class='fa fa-remove'></i>&nbsp;&nbsp;Reprobado</button>
                    </div>
              </div>  


              </td>
            </tr>";
        } ?>
                      </tbody>
                    </table>

<div class="modal modal-danger fade" id="reprobarNomina">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Reprobar Nomina</h4>
              </div>
              <div class="modal-body">
                <div id="reprobar"></div> 
              </div>
              <div class="modal-footer" style="margin-top: 0px !important;">
                <button type="submit" onclick="document.getElementById('myform2').submit();" class="btn btn-outline pull-left">Eliminar</button>
                <button type="button" class="btn btn-outline" data-dismiss="modal">Cancelar</button>
              </div>
            </div>
          </div>
        </div> 


<div class="example-modal">
<div id="tallModal" class="modal modal-info">
  <div class="modal-dialog">
    <div class="modal-content" style=" background-color: #00c0ef;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align: center;">Aprobar Nomina</h4>
      </div>
      <div class="modal-body">
                <h3 style="text-align: center;">Esta seguro de Aprobar esta nomina ?</h3>
              </div>
      <div class="modal-footer">
              
       
        

     <!-- <div class="modal-footer"> -->
<?php  
foreach ($chequenominaingresada as $a) {
  # code...

echo"
        
        <form action='".site_url()."nominalist/AprobarNominas' method='POST'>
                <input type='hidden' name='idR' value='".$a['id_NominasR']."'>";}?>
                  
                  <button type='submit' class="btn btn-outline pull-left" id='idR' onclick=''>
                  Aceptar</button>
                </form>
                <button type='button' class='btn btn-outline ' data-dismiss='modal'>Cancelar</button>
         </div>
       </div>     
      <!-- </div> -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
            </div>            
            <!-- /.box-footer -->
          </div>
          <!-- /.box --
      
      <!-- /.row -->


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
   function reprobarNomina(id){            
            $.ajax({
                    url: "http://localhost/nominas/nominalist/reprobarNomina",
                    type: "POST",
                    data: "id="+id,
                    success: function(data) {
                            $("#reprobar").html(data);
                     }
                });
        }
</script>
<style type="text/css">
  td {

    font-size:20px;

}
</style>