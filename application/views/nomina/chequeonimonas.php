<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
<div class="content-wrapper">
  <section class="content-header">
    <h1>Historico de Nominas</h1>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <h1>        Nominas Registradas      </h1>
            <h5 class="tituloclientes" align="left"><font color="black">Elija Codigo de Nominas ingresada</font></h5>
        <form id="form1" name="form1" method="post" action="<?php echo  site_url();?>/nominalist/idnominasregistradas">
        <select id="idnominasr" name="idnominasr" style="width:200px" class="form-control" onchange="document.getElementById('form1').submit();">
            <option value="">Seleccione</option>
            <?php
                foreach ($idnominasregistradas as $id) {
                    echo "<option value='".$id["id_NominasR"]."'>".strtoupper($id["id_NominasR"])."</option>";}?>
        </select> 
        </form>
            
      
<br>

<table id="example" class="display nowrap" cellspacing="0" width="100%">
        <thead>
                <tr>
                  <th>ID_Nomina</th>
                  <th>FechaRegistro</th>
                  <th>Nombres</th>
                  <th>ApellidoP</th>
                  <th>ApellidoM</th>
                  <th>Rut</th>
                  <th>Supervisor</th>
                  <th>Cliente</th>
                  <th>Cadena</th>
                  <th>Local</th>
                  <th>Ciudad</th>
                  <th>Region</th>
                  <th>CargoTrabajador</th>
                  <th>Jornada</th>
                  <th>FormaPago</th>
                  <th>Banco</th>
                  <th>NCuentaB</th>
                  <th>CO</th>
                  <th>TipoContrato</th>
                  <th>FechaInicio</th>
                  <th>FechaTermina</th>
                  <th>DiasTrabajados</th>
                  <th>SueldoBase</th>
                  <th>SueldoBaseProp</th>
                  <th>Gratificacion</th>
                  <th>BonoCualitativo</th>
                  <th>BonoCuantitavo</th>
                  <th>Cumplimiento</th>
                  <th>Bonos</th>
                  <th>N_HorasExtras</th>
                  <th>ValorHorasExtras</th>
                  <th>Aguinaldo</th>
                  <th>TotalImponible</th>
                  <th>Colacion</th>
                  <th>Movilizacion</th>
                  <th>MovilizacionVariable</th>
                  <th>Viatico</th>
                  <th>TotalHaber</th>
                  <th>DescuentoPrevicional</th>
                  <th>SueldoLiquido</th>
                  <th>SIS</th>
                  <th>Mutual</th>
                  <th>SeguroCesantia</th>
                  <th>ProvisionVacaciones</th>
                  <th>ProvisionFiniquito</th>
                  <th>Banefe</th>
                  <th>TotalCostoPersonal</th>
                  <th>ComisionAgencia</th>
                  <th>CostoFinalCliente</th>
                  <th>Observacion</th>
                  <th>LlegadaFulltime</th>
                  <th>LlegadaPartime</th>
                  <th>LlegadaSupervisor</th>
                  <th>DocCelular</th>
                  <th>DocTablet</th>
                  <th>DocNotebook</th>
                  <th>DocCredencial</th>
                  <th>DocUniforme</th>
                  <th>DocEPP</th>
                  <th>DocClub360</th>
                  <th>DocCloud</th>
                  <th>DocIntranet</th>
                  <th>DocApenet</th>
                  <th>UsuarioRN</th>
            </tr>
        </thead><a href=""></a>
        <tbody>
