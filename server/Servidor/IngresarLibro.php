<?php

	$titulo=$_POST['titulo'];
	$autor=$_POST['autor'];
	$descripcion=$_POST['descripcion'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Biblioteca Virtual</title></head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="shortcut icon" href="img/li.png">
</head>
<body>
	<div id="Presentacion1">
			<div id="Nombredelainstitucion">
				<img src="img/li.png" height="67" width="67" class="titulo" alt="Error">
				<h1 class="titulo"><em>Biblioteca Virtual</em></h1>
				<div id="cajaBoba"></div>
			</div>
	</div>
	<div id="barraDeLogeo2"  class="form">
		<form action="php/Controlador/insertar.php"  method="post" enctype="multipart/form-data">
			<fieldset>
				<legend>Subir un libro</legend>
				<div id="nombres">
				Título: <input type="text" value=<?php echo "'$titulo'"; ?> name="titulo" class="deingreso3"><br><br>
				Nombre del autor: <input type="text" value=<?php echo "'$autor'"; ?> name="autor" class="deingreso3"><br><br>
				</div>
				Descripción:<br>
				<textarea class="deingreso3" value="" placeholder="Escriba aquí..." name="descripcion" cols="30" rows="10" style="margin: 0px; width: 371px; height: 350px;"><?php echo $descripcion ?></textarea><br><br>
				Archivo: <input type="file" value="" name="libro"><br><br>
				Portada: <input type="file" value="" name="portada"><br><br>
				<div id="botones">	
					<input type="submit" value="Subir" name="submit" class= "deingreso">
					<input type="reset" value="Limpiar" name="reset" class= "deingreso">
				</div>	
			</fieldset>
			
		</form>
	</div>	
</body>
</html>
