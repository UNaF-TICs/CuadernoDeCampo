<?php
/*
Finca: Funciones ABM y de recuperación de datos de fincas.
*/
require_once "../../../php/check.php";
include_once "../../../lib/link_mysql.php";
require_once "../../../php/funciones_comunes.php";
include_once "abm_finca.php";
include_once "../../control/php/abm_control.php";

//Campo Obligatorio
$modulo_actual="finca"; // Poner Nombre del Modulo Actual
//Para el Control

// tabla_63_tbl_finca
$id_tabla63=isset($_POST['id_tabla63']) ? intval($_POST['id_tabla63']) : NULL;
$rela_tabla70_finca=isset($_POST['rela_tabla70_finca']) ? intval($_POST['rela_tabla70_finca']) : NULL;
$rela_tabla70_titular=isset($_POST['rela_tabla70_titular']) ? intval($_POST['rela_tabla70_titular']) : NULL;
$rela_tabla67=isset($_POST['rela_tabla67']) ? intval($_POST['rela_tabla67']) : NULL;	// entidad certificadora
$tabla63_tiporepresentante=isset($_POST['tabla63_tiporepresentante']) ? strval($_POST['tabla63_tiporepresentante']) : '';
$tabla63_entidadcertificadora=isset($_POST['tabla63_entidadcertificadora']) ? strval($_POST['tabla63_entidadcertificadora']) : '';
$tabla63_areatotal=isset($_POST['tabla63_areatotal']) ? strval($_POST['tabla63_areatotal']) : '';

$nombre_funcion=isset($_POST['nombre_funcion']) ? strval($_POST['nombre_funcion']) : '';

switch ($nombre_funcion) {
	case "agregar_finca":
		$id_res=agregar_finca($rela_tabla70_fincaa,$rela_tabla70_titular,$rela_tabla67,$tabla63_tiporepresentante,$tabla63_entidadcertificadora,$tabla63_areatotal,$pdo);
		$vexplode=explode("-",$id_res);
		$mensaje=$vexplode[1];
		echo $mensaje ;
		break;
	case "borrar_finca":
		$id_res=borrar_finca($id_tabla63,$pdo);
		$vexplode=explode("-",$id_res);
		$mensaje=$vexplode[1];
		echo $mensaje ;
		break;
	case "modificar_finca":
		$id_res=modificar_finca($id_tabla63,$rela_tabla70_finca,$rela_tabla70_titular,$rela_tabla67,$tabla63_tiporepresentante,$tabla63_entidadcertificadora,$tabla63_areatotal,$pdo);
		$vexplode=explode("-",$id_res);
		$mensaje=$vexplode[1];
		echo $mensaje ;
		break;
	default:
		phpConsoleLog("No encuentra ".$nombre_funcion);
}
$datos="";
$datos.="id_tabla63<@n:> $id_tabla63<@n>";
$datos.="rela_tabla67<@n:> $rela_tabla67<@n>";
$datos.="rela_tabla70_finca<@n:> $rela_tabla70_finca<@n>";
$datos.="rela_tabla70_titular<@n:> $rela_tabla70_titular<@n>";
$datos.="tabla63_tiporepresentante<@n:> $tabla63_tiporepresentante<@n>";
$datos.="tabla63_entidadcertificadora<@n:> $tabla63_entidadcertificadora<@n>";
$datos.="tabla63_areatotal<@n:> $tabla63_areatotal<@n>";

//agregar_log("ABM",$nombre_funcion,$vsplit[1],$datos,$modulo_actual,$link_mysql);

?>
