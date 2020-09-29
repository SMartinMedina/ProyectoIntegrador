<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('usuariosCRUD');
	}
	public function panel(){
		$usuarios = $this->usuariosCRUD->getUsuarios();
		$this->load->view("usuarios/dashboard", array("usuarios" =>$usuarios ));
	}
	public function alta(){
		$this->load->view("usuarios/alta");
	}
	public function altabd(){
		
		$id_rol = $_POST['id_rol'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		$this->usuariosCRUD->altaUsuario($id_rol,$nombre,$apellido, $usuario, $password, $email);

		$this->panel();
	}
	public function baja($id_usuario){
		$usuario = $this->usuariosCRUD->getUsuario($id_usuario);
		$this->load->view("usuarios/baja", array("usuario"=> $usuario));
	}
	public function bajabd(){
		$id_usuario = $_POST['id_usuario'];
		$this->usuariosCRUD->bajaUsuario($id_usuario);
		$this->panel();
	}	
	public function edita($id_usuario){
		$usuario = $this->usuariosCRUD->getUsuario($id_usuario);
		$this->load->view("usuarios/edita", array("usuario"=> $usuario));
	}
	public function editabd(){
		$id_usuario = $_POST['id_usuario'];
		$id_rol = $_POST['id_rol'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$this->usuariosCRUD->editaUsuario($id_usuario,$id_rol,$nombre,$apellido, $usuario, $password, $email);
		$this->panel();
	}		
}