<?php foreach($nominasingresadas as $c) {  
            
        echo"  <tr> <td>".$c['ID_Nomina']."</td>
                  <td>".$c['FechaRegistro']."</td>
                  <td>".$c['Nombres']."</td>
                  <td>".$c['ApellidoP']."</td>
                  <td>".$c['ApellidoM']."</td>
                  <td>".$c['Rut']."</td>
                  <td>".$c['Supervisor']."</td>
                  <td>".$c['Cliente']."</td>
                  <td>".$c['Cadena']."</td>
                  <td>".$c['Local']."</td>
                  <td>".$c['Ciudad']."</td>
                  <td>".$c['Region']."</td>
                  <td>".$c['CargoTrabajador']."</td>
                  <td>".$c['Jornada']."</td>
                  <td>".$c['FormaPago']."</td>
                  <td>".$c['Banco']."</td>
                  <td>".$c['NCuentaB']."</td>
                  <td>".$c['CO']."</td>
                  <td>".$c['TipoContrato']."</td>
                  <td>".$c['FechaInicio']."</td>
                  <td>".$c['FechaTermina']."</td>
                  <td>".$c['DiasTrabajados']."</td>
                  <td>".$c['SueldoBase']."</td>
                  <td>".$c['SueldoBaseProp']."</td>
                  <td>".$c['Gratificacion']."</td>
                  <td>".$c['BonoCualitativo']."</td>
                  <td>".$c['BonoCuantitavo']."</td>
                  <td>".$c['Cumplimiento']."</td>
                  <td>".$c['Bonos']."</td>
                  <td>".$c['N_HorasExtras']."</td>
                  <td>".$c['ValorHorasExtras']."</td>
                  <td>".$c['Aguinaldo']."</td>
                  <td>".$c['TotalImponible']."</td>
                  <td>".$c['Colacion']."</td>
                  <td>".$c['Movilizacion']."</td>
                  <td>".$c['MovilizacionVariable']."</td>
                  <td>".$c['Viatico']."</td>
                  <td>".$c['TotalHaber']."</td>
                  <td>".$c['DescuentoPrevicional']."</td>
                  <td>".$c['SueldoLiquido']."</td>
                  <td>".$c['SIS']."</td>
                  <td>".$c['Mutual']."</td>
                  <td>".$c['SeguroCesantia']."</td>
                  <td>".$c['ProvisionVacaciones']."</td>
                  <td>".$c['ProvisionFiniquito']."</td>
                  <td>".$c['Banefe']."</td>
                  <td>".$c['TotalCostoPersonal']."</td>
                  <td>".$c['ComisionAgencia']."</td>
                  <td>".$c['CostoFinalCliente']."</td>
                  <td>".$c['Observacion']."</td>
                  <td>".$c['LlegadaFulltime']."</td>
                  <td>".$c['LlegadaPartime']."</td>
                  <td>".$c['LlegadaSupervisor']."</td>";
                  

                    if ($c['DocCelular'] == null) {

                        echo "<td><label></label></td>";
                  
                    }else{
                        echo "<td><label><i style='color: #00c0ef' class='glyphicon glyphicon-ok'></i></label></td>";
                    }if ($c['DocTablet'] == null) {

                        echo "<td><label></label></td>";
                  
                    }else{
                        echo "<td><label><i style='color: #00c0ef' class='glyphicon glyphicon-ok'></i></label></td>";
                    }if ($c['DocNotebook'] == null) {

                        echo "<td><label></label></td>";
                  
                    }else{
                        echo "<td><label><i style='color: #00c0ef' class='glyphicon glyphicon-ok'></i></label></td>";
                    }if ($c['DocCredencial'] == null) {

                        echo "<td><label></label></td>";
                  
                    }else{
                        echo "<td><label><i style='color: #00c0ef' class='glyphicon glyphicon-ok'></i></label></td>";
                    }if ($c['DocUniforme'] == null) {

                        echo "<td><label></label></td>";
                  
                    }else{
                        echo "<td><label><a href='".$c['DocUniforme']."'><i style='color: #00c0ef' class='glyphicon glyphicon-ok'></i></a></label></td>";
                    }
                    if ($c['DocEPP'] == null){

                        echo "<td><label></label></td>";
                    }else{
                         echo "<td><label><i style='color: #00c0ef' class='glyphicon glyphicon-ok'></i></label></td>";
                    }
                    if ($c['DocClub360'] == null){

                        echo "<td><label></label></td>";
                    }else{
                         echo "<td><label><i style='color: #00c0ef' class='glyphicon glyphicon-ok'></i></label></td>";
                    }
                    if ($c['DocCloud']== null) {

                        echo "<td><label></label></td>";
                  
                    }else{
                        echo "<td><label><i style='color: #00c0ef' class=' glyphicon glyphicon-ok'></i></label></td>";
                    }
                    if ($c['DocIntranet'] == null) {

                        echo "<td><label></i></label></td>";
                  
                    }else{
                        echo "<td><label><i style='color: #00c0ef' class='glyphicon glyphicon-ok'></label></td>";
                    }
                    if ($c['DocApenet'] == null) {

                        echo "<td><label></label></td>";
                  
                    }else{
                        echo "<td><label><i style='color: #00c0ef' class='glyphicon glyphicon-ok'></i></label></td>";
                    }

                  echo"
                    <td><input type='hidden' value=".$c['idUserRn']." >".$nombre."</td>
             </tr>
             ";}?>
        </tbody>
    </table>
  </div>
</div>
<style type="text/css">
      th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        width: auto;
        margin: 0 auto;
    }
td {
    cursor: pointer;
    font-size:90%;
   width: 1px;
   text-align: center;
}
tr {
   font-size:95%;
   width: 1px;
   text-align: center;
}
</style>
</body>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<!-- <script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
<script type="text/javascript">

  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        info        : true,
        scrollX     : true,
      autoWidth   : true,
        lengthMenu : [[ 15, 25,50, -1], [15, 25, 50, "All"]],
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
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
    
 $(document).ready(function() {
    var table = $('#tabla').DataTable( {
      searching   : true,  
      info        : true,
      lengthMenu : [[ 15, 25,50, -1], [15, 25, 50, "All"]],
      buttons: [
                'csv', 'excel', 'pdf', 'print', 'reset', 'reload'
            ],
      scrollX     : false,
      autoWidth   : false,
      // fixedColumns:   {
      //       leftColumns: 3
      //   },
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
