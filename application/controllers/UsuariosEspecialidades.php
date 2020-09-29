<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosEspecialidades extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('usuarioEspecialidadsEspecialidadesCRUD');
	}
	public function panel(){
		$usuarioEspecialidadsEspecialidades = $this->usuarioEspecialidadsEspecialidadesCRUD->getUsuariosEspecialidades();
		$this->load->view("usuarioEspecialidadsEspecialidades/dashboard", array("usuarioEspecialidadsEspecialidades" =>$usuarioEspecialidadsEspecialidades ));
	}
	public function alta(){
		$this->load->view("usuarioEspecialidadsEspecialidades/alta");
	}
	public function altabd(){
		$id_usuario = $_POST['id_usuario'];
		$id_especialidad = $_POST['id_especialidad'];
		$this->usuarioEspecialidadsEspecialidadesCRUD->altaUsuarioEspecialidad($id_usuario, $id_especialidad);
		$this->panel();
	}
	public function baja($id_usuario_especialidad){
		$usuarioEspecialidad = $this->usuarioEspecialidadsEspecialidadesCRUD->getUsuarioEspecialidad($id_usuario_especialidad);
		$this->load->view("usuarioEspecialidadsEspecialidades/baja", array("usuarioEspecialidad"=> $usuarioEspecialidad));
	}
	public function bajabd(){
		$id_usuario_especialidad = $_POST['id_usuario_especialidad'];
		$this->usuarioEspecialidadsEspecialidadesCRUD->bajaUsuarioEspecialidad($id_usuario_especialidad);
		$this->panel();
	}	
	public function edita($id_usuario_especialidad){
		$usuarioEspecialidad = $this->usuarioEspecialidadsEspecialidadesCRUD->getUsuarioEspecialidad($id_usuario_especialidad);
		$this->load->view("usuarioEspecialidadsEspecialidades/edita", array("usuarioEspecialidad"=> $usuarioEspecialidad));
	}
	public function editabd(){
		$id_usuario_especialidad = $_POST['id_usuario_especialidad'];
		$id_especialidad = $_POST['id_especialidad'];
		$nombre = $_POST['nombre'];
		$this->usuarioEspecialidadsEspecialidadesCRUD->editaUsuarioEspecialidad($id_usuario_especialidad,$id_especialidad);
		$this->panel();
	}		
}
