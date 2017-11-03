<?php
	function cargar()
	{
		ini_set('display_errors', true);
		error_reporting(E_ALL);
		//require_once("../Modelo/class.conexion.php");
		//require_once("../Modelo/class.consultas.php");
		$consultas=new Consultas();
		$filas=$consultas->cargarLibros();
		$cont=1;
		echo "<table><tr>";
		while($fila=$filas->fetch_object())
		{
			echo "<td>
			<img src='../../portadas/".$fila->nombrePortada."' alt='No se pudo mostrar' height='300px' width='200px' style='margin-left:100px;margin-top:50px;'><br>
			<h4>Título: ".$fila->titulo."</h4> 
                        <h5>Autor: ".$fila->autor."</h5>  
                        <p>Descripción: ".$fila->descripcion."<p>
			<a href='../../libros/".$fila->nombreLibro."'>Descargar</a><br>
			</td>";
			if($cont%2==0)
			{
				echo "</tr>";
			}
			$cont+=1;
		}
		if($cont%2==0)
		{
			echo "<td></td></tr>";
		}
		echo "</table>";
	}
	cargar();
?>
