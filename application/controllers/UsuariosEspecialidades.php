<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosEspecialidades extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('usuariosEspecialidadesCRUD');
	}
	public function panel(){
		$usuariosEspecialidades = $this->usuariosEspecialidadesCRUD->getUsuariosEspecialidades();
		$this->load->view("usuariosEspecialidades/dashboard", array("usuariosEspecialidades" =>$usuariosEspecialidades ));
	}
	public function alta(){
		$this->load->view("usuariosEspecialidades/alta");
	}
	public function altabd(){
		$id_usuario = $_POST['id_usuario'];
		$id_especialidad = $_POST['id_especialidad'];
		$this->usuariosEspecialidadesCRUD->altaUsuarioEspecialidad($id_usuario, $id_especialidad);
		$this->panel();
	}
	public function baja($id_usuario_especialidad){
		$usuarioEspecialidad = $this->usuariosEspecialidadesCRUD->getUsuarioEspecialidad($id_usuario_especialidad);
		$this->load->view("usuariosEspecialidades/baja", array("usuarioEspecialidad"=> $usuarioEspecialidad));
	}
	public function bajabd(){
		$id_usuario_especialidad = $_POST['id_usuario_especialidad'];
		$this->usuariosEspecialidadesCRUD->bajaUsuarioEspecialidad($id_usuario_especialidad);
		$this->panel();
	}	
	public function edita($id_usuario_especialidad){
		$usuarioEspecialidad = $this->usuariosEspecialidadesCRUD->getUsuarioEspecialidad($id_usuario_especialidad);
		$this->load->view("usuariosEspecialidades/edita", array("usuarioEspecialidad"=> $usuarioEspecialidad));
	}
	public function editabd(){
		$id_usuario_especialidad = $_POST['id_usuario_especialidad'];
		$id_especialidad = $_POST['id_especialidad'];
		$nombre = $_POST['nombre'];
		$this->usuariosEspecialidadesCRUD->editaUsuarioEspecialidad($id_usuario_especialidad,$id_especialidad);
		$this->panel();
	}		
}
