<?PHP
defined('BASEPATH') OR exit('No direct script access allowed');

class nomina extends CI_model {
	function __construct()
    {
        parent::__construct();
    }
    	

	
	function buscar_contratoscliente($id_cliente){
		$query="select con.Nombres, con.Ap_Paterno, con.Ap_Materno,
    con.Rut,CAST(cli.ID_Cliente AS VARCHAR(10))+'-'+cli.Cliente as Cliente,l.local,l.cadena,co.Comuna,re.Region, 
    e.EGrupo, tp.Tipo_Contrato, c.Cargo,b.Banco, 
    pa.FPago, con.NCuenta, af.afp, i.isapre,isnull(datediff(month,con.Fecha_Ingreso,con.Fecha_Retiro)*1.25,0) as vacaciones,
    convert(varchar,con.Fecha_Ingreso,105) as Fecha_Inicio,
    convert(varchar,con.fecha_Retiro,105) as Fecha_Termino, 
    con.Sueldo_Base, con.Bono_Cualitativo,con.Bono_Cuantitativo, 
    con.Colacion,con.Movilizacion, u.Usuario , con.Status_Contrato, cli.ACTIVO

from SGI_Contratos con
    left join SGI_EGrupo e on(con.id_egrupo=e.id_egrupo)
    left join SGI_Clientes cli on(con.ID_Cliente=cli.ID_Cliente)
    left join Usuarios u on(u.id_usuario=con.id_usuario)
    left join SGI_Geo_Comunas co on(con.id_comuna=co.id_comuna)
    left join SGI_Geo_Regiones re on(con.id_region=re.id_region)
    left join SGI_Cargos c on(con.id_cargo=c.id_cargo) 
    left join SGI_ContratosRutas cr on(con.ID_Contrato=cr.ID_Contrato)
    left join LocalesNomina l on(l.b2b=cr.id_local)
    left join SGI_Tipo_Contratos tp on(tp.id_tipo_contrato=con.id_tipo_contrato)
    left join SGI_AFP af on(af.id_afp=con.id_afp)
    left join SGI_Isapres i on(i.id_isapre=con.id_salud)
    left join SGI_FPagos pa on(pa.id_fpago=con.id_fpago)
    left join SGI_Bancos b on(b.ID_Banco=con.ID_Banco)

	where cli.id_cliente =".$id_cliente;
        $res = $this->db->query($query);
        return $res->result_array();
	}
	
	
	
	function selecionarCliente($id_usuario){
		$query="SELECT uc.ID_Cliente, cli.Cliente, u.Usuario, u.ID_Usuario, u.ID_Perfil
				from Usuarios u
				inner join SGI_Usuario_Cliente uc on( uc.ID_Usuario = u.ID_Usuario)
				inner join SGI_Clientes cli on(cli.ID_Cliente=uc.ID_Cliente)
				where  u.ID_Perfil = 13 
				and u.Activo = 1 
				and cli.ACTIVO = 1 
				and uc.Activo = 1
				and u.ID_Usuario =".$id_usuario;
        $consulta = $this->db->query($query);
        $resultado = $consulta->result_array();
        return $resultado;
   
    }

    function nominaingresada($id_usuario){
    	$query="SELECT ID_Nomina, CodNomina, FechaRegistro, Nombres, ApellidoP, ApellidoM, n.Rut, Supervisor, Cliente, Cadena, Local, Ciudad, Region, CargoTrabajador, Jornada, FormaPago, Banco, NCuentaB, CO, TipoContrato, FechaInicio, FechaTermina, DiasTrabajados, SueldoBase, SueldoBaseProp, Gratificacion, BonoCualitativo, BonoCuantitavo, Cumplimiento, Bonos, N_HorasExtras, ValorHorasExtras, Aguinaldo, TotalImponible, Colacion, Movilizacion, MovilizacionVariable, Viatico, TotalHaber, DescuentoPrevicional, SueldoLiquido, SIS, Mutual, SeguroCesantia, ProvisionVacaciones, ProvisionFiniquito, Banefe, TotalCostoPersonal, ComisionAgencia, CostoFinalCliente, Observacion, LlegadaFulltime, LlegadaPartime, LlegadaSupervisor, DocCelular, DocTablet, DocNotebook, DocCredencial, DocUniforme, DocEPP, DocClub360, DocCloud, DocIntranet, DocApenet, n.idUserRn, u.Usuario, c.Cargo, u.Nombre +' '+ ISNULL(u.Ap_Paterno,' ') +' '+ISNULL(u.Ap_Materno,' ') as NombreUsuario 
            FROM Nominas as n
            inner join Usuarios as u on(u.ID_Usuario = n.idUserRn )
            inner join Cargos as c on(c.ID_Cargo = u.ID_Cargo )
            where n.idUserRn =( select ID_Usuario from Usuarios where id_usuario ='".$id_usuario."')";
    	$consulta = $this->db->query($query);
        $resultado = $consulta -> result_array();
        return $resultado;
    }

