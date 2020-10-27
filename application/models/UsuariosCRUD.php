<?php
	class UsuariosCRUD extends CI_Model {
		function __construct()
	    {
	        // Call the Model constructor
	        parent::__construct();
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
	}
?>