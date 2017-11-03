<?php
	echo "Hola";
	ini_set('display_errors', true);
	error_reporting(E_ALL);
	require_once ('../Modelo/class.conexion.php');
	require_once ('../Modelo/class.consultas.php');
	$mensaje=null;
	$titulo=$_POST['titulo'];
	$descripcion=$_POST['descripcion'];
	$nombreLibro=$_FILES['libro']['name'];
	$nombrePortada=$_FILES['portada']['name'];
	echo "Hola";
	$dir_subida="../../libros/";
	$fichero_subido=$dir_subida.basename($_FILES['libro']['name']);
        echo '<pre>';
        if (move_uploaded_file($_FILES['libro']['tmp_name'], $fichero_subido)) {
                echo "El libro es válido y se subió con éxito.\n";
        } else {
                echo "Fallo la subida.\n";
        }
        print "</pre>";
        $dir_subidaP = "../../portadas/";
        $fichero_subidoP = $dir_subidaP . basename($_FILES['portada']['name']);
        echo '<pre>';
        if (move_uploaded_file($_FILES['portada']['tmp_name'], $fichero_subidoP)) {
                echo "La imagen es válida y se subió con éxito.\n";
        } else {
            echo "Fallo la subida.\n";
        }
	if(strlen($titulo)>0&&strlen($descripcion)>0&&strlen($nombreLibro)>0&&strlen($nombrePortada)>0)
	{
		$consultas=new Consultas();
		$mensaje=$consultas->insertarProducto($titulo,$descripcion,$nombreLibro,$nombrePortada)
	}else
	{
		echo "Por favor completa todos los campos";
	}
	echo $mensaje;
?>
