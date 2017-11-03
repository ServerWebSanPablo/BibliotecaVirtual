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
                <div class=="page-header" style="padding-bottom:0;margin:0;border-bottom:0;">
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
			<?php if(isset($_SESSION['logueado'])&&$_SESSION['logueado']==true&&$_SESSION['tipo']=="Bibliotecario")
                        {?>
                        <a href="Biblioteca.php" class="btn btn-primary">Agregar un libro</a>
			<a href="remover.php" class="btn btn-primary">Eliminar un libro</a>
			<?php } ?>
                </div>
                <div class="container-f">
                        <div class="jumbotron">         
                                <div class="form-group">
					<?php
					if(isset($_SESSION['logueado'])&&isset($_SESSION['tipo']))
					{
						function cargar()
						{
								ini_set('display_errors', true);
								error_reporting(E_ALL);
								$consultas=new Consultas();
								if($_SESSION['tipo']=="Bibliotecario")
								{
									$filas=$consultas->cargarTodos();
								}else
								{
									$filas=$consultas->cargarLibros($_SESSION['tipo']);
								}
								$cont=1;?>
								<table class="table-bordered" style="width:100%;"><tr>
								<?php
								$numFilas=mysqli_num_rows($filas); 
								if($numFilas!=0)
								{
								while($fila=$filas->fetch_object())
								{ ?>
									<td style="padding:10px;width:50%;" class="active">
									<div style="width:100%;text-align:center;">
										<img class="img-thumbnail" src="../../portadas/<?php echo $fila->nombrePortada ?>"' alt="No se pudo mostrar" height="300px" width="200px"><br>
									</div>
									<h3><small><strong>Título: <?php echo $fila->titulo ?></strong></small></h4> 
						                        <h4><small><strong>Autor:</strong> <?php echo $fila->autor ?></small></h5>  
						                        <p style="font-size:1em;"><strong>Descripción:</strong> <?php echo $fila->descripcion ?><p>
									<a href="../../libros/<?php echo $fila->nombreLibro ?>" class="bg-success">[Descargar]</a><br>
									</td>
									<?php if($cont%2==0)
									{ ?>
									</tr>
								  <?php }
									$cont+=1;
								}
								if($cont%2==0) 
								{ ?>
									<td></td></tr>
					      		<?php } ?>
								</table>
							<?php }else
							     { ?>
								<h2><center><strong>Nada que mostrar</strong></center></h2>
								<table></table>
							     <?php }
						}
						cargar();
				}else
				{ ?>
					<center>
					<p><strong>Debes tener una sesión iniciada para poder ver los libros</strong></p>
			 		<a href="../../Login.php">Iniciar Sesión</a>
					</center>	
				<?php }
				?>
			</div>
		</div>
	</div>
	<div  class="container-f">
		<div class="jumbotron">
		<h2  class="text-right"><small> Ante cualquier problema o duda consultar los alumnos de 6°B</small></h2>
        </div>
	</div>
	</div>
</body>
</html>
