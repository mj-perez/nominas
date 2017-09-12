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
			$data['contratos']= $this->nomina->contratos();
			$data['clientes'] = $this->listar->clientes();
			$data['usuarios'] = $this->listar->usuarios();
			$this->load->view('nomina/nominaslistado',$data);
		}else{
			redirect(site_url("menu"));
		}
		}
		
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
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(35 , $column_row, $row['Celular']);
		    $object->getActiveSheet()->setCellValueByColumnAndRow(36 , $column_row, $row['Tablet']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(37 , $column_row, $row['Notebook']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(38 , $column_row, $row['Credencial']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(39 , $column_row, $row['Uniforme']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(40 , $column_row, $row['EPP']);
			$object->getActiveSheet()->setCellValueByColumnAndRow(41 , $column_row, $row['Acceso_Club_360']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(42 , $column_row, $row['Acceso_Cloud']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(43 , $column_row, $row['Acceso_Intranet']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(44 , $column_row, $row['Acceso_Apenet']);
	 		/*$object->getActiveSheet()->setCellValueByColumnAndRow(45 , $column_row, $row['Cant_CargasFamiliares']);
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
	 	
}