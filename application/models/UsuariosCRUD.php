<?php
	class UsuariosCRUD extends CI_Model {
		function __construct()
	    {
	        // Call the Model constructor
	        parent::__construct();
	    }
	    function getUsuarios(){
	    	$q = $this->db->query('select 
	    								*
									from
										usuarios
									where
										usuarios.fecha_baja is null');
	    	return $q->result();
	    }
	    function getUsuario($id_usuario){
	    	$q = $this->db->query('select 
	    								*
									from
										usuarios
									where
										usuarios.id = '.$id_usuario);
	    	return $q->row();
	    }
	    function altaUsuario($id_rol,$nombre,$apellido, $usuario, $password, $email);{
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
	    }	    
	    function bajaUsuario($id_usuario){
	    	$q = $this->db->query('update usuarios set fecha_baja = SYSDATE() where id = '.$id_usuario);
	    }	    	    
	    function editaUsuario($id_usuario,$id_rol,$nombre,$apellido, $usuario, $password, $email){
	    	$q = $this->db->query('update usuarios set 
	    								nombre = "'.$nombre.'",
	    								apellido = "'.$apellido.'",
	    								usuario = "'.$usuario.'",
	    								email = "'.$email.'"
    								where 
    									id = '.$id_usuario);
	    }	    	    	    
	}
?>