<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class funcion_login extends CI_model {
	function __construct()
    {
        parent::__construct();
    }

    function login($usuario, $password){
		$query="select u.nombre + ' '  + u.ap_paterno as persona, 
        u.id_usuario as usuario, 
        u.id_perfil as perfil 
        from Usuarios u 
        where u.activo=1 and u.id_perfil=13 and usuario='".$usuario."' and password='".$password."'";
        $res = $this->db->query($query);
		if($res->num_rows()!=0){
            return $res->result_array();
        } else {
            return 0;
        }
    }
	
}

	
?>