<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class nominausuarios extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->helper("url","form");	
		$this->load->library('form_validation'); 	
		$this->load->model("nomina");
        $this->load->model("listar");		
	}
	
	function buscarUsuario(){		
		if(isset($_SESSION["sesion"])){
			$id_usuario= $_POST['usuarios'];
			if($id_usuario!= null){
				$data["nombre"]=$_SESSION["nombre"];
				$data["usuario"]=$_SESSION["usuario"];
				$data['contratos']= $this->nomina->contratos();
				$data['clientes'] = $this->listar->clientes();
				$data['usuarios'] = $this->listar->usuarios();
				$data['listado'] = $this->nomina->buscar_contratosusuario($id_usuario);
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