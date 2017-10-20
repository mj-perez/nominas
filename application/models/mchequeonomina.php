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
  inner join Usuarios as u on(u.ID_Usuario = n.idUserRn)
  where n.EstadoNomina = 'ENTREGADO'";
        $consulta = $this->db->query($query);
        $resultado = $consulta -> result_array();
        return $resultado;
    }

    function mnominasaprobadas(){
        $query = "SELECT id_NominasR,n.FechaRegistro,c.Cliente,u.Usuario,n.EstadoNomina,u.ID_Usuario
  FROM NominasR as n
  inner join SGI_Clientes as c on(c.ID_Cliente = n.ID_Cliente)
  inner join Usuarios as u on(u.ID_Usuario = n.idUserRn)
  where n.EstadoNomina = 'APROBADO'";
        $consulta = $this->db->query($query);
        $resultado = $consulta -> result_array();
        return $resultado;
    }

    function totalesAprobadoPorCliente(){
        $query = "SELECT nr.EstadoNomina, n.cliente ,sum(n.TotalCostoPersonal) as TotalCostoPersonal, c.Cliente as nombreCliente ,nr.ID_Cliente
                 FROM NominasR as nr
                 inner join Nominas as n on( nr.ID_NominasR = n.ID_Nominasr )
                 inner join SGI_Clientes as c on (c.ID_Cliente = n.Cliente)         
              where nr.EstadoNomina = 'APROBADO'
              group by nr.EstadoNomina, n.cliente, c.Cliente,nr.ID_Cliente";
        $consulta = $this->db->query($query);
        $resultado = $consulta -> result_array();
        return $resultado;
    }


    function totalesAprobadoGenerales(){
        $query = "SELECT nr.EstadoNomina ,sum(n.TotalHaber) as TotalHaberes ,sum(n.TotalCostoPersonal) as TotalCostoPersonal,sum(n.TotalImponible) as TotalImponible, count(n.TipoContrato) as Ncontratos
                 FROM NominasR as nr
                 inner join Nominas as n on( nr.ID_NominasR = n.ID_Nominasr )
                 inner join SGI_Clientes as c on (c.ID_Cliente = n.Cliente)         
              where nr.EstadoNomina = 'APROBADO'
              group by nr.EstadoNomina";
        $consulta = $this->db->query($query);
        $resultado = $consulta -> row_array();
        return $resultado;
    }

    function NominaIngresadaPorUsuario($id_usuario){
        $query = "SELECT id_NominasR,n.FechaRegistro,c.Cliente,u.Usuario,n.EstadoNomina,u.ID_Usuario
  FROM NominasR as n
  inner join SGI_Clientes as c on(c.ID_Cliente = n.ID_Cliente)
  inner join Usuarios as u on(u.ID_Usuario = n.idUserRn)
  where u.ID_Usuario =".$id_usuario;
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