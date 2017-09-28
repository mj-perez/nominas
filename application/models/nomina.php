<?PHP
defined('BASEPATH') OR exit('No direct script access allowed');

class nomina extends CI_model {
	function __construct()
    {
        parent::__construct();
    }
    
	function index()
    {

    }
	
    function contratos(){
		$query="select 
				 case 
				 when con.fecha_ingreso<GETDATE() and getdate()<con.fecha_retiro-10 then 
				  'OK'
				 when getdate()>con.fecha_retiro-10 then 
				  'POR VENCER'
				when getdate()>con.fecha_retiro then 
				  'VENCIDO'
				 end as Estado_Actual,
				 e.egrupo ,
				 cli.cliente,
				 p.nombre_proyecto,
				 u.nombre+' '+u.ap_paterno as responsable,
				 p.rut,
				 con.ID_Contrato,
				 p.ap_paterno,
				 p.ap_materno,
				 p.nombres,
				 p.nombres+' '+p.Ap_Paterno+' '+p.Ap_Materno as Nombre_Concatenar,
				 convert(varchar,p.fecha_nacimiento,105) as Fecha_Nacimiento,
				 case
				 when p.Genero=1 then 'Masculino' 
				 when p.Genero=2 then 'Femenino'
				 end as sexo,
				 gp.Nacionalidad,
				 ec.Estado_Civil,
				 p.Direccion,
				 co.comuna,
				 re.region,
				 isnull('+56'+p.Fono_Fijo,'-') as fijo,
				 p.fono_celular as celular,
				 p.email,
				 p.talla_pantalon,
				 isnull(case 
				 when p.Talla_Polera=1 then 'XS'
				 when p.Talla_Polera=2 then 'S'
				 when p.Talla_Polera=3 then 'M'
				 when p.Talla_Polera=4 then 'L'
				 when p.Talla_Polera=5 then 'XL'
				 when p.Talla_Polera=6 then 'XXL'
				 when p.Talla_Polera=7 then 'XXXL'
				 end, '-') as talla_polera,
				 p.talla_calzado,
				 c.cargo,
				 l.local,
				 l.cadena,
				 tp.tipo_contrato,
				 convert(varchar,con.Fecha_Ingreso,105) as Fecha_Inicio,
				 convert(varchar,con.fecha_Retiro,105) as Fecha_Termino,
				 case 
				 when  datediff(month,con.Fecha_Ingreso,getdate())<12 then
				 datediff(month,con.Fecha_Ingreso,getdate())
				 when  datediff(month,con.Fecha_Ingreso,getdate())>=12 then
				 datediff(month,con.Fecha_Ingreso,getdate())/12 
				 end as Antiguedad, 
				  case 
				 when  datediff(month,con.Fecha_Ingreso,getdate())<12 then
				 datediff(month,con.Fecha_Ingreso,getdate())
				 when  datediff(month,con.Fecha_Ingreso,getdate())>=12 then
				 datediff(month,con.Fecha_Ingreso,getdate())/12 
				 end as Antiguedad_lineal, 
				 isnull(datediff(month,con.Fecha_Ingreso,con.Fecha_Retiro)*1.25,0) as vacaciones,
				 af.afp,
				 i.isapre as Prevision_Salud,
				 isnull(pa.fpago,'-') as fpago ,
				 isnull(b.Banco,'-') as banco,
				 isnull(con.ncuenta,'-') as ncuenta,
				 --en.Celular,
				 --en.Tablet,
				 --en.Notebook,
				 --en.Credencial,
				 --en.Uniforme,
				 --en.EPP,
				 --en.Acceso_Club_360,
				 --en.Acceso_Cloud,
				 --en.Acceso_Intranet,
				 --en.Acceso_Apenet,
				 cn.cant_cargasfamiliares as Cargas_Familiares,
				 cn.fuero,
				 cn.sala_cuna,
				 cn.Prestamo_Caja
				 --en.obs_generales
				from SGI_Contratos con
				inner join SGI_EGrupo e on(con.id_egrupo=e.id_egrupo)
				inner join SGI_Clientes cli on(con.ID_Cliente=cli.ID_Cliente)
				inner join SRH_DatosContratadosNomina p on(con.rut=p.rut)
				inner join Usuarios u on(u.id_usuario=p.id_usuario)
				inner join SGI_Geo_Paises gp on(con.id_pais=gp.ID_Pais)
				inner join SGI_Estado_Civil ec on(con.ID_Estado_Civil=ec.ID_Estado_Civil)
				inner join SGI_Geo_Comunas co on(con.id_comuna=co.id_comuna)
				inner join SGI_Geo_Regiones re on(con.id_region=re.id_region)
				inner join SGI_Cargos c on(con.id_cargo=c.id_cargo)
				left join SGI_ContratosRutas cr on(con.ID_Contrato=cr.ID_Contrato)
				left join LocalesNomina l on(l.b2b=cr.id_local)
				inner join SGI_Tipo_Contratos tp on(tp.id_tipo_contrato=con.id_tipo_contrato)
				left join SGI_AFP af on(af.id_afp=con.id_afp)
				left join SGI_Isapres i on(i.id_isapre=con.id_salud)
				left join SGI_FPagos pa on(pa.id_fpago=con.id_fpago)
				left join SGI_Bancos b on(b.ID_Banco=con.ID_Banco)
				left join Cargas_Nomina cn on(con.rut=cn.rut)
				--left join Entregas_Nomina en on(en.id_contrato=con.id_contrato)
				where cli.activo=1
				--and status_contrato='Firmado'
				and u.id_perfil=13";
        $res = $this->db->query($query);
        return $res->result_array();
    }
	
