<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class menu extends CI_Controller {
	
	public function index(){
		if(isset($_SESSION["sesion"])){
			$this->load->model("listar");
			$data["nombre"]=$_SESSION["nombre"];
			$data["usuario"]=$_SESSION["usuario"];
			$user=$_SESSION["usuario"];
			$data['clientes'] = $this->listar->clientes($user);
			$data['nombrecliente']=$_SESSION["nombrecliente"];
			$data['idcliente']=$_SESSION["idcliente"];
			$this->load->view('contenido');
		    $this->load->view('layout/layout_nominas',$data);
		    $this->load->view('layout/aside',$data);
			$this->load->view('sistema/home',$data);
		} else {
			if(isset($_POST["txt_usuario"]) && isset($_POST["txt_contra"])){
				$this->load->model("funcion_login");
				$this->load->model("listar");
				$login=$this->funcion_login->login($_POST["txt_usuario"],$_POST["txt_contra"]);
				$modulo=array();
				if($login != 0){ 
					for ($i=0; $i < count($login); $i++){
						$nombre=$login[$i]["persona"];
						$usuario=$login[$i]["usuario"];
					}
					//creacion de sesiones
					$_SESSION["sesion"]=true;
					$_SESSION["nombre"]=strtoupper($nombre);
					$_SESSION["usuario"]=$usuario;
					//asignacion del cliente
					$user=$_SESSION["usuario"];
					$client=$this->listar->primerclientes($user);
					$_SESSION["nombrecliente"]=$client['cliente'];
					$_SESSION["idcliente"]=$client['id_cliente'];
					$data['nombrecliente']=$_SESSION["nombrecliente"];
					$data['idcliente']=$_SESSION["idcliente"];
					//asignacion de otros datos
					$data["usuario"]=$_SESSION["usuario"];
					$data["nombre"]=strtoupper($nombre);
					$data['clientes'] = $this->listar->clientes($user);
					$this->load->view('contenido');
					$this->load->view('layout/layout_nominas',$data);
					$this->load->view('layout/aside',$data);
					$this->load->view('sistema/home',$data);
				} else {
					echo "<script> alert('usuario y/o contraseña incorrectos, ingrese nuevamente'); 
					window.location.href='login'</script>";
				}
			
			}else {
				redirect(site_url("login"));
		}
	}
	}
}
?>