t<?php 
	ini_set('display_errors', true);
        error_reporting(E_ALL);
        $done = false;
        require_once("php/Modelo/class.conexion.php");
        require_once("php/Modelo/class.consultas.php");
        $modelo=new Conexion();
	$conexion=$modelo->get_conexion();
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['envio']) {
		$usu=strip_tags($_POST['nombre']);
        	$pass=strip_tags($_POST['password']);
	        $contra_encript=password_hash($pass,PASSWORD_DEFAULT);
		$type=strip_tags($_POST['tipo']);
        	$sql="insert into Usuarios (usuario,contrasenia,tipo) values (?,?,?)";
		$statement=$conexion->prepare($sql);
		$statement->bind_param('sss',$usu,$contra_encript,$type);
		if($statement->execute()==true)
		{
			$done=true;
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
		</div>
		<?php if($done==false){ ?>
		<div class="container-f">
			<div class="jumbotron">		
				<div class="form-group">
					<form method="POST" action="Registrar.php">
						<center>
							<legend class="color"><strong> ¿Desea obtener más funcionalidades? ¡Registrese! </strong></legend>
							<mark>Las mismas dependerán del tipo de sesión registrada</mark><br><br>
								<label class="form-control" for="nom">Nombre de usuario</label>					
								<input required="required" class="form-control" type="text" name="nombre" placeholder="Usuario" id="nom" required="required">
								<br>
								<label class="form-control" for="cont">Contraseña</label>
								<input required="required" class="form-control" type="password" name="password" placeholder="Contraseña" id="cont" required="required">
								<br>
								<select required="required" class="form-control" name="tipo" id="gen">
                                                                        <option value="">(seleccione el tipo de cuenta)</option>
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
									<option value="Bibliotecario">Bibliotecario (Permisos completos)</option>
                                                                </select><br>
								<input class="btn" type="submit" value="registrarse" name="envio">
						</center>
					</form>
				</div>
			</div>
		</div>
		<?php } else { ?>
		<center><legend class="bg-success"><strong>!Usuario creado¡ <a href="Registrar.php">Crear otro</a></strong></legend></center>
		<?php } ?>
		<div  class="container-f">
			<div class="jumbotron">
			<h2  class="text-right"><small> Ante cualquier problema o duda consultar los alumnos de 6°to año, informática.<small></h2>
			</div>
		</div>
	</div>		
</body>
</html>
