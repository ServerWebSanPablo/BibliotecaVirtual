<?php
	ini_set('display_errors', true);
	error_reporting(E_ALL);
	require_once ('../Modelo/class.conexion.php');
	require_once ('../Modelo/class.consultas.php');
	$mensaje=null;
	$titulo=$_POST['titulo'];
	$autor=$_POST['autor'];
	$descripcion=$_POST['descripcion'];
	$nombreLibro=$_FILES['libro']['name'];
	$nombrePortada=$_FILES['portada']['name'];
	$tipoArchivoLibro=$_FILES['libro']['type'];
	$tipoArchivoPortada=$_FILES['portada']['type'];
	if(($tipoArchivoLibro=="application/msword"||$tipoArchivoLibro=="application/pdf"||$tipoArchivoLibro=="text/plain")&&($tipoArchivoPortada=="image/jpeg"||$tipoArchivoPortada=="image/png"))
	{
		if(strlen($titulo)>0&&strlen($autor)&&strlen($descripcion)>0&&strlen($nombreLibro)>0&&strlen($nombrePortada)>0)
        	{
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
			$consultas=new Consultas();
			$mensaje=$consultas->insertarLibro($titulo,$autor,$descripcion,$nombreLibro,$nombrePortada);
			echo $mensaje;
		}else
		{
			echo "Complete todos los campos <br>
			<form method='post' action='../../IngresarLibro.php'>
                        <input type='hidden' value='$titulo' name='titulo'>
                        <input type='hidden' value='$autor' name='autor'>
                        <textarea value='' name='descripcion' style='display:none;'>$descripcion</textarea>
                        <input type='submit' value='Volver al formulario' name='submit'>
                	</form>";

		}
	}else
	{
		echo "<p>Para el libro solo se aceptan archivos de Microsoft Word o PDF. Para la portada se  aceptan imagenes .jpg o .png.</p>
		<form method='post' action='../../IngresarLibro.php'>
			<input type='hidden' value='$titulo' name='titulo'>
			<input type='hidden' value='$autor' name='autor'>
			<textarea value='' name='descripcion' style='display:none;'>$descripcion</textarea>
			<input type='submit' value='Volver al formulario' name='submit'>
		</form>";
	}
?>

