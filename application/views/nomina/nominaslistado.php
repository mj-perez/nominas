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
      <h1>Vista previa de lista de nominas</h1>
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
         
       <!-- <td width="25%"><h5 class="titulousuarios" align="left"><font color="black">Limpiar</font></h5>
          <form class='form-horizontal' name ='form3' id='form3' method='POST' action="<?php echo  site_url();?>nominalist/listnominas">
           <button id="btn_ini" name="btn_ini" type="submit" class="btn btn-info btn-sm" title='exportar'  onclick="document.getElementById(form3).submit();"><i class="glyphicon glyphicon-refresh"></i></button>
        </form>     
       </td> -->

    
</table>

 <br>
<table id="tabla_nominas" class="stripe row-border order-column" >
       <thead>
            <tr>
                <th>Nombres</th>
                <th>Appellido Paterno</th> 
                <th>Appellido Materno</th>
                <th>Rut</th>
                <th>Cliente</th>
                <th>local</th>
                <th>cadena</th>
                <th>Comuna</th>
                <th>Region</th> 
                <th>Empresa</th> 
                <th>Tipo Contrato</th> 
                <th>Cargo</th>
                <th>Banco</th> 
                <th>Forma de Pago</th> 
                <th>N° Cuenta</th> 
                <th>Afp</th> 
                <th>Isapre</th>
                <th>Vacaciones</th>  
                <th>Fecha Inicio</th>
                <th>Fecha Termino</th> 
                <th>Sueldo Base</th> 
                <th>Bono Cualitativo</th>
                <th>Bono Cuantitativo</th> 
                <th>Colacion</th>
                <th>Movilizacion</th> 
                <th>Usuario </th> 
                <th>Status Contrato</th> 
                <th>ACTIVO</th>
                <th>usuario</th>
                </tr>
        </thead>
        
<tbody>
<?php

foreach($contratos as $c) {
echo "     
            <tr>
                <td>".$c['Nombres']."</td>
                <td>".$c['Ap_Paterno']."</td> 
                <td>".$c['Ap_Materno']."</td>
                <td>".$c['Rut']."</td>
                <td>".$c['Cliente']."</td>
                <td>".$c['local']."</td>
                <td>".$c['cadena']."</td>
                <td>".$c['Comuna']."</td>
                <td>".$c['Region']."</td> 
                <td>".$c['EGrupo']."</td> 
                <td>".$c['Tipo_Contrato']."</td> 
                <td>".$c['Cargo']."</td>
                <td>".$c['Banco']."</td> 
                <td>".$c['FPago']."</td> 
                <td>".$c['NCuenta']."</td> 
                <td>".$c['afp']."</td> 
                <td>".$c['isapre']."</td>
                <td>".$c['vacaciones']."</td>  
                <td>".$c['Fecha_Inicio']."</td>
                <td>".$c['Fecha_Termino']."</td> 
                <td>".$c['Sueldo_Base']."</td> 
                <td>".$c['Bono_Cualitativo']."</td>
                <td>".$c['Bono_Cuantitativo']."</td> 
                <td>".$c['Colacion']."</td>
                <td>".$c['Movilizacion']."</td> 
                <td>".$c['Usuario']."</td> 
                <td>".$c['Status_Contrato']."</td> 
                <td>".$c['ACTIVO']."</td>
                <td>".$nombre."</td>
            </tr>";
        }

    ?>
       </tbody>
    </table>
</div>
        <div class="col-xs-12">
            <div class="btn-group"> 
                <a href="<?php echo base_url("nominalist/ImportaNominas");?>"><button type="button" id="sig-btn" class="btn btn-primary">Descargar</button> </a>
            </div>
        </div>
    </div>
</div>
</div>
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

</script>
