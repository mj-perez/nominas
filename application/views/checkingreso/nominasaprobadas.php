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
              <h1 class="title">Chequeo de nominas Ingresadas </h1>
              <!-- <div class="box-tools pull-right">
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
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
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
                                <th>N° Contratos</th>
                                <th>Total Costo Cliente</th>
                              </tr>
                      </thead>
                      <tbody>
                        <?php 
                        foreach($mnominasaprobadas as $c) {
echo "     
            <tr>  
              <td>".$c['Usuario']."</td>
              <td>".$c['nombrecliente']."</td> 
              <td>".$c['EstadoNomina']."</td>
              <td>".$c['FechaRegistro']."</td>
              <td>".$c['ncontratos']."</td>
              <td>".$c['TotalCostoFinalCliente']."</td>
              <td>
                <div class='form-group'>
                <label>
                  <input type='radio' name='r1' class='minimal' >
                  
                <small>Aprobado</small>
                 </label>
              </div>
              <!-- checkbox -->
              <div class='form-group'>
                 <label>
                  <input type='radio' name='r1' class='minimal-red'>
              <small>Reprobado</small>
                </label>
              </div>  


              </td>
            </tr>";
        } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.chart-responsive -->
                </div>