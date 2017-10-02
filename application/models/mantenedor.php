<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mantenedor extends CI_model {

    public function __construct() {
        parent::__construct(); 
    }   
    function index()
    {

    }

    //Modelo bonos

    function listarBono($id_bono){
        $query = "select bc.ID_BonoCliente,b.Bono,b.vigencia, bsc.Cliente
  FROM [RRHHSeleccion_Chile].[dbo].[SRH_Bonos] as b
  inner join [RRHHSeleccion_Chile].[dbo].[SRH_BonosCliente] as bc on(bc.ID_Bono=b.ID_Bono)
  inner join [dbo].[SGI_Clientes] as bsc on ( bsc.ID_Cliente = bc.ID_Cliente)
  where bsc.ID_Cliente = ".$id_bono;
        $consulta = $this->db->query($query);
        $resultado = $consulta -> result_array();
        return $resultado;
    }
}