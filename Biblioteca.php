<?php session_start(); ?>
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
		<div class="page-header" style="padding-bottom:0;margin:0;border-bottom:0;">
			<?php 
                                if(isset($_SESSION['logueado']))
                                {
                                        if($_SESSION['logueado']==true)
                                        {?>
                                                <p style="text-align:right"><?php echo "{$_SESSION['nombre']}\t"; ?><a href="logout.php">Cerrar sesión</a></p>
                                        <?php }
                                }else
                                {?>
                                        <p style="text-align:right"><a href="Login.php">Iniciar sesión</a></p>
                                <?php } ?>
			<img src="img/li.png" height="67" width="67" class="titulo" alt="Error">
			<h1 class="titulo"><em>Biblioteca Virtual</em></h1>
			<div id="cajaBoba"></div>
		</div>
		<div class="btn-group btn-group-justified">
			<a href="index.php" class="btn btn-primary">Inicio</a>
			<a href="verlibros.php" class="btn btn-primary">Acceder a nuestros documentos</a>
			<a href="remover.php" class="btn btn-primary">Eliminar un libro</a>
		</div>
			<div class="container-f">
				<div class="jumbotron">
				<p class="bg bg-info"><strong>Complete los datos del siguiente formulario indicando la información del libro que desea subir y el curso al que pertenece</strong></p>
					<div class="form-group">
						<form method="POST" action="php/Controlador/insertar.php" enctype="multipart/form-data">
							<div>
								<div>
								<label class="form-control" for="nom">Título</label>
								<input required="required" class="form-control" type="text" name="titulo" value="" id="nom" placeholder="El tunel"><br>
								<label class="form-control" for="autor">Nombre del autor</label>
								<input required="required" class="form-control" type="text" name="autor" value="" id="autor" placeholder="Ernesto Sabato"><br>
								<label class="form-control" for="desc">Descripción</label>
								<textarea  required="required" class="form-control" value="" id="desc" placeholder="Escriba aquí..." name="descripcion" style="width:371px;height:350px;"></textarea><br>
								<label class="form-control" for="gen">Curso</label>	
								<select required="required" class="form-control" name="curso" id="gen">
									<option value="">(seleccione el curso)</option>
									<option value="1A">1°A</option>
									<option value="1B">1°B</option>
									<option value="2A">2°A</option>
									<option value="2B">2°B</option>
									<option value="3A">3°A</option>
									<option value="3B">3°B</option>
									<option value="4A">4°A</option>
									<option value="4B">4°B</option>
									<option value="5A">5°A</option>
									<option value="5B">5°B</option>
									<option value="6A">6°A</option>
									<option value="6B">6°B</option>
									<option value="7A">7°A</option>
									<option value="7B">7°B</option>
								</select><br>
								<label class="form-control" for="libr">Archivo</label>
								<input required="required" type="file" value="" name="libro" id="libr"><br><br>
								<label class="form-control" for="port">Portada</label>
								<input required="required" type="file" value="" name="portada" id="port"><br>
								<input class="btn" style="background-color:#CCC;" type="submit" value="Agregar" class= "deingreso">
								<input class="btn" style="background-color:#CCC;" type="reset" value="Limpiar campos" class= "deingreso">
								</div>
							</div>
						</form>
					</div>
			</div>
		</div>
		<div  class="container-f">
			<div class="jumbotron">
			<h2  class="text-right"><small> Ante cualquier problema o duda consultar los alumnos de 6°to año, informática.<small></h2>
			</div>
		</div>
</div>	
</body>
</html>
