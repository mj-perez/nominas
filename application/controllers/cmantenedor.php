<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class cmantenedor extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->helper("url","form");	
		$this->load->library('form_validation'); 	
		$this->load->model("nomina");
	    $this->load->model("listar");			
		
	}

	function listBono(){
		if(isset($_SESSION["sesion"])){
			$data["nombre"]=$_SESSION["nombre"];
			$data["usuario"]=$_SESSION["usuario"];
			$this->load->view('contenido');
			$this->load->view('layout/layout_nominas',$data);
			$this->load->model("mantenedor");
			$data['listar']= $this->mantenedor->listarBono($id_cliente);
			$result['validar'] = null;
			$result['validar'] = 1;
			$this->load->view('layout/aside',$data);
			$this->load->view('mantenedores/vmantenedor',$data);
		}else{
			redirect(site_url("funciones"));
		}
	}
}	

