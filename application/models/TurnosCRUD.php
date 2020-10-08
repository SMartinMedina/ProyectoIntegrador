<?php
	class TurnosCRUD extends CI_Model {
		function __construct()
	    {
	        // Call the Model constructor
	        parent::__construct();
	    }
	    function getTurnos(){
	    	$q = $this->db->query('select 
										turnos.id as id_turno,
										turnos.id_cliente,
										cliente.nombre as nombre_cliente,
										turnos.id_empleado,
										empleado.nombre as nombre_empleado,
										turnos.id_estado_turno,
										estados_turnos.nombre as nombre_estado_turno,
										turnos.id_especialidad,
										especialidades_empleados.nombre as nombre_especialidades_usuarios
									from
										turnos
									inner join
										usuarios as empleado
									on
										turnos.id_empleado = empleado.id
									inner join
										usuarios as cliente
									on
										turnos.id_cliente = cliente.id
									inner join
										especialidades_empleados
									on
										turnos.id_especialidad = especialidades_empleados.id
									inner join
										estados_turnos
									on
										turnos.id_estado_turno = estados_turnos.id
									where
										turnos.fecha_baja is null;');
	    	return $q->result();
	    }
	    function getTurno($id_turno){
	    	$q = $this->db->query('select 
	    								turnos.id as id_turno,
										turnos.id_cliente,
										cliente.nombre as nombre_cliente,
										turnos.id_empleado,
										empleado.nombre as nombre_empleado,
										turnos.id_estado_turno,
										estados_turnos.nombre as nombre_estado_turno,
										turnos.id_especialidad,
										especialidades_empleados.nombre as nombre_especialidades_usuarios
									from
										turnos
									inner join
										usuarios as empleado
									on
										turnos.id_empleado = empleado.id
									inner join
										usuarios as cliente
									on
										turnos.id_cliente = cliente.id
									inner join
										especialidades_empleados
									on
										turnos.id_especialidad = especialidades_empleados.id
									inner join
										estados_turnos
									on
										turnos.id_estado_turno = estados_turnos.id
									where
										turnos.id = '.$id_turno);
	    	return $q->row();
	    }
	    function altaTurno($id_cliente, $id_empleado,$id_servicio, $id_estado_turno){
	    	$q = $this->db->query('insert into turnos(
	    								id_cliente,
	    								id_empleado,
	    								id_servicio,
	    								id_estado_turno,
	    								fecha_alta) 
    								values (
	    								'.$id_cliente.',
	    								'.$id_empleado.',
	    								'.$id_servicio.',
	    								'.$id_estado_turno.',
	    								SYSDATE()
    								)');
	    }	    
	    function bajaTurno($id_turno){
	    	$q = $this->db->query('update turnos set fecha_baja = SYSDATE() where id = '.$id_turno);
	    }	    	    
	    function editaTurno($id_turno,$id_estado_turno){
	    	$q = $this->db->query('update turnos set 
	    								id_estado_turno = '.$id_estado_turno.'
    								where 
    									id = '.$id_turno);
	    }	    	    	    
	}
?>