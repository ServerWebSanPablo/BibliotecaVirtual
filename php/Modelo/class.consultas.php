<?php
	class Consultas{

		public function insertarLibro($arg_titulo,$arg_autor,$arg_descripcion,$arg_nombreLibro,$arg_nombrePortada,$arg_curso)
		{
			$modelo=new Conexion();
			$conexion=$modelo->get_conexion();
			$sql="insert into  Datos (titulo,autor,descripcion,nombreLibro,nombrePortada,curso) values(?,?,?,?,?,?)";
			$statement=$conexion->prepare($sql);
			$statement->bind_param('ssssss',$arg_titulo,$arg_autor,$arg_descripcion,$arg_nombreLibro,$arg_nombrePortada,$arg_curso);
			if($statement->execute()==true)
			{
        			return true;
			}else
			{
        			return false;
			}
			$statement->close();
		} 
		public function eliminarLibro($arg_id)
		{
			$modelo=new Conexion();
			$conexion=$modelo->get_conexion();
			$sql="delete from Datos where indice=?";
			$statement=$conexion->prepare($sql);
			$statement->bind_param('i',$arg_id);
			if($statement->execute()==true)
			{
				return "Libro eliminado correctamente";
			}else
			{
				return "Error al eliminar";
			}
		}
		public function cargarLibros($arg_tipo)
		{
			$modelo=new Conexion();
			$conexion=$modelo->get_conexion();
			$sql="select * from Datos where curso='?'";
			$statement=$conexion->prepare($sql);
			$statement->bind_param('s',$arg_tipo);
			$results=$statement->execute();
			return $results;
		}
		public function cargarTodos()
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
				if($rows->usuario==$arg_usuario&&password_verify($arg_contra,$rows->contrasenia)==true)
				{
					return true;
				}
			}
			return false;
		}

		public function getTipo($arg_usuario,$arg_contra)
		{
			$rows=null;
			$modelo=new Conexion();
			$conexion=$modelo->get_conexion();
			$results=$conexion->query("select * from Usuarios");
			while($rows=$results->fetch_object())
			{
				if(password_verify($arg_contra,$rows->contrasenia)==true)
				{
					return $rows->tipo;
				}
			}
		}

		public function crearUsuario($arg_usuario,$arg_contra)
		{
			$modelo=new Conexion();
			$conexion=$modelo->get_conexion();
			$contra=password_hash($arg_contra,PASSWORD_DEFAULT);
			$sql="insert into Usuarios (usuario,contrasenia) values (?,?)";
			$statement=$conexion->prepare($sql);
			$statement_>bind_param('ss',$arg_usuario,$contra);
			$statement->execute();
		}

	}

?>
