<div class="content-wrapper" >  
    <section class="content-header table_responsive">
        <table>
      <td><h1>Lista de Contratados</h1></td>
       
       </table>
       <br>
    <div class="row">
        <div class="col-xs-12">
            <div id="boxmodal1" class="box box-info">
            <div class="box-header">
               <table>
                    <td>
              <h3 class="box-title">Plantilla Oficial de Nomina 
                <small>Está plantilla es el formato para el ingreso de las nominas</small>
              </h3></td><td><a href="/nominas/assets/plantilla/PlantillaNomina.xlsx"><button type="button" class="btn btn-block btn-info btn-sm" title='Exportar nomina'>&nbsp;&nbsp;Descargar&nbsp;&nbsp;</button></a></td>
              <!-- tools box -->
              <!-- <div class="pull-right box-tools">
                <button type="button" id="btnmodal1" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div> -->
              <!-- /. tools -->
              </table>
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
        <td></td>      
      <td>
        <h5 class="tituloclientes" align="left"><font color="black">Limpiar</font></h5>
          <form class='form-horizontal' name ='form3' id='form3' method='POST' action="<?php echo  site_url();?>nominalist/ImportaNominas">
           <button id="btn_ini" name="btn_ini" type="submit" class="btn btn-info btn-sm" title='Limpiar tabla'  onclick="document.getElementById(form3).submit();"><i class="glyphicon glyphicon-refresh"></i></button>
        </form>     
       </td> 
       <td></td>
       <td></td>
       <td>
        <h5 class="tituloclientes" align="left"><font color="black">Importar</font></h5>
          <form id="formu2" class="bus" action="<?php echo  site_url();?>nominalist/agregarnominamasiva" method="POST" enctype="multipart/form-data">
           <label for="excel" class="btn btn-info btn-sm" title='Importar nomina'>
          <i class="glyphicon glyphicon-download-alt" href=""></i> 
          </label>
           <input type="file" id="excel" name="excel"  onchange="formato('#excel');" />
        </form>     
       </td>

    
</table>
 <br>
 <form method="post"  name="formu" id="formu" action="<?php echo  site_url();?>nominalist/insertarnominamasiva" enctype="multipart/form-data">
