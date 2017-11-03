<?php

	class Conexion{
		public function get_conexion(){
			ini_set('display_errors', true);
			error_reporting(E_ALL);
			$user="root";
			$pass="hola*147";
			$host="localhost";
			$db="Libros";
			$conexion=new mysqli($host,$user,$pass,$db);
			if ($conexion->connect_errno) {
    				printf("Falló la conexión: %s\n", $conexion->connect_error);
    				exit();
			}
			return $conexion;
		}
	}
?>
