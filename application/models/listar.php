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

    function clientes($usuario){
    	$query="SELECT SGC.id_cliente, SGC.cliente, US.id_usuario 
                    FROM SGI_Clientes as SGC 
                    INNER JOIN sgi_usuario_cliente as SUC ON (SGC.id_cliente = SUC.id_cliente) 
                    INNER JOIN usuarios as US ON (SUC.id_usuario = US.id_usuario)
                    where US.id_usuario = ".$usuario." AND SUC.activo=1 AND SGC.activo=1 AND US.activo=1
                    ORDER BY cliente asc";
    	$consulta = $this->db->query($query);
        $resultado = $consulta -> result_array();
        return $resultado;
    }

    //   function obtener_postulante($rut){
    //     $consulta =  $this->db->query("select rut from nominas where rut = '".$rut."'");
    //     $resultado['postulante'] = $consulta->row();
    //     //$query = $this->db->get('SRH_Postulante');
    //     return $resultado;  
    // } 
    
    // function cargaarchivo($id){
    //     $sp="select Rut,ID_Nomina, DocCelular, DocTablet, DocNotebook, DocCredencial, DocUniforme, DocEPP, DocClub360, DocCloud, DocIntranet, DocApenet FROM Nominas where ID_Nomina =".$id; 
    //     $res = $this->db->query($sp);
    //     return $res->row();
    // }

  

}
	



?>