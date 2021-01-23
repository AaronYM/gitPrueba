<?php
$cadena='';
include_once("conexion.php");
		$conectar = conexion::f_conexion();
		$acentos = mysqli_query($conectar, "SET NAMES 'utf8'");
		$query = "SELECT * FROM chofer";

        $ejecutar = mysqli_query($conectar, $query);
        for($i=0;$row=mysqli_fetch_assoc($ejecutar);$i++)
        {
            $cadena=$cadena.$row['nomCho'];
        }
        
        $
		return $ejecutar;