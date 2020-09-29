<?php
	class TurnosCRUD extends CI_Model {
		function __construct()
	    {
	        // Call the Model constructor
	        parent::__construct();
	    }
	    function getTurnos(){
	    	$q = $this->db->query('select 
	    								*
									from
										turnos
									where
										turnos.fecha_baja is null');
	    	return $q->result();
	    }
	    function getTurno($id_turno){
	    	$q = $this->db->query('select 
	    								*
									from
										turnos
									where
										turnos.id = '.$id_turno);
	    	return $q->row();
	    }
	    function altaTurno($id_cliente, $id_empleado, $id_estado_turno){
	    	$q = $this->db->query('insert into turnos(
	    								id_cliente,
	    								id_empleado,
	    								id_estado_turno,
	    								fecha_alta) 
    								values (
	    								'.$id_cliente.',
	    								'.$id_empleado.',
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