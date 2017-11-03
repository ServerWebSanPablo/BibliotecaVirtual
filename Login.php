<?php 

	session_start();
        $error = false;
        require_once("php/Modelo/class.conexion.php");
        require_once("php/Modelo/class.consultas.php");
        $consultas=new Consultas();
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['envio']) {
                if ($consultas->buscarUsuario(strip_tags($_POST['nombre']),strip_tags($_POST['password']))) {
                        session_destroy();
                        session_start();
                        $_SESSION['logueado'] = true;
			$_SESSION['tipo']=$consultas->getTipo(strip_tags($_POST['nombre']),strip_tags($_POST['password']));
			$_SESSION['nombre']=strip_tags($_POST['nombre']);
			header("location:verlibros.php");
                } else {
                        $_SESSION['logueado'] = false;
                        $error = true;
                }
        }
	

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
			<a href="verlibros.php" class="btn btn-primary">Acceder a nuestros documentos</a>
			<?php if(isset($_SESSION['logueado'])&&$_SESSION['logueado']==true&&$_SESSION['tipo']=="Bibliotecario")
                        {?>
			<a href="Biblioteca.php" class="btn btn-primary">Agregar un libro </a>
			<?php } ?>
		</div>
		<?php if($_SESSION['logueado']==false){ ?>
		<div class="container-f">
			<div class="jumbotron">		
				<div class="form-group">
					<form method="post" action="Login.php">
						<center>
							<legend class="color"><strong> ¿Desea obtener más funcionalidades? ¡Inicie sesión! </strong></legend>
							<mark>Las mismas dependerán del tipo de sesión iniciada</mark><br><br>
								<label class="form-control" for="nom">Nombre de usuario</label>					
								<input class="form-control" type="text" name="nombre" placeholder="Usuario" id="nom" required="required">
								<br>
								<label class="form-control" for="cont">Contraseña</label>
								<input class="form-control" type="password" name="password" placeholder="Contraseña" id="cont" required="required">
								<br>
								<input class="btn" type="submit" value="Iniciar Sesión" name="envio" style="background-color:#CCC;">
						</center>
						<p class="bg-danger" class="text-center" style="<?php if($error==false){?>display:none;<?php } ?>">Datos de inicio incorrectos</p>
					</form>
				</div>
			</div>
		</div>
		<?php } else { ?>
		<center><legend class="bg-success"><strong>Ya ha iniciado sesión. ¿Desea cerrar sesión? ¡Haga <a href="logout.php">click aquí!</a></strong></legend></center>
		<?php } ?>
		<div  class="container-f">
			<div class="jumbotron">
			<h2  class="text-right"><small> Ante cualquier problema o duda consultar los alumnos de 6°to año, informática.<small></h2>
			</div>
		</div>
	</div>		
</body>
</html>
