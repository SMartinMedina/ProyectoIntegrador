<?php
	class UsuariosEspecialidadesCRUD extends CI_Model {
		function __construct()
	    {
	        // Call the Model constructor
	        parent::__construct();
	    }
	    function getUsuariosEspecialidades(){
	    	$q = $this->db->query('select 
	    								*
									from
										usuarios_especialidades
									where
										usuarios_especialidades.fecha_baja is null');
	    	return $q->result();
	    }
	    function getUsuarioEspecialidad($id_usuario_especialidad){
	    	$q = $this->db->query('select 
	    								*
									from
										usuarios_especialidades
									where
										usuarios_especialidades.id = '.$id_usuario_especialidad);
	    	return $q->row();
	    }
	    function altaUsuarioEspecialidad($id_usuario, $id_especialidad){
	    	$q = $this->db->query('insert into usuarios_especialidades(
	    								id_usuario,
	    								id_especialidad,
	    								fecha_alta) 
    								values (
	    								'.$id_usuario.',
	    								'.$id_especialidad.',
	    								SYSDATE()
    								)');
	    }	    
	    function bajaUsuarioEspecialidad($id_usuario_especialidad){
	    	$q = $this->db->query('update usuarios_especialidades set fecha_baja = SYSDATE() where id = '.$id_usuario_especialidad);
	    }	    	    
	    function editaUsuarioEspecialidad($id_usuario_especialidad,$id_especialidad){
	    	$q = $this->db->query('update usuarios_especialidades set 
	    								id_especialidad = '.$id_especialidad.'
    								where 
    									id = '.$id_usuario_especialidad);
	    }	    	    	    
	}
?>