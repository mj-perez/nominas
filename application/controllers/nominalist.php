<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class nominalist extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->helper("url","form");	
		$this->load->library('form_validation'); 	
		$this->load->model("nomina");
	    $this->load->model("listar");
		$this->load->library('upload');			
		
	}
	
	 function listNominas(){
	    if(isset($_SESSION["sesion"])){	
			$data["nombre"]=$_SESSION["nombre"];
			$data["usuario"]=$_SESSION["usuario"];
			$user=$_SESSION["usuario"];
			$this->load->view('contenido');
			$this->load->view('layout/layout_nominas',$data);
			$data['clientes'] = $this->listar->clientes($user);
			$data['usuarios'] = $this->listar->usuarios();
			$this->load->view('layout/aside',$data);
			$this->load->view('nomina/nominaslistado',$data);
		}else{
			redirect(site_url("menu"));
		}
	}
	
	

	function ImportaNominas(){
	    if(isset($_SESSION["sesion"])){	
			$data["nombre"]=$_SESSION["nombre"];
			$data["usuario"]=$_SESSION["usuario"];
			if(isset($_POST["cliente"])){
				$_SESSION["cli"]=$_POST["cliente"];
				$data['cli']=$_SESSION["cli"];
			}
			$user=$_SESSION["usuario"];
			$this->load->view('contenido');
			$this->load->view('layout/layout_nominas',$data);
			$data['clientes'] = $this->listar->clientes($user);
			$data['usuarios'] = $this->listar->usuarios();
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
				$user=$_SESSION["usuario"];
				$this->load->view('contenido');
				$this->load->view('layout/layout_nominas',$data);
				$user=$_SESSION["usuario"];
				$data['clientes'] = $this->listar->clientes($user);
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

	function seleccionarCliente(){
      if(isset($_SESSION["sesion"])){
			$id_cliente= $_POST['clientes'];
			if($id_cliente!= null){
				$data["nombre"]=$_SESSION["nombre"];
				$data["usuario"]=$_SESSION["usuario"];
				$this->load->view('contenido');
				$this->load->view('layout/layout_nominas',$data);
				$data['contratos']= $this->nomina->contratos();
				$data['clientes'] = $this->listar->clientes($user);
				$data['usuarios'] = $this->listar->usuarios();
				$data['contratos'] = $this->nomina->buscar_contratoscliente($id_cliente);
				$this->load->view('layout/aside',$data);
				$this->load->view('nomina/ImportNomina',$data);
			}else{
				redirect(site_url("nominalist/ImportaNominas"));
			}
		}else{
			redirect(site_url("menu"));
		}
	}


	 public function exportarexcel(){
		$this->load->library('phpexcel');
		$this->load->model("nomina");	
		if(isset($_POST['cliente'])|| $_POST['cliente']!=null){
			$_SESSION['client']=null;
			$_SESSION['client']=$_POST['cliente'];
			$cli=$_SESSION['client'];
		}else{
			$_SESSION['client']=$_POST['cliente'];
			$cli=$_SESSION['client'];
		}
	 	$this->load->library('phpexcel');
		//Lectura de excel
		$objReader =  PHPExcel_IOFactory::createReader('Excel2007');		
		$object = $objReader->load("doc/plantilla/PlantillaNomina.xlsx");
		$object->setActiveSheetIndex(0);	
	 	$datos = $this->nomina->buscar_contratoscliente($cli);
	 	$column_row=9;
	 	$i=1;
	 	foreach($datos as $row)
	 	{	 
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(0 , $column_row, $i);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(1 , $column_row, $row['Nombres']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(2 , $column_row, $row['Ap_Paterno']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(3 , $column_row, $row['Ap_Materno']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(4 , $column_row, $row['Rut']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(6 , $column_row, $row['Cliente']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(7 , $column_row, $row['cadena']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(8 , $column_row, $row['local']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(9 , $column_row, $row['Comuna']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(10 , $column_row, $row['Region']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(11 , $column_row, $row['Cargo']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(13 , $column_row, $row['FPago']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(14 , $column_row, $row['Banco']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(15 , $column_row, $row['NCuenta']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(17 , $column_row, $row['Tipo_Contrato']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(18 , $column_row, $row['Fecha_Inicio']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(19 , $column_row, $row['Fecha_Termino']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(21 , $column_row, $row['Sueldo_Base']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(23 , $column_row, $row['Bono_Cualitativo']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(24 , $column_row, $row['Bono_Cuantitativo']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(31 , $column_row, $row['Colacion']);
	 		$object->getActiveSheet()->setCellValueByColumnAndRow(32 , $column_row, $row['Movilizacion']);
	 		$i++;
	 		$column_row++;
	 	}
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="nominas.xls"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		ob_end_clean();
		$objWriter->save('php://output');
	}
	
	function chequeonimonas(){
	    if(isset($_SESSION["sesion"])){	
			$data["nombre"]=$_SESSION["nombre"];
			$data["usuario"]=$_SESSION["usuario"];
			$this->load->view('contenido');
			$data['nominasingresadas']= $this->nomina->nominaingresada();
			$data['usuarios'] = $this->listar->usuarios();
			$this->load->view('layout/layout_nominas',$data);
			$this->load->view('layout/aside',$data);
			$this->load->view('nomina/chequeonimonas',$data);

		}else{
			redirect(site_url("menu"));
		}
	}


	function agregarnominamasiva(){
		if(isset($_FILES['excel'])){
			//Creacion de variables
		 	$excel = $_FILES['excel']['name'];
		 	//Guarda Excel
		 	$destino = $this->subirArchivo($excel,0,0);
		 	$final = "img/excel_nominas/".$destino;
		 	//llama librerias	 
		 	$this->load->library('phpexcel');
		 	//Lectura de excel
		 	$tipo = PHPExcel_IOFactory::identify("img/excel_nominas/".$excel);
		 	$objReader = PHPExcel_IOFactory::createReader($tipo);
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
		 			$data['cliente'][$c]=$object->getActiveSheet()->getCell('G'.$columna)->getCalculatedValue(); 	
		 			$data['cadena'][$c]=$object->getActiveSheet()->getCell('H'.$columna)->getCalculatedValue(); 	
		 			$data['local'][$c]=$object->getActiveSheet()->getCell('I'.$columna)->getCalculatedValue(); 	
		 			$data['ciudad'][$c]=$object->getActiveSheet()->getCell('J'.$columna)->getCalculatedValue();
		 			$data['region'][$c]=$object->getActiveSheet()->getCell('K'.$columna)->getCalculatedValue(); 	
		 			$data['cargo'][$c]=$object->getActiveSheet()->getCell('L'.$columna)->getCalculatedValue();
		 			$data['jornada'][$c]=$object->getActiveSheet()->getCell('M'.$columna)->getCalculatedValue();
		 			$data['fpago'][$c]=$object->getActiveSheet()->getCell('N'.$columna)->getCalculatedValue();
		 			$data['banco'][$c]=$object->getActiveSheet()->getCell('O'.$columna)->getCalculatedValue();
		 			$data['ncuenta'][$c]=$object->getActiveSheet()->getCell('P'.$columna)->getCalculatedValue();
		 			$data['co'][$c]=$object->getActiveSheet()->getCell('Q'.$columna)->getCalculatedValue();
		 			$data['tipo_contrato'][$c]=$object->getActiveSheet()->getCell('R'.$columna)->getCalculatedValue();
		 			$excelDate=$object->getActiveSheet()->getCell('S'.$columna)->getCalculatedValue();   
		 			$data['inicio'][$c] = \PHPExcel_Style_NumberFormat::toFormattedString($excelDate, 'DD/MM/YYYY'); 
		 			$excelDate2=$object->getActiveSheet()->getCell('T'.$columna)->getCalculatedValue();		 
		 			if($excelDate2=='' || strtoupper($excelDate2)=='INDEFINIDO'){	
		 				$data['termino'][$c]='';		
					}else{
						$data['termino'][$c]=\PHPExcel_Style_NumberFormat::toFormattedString($excelDate2, 'DD/MM/YYYY');
					}
		 			$data['diastrab'][$c]=$object->getActiveSheet()->getCell('U'.$columna)->getCalculatedValue(); 	
		 			$data['sueldobase'][$c]=$object->getActiveSheet()->getCell('V'.$columna)->getCalculatedValue(); 	
		 			$data['sueldobaseprop'][$c]=$object->getActiveSheet()->getCell('W'.$columna)->getCalculatedValue(); 	
		 			$data['gratifica'][$c]=$object->getActiveSheet()->getCell('X'.$columna)->getCalculatedValue(); 	
		 			$data['bonocual'][$c]=$object->getActiveSheet()->getCell('Y'.$columna)->getCalculatedValue(); 	
		 			$data['bonocuan'][$c]=$object->getActiveSheet()->getCell('Z'.$columna)->getCalculatedValue(); 	
		 			$data['cumplimiento'][$c]=$object->getActiveSheet()->getCell('AA'.$columna)->getCalculatedValue(); 	
		 			$data['bonos'][$c]=$object->getActiveSheet()->getCell('AB'.$columna)->getCalculatedValue(); 	
		 			$data['horaextras'][$c]=$object->getActiveSheet()->getCell('AC'.$columna)->getCalculatedValue(); 	
		 			$data['valorextras'][$c]=$object->getActiveSheet()->getCell('AD'.$columna)->getCalculatedValue(); 	
		 			$data['aguinaldo'][$c]=$object->getActiveSheet()->getCell('AE'.$columna)->getCalculatedValue(); 	
		 			$data['total_impo'][$c]=$object->getActiveSheet()->getCell('AF'.$columna)->getCalculatedValue(); 	
		 			$data['colacion'][$c]=$object->getActiveSheet()->getCell('AG'.$columna)->getCalculatedValue(); 	
		 			$data['movi'][$c]=$object->getActiveSheet()->getCell('AH'.$columna)->getCalculatedValue(); 	
		 			$data['movi_adi'][$c]=$object->getActiveSheet()->getCell('AI'.$columna)->getCalculatedValue(); 	
		 			$data['viatico'][$c]=$object->getActiveSheet()->getCell('AJ'.$columna)->getCalculatedValue(); 	
		 			$data['total_haber'][$c]=$object->getActiveSheet()->getCell('AK'.$columna)->getCalculatedValue(); 	
		 			$data['desc_provi'][$c]=$object->getActiveSheet()->getCell('AL'.$columna)->getCalculatedValue(); 	
		 			$data['sueldo_liquido'][$c]=$object->getActiveSheet()->getCell('AM'.$columna)->getCalculatedValue(); 	
		 			$data['sis'][$c]=$object->getActiveSheet()->getCell('AN'.$columna)->getCalculatedValue(); 	
		 			$data['mutual'][$c]=$object->getActiveSheet()->getCell('AO'.$columna)->getCalculatedValue(); 	
		 			$data['seg_cesantia'][$c]=$object->getActiveSheet()->getCell('AP'.$columna)->getCalculatedValue(); 	
		 			$data['provi_vacaciones'][$c]=$object->getActiveSheet()->getCell('AQ'.$columna)->getCalculatedValue(); 	
		 			$data['provi_finiquito'][$c]=$object->getActiveSheet()->getCell('AR'.$columna)->getCalculatedValue(); 	
		 			$data['banefe'][$c]=$object->getActiveSheet()->getCell('AS'.$columna)->getCalculatedValue(); 	
		 			$data['total_costo'][$c]=$object->getActiveSheet()->getCell('AT'.$columna)->getCalculatedValue(); 	
		 			$data['comision'][$c]=$object->getActiveSheet()->getCell('AU'.$columna)->getCalculatedValue(); 	
		 			$data['costocliente'][$c]=$object->getActiveSheet()->getCell('AV'.$columna)->getCalculatedValue(); 	
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
			$data['usuarios'] = $this->listar->usuarios();
			$this->load->view('layout/aside',$data);
			$this->load->view('nomina/ImportNomina',$data);
		}else{
			$data["nombre"]=$_SESSION["nombre"];
			$data["usuario"]=$_SESSION["usuario"];
			$user=$_SESSION["usuario"];
			$this->load->view('contenido');
			$this->load->view('layout/layout_nominas',$data);
			$data['clientes'] = $this->listar->clientes($user);
			$data['usuarios'] = $this->listar->usuarios();
			$this->load->view('layout/aside',$data);
			$this->load->view('nomina/ImportNomina',$data);
		}
	}


	function insertarnominamasiva(){
		if(isset($_SESSION["sesion"])){	
			$contador=$_POST['txt_contador'];
			$total=null;
			for ($i=0; $i < $contador; $i++) { 
				$nombre=$_POST['txt-name-'.$i];
				$app=$_POST['txt-ap-'.$i];
				$apm=$_POST['txt-am-'.$i];
				$rut=$_POST['txt-rut-'.$i];
				$supervisor=$_POST['txt-sp-'.$i];
				$cliente=$this->limpialetras($_POST['txt-cli-'.$i]);				
				$cadena=$_POST['txt-cad-'.$i];
				$local=$_POST['txt-loc-'.$i];
				$ciudad=$_POST['txt-ciu-'.$i];
				$region=$_POST['txt-rg-'.$i];
				$cargo=$_POST['txt-carg-'.$i];
				$jornada=$_POST['txt-jor-'.$i];
				$fpago=$_POST['txt-fp-'.$i];
				$banco=$_POST['txt-bnc-'.$i];
				$ncuenta=$_POST['txt-nc-'.$i];
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
				$cumpli=$this->limpiacumpli($_POST['txt-cump-'.$i]);
				$bonos=$this->limpiadatos($_POST['txt-bs-'.$i]);
				$horasextras=$this->limpiadatos($_POST['txt-he-'.$i]);
				$valorhoras=$this->limpiadatos($_POST['txt-vhe-'.$i]);
				$aguinaldo=$this->limpiadatos($_POST['txt-ag-'.$i]);
				$imponible=$this->limpiadatos($_POST['txt-timp-'.$i]);
				$colacion=$this->limpiadatos($_POST['txt-col-'.$i]);
				$movi=$this->limpiadatos($_POST['txt-m-'.$i]);
				$movivari=$this->limpiadatos($_POST['txt-mv-'.$i]);
				$viatico=$this->limpiadatos($_POST['txt-via-'.$i]);
				$haberes=$this->limpiadatos($_POST['txt-thb-'.$i]);
				$descuento=$this->limpiadatos($_POST['txt-dpv-'.$i]);
				$liquido=$this->limpiadatos($_POST['txt-slq-'.$i]);
				$sis=$this->limpiadatos($_POST['txt-sis-'.$i]);
				$mutual=$this->limpiadatos($_POST['txt-mtl-'.$i]);
				$seguro=$this->limpiadatos($_POST['txt-sgc-'.$i]);				
				$vacaciones=$this->limpiadatos($_POST['txt-psv-'.$i]);
				$finiquito=$this->limpiadatos($_POST['txt-psf-'.$i]);
				$banefe=$this->limpiadatos($_POST['txt-baf-'.$i]);
				$costopersonal=$this->limpiadatos($_POST['txt-tlc-'.$i]);
				$agencia=$this->limpiadatos($_POST['txt-cms-'.$i]);
				$costofinal=$this->limpiadatos($_POST['txt-ctc-'.$i]);
				$obser=$_POST['txt-Obs-'.$i];
				$fulltime=$_POST['txt-llgf-'.$i];
				$parttime=$_POST['txt-llgp-'.$i];
				$llegsuper=$_POST['txt-llgs-'.$i];
				$filename=null;		  		

				$tmp = explode(".", $_FILES['file-cel-'.$i]['name']);
		  		$extensioncel = end($tmp);	
		  		$tmp = explode(".", $_FILES['file-tabl-'.$i]['name']);
		  		$extensiontabl = end($tmp);	
		  		$tmp = explode(".", $_FILES['file-not-'.$i]['name']);
		  		$extensionnot = end($tmp);	
		  		$tmp = explode(".", $_FILES['file-cred-'.$i]['name']);
		  		$extensioncred = end($tmp);	
		  		$tmp = explode(".", $_FILES['file-unif-'.$i]['name']);
		  		$extensionunif = end($tmp);	
		  		$tmp = explode(".", $_FILES['file-epp-'.$i]['name']);
		  		$extensionepp = end($tmp);	
		  		$tmp = explode(".", $_FILES['file-c360-'.$i]['name']);
		  		$extensionc360 = end($tmp);	
		  		$tmp = explode(".", $_FILES['file-clou-'.$i]['name']);
		  		$extensionclou = end($tmp);	
		  		$tmp = explode(".", $_FILES['file-intr-'.$i]['name']);
		  		$extensionintr = end($tmp);	
		  		$tmp = explode(".", $_FILES['file-ape-'.$i]['name']);
		  		$extensionape = end($tmp);	
		  		if($extensioncel){
		  			$filename=$rut;
					$cel = $this->subirArchivo($filename,1,$i);
					$doccelu =  "doc/d_celular/".$cel;
				}else{
					$doccelu = "";
				}
				if($extensiontabl){
					$filename=$rut;
					$tabl = $this->subirArchivo($filename,2,$i);
					$doctab =  "doc/d_tablet/".$tabl;
				}else{
					$doctab = "";
				}
				if($extensionnot){
					$filename=$rut;
					$not = $this->subirArchivo($filename,3,$i);
					$docnot =  "doc/d_notebook/".$not;
				}else{
					$docnot = "";
				}
				if($extensioncred){
					$filename=$rut;
					$cred = $this->subirArchivo($filename,4,$i);
					$doccre =  "doc/d_credencial/".$cred;
				}else{
					$doccre = "";
				}
				if($extensionunif){
					$filename=$rut;
					$unif = $this->subirArchivo($filename,5,$i);
					$docuni =  "doc/d_uniforme/".$unif;
				}else{
					$docuni = "";
				}
				if($extensionepp){
					$filename=$rut;
					$epp = $this->subirArchivo($filename,6,$i);
					$docepp =  "doc/d_epp/".$epp;
				}else{
					$docepp = "";
				}
				if($extensionc360){
					$filename=$rut;
					$c360 = $this->subirArchivo($filename,7,$i);
					$doc360 =  "doc/d_club360/".$c360;
				}else{
					$doc360 = "";
				}
				if($extensionclou){
					$filename=$rut;
					$clou = $this->subirArchivo($filename,8,$i);
					$docclo =  "doc/d_cloud/".$clou;
				}else{
					$docclo = "";
				}
				if($extensionintr){
					$filename=$rut;
					$intr = $this->subirArchivo($filename,9,$i);
					$docint =  "doc/d_intranet/".$intr;
				}else{
					$docint = "";
				}
				if($extensionape){
					$filename=$rut;
					$ape = $this->subirArchivo($filename,10,$i);
					$docape =  "doc/d_apenet/".$ape;
				}else{
					$docape = "";
				}

				if($doccelu=='doc/d_celular/'){
					$doccelu='';
				}
				if($doctab=='doc/d_tablet/'){
					$doctab='';
				}
				if($docnot=='"doc/d_notebook/'){
					$docnot='';
				}
				if($doccre=='doc/d_credencial/'){
					$doccre='';
				}
				if($docuni=='doc/d_uniforme/'){
					$docuni='';
				}
				if($docepp=='doc/d_epp/'){
					$docepp='';
				}
				if($doc360=='doc/d_club360/'){
					$doc360='';
				}
				if($docclo=='doc/d_cloud/'){
					$docclo='';
				}	
				if($docint=='doc/d_intranet/'){
					$docint='';
				}	
				if($docape=='doc/d_apenet/'){
					$docape='';
				}	

				$this->load->model("nomina");
				$mensaje=$this->nomina->insertarmasivo($nombre,$app,$apm,$rut,$supervisor,$cliente,$cadena,$local,$ciudad,$region,$cargo,$jornada,$fpago,$banco,$ncuenta,$co,$contrato,$inicio,$termino,$dias,$sueldobase,$sueldobaseprop,$grati,$bocuali,$bocuan,$cumpli,$bonos,$horasextras,$valorhoras,$aguinaldo,$imponible,$colacion,$movi,$movivari,$viatico,$haberes,$descuento,$liquido,$sis,$mutual,$seguro,$vacaciones,$finiquito,$banefe,$costopersonal,$agencia,$costofinal,$obser,$fulltime,$parttime,$llegsuper,$doccelu,$doctab,$docnot,$doccre,$docuni,$docepp,$doc360,$docclo,$docint,$docape);
				if($mensaje==1){
					$total++;
				}		
			}
			echo"<script>alert('Se ha agregado ".$total." nominas'); window.location='../nominalist/chequeonimonas';</script>";
		}else{
			redirect(site_url("nominalist/agregarnominamasiva"));
		}
	}

	public function subirArchivo($filename,$doc,$i){
		if($doc==1){
			$archivo ='file-cel-'.$i;
			$config['upload_path'] = "doc/d_celular/";
		}elseif($doc==2){
			$archivo ='file-tabl-'.$i;
			$config['upload_path'] = "doc/d_tablet/";
		}elseif($doc==3){
			$archivo ='file-not-'.$i;
			$config['upload_path'] = "doc/d_notebook/";
		}elseif($doc==4){
			$archivo ='file-cred-'.$i;
			$config['upload_path'] = "doc/d_credencial/";
		}elseif($doc==5){
			$archivo ='file-unif-'.$i;
			$config['upload_path'] = "doc/d_uniforme/";
		}elseif($doc==6){
			$archivo ='file-epp-'.$i;
			$config['upload_path'] = "doc/d_epp/";
		}elseif($doc==7){
			$archivo ='file-c360-'.$i;
			$config['upload_path'] = "doc/d_club360/";
		}elseif($doc==8){
			$archivo ='file-clou-'.$i;
			$config['upload_path'] = "doc/d_cloud/";
		}elseif($doc==9){
			$archivo ='file-intr-'.$i;
			$config['upload_path'] = "doc/d_intranet/";
		}elseif($doc==10){
			$archivo ='file-ape-'.$i;
			$config['upload_path'] = "doc/d_apenet/";	
		}
		elseif($doc==0){
			$archivo ='excel';
			$config['upload_path'] = "img/excel_nominas/";	
		}
		$config['file_name'] =$filename;
		$config['max_size'] = "2097152";
		$config['max_width'] = "2000";
		$config['max_height'] = "2000";
		$config['allowed_types'] = "*";
		$config['overwrite'] = TRUE;	
		$this->upload->initialize($config);
		if (!$this->upload->do_upload($archivo)) {
			$data['uploadError'] = $this->upload->display_errors();
			echo $this->upload->display_errors();
			return;
		}
		$data = $this->upload->data();
		$nombre= $data['file_name'];
		return $nombre;
	}


	function limpiadatos($var){
		$patron = "/[.$,'% ]/i";    
		$cadena_nueva = preg_replace($patron, "", $var);
		return $cadena_nueva;
	}

	function limpialetras($var){
  		$nuevo = preg_replace("/[^0-9]/", "",$var);
  		$nuevo2 = preg_replace("[' ']", "",$nuevo);

  		return $nuevo2;
 	}
	function limpiacumpli($var){
		$patron = "/[%]/i";    
		$cadena_nueva = preg_replace($patron, "", $var);
		return $cadena_nueva;
	}
}


