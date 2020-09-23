<?php
class EspecialidadesEmpleados extends CI_Model {
		function __construct()
	    {
	        // Call the Model constructor
	        parent::__construct();
	    }
        function getEspecialidad($id_especialidades){
	    	$q = $this->db->query('select 
	    								*
									from
										especialidades_empleados
									where
										especialidades_empleados.id = '.$id_especialidades);
	    	return $q->row();
	    }
	    function getEspecialidades(){
	    	$q = $this->db->query('select 
	    								*
									from
										especialidades_empleados
									where
										especialidades_empleados.fecha_baja is null');
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
        
    
}
?>