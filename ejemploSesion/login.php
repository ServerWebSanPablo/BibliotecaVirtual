<?php
	session_start();

	$error = false;
	require_once("../php/Modelo/class.conexion.php");
	require_once("../php/Modelo/class.consultas.php");
	$consultas=new Consultas();
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['envio']) {
		if ($consultas->buscarUsuario($_POST['nombreUsuario'],$_POST['contrasenia'])) {
			session_destroy();
			session_start();
			$_SESSION['logueado'] = true;
		} else {
			$_SESSION['logueado'] = false;
			$error = true;
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Prueba de Inicio de Sesión</title>
	<meta charset="utf-8">
</head>
<body>
	<?php if ($_SESSION['logueado'] == false) { ?>
	<h1>Formulario de inicio de sesión</h1>
	<form method="POST" action="login.php">
		<div>
			<label for="nombreUsuario">Nombre de usuario</label>
			<input type="text" name="nombreUsuario" id="nombreUsuario" value="" placeholder="Nombre de usuario">
		</div>
		<div>
			<label for="contrasenia">Contraseña</label>
			<input type="password" name="contrasenia" id="contrasenia" value="" placeholder="Contraseña">
		</div>
		<div>
			<input type="submit" value="Iniciar sesión" name="envio">
		</div>
		<div style="<?php if ($error == false) { ?> display: none; <?php } ?>color: red; font-weight: bold;">
			</p>Nombre de usuario o contraseña incorrectos.</p>
		</div>
	</form>
	<?php } else { ?>
		<h1>Sesión iniciada correctamente.</h1>
		<a href="logout.php">Haga click para cerrar sesión</a>
	<?php } ?>
</body>
</html>
