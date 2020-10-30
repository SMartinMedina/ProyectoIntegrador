<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('rolesCRUD');
	}
	public function panel(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$roles = $this->rolesCRUD->getRoles();
			//$this->load->view("roles/dashboard", array("roles" =>$roles ));
			$this->load->view("index.php", 
					array(
						"header" => 'header_unlogged.php',
						"main" => 'roles/panel.php',
						"footer" => 'footer_unlogged.php',
						"roles" => $roles ));
		}else{
			redirect('login');
		}
	}
	public function alta(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$this->load->view("index.php", 
				array(
					"header" => 'header_unlogged.php',
					"main" => 'roles/alta.php',
					"footer" => 'footer_unlogged.php'));
		}else{
			redirect('login');
		}			
	}
	public function altabd(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[4]|max_length[50]',
												array(
													'required' => 'Debe ingresar un %s.',
													'min_length' => 'El %s debe contar con 4 caracteres como mínimo.',
													'max_length' => 'El %s debe contar con 50 caracteres como máximo.'
												));
			if ($this->form_validation->run() == FALSE)
			{
				$this->alta();
			}
			else
			{
				$nombre = $_POST['nombre'];
				$this->rolesCRUD->altaRol($nombre);
				$this->panel();
			}
		}else{
			redirect('login');
		}	
	}
	public function baja($id_rol){
		if($this->session->userdata('id_rol_usuario') == 1){
			$rol = $this->rolesCRUD->getRol($id_rol);
			//$this->load->view("roles/baja", array("rol"=> $rol));
			$this->load->view("index.php", 
				array(
					"header" => 'header_unlogged.php',
					"main" => 'roles/baja.php',
					"footer" => 'footer_unlogged.php',
					"rol"=>$rol));
		}else{
			redirect('login');
		}	
	}
	public function bajabd(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$this->form_validation->set_rules('id', 'Id', 'required',
												array(
													'required' => 'Debe ingresar un %s.'
												));
			if ($this->form_validation->run() == FALSE)
			{
				$this->baja();
			}
			else
			{
				$id_rol = $_POST['id'];
				$this->rolesCRUD->bajaRol($id_rol);
				$this->panel();
			}
	}else{
		redirect('login');
	}	

		
	}	
	public function edita($id_rol){
		if($this->session->userdata('id_rol_usuario') == 1){
			$rol = $this->rolesCRUD->getRol($id_rol);
			$this->load->view("index.php", 
				array(
					"header" => 'header_unlogged.php',
					"main" => 'roles/edita.php',
					"footer" => 'footer_unlogged.php',
					"rol"=> $rol));
			//$this->load->view("roles/edita", array("rol"=> $rol));
		}else{
			redirect('login');
		}		
	}
	public function editabd(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$this->form_validation->set_rules('id', 'Id', 'required',
												array(
													'required' => 'Debe ingresar un %s.'
												));
			$this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[4]|max_length[50]',
												array(
													'required' => 'Debe ingresar un %s.',
													'min_length' => 'El %s debe contar con 4 caracteres como mínimo.',
													'max_length' => 'El %s debe contar con 50 caracteres como máximo.'
												));
			if ($this->form_validation->run() == FALSE)
			{
				$this->alta();
			}
			else
			{
				$id_rol = $_POST['id'];
				$nombre = $_POST['nombre'];
				$this->rolesCRUD->editaRol($id_rol,$nombre);
				$this->panel();
			}
		}else{
			redirect('login');
		}			
	}		
}
