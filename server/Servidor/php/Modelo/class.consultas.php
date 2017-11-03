<?php
	class Consultas{

		public function insertarLibro($arg_titulo,$arg_autor,$arg_descripcion,$arg_nombreLibro,$arg_nombrePortada)
		{
			$modelo=new Conexion();
			$conexion=$modelo->get_conexion();
			$sql="insert into  Datos (titulo,autor,descripcion,nombreLibro,nombrePortada) values(?,?,?,?,?)";
			$statement=$conexion->prepare($sql);
			$statement->bind_param('sssss',$arg_titulo,$arg_autor,$arg_descripcion,$arg_nombreLibro,$arg_nombrePortada);
			if($statement->execute())
			{
        			return "Registro creado correctamente";
			}else
			{
        			return "Error al crear el registro";
			}
			$statement->close();
		} 

		public function cargarLibros()
		{
			$modelo=new Conexion();
			$conexion=$modelo->get_conexion();
			$results=$conexion->query("select * from Datos");
			return $results;
		}

		public function buscarUsuario($arg_usuario,$arg_contra)
		{
			$rows=null;
			$modelo=new Conexion();
			$conexion=$modelo->get_conexion();
			$results=$conexion->query("select * from Usuarios");
			while($rows=$results->fetch_object())
			{
				if($rows->usuario==$arg_usuario&&$rows->contrasenia==$arg_contra)
				{
					return true;
				}
			}
			return false;
		}

	}

?>
