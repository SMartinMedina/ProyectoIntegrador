<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('rolesCRUD');
	}
	public function panel(){
		$roles = $this->rolesCRUD->getRoles();
		$this->load->view("roles/dashboard", array("roles" =>$roles ));
	}
	public function alta(){
		$this->load->view("roles/alta");
	}
	public function altabd(){
		$nombre = $_POST['nombre_rol'];
		$this->rolesCRUD->altaRol($nombre);
		$this->panel();
	}
	public function baja($id_rol){
		$rol = $this->rolesCRUD->getRol($id_rol);
		$this->load->view("roles/baja", array("rol"=> $rol));
	}
	public function bajabd(){
		$id_rol = $_POST['id_rol'];
		$this->rolesCRUD->bajaRol($id_rol);
		$this->panel();
	}	
	public function edita($id_rol){
		$rol = $this->rolesCRUD->getRol($id_rol);
		$this->load->view("roles/edita", array("rol"=> $rol));
	}
	public function editabd(){
		$id_rol = $_POST['id_rol'];
		$nombre = $_POST['nombre'];
		$this->rolesCRUD->editaRol($id_rol,$nombre);
		$this->panel();
	}		
}
