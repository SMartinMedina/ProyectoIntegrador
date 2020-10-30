<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosEspecialidades extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('usuariosEspecialidadesCRUD');
        $this->load->model('usuariosCRUD');
        $this->load->model('especialidadesEmpleadosCRUD');
	}
	public function panel(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$usuariosEspecialidades = $this->usuariosEspecialidadesCRUD->getUsuariosEspecialidades();
			$this->load->view("usuariosEspecialidades/dashboard", array("usuariosEspecialidades" =>$usuariosEspecialidades ));
		}else{
			redirect('login');
		}			

	}
	public function alta(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$empleados = $this->usuariosCRUD->getEmpleados();
			$especialidades = $this->especialidadesEmpleadosCRUD->getEspecialidades();
			$this->load->view("usuariosEspecialidades/alta", 
							array("especialidades" => $especialidades,
								"empleados" => $empleados
						));
		}else{
				redirect('login');
		}			
			
	}
	public function altabd(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$id_usuario = $_POST['id_usuario'];
			$id_especialidad = $_POST['id_especialidad'];
			$this->usuariosEspecialidadesCRUD->altaUsuarioEspecialidad($id_usuario, $id_especialidad);
			$this->panel();
		}else{
			redirect('login');
		}			
		
	}
	public function baja($id_usuario_especialidad){
		if($this->session->userdata('id_rol_usuario') == 1){
			$usuarioEspecialidad = $this->usuariosEspecialidadesCRUD->getUsuarioEspecialidad($id_usuario_especialidad);
			$this->load->view("usuariosEspecialidades/baja", array("usuarioEspecialidad"=> $usuarioEspecialidad));
		}else{
			redirect('login');
		}
	}
	public function bajabd(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$id_usuario_especialidad = $_POST['id_usuario_especialidad'];
			$this->usuariosEspecialidadesCRUD->bajaUsuarioEspecialidad($id_usuario_especialidad);
			$this->panel();
		}else{
			redirect('login');
		}
	}	
	public function edita($id_usuario_especialidad){
		if($this->session->userdata('id_rol_usuario') == 1){
			$usuarioEspecialidad = $this->usuariosEspecialidadesCRUD->getUsuarioEspecialidad($id_usuario_especialidad);
			$this->load->view("usuariosEspecialidades/edita", array("usuarioEspecialidad"=> $usuarioEspecialidad));
		}else{
			redirect('login');
		}
	}
	public function editabd(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$id_usuario_especialidad = $_POST['id_usuario_especialidad'];
			$id_especialidad = $_POST['id_especialidad'];
			$nombre = $_POST['nombre'];
			$this->usuariosEspecialidadesCRUD->editaUsuarioEspecialidad($id_usuario_especialidad,$id_especialidad);
			$this->panel();
		}else{
			redirect('login');
		}
	}		

	public function getEspecialidadesEmpleado(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$id_empleado = $_POST['id_empleado'];
			/*$especialidadesEmpleado =  $this->usuariosEspecialidadesCRUD->getEspecialidadesEmpleado($id_empleado);
			$especialidades = $this->especialidadesEmpleadosCRUD->getEspecialidades();*/

			$espDispEmp = $this->especialidadesEmpleadosCRUD->getEspecialidadesParaAgregarEmpleado($id_empleado);
			$espEmp = $this->especialidadesEmpleadosCRUD->getEspecialidadesEmpleado($id_empleado);

			

			$data = array(
						"espDispEmp" => $espDispEmp,
						"espEmp" => $espEmp
					);
			echo json_encode($data);
		}else{
			redirect('login');
		}	
	}		
}