    function insertarregistro($Cliente,$idUserRn){
    $query = "EXEC SP_Nominas_Registradas '".$Cliente."','".$idUserRn."'";
    $consulta = $this->db->query($query);
    $resultado = $consulta -> num_rows();
    return $resultado;
    }

    function insertarmasivo($nombre,$app,$apm,$rut,$supervisor,$cliente,$cadena,$local,$ciudad,$region,$cargo,$jornada,$fpago,$banco,$ncuenta,$co,$contrato,$inicio,$termino,$dias,$sueldobase,$sueldobaseprop,$grati,$bocuali,$bocuan,$cumpli,$bonos,$horasextras,$valorhoras,$aguinaldo,$imponible,$colacion,$movi,$movivari,$viatico,$haberes,$descuento,$liquido,$sis,$mutual,$seguro,$vacaciones,$finiquito,$banefe,$costopersonal,$agencia,$costofinal,$obser,$fulltime,$parttime,$llegsuper,$doccelu,$doctab,$docnot,$doccre,$docuni,$docepp,$doc360,$docclo,$docint,$docape,$idUserRn){
    	$query = "EXEC SP_Inserta_Nomina '".$nombre."','".$app."','".$apm."','".$rut."','".$supervisor."',".$cliente.",'".$cadena."','".$local."','".$ciudad."',".$region.",'".$cargo."','".$jornada."','".$fpago."','".$banco."','".$ncuenta."','".$co."','".$contrato."','".$inicio."','".$termino."',".$dias.",".$sueldobase.",".$sueldobaseprop.",".$grati.",".$bocuali.",".$bocuan.",'".$cumpli."',".$bonos.",".$horasextras.",".$valorhoras.",".$aguinaldo.",".$imponible.",".$colacion.",".$movi.",".$movivari.",".$viatico.",".$haberes.",".$descuento.",".$liquido.",".$sis.",".$mutual.",".$seguro.",".$vacaciones.",".$finiquito.",".$banefe.",".$costopersonal.",".$agencia.",".$costofinal.",'".$obser."','".$fulltime."','".$parttime."','".$llegsuper."','".$doccelu."','".$doctab."','".$docnot."','".$doccre."','".$docuni."','".$docepp."','".$doc360."','".$docclo."','".$docint."','".$docape."','".$idUserRn."'";
        $consulta = $this->db->query($query);

        $query_validar = "SELECT id_nomina FROM nominas WHERE nombres='".$nombre."' and apellidop='".$app."' and rut='".$rut."' and cliente=".$cliente;

        $resp = $this->db->query($query_validar)->num_rows();
		if($resp==1){
			$mensaje = 1;
		}else{
			$mensaje = 2;
		}
		return $mensaje;
    }

    function aprobarNomina($id_nominasR){
        $query="EXEC SP_Nominas_Aprobadas '".$id_nominasR."' ";
        $consulta = $this->db->query($query);
        $resultado = $consulta -> num_rows();
        return $resultado;

    }

    function idnominasregistradas($id_usuario){
        $query="SELECT ID_NominasR
            FROM Nominas as n
            where n.idUserRn =( select ID_Usuario from Usuarios where id_usuario = '".$id_usuario."')
            group by id_nominasR";
        $consulta = $this->db->query($query);
        $resultado = $consulta -> result_array();
        return $resultado;

    }
}

	
	
	
	
	
	
	
	
	
	












?>