	function buscar_contratoscliente($id_cliente){
		$query="select 
				 case 
				 when con.fecha_ingreso<GETDATE() and getdate()<con.fecha_retiro-10 then 
				  'OK'
				 when getdate()>con.fecha_retiro-10 then 
				  'POR VENCER'
				when getdate()>con.fecha_retiro then 
				  'VENCIDO'
				 end as Estado_Actual,
				 e.egrupo ,
				 cli.cliente,
				 p.nombre_proyecto,
				 u.nombre+' '+u.ap_paterno as responsable,
				 p.rut,
				 p.ap_paterno,
				 p.ap_materno,
				 p.nombres,
				 p.nombres+' '+p.Ap_Paterno+' '+p.Ap_Materno as Nombre_Concatenar,
				 convert(varchar,p.fecha_nacimiento,105) as Fecha_Nacimiento,
				 case
				 when p.Genero=1 then 'Masculino' 
				 when p.Genero=2 then 'Femenino'
				 end as sexo,
				 gp.Nacionalidad,
				 ec.Estado_Civil,
				 p.Direccion,
				 co.comuna,
				 re.region,
				 isnull('+56'+p.Fono_Fijo,'-') as fijo,
				 p.fono_celular as celular,
				 p.email,
				 p.talla_pantalon,
				 isnull(case 
				 when p.Talla_Polera=1 then 'XS'
				 when p.Talla_Polera=2 then 'S'
				 when p.Talla_Polera=3 then 'M'
				 when p.Talla_Polera=4 then 'L'
				 when p.Talla_Polera=5 then 'XL'
				 when p.Talla_Polera=6 then 'XXL'
				 when p.Talla_Polera=7 then 'XXXL'
				 end, '-') as talla_polera,
				 p.talla_calzado,
				 c.cargo,
				 l.local,
				 l.cadena,
				 tp.tipo_contrato,
				 convert(varchar,con.Fecha_Ingreso,105) as Fecha_Inicio,
				 convert(varchar,con.fecha_Retiro,105) as Fecha_Termino,
				 case 
				 when  datediff(month,con.Fecha_Ingreso,getdate())<12 then
				 datediff(month,con.Fecha_Ingreso,getdate())
				 when  datediff(month,con.Fecha_Ingreso,getdate())>=12 then
				 datediff(month,con.Fecha_Ingreso,getdate())/12 
				 end as Antiguedad, 
				  case 
				 when  datediff(month,con.Fecha_Ingreso,getdate())<12 then
				 datediff(month,con.Fecha_Ingreso,getdate())
				 when  datediff(month,con.Fecha_Ingreso,getdate())>=12 then
				 datediff(month,con.Fecha_Ingreso,getdate())/12 
				 end as Antiguedad_lineal, 
				 isnull(datediff(month,con.Fecha_Ingreso,con.Fecha_Retiro)*1.25,0) as vacaciones,
				 af.afp,
				 i.isapre as Prevision_Salud,
				 isnull(pa.fpago,'-') as fpago ,
				 isnull(b.Banco,'-') as banco,
				 isnull(con.ncuenta,'-') as ncuenta
				 --en.Celular,
				 --en.Tablet,
				 --en.Notebook,
				 --en.Credencial,
				 --en.Uniforme,
				 --en.EPP,
				 --en.Acceso_Club_360,
				 --en.Acceso_Cloud,
				 --en.Acceso_Intranet,
				 --en.Acceso_Apenet,
				 --cn.cant_cargasfamiliares as Cargas_Familiares,
				 --cn.fuero,
				 --cn.sala_cuna,
				 --cn.Prestamo_Caja
				 --en.obs_generales
				from SGI_Contratos con
				inner join SGI_EGrupo e on(con.id_egrupo=e.id_egrupo)
				inner join SGI_Clientes cli on(con.ID_Cliente=cli.ID_Cliente)
				inner join SRH_DatosContratadosNomina p on(con.rut=p.rut)
				inner join Usuarios u on(u.id_usuario=p.id_usuario)
				inner join SGI_Geo_Paises gp on(con.id_pais=gp.ID_Pais)
				inner join SGI_Estado_Civil ec on(con.ID_Estado_Civil=ec.ID_Estado_Civil)
				inner join SGI_Geo_Comunas co on(con.id_comuna=co.id_comuna)
				inner join SGI_Geo_Regiones re on(con.id_region=re.id_region)
				inner join SGI_Cargos c on(con.id_cargo=c.id_cargo)
				left join SGI_ContratosRutas cr on(con.ID_Contrato=cr.ID_Contrato)
				left join LocalesNomina l on(l.b2b=cr.id_local)
				inner join SGI_Tipo_Contratos tp on(tp.id_tipo_contrato=con.id_tipo_contrato)
				left join SGI_AFP af on(af.id_afp=con.id_afp)
				left join SGI_Isapres i on(i.id_isapre=con.id_salud)
				left join SGI_FPagos pa on(pa.id_fpago=con.id_fpago)
				left join SGI_Bancos b on(b.ID_Banco=con.ID_Banco)
				--left join Cargas_Nomina cn on(con.rut=cn.rut)
				--left join Entregas_Nomina en on(en.id_contrato=con.id_contrato)
				where cli.id_cliente=".$id_cliente;
        $res = $this->db->query($query);
        return $res->result_array();
	}
	
