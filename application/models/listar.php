<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class listar extends CI_model {
	function __construct()
    {
        parent::__construct();
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

    function primerclientes($usuario){
        $query="SELECT SGC.id_cliente, SGC.cliente, US.id_usuario 
                    FROM SGI_Clientes as SGC 
                    INNER JOIN sgi_usuario_cliente as SUC ON (SGC.id_cliente = SUC.id_cliente) 
                    INNER JOIN usuarios as US ON (SUC.id_usuario = US.id_usuario)
                    where US.id_usuario = ".$usuario." AND SUC.activo=1 AND SGC.activo=1 AND US.activo=1
                    ORDER BY cliente asc";
        $consulta = $this->db->query($query);
        $resultado = $consulta -> row_array();
        return $resultado;
    }

    function datoscliente($cliente){
        $query="SELECT id_cliente, cliente
                    FROM SGI_Clientes 
                    where ID_Cliente = ".$cliente;
        $consulta = $this->db->query($query);
        $resultado = $consulta -> row_array();
        return $resultado;
    }
    
    // function cargaarchivo($id){
    //     $sp="select Rut,ID_Nomina, DocCelular, DocTablet, DocNotebook, DocCredencial, DocUniforme, DocEPP, DocClub360, DocCloud, DocIntranet, DocApenet FROM Nominas where ID_Nomina =".$id; 
    //     $res = $this->db->query($sp);
    //     return $res->row();
    // }

  

}
	



?>