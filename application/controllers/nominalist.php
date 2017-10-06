<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class nominalist extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->helper("url","form");	
		$this->load->library('form_validation'); 	
		$this->load->model("nomina");
	    $this->load->model("listar");			
		
	}
	
	 function listNominas(){
	    if(isset($_SESSION["sesion"])){	
			$data["nombre"]=$_SESSION["nombre"];
			$data["usuario"]=$_SESSION["usuario"];
			$this->load->view('contenido');
			$this->load->view('layout/layout_nominas',$data);
			// $this->load->model("mantenedor");
			$data['bono']= $this->nomina->bono();
			$data['contratos']= $this->nomina->contratos();
			$data['clientes'] = $this->listar->clientes();
			$data['usuarios'] = $this->listar->usuarios();
			// $data['listar']= $this->mantenedor->listarBono();
			$this->load->view('layout/aside',$data);
			$this->load->view('nomina/nominaslistado',$data);
		}else{
			redirect(site_url("menu"));
		}
	}
	
	function daNomina(){
	    if(isset($_SESSION["sesion"])){	
			$data["nombre"]=$_SESSION["nombre"];
			$data["usuario"]=$_SESSION["usuario"];
			$this->load->view('contenido');
			$this->load->view('layout/layout_nominas',$data);
			// $this->load->model("mantenedor");
			$data['bono']= $this->nomina->bono();
			$data['contratos']= $this->nomina->contratos();
			$data['clientes'] = $this->listar->clientes();
			$data['usuarios'] = $this->listar->usuarios();
			// $data['listar']= $this->mantenedor->listarBono();
			$this->load->view('layout/aside',$data);
			$this->load->view('nomina/dashNomina',$data);
		}else{
			redirect(site_url("menu"));
		}
		}

	function ImportaNominas(){
	    if(isset($_SESSION["sesion"])){	
			$data["nombre"]=$_SESSION["nombre"];
			$data["usuario"]=$_SESSION["usuario"];
			$this->load->view('contenido');
			$this->load->view('layout/layout_nominas',$data);
			// $this->load->model("mantenedor");
			$data['bono']= $this->nomina->bono();
			$data['contratos']= $this->nomina->contratos();
			$data['clientes'] = $this->listar->clientes();
			$data['usuarios'] = $this->listar->usuarios();
			// $data['listar']= $this->mantenedor->listarBono();
			$this->load->view('layout/aside',$data);
			$this->load->view('nomina/ImportNomina',$data);
		}else{
			redirect(site_url("menu"));
		}
		}


	function buscarCliente(){
      if(isset($_SESSION["sesion"])){
			$id_cliente= $_POST['clientes'];
			if($id_cliente!= null){
				$data["nombre"]=$_SESSION["nombre"];
				$data["usuario"]=$_SESSION["usuario"];
				$this->load->view('contenido');
				$this->load->view('layout/layout_nominas',$data);
				//$data['contratos']= $this->nomina->contratos();
				$data['clientes'] = $this->listar->clientes();
				$data['usuarios'] = $this->listar->usuarios();
				$data['contratos'] = $this->nomina->buscar_contratoscliente($id_cliente);
				$this->load->view('layout/aside',$data);
				$this->load->view('nomina/nominaslistado',$data);
			}else{
				redirect(site_url("nominalist/listNominas"));
			}
		}else{
			redirect(site_url("menu"));
		}
	}

	// 	function buscarUsuario(){		
	// 	if(isset($_SESSION["sesion"])){
	// 		$id_usuario= $_POST['usuarios'];
	// 		if($id_usuario!= null){
	// 			$data["nombre"]=$_SESSION["nombre"];
	// 			$data["usuario"]=$_SESSION["usuario"];
	// 			$this->load->view('contenido');
	// 			$this->load->view('layout/layout_nominas',$data);
	// 			$data['clientes'] = $this->listar->clientes();
	// 			$data['usuarios'] = $this->listar->usuarios();
	// 			$data['contratos'] = $this->nomina->buscar_contratosusuario($id_usuario);
	// 			$this->load->view('layout/aside',$data);
	// 			$this->load->view('nomina/nominaslistado',$data);
	// 		}else{
	// 			redirect(site_url("nominalist/listNominas"));
	// 		}
	// 	}else{
	// 		redirect(site_url("menu"));
	// 	}
	// }


	 public function exportardatos(){
		$this->load->library('phpexcel');
		$this->load->model("nomina");				
	 	$object = new PHPExcel();
	 	$object->setActiveSheetIndex(0);
	 	$datos = $this->nomina->buscarcontratos();
	 	$table_columns = array("Estado Actual","Empresa Grupo","Cliente","Proyecto","Responsable Comercial","Rut","Nombres","Apellido Paterno","Apellido Materno","Fecha de Nacimiento","Sexo","Nacionalidad","Estado Civil"
	 	,"Direccion","Comuna","Region","Telefono Fijo","Celular","E-mail","Talla Pantalon","Talla Polera","Talla Calzado","Cargo","Cadena","Local/Ruta","Tipo de Contrato","Fecha de Termino","Antiguedad","Antiguedad Lineal"
		,"Vacaciones","Afp","Isapre","Forma de Pago","Banco","Nº de Cuenta","Entrega Celular","Entrega Tablet","Entrega Notebook","Entrega Credencial","Entrega Uniforme","Entrega EPP","Entrega Acceso club 360","Entrega Cloud"
		,"Acceso Intranet","Acceso Apenet","Cargas Legales","Aplica fuero","Aplica Sala Cuna","Prestamos Caja","Observaciones Generales");
		$excel_row = 0;
	 	foreach($table_columns as $field)
	 	{	 
	 	   $object->getActiveSheet()->setCellValueByColumnAndRow($excel_row, 1, $field);
	 	   $excel_row++;	 	  
	 	}
	 	$column_row=3;
	 	foreach($datos as $row)
	 	{	 
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(0 , $column_row, $row['Estado_Actual']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(1 , $column_row, $row['egrupo']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(2 , $column_row, $row['cliente']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(3 , $column_row, $row['nombre_proyecto']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(4 , $column_row, $row['responsable']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(5 , $column_row, $row['rut']);
			$object->getActiveSheet()->setCellValueByColumnAndRow(6 , $column_row, $row['nombres']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(7 , $column_row, $row['ap_paterno']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(8 , $column_row, $row['ap_materno']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(9 , $column_row, $row['Fecha_Nacimiento']);
			$object->getActiveSheet()->setCellValueByColumnAndRow(10 , $column_row, $row['sexo']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(11 , $column_row, $row['Nacionalidad']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(12 , $column_row, $row['Estado_Civil']);
			$object->getActiveSheet()->setCellValueByColumnAndRow(13 , $column_row, $row['Direccion']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(14 , $column_row, $row['comuna']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(15 , $column_row, $row['region']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(16 , $column_row, $row['fijo']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(17 , $column_row, $row['celular']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(18 , $column_row, $row['email']);
			$object->getActiveSheet()->setCellValueByColumnAndRow(19 , $column_row, $row['talla_pantalon']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(20 , $column_row, $row['talla_polera']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(21 , $column_row, $row['talla_calzado']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(22 , $column_row, $row['cargo']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(23 , $column_row, $row['cadena']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(24 , $column_row, $row['local']);
			$object->getActiveSheet()->setCellValueByColumnAndRow(25 , $column_row, $row['tipo_contrato']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(26 , $column_row, $row['Fecha_Termino']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(27 , $column_row, $row['Antiguedad']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(28 , $column_row, $row['Antiguedad_lineal']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(29 , $column_row, $row['vacaciones']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(30 , $column_row, $row['afp']);
		    $object->getActiveSheet()->setCellValueByColumnAndRow(31 , $column_row, $row['Prevision_Salud']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(32 , $column_row, $row['fpago']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(33 , $column_row, $row['banco']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(34 , $column_row, $row['ncuenta']);
	 		/*$object->getActiveSheet()->setCellValueByColumnAndRow(35 , $column_row, $row['Celular']);
		    $object->getActiveSheet()->setCellValueByColumnAndRow(36 , $column_row, $row['Tablet']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(37 , $column_row, $row['Notebook']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(38 , $column_row, $row['Credencial']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(39 , $column_row, $row['Uniforme']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(40 , $column_row, $row['EPP']);
			$object->getActiveSheet()->setCellValueByColumnAndRow(41 , $column_row, $row['Acceso_Club_360']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(42 , $column_row, $row['Acceso_Cloud']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(43 , $column_row, $row['Acceso_Intranet']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(44 , $column_row, $row['Acceso_Apenet']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(45 , $column_row, $row['Cant_CargasFamiliares']);
			$object->getActiveSheet()->setCellValueByColumnAndRow(46 , $column_row, $row['Fuero']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(47 , $column_row, $row['Sala_Cuna']);
			$object->getActiveSheet()->setCellValueByColumnAndRow(48 , $column_row, $row['Prestamo_Caja']);
			$object->getActiveSheet()->setCellValueByColumnAndRow(49 , $column_row, $row['Obs_Generales']);*/
	 	    $column_row++;	 	  
	 	}
	 	$object->getActiveSheet()->getStyle('A1:Z2000')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
	 	$object->getActiveSheet()->getStyle('A1:Z2000')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
	 	foreach(range('A','Q') as $columnID) {
	 		$object->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);

		}
	 	$object->getActiveSheet()->getStyle('A1:BF1')->applyFromArray(array('font' => array(
            'bold'=> true,
            'size'  => 13,
        )));
        $object->getActiveSheet()->getStyle('A3:Z2000')->applyFromArray(array('font' => array(
            'size'  => 12
        )));        
	 	$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
	 	header('Content-Type: application/vnd.ms-excel');
	 	header('Content-Disposition: attachment;filename="Lista de Contratos.xls"');
	 	$object_writer->save('php://output');
	}
	function listNominasBonos(){
	    if(isset($_SESSION["sesion"])){	
			$data["nombre"]=$_SESSION["nombre"];
			$data["usuario"]=$_SESSION["usuario"];
			$this->load->view('contenido');
			$this->load->view('layout/layout_nominas',$data);
			$data['bono']= $this->nomina->bono();
			$data['contratos']= $this->nomina->contratos();
			$data['clientes'] = $this->listar->clientes();
			$data['usuarios'] = $this->listar->usuarios();
			$this->load->view('layout/aside',$data);
			$this->load->view('nomina/nominaslistadobonos',$data);

		}else{
			redirect(site_url("menu"));
		}
	}

	function reportes(){
	    if(isset($_SESSION["sesion"])){	
			$data["nombre"]=$_SESSION["nombre"];
			$data["usuario"]=$_SESSION["usuario"];
			$this->load->view('contenido');
			$data['contratos']= $this->nomina->contratos();
			$data['clientes'] = $this->listar->clientes();
			$data['usuarios'] = $this->listar->usuarios();
			$this->load->view('layout/layout_nominas',$data);
			$this->load->view('layout/aside',$data);
			$this->load->view('nomina/reportes',$data);

		}else{
			redirect(site_url("menu"));
		}
	}

	function chequeonimonas(){
	    if(isset($_SESSION["sesion"])){	
			$data["nombre"]=$_SESSION["nombre"];
			$data["usuario"]=$_SESSION["usuario"];
			$this->load->view('contenido');
			$data['rutas']= $this->nomina->rutas();
			$data['clientes'] = $this->listar->clientes();
			$data['usuarios'] = $this->listar->usuarios();
			$this->load->view('layout/layout_nominas',$data);
			$this->load->view('layout/aside',$data);
			$this->load->view('nomina/chequeonimonas',$data);

		}else{
			redirect(site_url("menu"));
		}
	}

	public function cheklinea(){
		$this->load->model("nomina");
		$se=$this->nomina->contratos();
		$var = '';
		foreach ($se as $s) {
			$var .=$s['ID_Contrato']."/";
		} echo $var;
	}

function listarbonos(){
        $id_bono=$_POST['id'];
        $this->load->model("mantenedor");
        $data = $this->mantenedor->listarBono($id_bono);
        echo "
        <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span></button>
                <h4 class='modal-title'>Asignar Bonos</h4>
            </div>
        	<div class='modal-body'>
                <p>Selecione los bonos correspondiente a la persona</p>
            <div class='box'>
            	<div class='box-body'>
            	         <table class='table table-bordered table-striped' id='example1'>
                	    	<thead>
                    	    	<tr>
		                            <th>ID Bono</th>
		                            <th>Nombre Bono</th>
		                            <th></th>
		                            <th>Monto</th>                      
                        		</tr>
                    		</thead>";
    foreach($data as $m){
        if($m['vigencia']==1){$vigencia='Vigente';}else{$vigencia='No Vigente';}
        	echo"<tr>
                    <td>".$m['Bono']."</td>
                    <td>".$m['Cliente']."</td>
                    <td ><input id='chk-bono-".$m['ID_BonoCliente']."' type='checkbox' value=''></td>
                    <td ><input type='number' id='txt-mt-".$m['ID_BonoCliente']."' name='row-1-age' placeholder='Monto'></td>
                </tr>";
        }
 			echo"
 							</table>
 </div>
                 </div>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-default pull-left' data-dismiss='modal'>Close</button>
                <button type='button' class='btn btn-primary'>Ingresar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>";
          
}
	function agregarnominamasiva(){
		if(isset($_FILES['excel'])){
			//Creacion de variables
		 	$excel = $_FILES['excel']['name'];
		 	//Guarda Excel
		 	$destino = $this->subirReferidos($excel);
		 	$final = "img/excel_nominas/".$destino;
		 	//llama librerias	 
		 	$this->load->library('phpexcel');
		 	//Lectura de excel
		 	$objReader = new PHPExcel_Reader_Excel2007();
		 	$object = $objReader->load("img/excel_nominas/".$excel);
		 	$object->setActiveSheetIndex(0);	
		 	$columna =10; 	
		 	$c=0;
		 	$parametro=0;
		 	while($parametro==0){	
		 		//valida que existan datos en columna nombre, si no existe, cierra el insertado del excel
		 		if($object->getActiveSheet()->getCell('B'.$columna)->getCalculatedValue()==NULL)
		 		{
		 			$parametro=1;
		 		}else{
		 			//guarda datos de la fila del excel en una variable
		 			$data['numeroNomina'][$c]=$object->getActiveSheet()->getCell('A'.$columna)->getCalculatedValue();
		 			$data['nombre2'][$c]=$object->getActiveSheet()->getCell('B'.$columna)->getCalculatedValue();
		 			$data['ApellidoP'][$c]=$object->getActiveSheet()->getCell('C'.$columna)->getCalculatedValue();
		 			$data['ApellidoM'][$c]=$object->getActiveSheet()->getCell('D'.$columna)->getCalculatedValue(); 	
		 			$data['rut'][$c]=$object->getActiveSheet()->getCell('E'.$columna)->getCalculatedValue(); 	
		 			$data['supervisor'][$c]=$object->getActiveSheet()->getCell('F'.$columna)->getCalculatedValue(); 	
		 			$data['cadena'][$c]=$object->getActiveSheet()->getCell('G'.$columna)->getCalculatedValue(); 	
		 			$data['local'][$c]=$object->getActiveSheet()->getCell('H'.$columna)->getCalculatedValue(); 	
		 			$data['ciudad'][$c]=$object->getActiveSheet()->getCell('I'.$columna)->getCalculatedValue(); 	
		 			$data['cargo'][$c]=$object->getActiveSheet()->getCell('J'.$columna)->getCalculatedValue(); 	
		 			$data['co'][$c]=$object->getActiveSheet()->getCell('K'.$columna)->getCalculatedValue();
		 			$data['tipo_contrato'][$c]=$object->getActiveSheet()->getCell('L'.$columna)->getCalculatedValue();
		 			$excelDate=$object->getActiveSheet()->getCell('M'.$columna)->getCalculatedValue();   
		 			$data['inicio'][$c] = \PHPExcel_Style_NumberFormat::toFormattedString($excelDate, 'DD/MM/YYYY'); 
		 			$excelDate2=$object->getActiveSheet()->getCell('N'.$columna)->getCalculatedValue();		 
		 			if($excelDate2=='' || strtoupper($excelDate2)=='INDEFINIDO'){	
		 				$data['termino'][$c]='';		
					}else{
						$data['termino'][$c]=\PHPExcel_Style_NumberFormat::toFormattedString($excelDate2, 'DD/MM/YYYY');
					}
		 			$data['diastrab'][$c]=$object->getActiveSheet()->getCell('O'.$columna)->getCalculatedValue(); 	
		 			$data['sueldobase'][$c]=$object->getActiveSheet()->getCell('P'.$columna)->getCalculatedValue(); 	
		 			$data['sueldobaseprop'][$c]=$object->getActiveSheet()->getCell('Q'.$columna)->getCalculatedValue(); 	
		 			$data['gratifica'][$c]=$object->getActiveSheet()->getCell('R'.$columna)->getCalculatedValue(); 	
		 			$data['bonocual'][$c]=$object->getActiveSheet()->getCell('S'.$columna)->getCalculatedValue(); 	
		 			$data['bonocuan'][$c]=$object->getActiveSheet()->getCell('T'.$columna)->getCalculatedValue(); 	
		 			$data['cumplimiento'][$c]=$object->getActiveSheet()->getCell('U'.$columna)->getCalculatedValue(); 	
		 			$data['bonos'][$c]=$object->getActiveSheet()->getCell('V'.$columna)->getCalculatedValue(); 	
		 			$data['horaextras'][$c]=$object->getActiveSheet()->getCell('W'.$columna)->getCalculatedValue(); 	
		 			$data['valorextras'][$c]=$object->getActiveSheet()->getCell('X'.$columna)->getCalculatedValue(); 	
		 			$data['aguinaldo'][$c]=$object->getActiveSheet()->getCell('Y'.$columna)->getCalculatedValue(); 	
		 			$data['total_impo'][$c]=$object->getActiveSheet()->getCell('Z'.$columna)->getCalculatedValue(); 	
		 			$data['colacion'][$c]=$object->getActiveSheet()->getCell('AA'.$columna)->getCalculatedValue(); 	
		 			$data['movi'][$c]=$object->getActiveSheet()->getCell('AB'.$columna)->getCalculatedValue(); 	
		 			$data['movi_adi'][$c]=$object->getActiveSheet()->getCell('AC'.$columna)->getCalculatedValue(); 	
		 			$data['viatico'][$c]=$object->getActiveSheet()->getCell('AD'.$columna)->getCalculatedValue(); 	
		 			$data['total_haber'][$c]=$object->getActiveSheet()->getCell('AE'.$columna)->getCalculatedValue(); 	
		 			$data['desc_provi'][$c]=$object->getActiveSheet()->getCell('AF'.$columna)->getCalculatedValue(); 	
		 			$data['sueldo_liquido'][$c]=$object->getActiveSheet()->getCell('AG'.$columna)->getCalculatedValue(); 	
		 			$data['sis'][$c]=$object->getActiveSheet()->getCell('AH'.$columna)->getCalculatedValue(); 	
		 			$data['mutual'][$c]=$object->getActiveSheet()->getCell('AI'.$columna)->getCalculatedValue(); 	
		 			$data['seg_cesantia'][$c]=$object->getActiveSheet()->getCell('AJ'.$columna)->getCalculatedValue(); 	
		 			$data['provi_vacaciones'][$c]=$object->getActiveSheet()->getCell('AK'.$columna)->getCalculatedValue(); 	
		 			$data['provi_finiquito'][$c]=$object->getActiveSheet()->getCell('AL'.$columna)->getCalculatedValue(); 	
		 			$data['banefe'][$c]=$object->getActiveSheet()->getCell('AM'.$columna)->getCalculatedValue(); 	
		 			$data['total_costo'][$c]=$object->getActiveSheet()->getCell('AN'.$columna)->getCalculatedValue(); 	
		 			$data['comision'][$c]=$object->getActiveSheet()->getCell('AO'.$columna)->getCalculatedValue(); 	
		 			$data['costocliente'][$c]=$object->getActiveSheet()->getCell('AP'.$columna)->getCalculatedValue(); 	
		 			$c++; 		
		 			$columna++;	
		 		}	 		
		 	}
		 	//elimina el archivo excel
		 	unlink("img/excel_nominas/".$excel);

		 	$data["nombre"]=$_SESSION["nombre"];
			$data["usuario"]=$_SESSION["usuario"];
			$data['contador']= count($data['nombre2']);
			$this->load->view('contenido');
			$this->load->view('layout/layout_nominas',$data);
			$data['bono']= $this->nomina->bono();
			$data['contratos']= $this->nomina->contratos();
			$data['clientes'] = $this->listar->clientes();
			$data['usuarios'] = $this->listar->usuarios();
			$this->load->view('layout/aside',$data);
			$this->load->view('nomina/ImportNomina',$data);
		}else{
			$data["nombre"]=$_SESSION["nombre"];
			$data["usuario"]=$_SESSION["usuario"];
			$this->load->view('contenido');
			$this->load->view('layout/layout_nominas',$data);
			$data['bono']= $this->nomina->bono();
			$data['contratos']= $this->nomina->contratos();
			$data['clientes'] = $this->listar->clientes();
			$data['usuarios'] = $this->listar->usuarios();
			$this->load->view('layout/aside',$data);
			$this->load->view('nomina/ImportNomina',$data);
		}
	}

	function subirReferidos($nombre){
		$ruta="excel";
		$config['upload_path'] = "img/excel_nominas/";
		$config['file_name'] = $nombre;
		$config['allowed_types'] = "*";
		$config['overwrite'] = TRUE;
		//echo $ruta; echo "<br>"; echo $config['file_name'];exit;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload($ruta)) {
					//*** ocurrio un error
			$dat['uploadError'] = $this->upload->display_errors();
			echo $this->upload->display_errors();
			return;
		}
		$data = $this->upload->data();
		//var_dump($data);exit;
		$nom=$data['file_name'];
		//echo $nom;exit;
		return $nom;
	}

	function insertarnominamasiva(){
		if(isset($_SESSION["sesion"])){	
			for ($i=0; $i < $contador; $i++) { 
				$nombre=$_POST['txt-name-'.$i];
				$app=$_POST['txt-ap-'.$i];
				$apm=$_POST['txt-am-'.$i];
				$rut=$_POST['txt-rut-'.$i];
				$supervisor=$_POST['txt-sp-'.$i];
				$cadena=$_POST['txt-cad-'.$i];
				$local=$_POST['txt-loc-'.$i];
				$ciudad=$_POST['txt-ciu-'.$i];
				$cargo=$_POST['txt-carg-'.$i];
				$co=$_POST['txt-co-'.$i];
				$contrato=$_POST['txt-tpc-'.$i];
				$inicio=$_POST['txt-fi-'.$i];
				$termino=$_POST['txt-ft-'.$i];
				$dias=$_POST['txt-dt-'.$i];
				$sueldobase=$this->limpiadatos($_POST['txt-sb-'.$i]);
				$sueldobaseprop=$this->limpiadatos($_POST['txt-sbp-'.$i]);
				$grati=$this->limpiadatos($_POST['txt-g-'.$i]);
				$bocuali=$this->limpiadatos($_POST['txt-bcl-'.$i]);
				$bocuan=$this->limpiadatos($_POST['txt-bct-'.$i]);
				$cumpli=$this->limpiadatos($_POST['txt-cump-'.$i]);
				$bonos=$this->limpiadatos($_POST['txt-bs-'.$i]);
				$horasextras=$_POST['txt-he-'.$i];
				$valorhoras=$_POST['txt-vhe-'.$i];
				$aguinaldo=$_POST['txt-ag-'.$i];
				$imponible=$_POST['txt-timp-'.$i];
				$colacion=$_POST['txt-col-'.$i];
				$movi=$_POST['txt-m-'.$i];
				$movivari=$_POST['txt-mv-'.$i];
				$viatico=$_POST['txt-via-'.$i];
				$haberes=$_POST['txt-thb-'.$i];
				$descuento=$_POST['txt-spv-'.$i];
				$liquido=$_POST['txt-slq-'.$i];
				$sis=$_POST['txt-sis-'.$i];
				$mutual=$_POST['txt-mtl-'.$i];
				$seguro=$_POST['txt-sgc-'.$i];				
				$vacaciones=$_POST['txt-psv-'.$i];
				$finiquito=$_POST['txt-psf-'.$i];
				$banefe=$_POST['txt-baf-'.$i];
				$costopersonal=$_POST['txt-tlc-'.$i];
				$agencia=$_POST['txt-cms-'.$i];
				$costofinal=$_POST['txt-ctc-'.$i];
				$obser=$_POST['txt-Obs-'.$i];
				$fulltime=$_POST['txt-llgf-'.$i];
				$parttime=$_POST['txt-llgp-'.$i];
				$llegsuper=$_POST['txt-llgs-'.$i];
				$checelu=$_POST['chk-cel-'.$i];
				$doccelu=$_POST['file-cel-'.$i];
				$chetab=$_POST['chk-tabl-'.$i];
				$doctab=$_POST['file-tabl-'.$i];
				$chenot=$_POST['chk-not-'.$i];
				$docnot=$_POST['file-not-'.$i];
				$checre=$_POST['chk-cred-'.$i];
				$doccre=$_POST['file-cred-'.$i];
				$cheuni=$_POST['chk-unif-'.$i];
				$docuni=$_POST['file-unif-'.$i];
				$cheepp=$_POST['chk-epp-'.$i];
				$docepp=$_POST['file-epp-'.$i];
				$che360=$_POST['chk-c360'.$i];				
				$doc360=$_POST['file-c360-'.$i];
				$checlo=$_POST['chk-clou-'.$i];
				$docclo=$_POST['file-clou-'.$i];
				$cheint=$_POST['chk-intr-'.$i];
				$docint=$_POST['file-intr-'.$i];
				$cheape=$_POST['chk-ape-'.$i];
				$docape=$_POST['file-ape-'.$i];	
				$this->load->model("nomina");
				$mensaje=$this->nomina->insertarmasivo($nombre,$app,$apm,$rut,$supervisor,$cadena,$local,$ciudad,$cargo,$co,$contrato,$inicio,$termino,$dias,$sueldobase,$sueldobaseprop,$grati,$bocuali,$bocuan,$cumpli,$bonos,$horasextras,$valorhoras,$aguinaldo,$imponible,$colacion,$movi,$movivari,$viatico,$haberes,$descuento,$liquido,$sis,$mutual,$seguro,$vacaciones,$finiquito,$banefe,$costopersonal,$agencia,$costofinal,$obser,$fulltime,$parttime,$llegsuper,$checelu,$doccelu,$chetab,$doctab,$chenot,$docnot,$checre,$doccre,$cheuni,$docuni,$cheepp,$docepp,$che360,$doc360,$checlo,$docclo,$cheint,$docint,$cheape,$docape);
				var_dump($mensaje);exit;
				redirect(site_url(""))


			}
		}else{
			redirect(site_url("nominalist/agregarnominamasiva"));
		}
	}

	function limpiadatos($var){
		$patron = "/[.$,' ]/i";    
		$cadena_nueva = preg_replace($patron, "", $var);
		return $cadena_nueva;
	}
}
