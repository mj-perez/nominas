<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> <script type="text/javascript"> $(window).load( function () { $(".loader").fadeOut("slow"); } ) </script>     
<div class ="loader"></div> -->
      <div class="content-wrapper" >  
        <section class="content-header table_responsive">
        <table>
          <td>
            <h1>Lista de Contratados</h1>
          </td>
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
                    </h3>
                  </td>
              <?php if(isset($cli)){
                  if($cli!=null){  
                    echo "<form action='".site_url()."nominalist/exportarexcel?cliente=".$cli."' method='POST' name='client' id='client'>
                     <td><input type='hidden' name='cliente' id='cliente' value='".$cli."'></td>
                      <td><button type='submit' class='btn btn-block btn-info btn-sm' title='Exportar  nomina'>&nbsp;&nbsp;Descargar&nbsp;&nbsp;</button></td>
                      </form>";
                  }else{ 
                    echo "<td><button type='submit' class='btn btn-block btn-info btn-sm' title='Exportar  nomina' disable readonly>&nbsp;&nbsp;Descargar&nbsp;&nbsp;</button></td>";
                  }
                }else{ 
                  echo "<td><button type='submit' class='btn btn-block btn-info btn-sm' title='Exportar  nomina' disable readonly>&nbsp;&nbsp;Descargar&nbsp;&nbsp;</button></td>";
                } ?>
              </table>
            </div>
            <div class="box-body pad">
              <table>   
                <td width="3%">
                </td> 
                <td width="30%"><h5 class="tituloclientes" align="left"><font color="black">Buscar Clientes</font></h5>
                  <form id="form1" name="form1" method="post" action="<?php echo  site_url();?>/nominalist/ImportaNominas">
                    <select id="cliente" name="cliente" style="width:200px" class="form-control" onchange="document.getElementById('form1').submit();">
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
            <?php 
              if(isset($nombre2)){
            ?>
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
                <th>Usuario</th>
              </tr>  
            </thead>
            <tbody>
       
          <?php 
              echo "<div class='alert alert-info'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='close' <span aria-hidden='true'>&times;</span></button>
                      <strong>".$nombre.": </strong> Usted a agregado ".$contador." registros.
                    </div>";
              echo "<div><input type='hidden' name='txt_contador' id='txt_contador' value='".$contador."'></div>

             ";




            $valor=100/$contador;
            $valor2=0;
             // echo"<br><label>$valor</label>";
             for ($i=0; $i < $contador; $i++) {    
             $valor2=$valor2+$valor;
               echo"<tr>
                <td><input type='text' name='' value='".$numeroNomina[$i]."' readonly disable></td>
                <td><input type='text' name='txt-name-".$i."' value='".$nombre2[$i]."' required readonly disable></td>
                <td><input type='text' name='txt-ap-".$i."' value='".$ApellidoP[$i]."' required readonly disable></td>
                <td><input type='text' name='txt-am-".$i."' value='".$ApellidoM[$i]."' readonly disable></td>
                <td><input type='text' name='txt-rut-".$i."' value='".$rut[$i]."' readonly disable required></td>
                <td><input type='text' name='txt-sp-".$i."' value='".$supervisor[$i]."'  readonly disable></td>

                <td><input type='text' name='txt-cli-".$i."' value='".$cliente[$i]."' readonly disable></td>

                <td><input type='text' name='txt-cad-".$i."' value='".$cadena[$i]."' readonly disable></td>
                <td><input type='text' name='txt-loc-".$i."' value='".$local[$i]."' readonly disable></td>
                <td><input type='text' name='txt-ciu-".$i."' value='".$ciudad[$i]."' readonly disable></td>
                <td><input type='text' name='txt-rg-".$i."' value='".$region[$i]."' readonly disable></td>
                <td><input type='text' name='txt-carg-".$i."' value='".$cargo[$i]."' readonly disable></td>
                <td><input type='text' name='txt-jor-".$i."' value='".$jornada[$i]."' readonly disable></td>
                <td><input type='text' name='txt-fp-".$i."' value='".$fpago[$i]."' readonly disable></td>
                <td><input type='text' name='txt-bnc-".$i."' value='".$banco[$i]."' readonly disable></td>
                <td><input type='text' name='txt-nc-".$i."' value='".$ncuenta[$i]."' readonly disable></td>

                <td><input type='text' name='txt-co-".$i."' value='".$co[$i]."' readonly disable></td>
                <td><input type='text' name='txt-tpc-".$i."' value='".$tipo_contrato[$i]."' readonly disable required></td>
                <td><input type='text' name='txt-fi-".$i."' value='".$inicio[$i]."' readonly disable required></td>
                <td><input type='text' name='txt-ft-".$i."' value='".$termino[$i]."' readonly disable></td>
                <td><input type='text' name='txt-dt-".$i."' value='".$diastrab[$i]."' readonly disable required></td>
                <td><input type='text' name='txt-sb-".$i."' value='$ ".number_format($sueldobase[$i])."' readonly disable required></td>
                <td><input type='text' name='txt-sbp-".$i."' value='$ ".number_format($sueldobaseprop[$i])."' readonly disable required></td>
                <td><input type='text' name='txt-g-".$i."' value='$ ".number_format($gratifica[$i])."' readonly disable required></td>
                <td><input type='text' name='txt-bcl-".$i."' value='$ ".number_format($bonocual[$i])."' readonly disable></td>
                <td><input type='text' name='txt-bct-".$i."' value='$ ".number_format($bonocuan[$i])."' readonly disable></td>
                <td><input type='text' name='txt-cump-".$i."' value='".round($cumplimiento[$i],2)." %' readonly disable></td>
                <td><input type='text' name='txt-bs-".$i."' value='$ ".number_format($bonos[$i])."' readonly disable></td>
                <td><input type='text' name='txt-he-".$i."' value='".number_format($horaextras[$i])."' readonly disable></td>
                <td><input type='text' name='txt-vhe-".$i."' value='$ ".number_format($valorextras[$i])."' readonly disable></td>
                <td><input type='text' name='txt-ag-".$i."' value='$ ".number_format($aguinaldo[$i])."' readonly disable></td>
                <td><input type='text' name='txt-timp-".$i."' value='$ ".number_format($total_impo[$i])."' readonly disable required></td>
                <td><input type='text' name='txt-col-".$i."' value='$ ".number_format($colacion[$i])."' readonly disable></td>
                <td><input type='text' name='txt-m-".$i."' value='$ ".number_format($movi[$i])."' readonly disable></td>
                <td><input type='text' name='txt-mv-".$i."' value='$ ".number_format($movi_adi[$i])."' readonly disable></td>
                <td><input type='text' name='txt-via-".$i."' value='$ ".number_format($viatico[$i])."' readonly disable></td>
                <td><input type='text' name='txt-thb-".$i."' value='$ ".number_format($total_haber[$i])."' readonly disable required></td>
                <td><input type='text' name='txt-dpv-".$i."' value='$ ".number_format($desc_provi[$i])."' readonly disable></td>
                <td><input type='text' name='txt-slq-".$i."' value='$ ".number_format($sueldo_liquido[$i])."' readonly disable></td>
                <td><input type='text' name='txt-sis-".$i."' value='$ ".number_format($sis[$i])."' readonly disable></td>
                <td><input type='text' name='txt-mtl-".$i."' value='$ ".number_format($mutual[$i])."' readonly disable></td>
                <td><input type='text' name='txt-sgc-".$i."' value='$ ".number_format($seg_cesantia[$i])."' readonly disable></td>
                <td><input type='text' name='txt-psv-".$i."' value='$ ".number_format($provi_vacaciones[$i])."' readonly disable></td>
                <td><input type='text' name='txt-psf-".$i."' value='$ ".number_format($provi_finiquito[$i])."' readonly disable></td>
                <td><input type='text' name='txt-baf-".$i."' value='$ ".number_format($banefe[$i])."' readonly disable></td>
                <td><input type='text' name='txt-tlc-".$i."' value='$ ".number_format($total_costo[$i])."' readonly disable required></td>
                <td><input type='text' name='txt-cms-".$i."' value='$ ".number_format($comision[$i])."' readonly disable></td>
                <td><input type='text' name='txt-ctc-".$i."' value='$ ".number_format($costocliente[$i])."' readonly disable required></td>
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
                <td><input type='text' name='txt-usuarioRN-".$i."' value='".$usuario."' readonly disable></td>

            </tr>";     
             }            
          ?>
       </tbody>
    </table>
    <div class="col-xs-12">
            <div class="btn-group"> 
              <button type='submit' name='formu' id='sig-btn' class='btn btn-info btn-lrg ajax' title="Ajax Request">Ingresar</button>
                <button type="button" class="btn btn-default btn-lrg ajax" title="Ajax Request">
            <i class="fa fa-spin fa-refresh"></i>&nbsp; Ingresar
          </button>
            </div>
      </div>
    </form>
    <?php 
        }
    ?>
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

  $(document).ajaxStart(function() { Pace.restart(); });
    $('.ajax').click(function(){
        $.ajax({url: '#', success: function(result){
            $('.ajax-content').html('<hr>Ajax Request Completed !');
        }});
    });



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
     // searching   : true,  
      processing  : true,
        scrollY: 200,
        scroller: {
            loadingIndicator: true
        },
      lengthMenu  : [[600], ["All"]],
      scrollY     :        "400px",
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
.loader { position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; z-index: 9999; background: url(https://k60.kn3.net/taringa/7/2/E/E/6/0/vagonettas/CE2.gif) 50% 50% no-repeat rgb(249,249,249); }

textarea:focus, input:focus{
    outline: none;
}
</style>