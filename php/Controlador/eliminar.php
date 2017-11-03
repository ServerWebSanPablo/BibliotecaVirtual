<?php
	ini_set('display_errors', true);
        error_reporting(E_ALL);
        require_once ('../Modelo/class.conexion.php');
        require_once ('../Modelo/class.consultas.php');
	$mensaje=true;
	$consultas=new Consultas();
	foreach($_REQUEST as $id=>$valor)
	{
		if($consultas->eliminarLibro($id)==false)
		{
			$mensaje=false;
		}
	}
	if($mensaje==true)
	{
		echo "Libro/s eliminado/s correctamente\n";
	}else
	{
		echo "Error al eliminar alguno de los libros\n";
	}
	?>
	<br><br>	
	<a href="../../remover.php">Regresar</a>
