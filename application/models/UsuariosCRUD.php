<?php
	class UsuariosCRUD extends CI_Model {
		function __construct()
	    {
	        // Call the Model constructor
	        parent::__construct();
		}
		function getEmail($email){
			$q = $this->db->query('select 
										usuarios.id,
										usuarios.id_rol,
										usuarios.nombre as nombre_usuario,
										usuarios.apellido as apellido_usuario,
										usuarios.usuario,
										usuarios.password as pass,
										usuarios.email as email	
									from
										usuarios
									where
										usuarios.fecha_baja is null
									and
										usuarios.email="'.$email.'";');
	    	return $q->result();
		}
	    function getUsuarios(){
	    	$q = $this->db->query('select 
										usuarios.id,
										usuarios.id_rol,
										roles.nombre as nombre_rol,
										usuarios.nombre as nombre_usuario,
										usuarios.apellido as apellido_usuario,
										usuarios.usuario,
										usuarios.password as pass,
										usuarios.email as email	
									from
										usuarios
									inner join
										roles
									on
										usuarios.id_rol = roles.id
									where
										usuarios.fecha_baja is null;');
	    	return $q->result();
	    }
	    function getUsuariosLogin($usuario, $pass){
	    	$q = $this->db->query('select 
										usuarios.id,
										usuarios.id_rol,
										roles.nombre as nombre_rol,
										usuarios.nombre as nombre_usuario,
										usuarios.apellido as apellido_usuario,
										usuarios.usuario,
										usuarios.password as pass,
										usuarios.email as email	
									from
										usuarios
									inner join
										roles
									on
										usuarios.id_rol = roles.id
									where
										usuarios.usuario = "'.$usuario.'"
									and
										usuarios.password = md5("'.$pass.'")
									and
										usuarios.fecha_baja is null;');
	    	return $q->result();
	    }
	    function getEmpleados(){
	    	$q = $this->db->query('select 
										usuarios.id,
										usuarios.id_rol,
										roles.nombre as nombre_rol,
										usuarios.nombre as nombre_usuario,
										usuarios.apellido as apellido_usuario,
										usuarios.usuario,
										usuarios.password as pass,
										usuarios.email as email	
									from
										usuarios
									inner join
										roles
									on
										usuarios.id_rol = roles.id
									where
										usuarios.id_rol = 2
									and
										usuarios.fecha_baja is null;');
	    	return $q->result();
	    }
		function getClientes(){
	    	$q = $this->db->query('select 
										usuarios.id,
										usuarios.id_rol,
										roles.nombre as nombre_rol,
										usuarios.nombre as nombre_usuario,
										usuarios.apellido as apellido_usuario,
										usuarios.usuario,
										usuarios.password as pass,
										usuarios.email as email	
									from
										usuarios
									inner join
										roles
									on
										usuarios.id_rol = roles.id
									where
										usuarios.id_rol > 2
									and
										usuarios.fecha_baja is null;');
	    	return $q->result();
	    }	    
	    function getUsuario($id_usuario){
	    	$q = $this->db->query('select 
										usuarios.id,
										usuarios.id_rol,
										roles.nombre as nombre_rol,
										usuarios.nombre as nombre_usuario,
										usuarios.apellido as apellido_usuario,
										usuarios.usuario,
										usuarios.password as pass,
										usuarios.email as email	
									from
										usuarios
									inner join
										roles
									on
										usuarios.id_rol = roles.id
									where
										usuarios.id = '.$id_usuario);
	    	return $q->row();
	    }
	    function altaUsuario($id_rol,$nombre,$apellido, $usuario, $password, $email){
	    	$q = $this->db->query('insert into usuarios(
	    								id_rol,
	    								nombre,
	    								apellido,
	    								usuario,
	    								password,
	    								email,
	    								fecha_alta) 
    								values (
	    								'.$id_rol.',
    									"'.$nombre.'",
    									"'.$apellido.'",
    									"'.$usuario.'",
    									md5("'.$password.'"),
    									"'.$email.'",
	    								SYSDATE()
    								)');
	    	return $this->db->insert_id();
	    }	    
	    function bajaUsuario($id_usuario){
	    	$q = $this->db->query('update usuarios set fecha_baja = SYSDATE() where id = '.$id_usuario);
	    }	    	    
	    function editaUsuario($id_usuario,$id_rol,$nombre,$apellido, $usuario, $email){
	    	$q = $this->db->query('update usuarios set 
	    								nombre = "'.$nombre.'",
	    								apellido = "'.$apellido.'",
	    								usuario = "'.$usuario.'",
	    								email = "'.$email.'",
	    								id_rol = '.$id_rol.'
    								where 
    									id = '.$id_usuario);
		}
		function updateUsuario($id_usuario,$nombre,$apellido,$password,$email){
			$q = $this->db->query('update usuarios set 
									nombre = "'.$nombre.'",
									apellido = "'.$apellido.'",
									email = "'.$email.'",
									password= md5("'.$password.'")
								where 
									id = '.$id_usuario.';');
		}    
		function recoverUsuario($password,$pass){
			$q = $this->db->query('update usuarios,pedidos_reset_pass set 
										usuarios.password= md5("'.$password.'"),
										pedidos_reset_pass.renovado=1,
										pedidos_reset_pass.estado=1
								where 
									usuarios.id=pedidos_reset_pass.id_usuario
								and
									pedidos_reset_pass.pass_temp = md5("'.$pass.'")
								and
									pedidos_reset_pass.renovado =0');
		}
		function cambiarPass($password,$id){
			$q = $this->db->query('update usuarios set 
										password= md5("'.$password.'")
								where 
									id='.$id);
		}
		function checkResets($id){
			$q = $this->db->query('update pedidos_reset_pass set 
										renovado=1,
										estado=1
								where 
									id_usuario='.$id.'
								and
									renovado=0');
		}
		function searchReset($pass){
			$q = $this->db->query('select 
										*
									from
										pedidos_reset_pass
									where 
										pass_temp=md5("'.$pass.'")
									and
										renovado=0');
			return $q->result();
		}
		function resetUsuario($id,$pass){
			$q = $this->db->query('insert into pedidos_reset_pass(
				id_usuario,
				pass_temp,
				renovado,
				estado,
				fecha_alta) 
			values (
				'.$id.',
				md5("'.$pass.'"),
				0,
				0,
				SYSDATE()
			)');
			return $this->db->insert_id();
		}	
		function getEmpleadoshabiles(){
	    	$q = $this->db->query('select 
										usuarios.id,
										usuarios.id_rol,
										roles.nombre as nombre_rol,
										usuarios.nombre as nombre_usuario,
										usuarios.apellido as apellido_usuario,
										usuarios.usuario,
										usuarios.password as pass,
										usuarios.email as email
									from
										usuarios
									inner join
										roles
									on
										usuarios.id_rol = roles.id
									inner join
										disponibilidad_empleados
									on
										usuarios.id = disponibilidad_empleados.id_usuario
									where
										usuarios.id_rol = 2
									and
										usuarios.fecha_baja is null;');
	    	return $q->result();
	    }	    
	}	    	    	    
?>