	function buscar_contratosusuario($id_usuario){
		$query="select 
				 case 
				 when con.fecha_ingreso<GETDATE() and getdate()<con.fecha_retiro-10 then 
				  'OK'
				 when getdate()>con.fecha_retiro-10 then 
				  'POR VENCER'
				when getdate()>con.fecha_retiro then 
				  'VENCIDO'
				 end as Estado_Actual,
				 e.egrupo ,
				 cli.cliente,
				 p.nombre_proyecto,
				 u.nombre+' '+u.ap_paterno as responsable,
				 p.rut,
				 p.ap_paterno,
				 p.ap_materno,
				 p.nombres,
				 p.nombres+' '+p.Ap_Paterno+' '+p.Ap_Materno as Nombre_Concatenar,
				 convert(varchar,p.fecha_nacimiento,105) as Fecha_Nacimiento,
				 case
				 when p.Genero=1 then 'Masculino' 
				 when p.Genero=2 then 'Femenino'
				 end as sexo,
				 gp.Nacionalidad,
				 ec.Estado_Civil,
				 p.Direccion,
				 co.comuna,
				 re.region,
				 isnull('+56'+p.Fono_Fijo,'-') as fijo,
				 p.fono_celular as celular,
				 p.email,
				 p.talla_pantalon,
				 isnull(case 
				 when p.Talla_Polera=1 then 'XS'
				 when p.Talla_Polera=2 then 'S'
				 when p.Talla_Polera=3 then 'M'
				 when p.Talla_Polera=4 then 'L'
				 when p.Talla_Polera=5 then 'XL'
				 when p.Talla_Polera=6 then 'XXL'
				 when p.Talla_Polera=7 then 'XXXL'
				 end, '-') as talla_polera,
				 p.talla_calzado,
				 c.cargo,
				 l.local,
				 l.cadena,
				 tp.tipo_contrato,
				 convert(varchar,con.Fecha_Ingreso,105) as Fecha_Inicio,
				 convert(varchar,con.fecha_Retiro,105) as Fecha_Termino,
				 case 
				 when  datediff(month,con.Fecha_Ingreso,getdate())<12 then
				 datediff(month,con.Fecha_Ingreso,getdate())
				 when  datediff(month,con.Fecha_Ingreso,getdate())>=12 then
				 datediff(month,con.Fecha_Ingreso,getdate())/12 
				 end as Antiguedad, 
				 case 
				 when  datediff(month,con.Fecha_Ingreso,getdate())<12 then
				 datediff(month,con.Fecha_Ingreso,getdate())
				 when  datediff(month,con.Fecha_Ingreso,getdate())>=12 then
				 datediff(month,con.Fecha_Ingreso,getdate())/12 
				 end as Antiguedad_lineal, 
				 isnull(datediff(month,con.Fecha_Ingreso,con.Fecha_Retiro)*1.25,0) as vacaciones,
				 af.afp,
				 i.isapre as Prevision_Salud,
				 isnull(pa.fpago,'-') as fpago ,
				 isnull(b.Banco,'-') as banco,
				 isnull(con.ncuenta,'-') as ncuenta
				 --en.Celular,
				 --en.Tablet,
				 --en.Notebook,
				 --en.Credencial,
				 --en.Uniforme,
				 --en.EPP,
				 --en.Acceso_Club_360,
				 --en.Acceso_Cloud,
				 --en.Acceso_Intranet,
				 --en.Acceso_Apenet,
				 --cn.cant_cargasfamiliares as Cargas_Familiares,
				 --cn.fuero,
				 --cn.sala_cuna,
				 --cn.Prestamo_Caja
				 --en.obs_generales
				from SGI_Contratos con
				inner join SGI_EGrupo e on(con.id_egrupo=e.id_egrupo)
				inner join SGI_Clientes cli on(con.ID_Cliente=cli.ID_Cliente)
				inner join SRH_DatosContratadosNomina p on(con.rut=p.rut)
				inner join Usuarios u on(u.id_usuario=p.id_usuario)
				inner join SGI_Geo_Paises gp on(con.id_pais=gp.ID_Pais)
				inner join SGI_Estado_Civil ec on(con.ID_Estado_Civil=ec.ID_Estado_Civil)
				inner join SGI_Geo_Comunas co on(con.id_comuna=co.id_comuna)
				inner join SGI_Geo_Regiones re on(con.id_region=re.id_region)
				inner join SGI_Cargos c on(con.id_cargo=c.id_cargo)
				left join SGI_ContratosRutas cr on(con.ID_Contrato=cr.ID_Contrato)
				left join LocalesNomina l on(l.b2b=cr.id_local)
				inner join SGI_Tipo_Contratos tp on(tp.id_tipo_contrato=con.id_tipo_contrato)
				left join SGI_AFP af on(af.id_afp=con.id_afp)
				left join SGI_Isapres i on(i.id_isapre=con.id_salud)
				left join SGI_FPagos pa on(pa.id_fpago=con.id_fpago)
				left join SGI_Bancos b on(b.ID_Banco=con.ID_Banco)
				--left join Cargas_Nomina cn on(con.rut=cn.rut)
				--left join Entregas_Nomina en on(en.id_contrato=con.id_contrato)
				where p.id_usuario=".$id_usuario;
        $res = $this->db->query($query);
        return $res->result_array();
    }
	
