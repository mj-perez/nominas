<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class listar extends CI_model {
	function __construct()
    {
        parent::__construct();
    }

   	function usuarios(){
    	$query="select id_usuario, nombre+' '+Ap_Paterno as usuario from usuarios where id_perfil in(13,31) and activo=1";
    	$consulta = $this->db->query($query);
        $resultado = $consulta -> result_array();
        return $resultado;
    }

    function clientes(){
    	$query="select id_cliente,cliente from SGI_Clientes where activo=1";
    	$consulta = $this->db->query($query);
        $resultado = $consulta -> result_array();
        return $resultado;
    }



}
	



?>