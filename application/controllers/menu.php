<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class menu extends CI_Controller {
	
	public function index(){
		if(isset($_SESSION["sesion"])){
			$data["nombre"]=$_SESSION["nombre"];
			$data["usuario"]=$_SESSION["usuario"];
			$this->load->view('sistema/home',$data);
		} else {
			if(isset($_POST["txt_usuario"]) && isset($_POST["txt_contra"])){
				$this->load->model("funcion_login");
				$login=$this->funcion_login->login($_POST["txt_usuario"],$_POST["txt_contra"]);
				$modulo=array();
				if($login != 0){ 
					for ($i=0; $i < count($login); $i++){
						$nombre=$login[$i]["persona"];
						$usuario=$login[$i]["usuario"];
					}
					$_SESSION["sesion"]=true;
					$_SESSION["nombre"]=strtoupper($nombre);
					$_SESSION["usuario"]=$usuario;
					$data["usuario"]=$_SESSION["usuario"];
					$data["nombre"]=strtoupper($nombre);
					$this->load->view('sistema/home',$data);
				} else {
					echo "<script> alert('usuario y/o contraseña incorrectos, ingrese nuevamente'); 
					window.location.href='nominas'</script>";
				}
			
			}else {
				redirect(site_url("login"));
		}
	}
	}
}
?>