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
										especialidad.nombre as nombre_especialidad_empleado,
										usuarios_especialidades.demora_min
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
										usuarios_especialidades.fecha_baja is null
									order by usuarios_especialidades.id_usuario');
	    	return $q->result();
		}
		function getUsuariosEspecialidadesHabiles(){
	    	$q = $this->db->query('select 
										usuarios_especialidades.id,
										usuarios_especialidades.id_usuario,
										empleado.nombre as nombre_empleado,
										usuarios_especialidades.id_especialidad,
										especialidad.nombre as nombre_especialidad_empleado,
										usuarios_especialidades.demora_min
									from
										usuarios_especialidades
									inner join
										usuarios empleado
									on
										usuarios_especialidades.id_usuario = empleado.id
									inner join
										disponibilidad_empleados
									on
										usuarios_especialidades.id_usuario = disponibilidad_empleados.id_usuario
									inner join
										especialidades_empleados especialidad
									on
										especialidad.id = usuarios_especialidades.id_especialidad
									where
										usuarios_especialidades.fecha_baja is null
									and
										disponibilidad_empleados.horario_salida is null
									order by usuarios_especialidades.id_usuario');
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
	    function altaUsuarioEspecialidad($id_usuario, $id_especialidad, $demora_min){
	    	$q = $this->db->query('insert into usuarios_especialidades(
	    								id_usuario,
										id_especialidad,
										demora_min,
	    								fecha_alta) 
    								values (
	    								'.$id_usuario.',
										'.$id_especialidad.',
										'.$demora_min.',
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
	    function cleanEspecialidadesEmpleado($id_empleado){
	    	$q = $this->db->query('update usuarios_especialidades set fecha_baja = SYSDATE() where id_usuario = '.$id_empleado);
	    	//return $q->result();
	    }

	    function getEspecialidadesEmpleado($id_empleado){
	    	$q = $this->db->query('select 
										usuarios_especialidades.id,
										usuarios_especialidades.id_usuario,
										empleado.nombre as nombre_empleado,
										usuarios_especialidades.id_especialidad,
										usuarios_especialidades.demora_min,
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
										usuarios_especialidades.id_usuario = '.$id_empleado.'
									and	
										usuarios_especialidades.fecha_baja is null');
	    	return $q->result();
	    }
	}
?>