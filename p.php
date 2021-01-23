<?php
$cadena='';
$array=array();
$busqueda=$_POST['busqueda'];
include_once("conexion.php");
		$conectar = conexion::f_conexion();
		$acentos = mysqli_query($conectar, "SET NAMES 'utf8'");
		$query = "SELECT * FROM solicitante WHERE nomComSol like '%".$busqueda."%'";

        $ejecutar = mysqli_query($conectar, $query);
        for($i=0;$row=mysqli_fetch_assoc($ejecutar);$i++)
        {   
            array_push($array,$row['nomSol']);
            $cadena=$cadena."<tr>
            <td><a  href='javascript: buscar(".$row['codSol'].")' style='text-decoration:none; color:black;display:block;
            width:100%;
            height:100%;border-bottom: 1px solid #ccc;'>".$row['nomComSol']."</a></td>
          </tr>";
            
        }
        if(count($array)==0)
        {
            $cadena='No se encontraron resultados';
        }
        
        
		echo $cadena;