<?php
class EstadosTurnosCRUD extends CI_Model {
		function __construct()
	    {
	        // Call the Model constructor
	        parent::__construct();
	    }
        function getEstado($id_estado){
	    	$q = $this->db->query('select 
	    								*
									from
										estados_turnos
									where
										estados_turnos.id = '.$id_estado);
	    	return $q->row();
	    }
	    function getEstados(){
	    	$r = $this->db->query('select 
	    								*
									from
										estados_turnos
									where
										estados_turnos.fecha_baja is null');
	    	return $r->result();
	    }
        function altaEstado($nombre){
                $this->db->query('insert into estados_turnos(nombre) values ("'.$nombre.'")');
        }    	    
	    function editaEstados($id_estado,$nombre){
	    	 $this->db->query('update estados_turnos set nombre = "'.$nombre.'" where id = '.$id_estado);
	    }	 
        function bajaEstado($id_estado){
	    	$q = $this->db->query('update estados_turnos set fecha_baja = SYSDATE() where id = '.$id_estado);
	    }	
    
}
?>