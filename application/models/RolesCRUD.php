-<?php
	class RolesCRUD extends CI_Model {
		function __construct()
	    {
	        // Call the Model constructor
	        parent::__construct();
	    }
	    function getRoles(){
	    	$q = $this->db->query('select 
	    								*
									from
										roles
									where
										roles.fecha_baja is null');
	    	return $q->result();
	    }
	    function getRol($id_rol){
	    	$q = $this->db->query('select 
	    								*
									from
										roles
									where
										roles.id = '.$id_rol);
	    	return $q->row();
	    }
	    function altaRol($nombre){
	    	$q = $this->db->query('insert into roles(nombre) values("'.$nombre.'")');
	    }	    
	    function bajaRol($id_rol){
	    	$q = $this->db->query('update roles set fecha_baja = SYSDATE() where id = '.$id_rol);
	    }	    	    
	    function editaRol($id_rol,$nombre){
	    	$q = $this->db->query('update roles set nombre = "'.$nombre.'" where id = '.$id_rol);
	    }	    	    	    
	}
?>