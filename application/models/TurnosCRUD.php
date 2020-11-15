<?php
	class TurnosCRUD extends CI_Model {
		function __construct()
	    {
	        // Call the Model constructor
	        parent::__construct();
		}
		function getTurnosEmpEnEspera($id_empleado){
	    	$q = $this->db->query('select 
										turnos.id as id_turno,
										turnos.id_cliente,
										cliente.nombre as nombre_cliente,
										turnos.id_empleado,
										turnos.id_estado_turno,
										estados_turnos.nombre as nombre_estado_turno,
										turnos.id_especialidad,
										especialidades_empleados.nombre as nombre_especialidades_usuarios
									from
										turnos
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
										turnos.fecha_baja is null
									and
										turnos.id_estado_turno=1
									and
										turnos.id_empleado='.$id_empleado.'
									group by turnos.id_cliente
									order by turnos.id
									');
	    	return $q->result();
	    }
		function getTurnosEmp($id_empleado){
	    	$q = $this->db->query('select 
										turnos.id as id_turno,
										turnos.id_cliente,
										cliente.nombre as nombre_cliente,
										turnos.id_empleado,
										turnos.id_estado_turno,
										estados_turnos.nombre as nombre_estado_turno,
										turnos.id_especialidad,
										especialidades_empleados.nombre as nombre_especialidades_usuarios
									from
										turnos
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
										turnos.fecha_baja is null
									and
										turnos.id_estado_turno!=3
									and
										turnos.id_estado_turno!=4
									and
										turnos.id_empleado='.$id_empleado.'
										order by turnos.id');
	    	return $q->result();
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
		function getTurnosClienteById($idCliente){
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
										turnos.id_cliente = '.$idCliente.'
									and
										turnos.id_estado_turno = 1
									and									
										turnos.fecha_baja is null;');
	    	return $q->result();
	    }

	    function getCantTurnosEnEsperaPorEmpleadoPorEsp($id_empleado){
	    	$q = $this->db->query('select 
										count(*) as cant,
										turnos.id_especialidad as id_especialidad
									from
										turnos
									where
										id_empleado = '.$id_empleado.'
									and
										id_estado_turno = 1
									group by
										id_especialidad
									order by id_especialidad asc;');
	    	return $q->result();

	    }

	    function getCantTurnosEnEsperaPorEmpPorEsp($id_empleado, $id_servicio){
	    	$q = $this->db->query('select 
										count(*) as cant,
										turnos.id_especialidad as id_especialidad
									from
										turnos
									where
										id_empleado = '.$id_empleado.'
									and
										id_especialidad = '.$id_servicio.'
									and									
										id_estado_turno = 1');
	    	return $q->result();

	    }


	    

	    function getDemoraEmpleados($id_empleado){
	    	$q = $this->db->query('select
										tiempo_estimado_especialista.id_especialista,
										tiempo_estimado_especialista.id_servicio,
										tiempo_estimado_especialista.tiempo_demora
									from
										tiempo_estimado_especialista
									where
										fecha_baja is null
									and
										id_especialista = '.$id_empleado);
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
	    								id_especialidad,
	    								id_estado_turno,
	    								fecha_alta) 
    								values (
	    								'.$id_cliente.',
	    								'.$id_empleado.',
	    								'.$id_servicio.',
	    								'.$id_estado_turno.',
	    								SYSDATE()
    								)');
	    	return $this->db->insert_id();
	    }	    
	    function bajaTurno($id_turno){
	    	$q = $this->db->query('update turnos set fecha_baja = SYSDATE() where id = '.$id_turno);
	    }	    	    
	    function editaTurno($id_turno,$id_cliente, $id_especialidad, $id_empleado){
	    	$q = $this->db->query('update turnos set 
	    								id_cliente = '.$id_cliente.',
	    								id_especialidad = '.$id_especialidad.',
	    								id_empleado = '.$id_empleado.'
    								where 
    									id = '.$id_turno);
		}	
	    function avanzaTurno($id_turno,$id_estado_turno){
	    	$q = $this->db->query('update turnos set 
	    								id_estado_turno = '.$id_estado_turno.'
    								where 
    									id = '.$id_turno);
		}			
		
		function cancelarTurno($id_turno){
	    	$q = $this->db->query('update turnos set id_estado_turno=3 where id = '.$id_turno);
		}
		function finalizarTurno($id_turno){
	    	$q = $this->db->query('update turnos set id_estado_turno=3 where id = '.$id_turno);
		}

		function registrarCambioEstadoTurno($id_turno, $id_estado_turno){
			$q = $this->db->query('insert into log_turnos(
	    								id_turno,
	    								id_estado_turno,
	    								fecha_hora_alta) 
    								values (
	    								'.$id_turno.',
	    								'.$id_estado_turno.',
	    								SYSDATE()
    								)');
		}
		function getTurnosEmpleados(){
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
										turnos.id_estado_turno!=3
									and
										turnos.id_estado_turno!=4
									and	
										turnos.fecha_baja is null
									order by turnos.id;');
	    	return $q->result();
	    }	       	    	    
		function getTurnosEnEspera(){
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
										turnos.id_estado_turno=1
									and	
										turnos.fecha_baja is null
									order by turnos.id;');
	    	return $q->result();
	    }	       	    	    
	}
?>