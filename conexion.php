<?php
class conexion
{
	public static function f_conexion()
	{
		$nombre_BD='transpu';
		$contraseña='';
		$server='localhost';
		$usuario='root';
		$con=mysqli_connect($server, $usuario, $contraseña) or die ("ERROR: Se produjo un error al conectar con la base de datos. Reportelo con el Áre de TIC".mysqli_error());
		mysqli_select_db($con, $nombre_BD);
		return $con;
	}


} 


/* 
include("../modelo/conexion.php");
$conectar=conexion::f_conexion();
echo "PERFECTO";
*/
 ?>
 
