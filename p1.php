<?php
$cod=trim($_POST['cod']);
include_once("conexion.php");
		$conectar = conexion::f_conexion();
		$acentos = mysqli_query($conectar, "SET NAMES 'utf8'");
		$query = "SELECT * FROM chofer WHERE codCho=$cod";

        $ejecutar = mysqli_query($conectar, $query);
        $row=mysqli_fetch_assoc($ejecutar);
        $nom=$row['nomCho'];
        
		echo $nom;