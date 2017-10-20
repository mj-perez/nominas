<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mchequeonomina extends CI_model {

    public function __construct() {
        parent::__construct(); 
    }   

    function index()
    {

    }

    //Modelo bonos

    function chequenominaingresada(){
        $query = "SELECT id_NominasR,n.FechaRegistro,c.Cliente,u.Usuario,n.EstadoNomina,u.ID_Usuario
  FROM NominasR as n
  inner join SGI_Clientes as c on(c.ID_Cliente = n.ID_Cliente)
  inner join Usuarios as u on(u.ID_Usuario = n.idUserRn)";
        $consulta = $this->db->query($query);
        $resultado = $consulta -> result_array();
        return $resultado;
    }

    function mnominasaprobadas(){
        $query = "SELECT cli.Cliente as nombrecliente ,n.EstadoNomina, n.FechaRegistro,n.idUserRn, us.Nombre,us.Ap_Paterno, us.Usuario, cli.ID_Cliente,count(n.EstadoNomina) as ncontratos,
                 sum(SueldoBase) as SueldoBase,
                 sum(SueldoBaseProp) as SueldoBasePropocional,
                 sum(TotalImponible) as TotalesImponibles,
                 sum(TotalHaber) as TotalHaberes,
                 sum(SueldoLiquido) as TotalesSueldoLiquido,
                 sum(CostoFinalCliente) as TotalCostoFinalCliente ,
                 sum(TotalCostoPersonal) as TotalCostoPersonal
                  FROM Nominas as n
                  left join SGI_Clientes as cli on(cli.ID_Cliente = n.Cliente)
          left join Usuarios as us on(us.ID_Usuario = n.idUserRn)
          where n.EstadoNomina = 'ENTREGADO'
                  group by cli.Cliente, n.EstadoNomina,  n.FechaRegistro, n.idUserRn, us.Nombre,us.Ap_Paterno, us.Usuario,cli.ID_Cliente";
        $consulta = $this->db->query($query);
        $resultado = $consulta -> result_array();
        return $resultado;
    }

    function totales(){
        $query = "SELECT count(n.EstadoNomina) as ncontratos,
                 sum(SueldoBase) as SueldoBase,
                 sum(SueldoBaseProp) as SueldoBasePropocional,
                 sum(TotalImponible) as TotalesImponibles,
                 sum(TotalHaber) as TotalHaberes,
                 sum(SueldoLiquido) as TotalesSueldoLiquido,
                 sum(CostoFinalCliente) as TotalCostoFinalCliente ,
                 sum(TotalCostoPersonal) as TotalCostoPersonal
                 FROM Nominas as n         
              where n.EstadoNomina = 'ENTREGADO' ";
        $consulta = $this->db->query($query);
        $resultado = $consulta -> result_array();
        return $resultado;
    }

    function reprobarNomina($idNomina){
        $sp="EXECUTE SP_Rechazar_NominaR ".$idNomina;
        $res=$this->db->query($sp);
        return $res->num_rows();
    }


}