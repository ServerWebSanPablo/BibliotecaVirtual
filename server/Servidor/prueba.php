<?php
$titulo=$_POST['titulo'];
$descripcion=$_POST['descripcion'];
$nombreLibro=$_FILES['libro']['name'];
$nombrePortada=$_FILES['portada']['name'];
$dir_subida = '/var/www/libros/';
$fichero_subido = $dir_subida . basename($_FILES['libro']['name']);
echo '<pre>';
if (move_uploaded_file($_FILES['libro']['tmp_name'], $fichero_subido)) {
    echo "El libro es válido y se subió con éxito.\n";
} else {
    echo "Fallo la subida.\n";
}
print "</pre>";
$dir_subidaP = '/var/www/portadas/';
$fichero_subidoP = $dir_subidaP . basename($_FILES['portada']['name']);
echo '<pre>';
if (move_uploaded_file($_FILES['portada']['tmp_name'], $fichero_subidoP)) {
    echo "La imagen es válida y se subió con éxito.\n";
} else {
    echo "Fallo la subida.\n";
}
print "</pre>";
try{
	$conexion = new PDO('mysql:host=localhost;dbname=Libros', "root", "PokeMySQL101");
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	    die( "Unable to connect: " . $e->getMessage() . '<br><a href="form.html">Volver al formulario</a>');
}
$sql="insert into  Datos (titulo,descripcion,nombreLibro,nombrePortada) values(:titulo, :descripcion, :nombreLibro,:nombrePortada)";
$statement=$conexion->prepare($sql);
$statement->bindParam(':titulo',$titulo);
$statement->bindParam(':descripcion',$descripcion);
$statement->bindParam(':nombreLibro',$nombreLibro);
$statement->bindParam(':nombrePortada',$nombrePortada);
if(!$statement)
{
	die('Error al crear el registro.<br><a href="form.html">Volver al formulario</a>');
}else
{
	$statement->execute();
	die('Registro creado correctamente.<br><a href="form.html">Volver al formulario</a>');
}
?>
