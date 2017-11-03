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
			<a href="verlibros.php" class="btn btn-primary">Acceder a nuestros documentos</a>
			<?php if(isset($_SESSION['logueado'])&&$_SESSION['logueado']==true&&$_SESSION['tipo']=="Bibliotecario")
			{?>
			<a href="Biblioteca.php" class="btn btn-primary">Agregar un libro</a>
			<a href="remover.php" class="btn btn-primary">Eliminar un libro</a>
			<?php } ?>
			</div>
			<div class="container-f">
				<div class="jumbotron">
					<h1 class="text-center"><strong>¡Bienvenidos!</strong></h1>
					<p><strong>Este espacio está dedicado a que todos podamos acceder al contenido de los libros utilizados de forma rápida, sencilla y eficaz.</strong></p>
					<p><em>Antes de utilizar las funcionalidades que ofrece la página debera iniciar sesión previamente.</em><a href="Login.php" class="bg-success">[iniciar sesión]</a></p>
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