	function buscarcontratos(){
		$query="select 
				 case 
				 when con.fecha_ingreso<GETDATE() and getdate()<con.fecha_retiro-10 then 
				  'OK'
				 when getdate()>con.fecha_retiro-10 then 
				  'POR VENCER'
				when getdate()>con.fecha_retiro then 
				  'VENCIDO'
				 end as Estado_Actual,
				 e.egrupo ,
				 cli.cliente,
				 p.nombre_proyecto,
				 u.nombre+' '+u.ap_paterno as responsable,
				 p.rut,
				 p.ap_paterno,
				 p.ap_materno,
				 p.nombres,
				 p.nombres+' '+p.Ap_Paterno+' '+p.Ap_Materno as Nombre_Concatenar,
				 convert(varchar,p.fecha_nacimiento,105) as Fecha_Nacimiento,
				 case
				 when p.Genero=1 then 'Masculino' 
				 when p.Genero=2 then 'Femenino'
				 end as sexo,
				 gp.Nacionalidad,
				 ec.Estado_Civil,
				 p.Direccion,
				 co.comuna,
				 re.region,
				 isnull('+56'+p.Fono_Fijo,'-') as fijo,
				 p.fono_celular as celular,
				 p.email,
				 p.talla_pantalon,
				 isnull(case 
				 when p.Talla_Polera=1 then 'XS'
				 when p.Talla_Polera=2 then 'S'
				 when p.Talla_Polera=3 then 'M'
				 when p.Talla_Polera=4 then 'L'
				 when p.Talla_Polera=5 then 'XL'
				 when p.Talla_Polera=6 then 'XXL'
				 when p.Talla_Polera=7 then 'XXXL'
				 end, '-') as talla_polera,
				 p.talla_calzado,
				 c.cargo,
				 l.local,
				 l.cadena,
				 tp.tipo_contrato,
				 convert(varchar,con.Fecha_Ingreso,105) as Fecha_Inicio,
				 convert(varchar,con.fecha_Retiro,105) as Fecha_Termino,
				 case 
				 when  datediff(month,con.Fecha_Ingreso,getdate())<12 then
				 datediff(month,con.Fecha_Ingreso,getdate())
				 when  datediff(month,con.Fecha_Ingreso,getdate())>=12 then
				 datediff(month,con.Fecha_Ingreso,getdate())/12 
				 end as Antiguedad, 
				  case 
				 when  datediff(month,con.Fecha_Ingreso,getdate())<12 then
				 datediff(month,con.Fecha_Ingreso,getdate())
				 when  datediff(month,con.Fecha_Ingreso,getdate())>=12 then
				 datediff(month,con.Fecha_Ingreso,getdate())/12 
				 end as Antiguedad_lineal, 
				 isnull(datediff(month,con.Fecha_Ingreso,con.Fecha_Retiro)*1.25,0) as vacaciones,
				 af.afp,
				 i.isapre as Prevision_Salud,
				 isnull(pa.fpago,'-') as fpago ,
				 isnull(b.Banco,'-') as banco,
				 isnull(con.ncuenta,'-') as ncuenta
				 --en.Celular,
				 --en.Tablet,
				 --en.Notebook,
				 --en.Credencial,
				 --en.Uniforme,
				 --en.EPP,
				 --en.Acceso_Club_360,
				 --en.Acceso_Cloud,
				 --en.Acceso_Intranet,
				 --en.Acceso_Apenet,
				 --cn.cant_cargasfamiliares as Cargas_Familiares,
				 --cn.fuero,
				 --cn.sala_cuna,
				 --cn.Prestamo_Caja,
				 --en.obs_generales
				from SGI_Contratos con
				inner join SGI_EGrupo e on(con.id_egrupo=e.id_egrupo)
				inner join SGI_Clientes cli on(con.ID_Cliente=cli.ID_Cliente)
				inner join SRH_DatosContratadosNomina p on(con.rut=p.rut)
				inner join Usuarios u on(u.id_usuario=p.id_usuario)
				inner join SGI_Geo_Paises gp on(con.id_pais=gp.ID_Pais)
				inner join SGI_Estado_Civil ec on(con.ID_Estado_Civil=ec.ID_Estado_Civil)
				inner join SGI_Geo_Comunas co on(con.id_comuna=co.id_comuna)
				inner join SGI_Geo_Regiones re on(con.id_region=re.id_region)
				inner join SGI_Cargos c on(con.id_cargo=c.id_cargo)
				left join SGI_ContratosRutas cr on(con.ID_Contrato=cr.ID_Contrato)
				left join LocalesNomina l on(l.b2b=cr.id_local)
				inner join SGI_Tipo_Contratos tp on(tp.id_tipo_contrato=con.id_tipo_contrato)
				left join SGI_AFP af on(af.id_afp=con.id_afp)
				left join SGI_Isapres i on(i.id_isapre=con.id_salud)
				left join SGI_FPagos pa on(pa.id_fpago=con.id_fpago)
				left join SGI_Bancos b on(b.ID_Banco=con.ID_Banco)
				--left join Cargas_Nomina cn on(con.rut=cn.rut)
				--left join Entregas_Nomina en on(en.id_contrato=con.id_contrato)
				where cli.activo=1
				--and status_contrato='Firmado'
				and u.id_perfil=13";
        $consulta = $this->db->query($query);
        $resultado = $consulta->result_array();
        return $resultado;
   
    }

    function Rutas(){
    	$query="SELECT Local, b.Bandera, Nombre, r.Region, c.Comuna,Direccion from locales as l
inner join qGeo_comunas c on(l.ID_Comuna = c.ID_Comuna)
inner join SGI_Geo_Regiones r on ( l.ID_Region = r.ID_Region)
inner join Locales_Banderas b on ( l.ID_Bandera = b.ID_Bandera)";
    	$consulta = $this->db->query($query);
        $resultado = $consulta -> result_array();
        return $resultado;
    }
	
	function bono(){
    	$query="SELECT [ID_Bono]
      ,[Bono]
      ,[vigencia]
  FROM [dbo].[bonos] where VIGENCIA = 1 ";
    	$consulta = $this->db->query($query);
        $resultado = $consulta -> result_array();
        return $resultado;
    }
}
	
	
	
	
	
	
	
	
	
	












?>