<table id="tabla_nominas" class="table-info row-border info order-column" cellspacing="0" >
       <thead>
            <tr>
                <th>N°</th>
                <th>Nombres</th>
                <th>Apellido P</th>
                <th>Apellidos M</th>
                <th>Rut</th> 
                <th>Supervisor</th>
                <th>Cliente</th>
                <th>Cadena</th>
                <th>Local</th>
                <th>Ciudad</th>
                <th>Region</th>
                <th>Cargo del Trabajador</th>
                <th>Jornada</th>
                <th>Forma de Pago</th>
                <th>Banco</th>
                <th>N° de cuenta</th>
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
                <th>Observasiones y/o Comentario</th>
                <th>Llegada Fulltime</th>
                <th>Llegada Partime</th>
                <th>Llegada Supervisor</th>
                <th>Documento Celular</th>
                <th>Documento Tablet</th>
                <th>Documento Notebook</th>
                <th>Documento Credencial</th>
                <th>Documento Uniforme</th>
                <th>Documento EPP</th>
                <th>Documento Club 360</th>
                <th>Documento Cloud</th>
                <th>Documento Intranet</th>
                <th>Documento Apenet</th>
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
              echo "<div><input type='hidden' name='txt_contador' id='txt_contador' value='".$contador."'></div>
             ";
             for ($i=0; $i < $contador; $i++) {               
               echo"<tr>
                <td><input type='text' name='' value='".$numeroNomina[$i]."'></td>
                <td><input type='text' name='txt-name-".$i."' value='".$nombre2[$i]."' required></td>
                <td><input type='text' name='txt-ap-".$i."' value='".$ApellidoP[$i]."' required></td>
                <td><input type='text' name='txt-am-".$i."' value='".$ApellidoM[$i]."'></td>
                <td><input type='text' name='txt-rut-".$i."' value='".$rut[$i]."' required></td>
                <td><input type='text' name='txt-sp-".$i."' value='".$supervisor[$i]."'></td>

                <td><input type='text' name='txt-cli-".$i."' value='".$cliente[$i]."'></td>

                <td><input type='text' name='txt-cad-".$i."' value='".$cadena[$i]."'></td>
                <td><input type='text' name='txt-loc-".$i."' value='".$local[$i]."'></td>
                <td><input type='text' name='txt-ciu-".$i."' value='".$ciudad[$i]."'></td>

                <td><input type='text' name='txt-rg-".$i."' value='".$region[$i]."'></td>

                <td><input type='text' name='txt-carg-".$i."' value='".$cargo[$i]."'></td>

                <td><input type='text' name='txt-jor-".$i."' value='".$jornada[$i]."'></td>
                <td><input type='text' name='txt-fp-".$i."' value='".$fpago[$i]."'></td>
                <td><input type='text' name='txt-bnc-".$i."' value='".$banco[$i]."'></td>
                <td><input type='text' name='txt-nc-".$i."' value='".$ncuenta[$i]."'></td>

                <td><input type='text' name='txt-co-".$i."' value='".$co[$i]."'></td>
                <td><input type='text' name='txt-tpc-".$i."' value='".$tipo_contrato[$i]."' required></td>
                <td><input type='text' name='txt-fi-".$i."' value='".$inicio[$i]."' required></td>
                <td><input type='text' name='txt-ft-".$i."' value='".$termino[$i]."'></td>
                <td><input type='text' name='txt-dt-".$i."' value='".$diastrab[$i]."' required></td>
                <td><input type='text' name='txt-sb-".$i."' value='$ ".number_format($sueldobase[$i])."' required></td>
                <td><input type='text' name='txt-sbp-".$i."' value='$ ".number_format($sueldobaseprop[$i])."' required></td>
                <td><input type='text' name='txt-g-".$i."' value='$ ".number_format($gratifica[$i])."' required></td>
                <td><input type='text' name='txt-bcl-".$i."' value='$ ".number_format($bonocual[$i])."'></td>
                <td><input type='text' name='txt-bct-".$i."' value='$ ".number_format($bonocuan[$i])."'></td>
                <td><input type='text' name='txt-cump-".$i."' value='".round($cumplimiento[$i],2)." %'></td>
                <td><input type='text' name='txt-bs-".$i."' value='$ ".number_format($bonos[$i])."'></td>
                <td><input type='text' name='txt-he-".$i."' value='".number_format($horaextras[$i])."'></td>
                <td><input type='text' name='txt-vhe-".$i."' value='$ ".number_format($valorextras[$i])."'></td>
                <td><input type='text' name='txt-ag-".$i."' value='$ ".number_format($aguinaldo[$i])."'></td>
                <td><input type='text' name='txt-timp-".$i."' value='$ ".number_format($total_impo[$i])."' required></td>
                <td><input type='text' name='txt-col-".$i."' value='$ ".number_format($colacion[$i])."'></td>
                <td><input type='text' name='txt-m-".$i."' value='$ ".number_format($movi[$i])."'></td>
                <td><input type='text' name='txt-mv-".$i."' value='$ ".number_format($movi_adi[$i])."'></td>
                <td><input type='text' name='txt-via-".$i."' value='$ ".number_format($viatico[$i])."'></td>
                <td><input type='text' name='txt-thb-".$i."' value='$ ".number_format($total_haber[$i])."' required></td>
                <td><input type='text' name='txt-dpv-".$i."' value='$ ".number_format($desc_provi[$i])."'></td>
                <td><input type='text' name='txt-slq-".$i."' value='$ ".number_format($sueldo_liquido[$i])."'></td>
                <td><input type='text' name='txt-sis-".$i."' value='$ ".number_format($sis[$i])."'></td>
                <td><input type='text' name='txt-mtl-".$i."' value='$ ".number_format($mutual[$i])."'></td>
                <td><input type='text' name='txt-sgc-".$i."' value='$ ".number_format($seg_cesantia[$i])."'></td>
                <td><input type='text' name='txt-psv-".$i."' value='$ ".number_format($provi_vacaciones[$i])."'></td>
                <td><input type='text' name='txt-psf-".$i."' value='$ ".number_format($provi_finiquito[$i])."'></td>
                <td><input type='text' name='txt-baf-".$i."' value='$ ".number_format($banefe[$i])."'></td>
                <td><input type='text' name='txt-tlc-".$i."' value='$ ".number_format($total_costo[$i])."' required></td>
                <td><input type='text' name='txt-cms-".$i."' value='$ ".number_format($comision[$i])."'></td>
                <td><input type='text' name='txt-ctc-".$i."' value='$ ".number_format($costocliente[$i])."' required></td>
                <td><input type='textarea' id='txt-obs' name='txt-Obs-".$i."' placeholder='Comentario y/u Observaciones'></td>
                <td><input type='datetime-local' id='txt-llgf' name='txt-llgf-".$i."' placeholder='Llegada Fulltime'></td>
                <td><input type='datetime-local' id='txt-llgp' name='txt-llgp-".$i."' placeholder='Llegada Partime'></td>
                <td><input type='datetime-local' id='txt-llgs' name='txt-llgs-".$i."' placeholder='Llegada supervisor'></td>
                <td ><label for='file1-".$i."' class='btn btn-info btn-sm'><i class='glyphicon glyphicon-download-alt'></i> 
                     </label> <input type='file' id='file1-".$i."' name='file-cel-".$i."' onchange='tickt(\"ima1-".$i."\")' >
                     <button type='button' title='Eliminar documento' class='btn btn-success btn-sm ' onclick='limpiafile(\"file1-".$i."\",\"ima1-".$i."\")'><i class='glyphicon glyphicon-trash'></i></button><i id='ima1-".$i."' class='glyphicon glyphicon-ok' style='display:none;'></i>
                </td>
                <td ><label for='file2-".$i."' class='btn btn-info btn-sm'><i class='glyphicon glyphicon-download-alt' title='Subir documento'></i> 
                     </label> <input type='file' id='file2-".$i."' name='file-tabl-".$i."' onchange='tickt(\"ima2-".$i."\")' >
                     <button type='button' title='Eliminar documento' class='btn btn-success btn-sm ' onclick='limpiafile(\"file2-".$i."\",\"ima2-".$i."\")'><i class='glyphicon glyphicon-trash'></i></button><i id='ima2-".$i."' class='glyphicon glyphicon-ok' style='display:none;'></i>
                </td>
                <td ><label for='file3-".$i."' class='btn btn-info btn-sm'><i class='glyphicon glyphicon-download-alt' title='Subir documento'></i> 
                     </label> <input type='file' id='file3-".$i."' name='file-not-".$i."' onchange='tickt(\"ima3-".$i."\")' >
                     <button type='button' title='Eliminar documento' class='btn btn-success btn-sm ' onclick='limpiafile(\"file3-".$i."\",\"ima3-".$i."\")'><i class='glyphicon glyphicon-trash'></i></button><i id='ima3-".$i."' class='glyphicon glyphicon-ok' style='display:none;'></i>
                </td>
                <td ><label for='file4-".$i."' class='btn btn-info btn-sm'><i class='glyphicon glyphicon-download-alt' title='Subir documento'></i> 
                     </label> <input type='file' id='file4-".$i."' name='file-cred-".$i."' onchange='tickt(\"ima4-".$i."\")' >
                     <button type='button' title='Eliminar documento' class='btn btn-success btn-sm ' onclick='limpiafile(\"file4-".$i."\",\"ima4-".$i."\")'><i class='glyphicon glyphicon-trash'></i></button><i id='ima4-".$i."' class='glyphicon glyphicon-ok' style='display:none;'></i>
                </td>
                <td ><label for='file5-".$i."' class='btn btn-info btn-sm'><i class='glyphicon glyphicon-download-alt' title='Subir documento'></i> 
                     </label> <input type='file' id='file5-".$i."' name='file-unif-".$i."' onchange='tickt(\"ima5-".$i."\")' >
                     <button type='button' title='Eliminar documento' class='btn btn-success btn-sm ' onclick='limpiafile(\"file5-".$i."\",\"ima5-".$i."\")'><i class='glyphicon glyphicon-trash'></i></button><i id='ima5-".$i."' class='glyphicon glyphicon-ok' style='display:none;'></i>
                </td>                
                <td ><label for='file6-".$i."' class='btn btn-info btn-sm'><i class='glyphicon glyphicon-download-alt' title='Subir documento'></i> 
                     </label> <input type='file' id='file6-".$i."' name='file-epp-".$i."' onchange='tickt(\"ima6-".$i."\")' >
                     <button type='button' title='Eliminar documento' class='btn btn-success btn-sm ' onclick='limpiafile(\"file6-".$i."\",\"ima6-".$i."\")'><i class='glyphicon glyphicon-trash'></i></button><i id='ima6-".$i."' class='glyphicon glyphicon-ok' style='display:none;'></i>
                </td>
                <td ><label for='file7-".$i."' class='btn btn-info btn-sm'><i class='glyphicon glyphicon-download-alt' title='Subir documento'></i> 
                     </label> <input type='file' id='file7-".$i."' name='file-c360-".$i."' onchange='tickt(\"ima7-".$i."\")' >
                     <button type='button' title='Eliminar documento' class='btn btn-success btn-sm ' onclick='limpiafile(\"file7-".$i."\",\"ima7-".$i."\")'><i class='glyphicon glyphicon-trash'></i></button><i id='ima7-".$i."' class='glyphicon glyphicon-ok' style='display:none;'></i>
                </td>
                <td ><label for='file8-".$i."' class='btn btn-info btn-sm'><i class='glyphicon glyphicon-download-alt' title='Subir documento'></i> 
                     </label> <input type='file' id='file8-".$i."' name='file-clou-".$i."' onchange='tickt(\"ima8-".$i."\")' >
                     <button type='button' title='Eliminar documento' class='btn btn-success btn-sm ' onclick='limpiafile(\"file8-".$i."\",\"ima8-".$i."\")'><i class='glyphicon glyphicon-trash'></i></button><i id='ima8-".$i."' class='glyphicon glyphicon-ok' style='display:none;'></i>
                </td>
                <td ><label for='file9-".$i."' class='btn btn-info btn-sm'><i class='glyphicon glyphicon-download-alt' title='Subir documento'></i> 
                     </label> <input type='file' id='file9-".$i."' name='file-intr-".$i."' onchange='tickt(\"ima9-".$i."\")' >
                     <button type='button' title='Eliminar documento' class='btn btn-success btn-sm ' onclick='limpiafile(\"file9-".$i."\",\"ima9-".$i."\")'><i class='glyphicon glyphicon-trash'></i></button><i id='ima9-".$i."' class='glyphicon glyphicon-ok' style='display:none;'></i>
                </td>
                

                <td ><label for='file10-".$i."' class='btn btn-info btn-sm'><i class='glyphicon glyphicon-download-alt' title='Subir documento'></i> 
                     </label> <input type='file' id='file10-".$i."' name='file-ape-".$i."' onchange='tickt(\"ima10-".$i."\")'>
                     <button type='button' title='Eliminar documento' class='btn btn-success btn-sm ' onclick='limpiafile(\"file10-".$i."\",\"ima10-".$i."\")'><i class='glyphicon glyphicon-trash'></i></button><i id='ima10-".$i."' class='glyphicon glyphicon-ok' style='display:none; color: red;'></i>
                </td>
            </tr>";            
             }
            }
          ?>
       </tbody>
    </table>
    <div class="col-xs-12">
            <div class="btn-group"> 
              <button type='submit' name='formu' id='sig-btn' class='btn btn-info'>Ingresar</button>
                
            </div>
      </div>
    </form>
</div>
        
    </div>
</div>
</div>


    
    

</body>
<script type="text/javascript">
  
  function checknominas(inputid, newcolor) {
    $("#"+inputid).prev().css("color", "red");
}

</script>
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

    function limpiafile(datos,color){ 
      $("#"+datos).val('');
      $("#"+color).hide();
    }

    function tickt(color){ 
      $("#"+color).show();
    }

    $(document).ready(function() {
        $('#tabla_nominas').DataTable( {
      "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
      if ( aData[1] == "FAILURE" )
      {
        $('td', nRow).css('background-color', '#fff' );
      }
      else if ( aData[1] == "SUCCESS" )
      {
        $('td', nRow).css('background-color', '#fff');
      }
      else if ( aData[1] == "UNSTABLE" )
      {
        $('td', nRow).css('background-color', '#fff');
      }
      else
      {
        $('td', nRow).css('background-color', '#B0E0E6');
      }
    },      
      searching   : true,  
      info        : true,
      processing  : true,
      lengthMenu  : [[9999], ["All"]],
      scrollY     :        "400px",
      scrollCollapse: true,
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
      th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        width: auto; 
    }
    div{
        height: auto;
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