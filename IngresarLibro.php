<?php

	$titulo=$_POST['titulo'];
	$autor=$_POST['autor'];
	$descripcion=$_POST['descripcion'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
        <title>Biblioteca Virtual</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="img/li.png">
</head>
<body>
	<div class="container">
                <div class=="page-header">
                        <img src="img/li.png" height="67" width="67" class="titulo" alt="Error">
                        <h1 class="titulo"><em>Biblioteca Virtual</em></h1>
                        <div id="cajaBoba"></div>
                </div>
                <div class="btn-group btn-group-justified">
                        <a href="verlibros.php" class="btn btn-primary">Acceder a nuestros documentos</a>
			<a href="index.html" class="btn btn-primary">Inicio</a>
                </div>
		<div class="container-f">
                        <div class="jumbotron">         
                                <div class="form-group">
					<form action="php/Controlador/insertar.php"  method="post" enctype="multipart/form-data">
						<fieldset>
							<legend>Subir un libro</legend>
							<div id="nombres">
							Título: <input type="text" value=<?php echo "'$titulo'"; ?> name="titulo"><br><br>
							Nombre del autor: <input type="text" value=<?php echo "'$autor'"; ?> name="autor"><br><br>
							</div>
							Descripción:<br>
							<textarea value="" placeholder="Escriba aquí..." name="descripcion" cols="30" rows="10" style="margin: 0px; width: 371px; height: 350px;"><?php echo $descripcion ?></textarea><br><br>
							Archivo: <input type="file" value="" name="libro"><br><br>
							Portada: <input type="file" value="" name="portada"><br><br>
							<div id="botones">
							Curso: <input type="text" value="" name="curso"><br><br>	
							<input type="submit" value="Subir" name="submit" >
							<input type="reset" value="Limpiar" name="reset">
							</div>	
						</fieldset>
					</form>
				</div>
			</div>
			<div  class="container-f">
                        	<div class="jumbotron">
                        		<h2  class="text-right"><small> Ante cualquier problema o duda consultar los alumnos de 6°$
                        	</div>
               		</div>
		</div>
</body>
</html>
