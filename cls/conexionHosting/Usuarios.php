<?php

include_once("BaseDatos.php");

class Usuarios{
	var $usuario;
	var $clave;

	function __construct(){
		
	}

	function __destruct(){
	
	}

	function ValidarUsuario($usuario,$clave){
		$Conexion=new BaseDatos();
	    $datos=$Conexion->query("SELECT count(*) as N FROM usuarios WHERE user_usr='".$usuario."' and clave_usr=md5('".$clave."')");
		$fila=$datos->fetch_array(MYSQLI_ASSOC);
		if($fila["N"]=="1")
		{
			session_start();
			$_SESSION["usuario"]=$usuario;
		
		}
		echo $fila["N"];	
	}
	/*function ValidarPermiso($usuario,$permiso){
		$Conexion=new BaseDatos();
	    $datos=$Conexion->query("SELECT count(*) as N FROM opcionesporusuario WHERE usuario='".$usuario."' and opcion=('".$permiso."')");
		$fila=$datos->fetch_array(MYSQLI_ASSOC);
		return $fila["N"];	
	}*/

}
?>