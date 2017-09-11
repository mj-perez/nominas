<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class nominaclientes extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->helper("url","form");	
		$this->load->library('form_validation'); 	
		$this->load->model("nomina");
        $this->load->model("listar");		
	}
	
	function buscarCliente(){
      if(isset($_SESSION["sesion"])){
			$id_cliente= $_POST['clientes'];
			if($id_cliente!= null){
				$data["nombre"]=$_SESSION["nombre"];
				$data["usuario"]=$_SESSION["usuario"];
				$data['contratos']= $this->nomina->contratos();
				$data['clientes'] = $this->listar->clientes();
				$data['usuarios'] = $this->listar->usuarios();
				$data['lista'] = $this->nomina->buscar_contratoscliente($id_cliente);
				$this->load->view('nomina/nominaslistado',$data);
			}else{
				redirect(site_url("nominalist/listNominas"));
			}
		}else{
			redirect(site_url("menu"));
		}
	}
}
?>