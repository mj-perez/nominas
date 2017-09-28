
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
      <h1 align="center">
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
		<form id="form1" name="form1" method="post" action="<?php echo  site_url();?>/nominaclientes/buscarCliente">
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
		 <form id="form2" name="form2" method="post" action="<?php echo  site_url();?>nominausuarios/buscarUsuario">
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
    </div>  
           <td width="30%"><form class='form-horizontal' name ='form3' id='form3' method='POST' action="<?php echo  site_url();?>nominalist/exportardatos">
		   <br><br><button id="btn_ini" name="btn_ini" type="submit" class="form-control btn btn-primary" style="width: 130px" title='exportar'  onclick="document.getElementById(form3).submit();">Exportar a Excel</button>
		  </td>
</table>

<table id="exa" class="display" cellspacing="0" width="100%">
      <thead>

            <tr>
                <th></th>
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
                <td><button type='button' class='btn btn-default' data-toggle='modal' data-target='#modal-default'><i class='glyphicon glyphicon-list-alt'></i></button></td>
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
<div class='modal fade' id='modal-default'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span></button>
                <h4 class='modal-title'>Default Modal</h4>
              </div>
              <div class='modal-body'>
                <p>One fine body&hellip;</p>
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
</div>

</section></body></html>



<style type="text/css">
      th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        width: 950px;
        margin: 0 auto;
    }
td.details-control {
    background: url('../resources/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('../resources/details_close.png') no-repeat center center;
}
</style>
</body>
<script type="text/javascript">
    
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
            leftColumns: 
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
