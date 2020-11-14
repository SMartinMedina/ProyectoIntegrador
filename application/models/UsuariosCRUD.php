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
		function recoverUsuario($pass){
			$q = $this->db->query('select
										id_usuario
									from
										pedidos_reset_pass
									where 
										pedidos_reset_pass.pass_temp = md5("'.$pass.'")
									and
										pedidos_reset_pass.renovado =0');
			return $q->row();
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
		function desactivarpass($pass){
			$q = $this->db->query('update pedidos_reset_pass set 
											renovado=1,
											estado=1
									where 
										pass_temp=md5("'.$pass.'")');
		}	
		function getEmpleadosdiponibilidad(){
	    	$q = $this->db->query('select 
										usuarios.id,
										usuarios.nombre as nombre_usuario,
										usuarios.apellido as apellido_usuario,
										disponibilidad_empleados.horario_salida as horario_salida,
										disponibilidad_empleados.horario_entrada as horario_entrada 
									from
										usuarios
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
		function disponibilidadbd($e,$i){
			if($i==1){
				$q = $this->db->query('update disponibilidad_empleados set horario_salida=NULL,horario_entrada=SYSDATE()  where id_usuario='.$e);
			}else{
				$q = $this->db->query('update disponibilidad_empleados set horario_entrada=NULL,horario_salida=SYSDATE()  where id_usuario='.$e);
			}
			
		}
		function disponibilidadTodosbd(){
			$q = $this->db->query('update disponibilidad_empleados set horario_salida=NULL,horario_entrada=SYSDATE() ');
		} 
		function noDisponibilidadTodosbd(){
			$q = $this->db->query('update disponibilidad_empleados set horario_salida=SYSDATE(),horario_entrada=NULL ');
		}
		function getEmpleadosHabiles(){
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
										disponibilidad_empleados
									on
										usuarios.id = disponibilidad_empleados.id_usuario
									inner join
										roles
									on
										usuarios.id_rol = roles.id
									where
										usuarios.id_rol = 2
									and
										disponibilidad_empleados.horario_salida is null
									and
										usuarios.fecha_baja is null;');
	    	return $q->result();
		}
		function altaDisponibilidadEmpleado($id_usuario){
			$q = $this->db->query('insert into disponibilidad_empleados(id_usuario, horario_salida) value ('.$id_usuario.',SYSDATE())');
			return $this->db->insert_id();
		}
		function getEmpleadodiponibilidad($id){
            $q = $this->db->query('select 
                                        usuarios.id,
                                        usuarios.nombre as nombre_usuario,
                                        usuarios.apellido as apellido_usuario,
                                        disponibilidad_empleados.horario_salida as horario_salida,
                                        disponibilidad_empleados.horario_entrada as horario_entrada 
                                    from
                                        usuarios
                                    inner join
                                        disponibilidad_empleados
                                    on
                                        usuarios.id = disponibilidad_empleados.id_usuario
                                    where
                                        usuarios.id_rol = 2
                                    and
                                        usuarios.fecha_baja is null
                                    and
                                    usuarios.id='.$id);
            return $q->result();
		}
	}	    	    	    
?>