<?php
class EspecialidadesEmpleadosCRUD extends CI_Model {
		function __construct()
	    {
	        // Call the Model constructor
	        parent::__construct();
	    }
        function getEspecialidad($id_especialidades){
	    	$q = $this->db->query('select 
										especialidades_empleados.id,
										especialidades_empleados.nombre
									from
										especialidades_empleados
									where
										especialidades_empleados.id = '.$id_especialidades);
	    	return $q->row();
	    }
	    function getEspecialidades(){
	    	$q = $this->db->query('select 
										especialidades_empleados.id,
										especialidades_empleados.nombre
									from
										especialidades_empleados
									where
										especialidades_empleados.fecha_baja is null');
	    	return $q->result();
	    }

		function getEspecialidadesDisponibles(){
			$q = $this->db->query('select 
										especialidades_empleados.id,
										especialidades_empleados.nombre,
										count(*)
									from
										especialidades_empleados
									inner join
										usuarios_especialidades
									on
										usuarios_especialidades.id_especialidad = especialidades_empleados.id	
									where
										especialidades_empleados.fecha_baja is null
									and
										usuarios_especialidades.fecha_baja is null	
									group by
										especialidades_empleados.id');
	    	return $q->result();

		}
        function altaEspecialidad($nombre){
                $this->db->query('insert into especialidades_empleados(nombre) values ("'.$nombre.'")');
        }
        function bajaEspecialidad($id_especialidad){
	    	 $this->db->query('update especialidades_empleados set fecha_baja = SYSDATE() where id = '.$id_especialidad);
	       }	    	    
	    function editaEspecialidad($id_especialidad,$nombre){
	    	 $this->db->query('update especialidades_empleados  set nombre = "'.$nombre.'" where id = '.$id_especialidad);
	    }	 
        
        function getEspecialidadesParaAgregarEmpleado($idEmpleado){
	    	$q = $this->db->query('select 
										especialidades_empleados.id,
										especialidades_empleados.nombre
									from
										especialidades_empleados
									where
										especialidades_empleados.id not in (select id_especialidad from usuarios_especialidades where id_usuario = '.$idEmpleado.')
									and
										especialidades_empleados.fecha_baja is null');
	    	return $q->result();
	    }
        function getEspecialidadesEmpleado($idEmpleado){
	    	$q = $this->db->query('select 
										especialidades_empleados.id,
										especialidades_empleados.nombre
									from
										especialidades_empleados
									where
										especialidades_empleados.id in (select id_especialidad from usuarios_especialidades where id_usuario = '.$idEmpleado.')
									and
										especialidades_empleados.fecha_baja is null');
	    	return $q->result();
	    }	    
    
}
?>