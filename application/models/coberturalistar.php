<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class coberturalistar extends CI_model {
	function __construct()
    {
        parent::__construct();
    }
	
	 function clientescob(){
    	$query="select id_cliente,cliente from SGI_Clientes where activo=1 ORDER BY cliente ASC";
    	$consulta = $this->db->query($query);
        $resultado = $consulta -> result_array();
        return $resultado;
    }
	
	
	

	
	
	
	
}	
?>