<?php
	class UsuariosEspecialidadesCRUD extends CI_Model {
		function __construct()
	    {
	        // Call the Model constructor
	        parent::__construct();
	    }
	    function getUsuariosEspecialidades(){
	    	$q = $this->db->query('select 
										usuarios_especialidades.id,
										usuarios_especialidades.id_usuario,
										empleado.nombre as nombre_empleado,
										usuarios_especialidades.id_especialidad,
										especialidad.nombre as nombre_especialidad_empleado
									from
										usuarios_especialidades
									inner join
										usuarios empleado
									on
										usuarios_especialidades.id_usuario = empleado.id
									inner join
										especialidades_empleados especialidad
									on
										especialidad.id = usuarios_especialidades.id_especialidad
									where
										usuarios_especialidades.fecha_baja is null');
	    	return $q->result();
	    }
	    function getUsuarioEspecialidad($id_usuario_especialidad){
	    	$q = $this->db->query('select 
										usuarios_especialidades.id,
										usuarios_especialidades.id_usuario,
										empleado.nombre as nombre_empleado,
										usuarios_especialidades.id_especialidad,
										especialidad.nombre as nombre_especialidad_empleado
									from
										usuarios_especialidades
									inner join
										usuarios empleado
									on
										usuarios_especialidades.id_usuario = empleado.id
									inner join
										especialidades_empleados especialidad
									on
										especialidad.id = usuarios_especialidades.id_especialidad
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