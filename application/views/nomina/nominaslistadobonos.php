
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
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Salary</th>
        </tr>
    </thead>
 
    <tfoot>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Salary</th>
        </tr>
    </tfoot>
</table>
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
  
function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;"><tr><td>Bono 1:</td><td><input type="text" id="row-1-age" name="row-1-age" placeholder="Bono 1"></td></tr><tr><td>Bono X:</td><td><input type="text" id="row-1-age" name="row-1-age" placeholder="Bono X"></td></tr><tr><td><input type="button" id="row-1-age" name="row-1-age" value="Registrar Bonos"></td></tr></table>';
}
 
$(document).ready(function() {
    var table = $('#exa').DataTable( {
        "ajax": "/nominas/assets/ajax/data/objects.txt",
        lengthMenu : [[5, 15, 25,50, -1], [5,15, 25, 50, "All"]],
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "name" },
            { "data": "position" },
            { "data": "office" },
            { "data": "salary" }
        ],
        "order": [[1, 'asc']]
    } );
     
    // Add event listener for opening and closing details
    $('#exa tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
} );

</script>