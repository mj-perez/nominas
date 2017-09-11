<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class nomina extends CI_Controller {
	

	public function exportar(){
		$this->load->library('phpexcel');
		$this->load->model('nominas');
		$datos=$this->nominas->contratos();
		$ex = new PHPExcel();
	 	$ex->setActiveSheetIndex(0);
	 	$tb=array("ESTADO ACTUAL","EMPRESA GRUPO","CLIENTE","PROYECTO","RESPONSABLE COMERCIAL","RUT","APELLIDO PATERNO","APELLIDO MATERNO","NOMBRES","NOMBRE CONCATENAR","FECHA NACIMIENTO","SEXO","NACIONALIDAD","ESTADO CIVIL","DIRECCION","COMUNA","REGIÓN","TELEFONO FIJO","CELULAR","EMAIL","T-PANTALON","T-POLERA","N° ZAPATO","CARGO","CADENA","LOCAL/RUTA","TIPO CONTRATO","FECHA INICIO","FECHA TERMINO","ANTIGÜEDAD","ANTIGÜEDAD LINEAL","VACACIONES PROPORCIONALES","AFP","ISAPRE","FORMA DE PAGO","BANCO","N° CUENTA","ENTREGA CELULAR","ENTREGA TABLET","ENTREGA NOTEBOOK","ENTREGA CREDENCIAL","ENTREGA UNIFORME","ENTREGA EPP","ENTREGA/ACCESO CLUB 360","ENTREGA/ACCESO CLOUD","ENTREGA/ACCESO INTRANET","ENTREGA/ ACCESO APENET","CARGAS FAMILIARES","APLICA FUERO","APLICA SALA CUNA","PRESTAMOS CAJA","OBSERVACIONES GENERALES");
	 	$excel_row=0;
	 	foreach ($tb as $field) {
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow($excel_row,1,$field);
	 		$excel_row++;
	 	}
	 	$column_row=2;
	 	$fila_row=0;
	 	foreach ($datos as $row) {
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(0,$column_row,$row['Estado_Actual']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(1,$column_row,$row['egrupo']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(2,$column_row,$row['cliente']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(3,$column_row,$row['nombre_proyecto']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(4,$column_row,$row['responsable']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(5,$column_row,$row['rut']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(6,$column_row,$row['ap_paterno']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(7,$column_row,$row['ap_materno']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(8,$column_row,$row['Nombre_Concatenar']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(9,$column_row,$row['Fecha_Nacimiento']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(10,$column_row,$row['sexo']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(11,$column_row,$row['Nacionalidad']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(12,$column_row,$row['Estado_Civil']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(13,$column_row,$row['Direccion']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(14,$column_row,$row['comuna']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(15,$column_row,$row['region']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(16,$column_row,$row['fijo']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(17,$column_row,$row['celular']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(18,$column_row,$row['email']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(19,$column_row,$row['talla_pantalon']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(20,$column_row,$row['talla_polera']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(21,$column_row,$row['talla_calzado']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(22,$column_row,$row['cargo']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(23,$column_row,$row['cadena']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(24,$column_row,$row['local']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(25,$column_row,$row['tipo_contrato']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(26,$column_row,$row['Fecha_Inicio']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(27,$column_row,$row['Fecha_Termino']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(28,$column_row,$row['Antiguedad']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(29,$column_row,$row['Antiguedad_lineal']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(30,$column_row,$row['vacaciones']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(31,$column_row,$row['afp']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(32,$column_row,$row['Prevision_Salud']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(33,$column_row,$row['fpago']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(34,$column_row,$row['banco']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(35,$column_row,$row['ncuenta']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(36,$column_row,$row['Celular']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(37,$column_row,$row['Tablet']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(38,$column_row,$row['Notebook']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(39,$column_row,$row['Credencial']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(40,$column_row,$row['Uniforme']);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(41,$column_row,$row["EPP"]);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(42,$column_row,$row["Acceso_club_360"]);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(43,$column_row,$row["Acceso_cloud"]);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(44,$column_row,$row["Acceso_Intranet"]);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(45,$column_row,$row["Acceso_Apenet"]);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(46,$column_row,$row["Cargas_Familiares"]);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(47,$column_row,$row["fuero"]);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(48,$column_row,$row["sala_cuna"]);
	 		$ex->getActiveSheet()->setCellValueByColumnAndRow(49,$column_row,$row["obs_generales"]);
	 		$column_row++;
	 	}
	 	$ex->getActiveSheet()->getStyle("A1:BF2000")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	 	$ex->getActiveSheet()->getStyle("A1:BF2000")->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	 	foreach (range('B','BF') as $columnID) {
	 		$ex->getActiveSheet()->getColumnDimension($column_ID)->setAutoSize(true);
	 	}
	 	$ex->getActiveSheet()->getStyle('A1:BF1')->applyFromArray(array('font'=>array('bold'=>true,'size'=>10)));
	 	$object_writer = PHPExcel_IOFactory::createWriter($ex, 'Excel5');
	 	header('Content-Type: application/vnd.ms-excel');
	 	header('Content-Disposition: attachment;filename="Nomina.xls"');
	 	$object_writer->save('php://output');

	}
}

?>